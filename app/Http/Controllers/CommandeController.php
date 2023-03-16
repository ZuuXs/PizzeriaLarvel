<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Pizza;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \Datetime;

class CommandeController extends Controller{


    public function dateForm(){
        return view('admin.commandes.dateForm');
    }


    public function date(Request $request){
        $validated=$request->validate([
           'date_f' =>'required|date_format:Y-m-d'
        ]);

        $date=Carbon::parse($validated['date_f']);
        $nextDate=Carbon::parse($validated['date_f'])->addDay();

        $commande=Commande::where('created_at','>',$date)->where('created_at','<',$nextDate)->get();

        $userLog=[];
        $pizzaN=[];
        if(isset($commande)){
            foreach ($commande as $c){
                if(!isset($userLog[$c->user_id])){
                    $user=User::findOrFail($c->user_id);
                    $userLog[$c->user_id]=$user->login;
                }

                if(!isset($pizzaN[$c->id])){
                    $commande_pizza=DB::table('commande_pizza')->where('commande_id','=',$c->id)->first();
                    if(empty(Pizza::find($commande_pizza->pizza_id))) {
                        $pizza = Pizza::withTrashed()->where('id',$commande_pizza->pizza_id)->first();
                        $pizzaN[$c->id] = $pizza->nom;
                    }else{

                        $pizza = Pizza::findOrFail($commande_pizza->pizza_id);
                        $pizzaN[$c->id] = $pizza->nom;
                    }
                }
            }
        }

        return view('admin.commandes.date',['commande'=>$commande,'pizzaN'=>$pizzaN,'userLog'=>$userLog]);
    }


    public function today(){
        $today=Carbon::today();
        $commande=Commande::where('updated_at','>',$today)->orderBy('statut')->orderBy('updated_at','desc')->get();

        $userLog=[];
        $pizzaN=[];
        if(isset($commande)){
            foreach ($commande as $c){
                if(!isset($userLog[$c->user_id])){
                    $user=User::findOrFail($c->user_id);
                    $userLog[$c->user_id]=$user->login;
                }

                if(!isset($pizzaN[$c->id])){
                    $commande_pizza=DB::table('commande_pizza')->where('commande_id','=',$c->id)->first();
                    if(empty(Pizza::find($commande_pizza->pizza_id))) {
                        $pizza = Pizza::withTrashed()->where('id',$commande_pizza->pizza_id)->first();
                        $pizzaN[$c->id] = $pizza->nom;
                    }else{
                        $pizza = Pizza::findOrFail($commande_pizza->pizza_id);
                        $pizzaN[$c->id] = $pizza->nom;
                    }

                }

            }
        }

        return view('admin.commandes.today',['commande'=>$commande,'pizzaN'=>$pizzaN,'userLog'=>$userLog]);
    }



    public function all(){
        $commande=Commande::orderBy('created_at','desc')->paginate(2);

        $userLog=[];
        $pizzaN=[];
        if(isset($commande)){
            foreach ($commande as $c){
                if(!isset($userLog[$c->user_id])){
                    $user=User::findOrFail($c->user_id);
                    $userLog[$c->user_id]=$user->login;
                }

                if(!isset($pizzaN[$c->id])){
                    $commande_pizza=DB::table('commande_pizza')->where('commande_id','=',$c->id)->first();
                    if(empty(Pizza::find($commande_pizza->pizza_id))) {
                        $pizza = Pizza::withTrashed()->where('id',$commande_pizza->pizza_id)->first();
                        $pizzaN[$c->id] = $pizza->nom;
                    }else{

                        $pizza = Pizza::findOrFail($commande_pizza->pizza_id);
                        $pizzaN[$c->id] = $pizza->nom;
                    }
                }
            }
        }
        return view('admin.commandes.all',['commande'=>$commande,'pizzaN'=>$pizzaN,'userLog'=>$userLog]);
    }

    public function recette_du_jour(){
        $today=Carbon::today();
        $commande=Commande::where('updated_at','>',$today)->get();
        
        $recette=0;
        if(isset($commande)){
            foreach ($commande as $c){
                $commande_pizza=DB::table('commande_pizza')->where('commande_id','=',$c->id)->first();
                $pizza=Pizza::withTrashed()->findOrFail($commande_pizza->pizza_id);
                $recette=$recette+$pizza->prix*$commande_pizza->qte;
            }
        }
        
        return view('admin.commandes.recetteDuJour',['recette'=>$recette]);
    }


    //Partie chef

    public function nonTraitee(){
        $commande=Commande::where('statut','=','envoye')->orderBy('updated_at','desc')->get();

        $userLog=[];
        $pizzaN=[];
        if(isset($commande)){
            foreach ($commande as $c){
                if(!isset($userLog[$c->user_id])){
                    $user=User::findOrFail($c->user_id);
                    $userLog[$c->user_id]=$user->login;
                }

                if(!isset($pizzaN[$c->id])){
                    $commande_pizza=DB::table('commande_pizza')->where('commande_id','=',$c->id)->first();
                    if(empty(Pizza::find($commande_pizza->pizza_id))) {
                        $pizza = Pizza::withTrashed()->where('id',$commande_pizza->pizza_id)->first();
                        $pizzaN[$c->id] = $pizza->nom;
                    }else{
                        $pizza = Pizza::findOrFail($commande_pizza->pizza_id);
                        $pizzaN[$c->id] = $pizza->nom;
                    }

                }

            }
        }

        return view('chef.commandes.nonTraitee',['commande'=>$commande,'pizzaN'=>$pizzaN,'userLog'=>$userLog]);
    }


    public function detailNonTraitee($commande_id){
        $commande_pizza=DB::table('commande_pizza')->where('commande_id','=',$commande_id)->first();

        if(empty(Pizza::find($commande_pizza->pizza_id))) {
            $pizza = Pizza::withTrashed()->where('id',$commande_pizza->pizza_id)->first();
            $total=$pizza->prix*$commande_pizza->qte;
            return view('chef.commandes.detailNonTraitee',['pizza'=>$pizza,'qte'=>$commande_pizza->qte,'total'=>$total]);

        }

        $pizza = Pizza::findOrFail($commande_pizza->pizza_id);

        $total=($pizza->prix)*($commande_pizza->qte);
        return view('chef.commandes.detailNonTraitee',['pizza'=>$pizza,'qte'=>$commande_pizza->qte,'total'=>$total]);
    }


    public function majStatutPage($statut){
        $commande=Commande::where('statut','=',$statut)->get()->sortBy('update_at');
        $userLog=[];
        $pizzaN=[];
        if(isset($commande)){
            foreach ($commande as $c){
                if(!isset($userLog[$c->user_id])){
                    $user=User::findOrFail($c->user_id);
                    $userLog[$c->user_id]=$user->login;
                }

                if(!isset($pizzaN[$c->id])){
                    $commande_pizza=DB::table('commande_pizza')->where('commande_id','=',$c->id)->first();
                    if(empty(Pizza::find($commande_pizza->pizza_id))) {
                        $pizza = Pizza::withTrashed()->where('id',$commande_pizza->pizza_id)->first();
                        $pizzaN[$c->id] = $pizza->nom;
                    }else{

                        $pizza = Pizza::findOrFail($commande_pizza->pizza_id);
                        $pizzaN[$c->id] = $pizza->nom;
                    }
                }
            }
        }
        return view('chef.commandes.majStatut',['commande'=>$commande,'pizzaN'=>$pizzaN,'userLog'=>$userLog]);

    }

 
    public function majStatut(Request $request,$commande_id,$statut){
        $commande=Commande::findOrFail($commande_id);
        $commande->statut=$statut;
        $commande->save();
        $request->session()->flash('etat','Changement de statut effectué');
        return back();

    }


    //Utilisateur 

   
    public function historiqueCommandes(){
        $user_id=AUTH::User()->id;
        $commande=Commande::where('user_id','=',$user_id)->orderBy('update_at')->paginate(2);
        $userLog=[];
        $pizzaN=[];
        if(isset($commande)){
            foreach ($commande as $c){
                if(!isset($userLog[$c->user_id])){
                    $user=User::findOrFail($c->user_id);
                    $userLog[$c->user_id]=$user->login;
                }

                if(!isset($pizzaN[$c->id])){
                    $commande_pizza=DB::table('commande_pizza')->where('commande_id','=',$c->id)->first();
                    if(empty(Pizza::find($commande_pizza->pizza_id))) {
                        $pizza = Pizza::withTrashed()->where('id',$commande_pizza->pizza_id)->first();
                        $pizzaN[$c->id] = $pizza->nom;
                    }else{
                        $pizza = Pizza::findOrFail($commande_pizza->pizza_id);
                        $pizzaN[$c->id] = $pizza->nom;
                    }

                }

            }
        }
        
        return view('user.commandes.mod.detail',['commande'=>$commande,'pizzaN'=>$pizzaN,'userLog'=>$userLog]);
    }


    public function failCommandes(){
        $commande=Commande::where('statut','<>','recupere')->get()->sortBy('update_at');
        $userLog=[];
        $pizzaN=[];
        if(isset($commande)){
            foreach ($commande as $c){
                if(!isset($userLog[$c->user_id])){
                    $user=User::findOrFail($c->user_id);
                    $userLog[$c->user_id]=$user->login;
                }

                if(!isset($pizzaN[$c->id])){
                    $commande_pizza=DB::table('commande_pizza')->where('commande_id','=',$c->id)->first();
                    if(empty(Pizza::find($commande_pizza->pizza_id))) {
                        $pizza = Pizza::withTrashed()->where('id',$commande_pizza->pizza_id)->first();
                        $pizzaN[$c->id] = $pizza->nom;
                    }else{

                        $pizza = Pizza::findOrFail($commande_pizza->pizza_id);
                        $pizzaN[$c->id] = $pizza->nom;
                    }
                }

            }
        }

        return view('user.commandes.mod.fail',['commande'=>$commande,'pizzaN'=>$pizzaN,'userLog'=>$userLog]);
    }

}
