<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PanierController extends Controller
{
    public function panierPizza(){
        $pizzas=Pizza::paginate(2);
        return view('user.commandes.panier.pizza',['pizzas'=>$pizzas]);
    }

    public function panierAdd(Request $request,$pizza_id){

        if(!$request->session()->has('panier')){
            $panier=[];
            $request->session()->put('panier',$panier);
        }

        if(!$request->session()->has('panier_nom')){
            $panier_nom=[];
            $request->session()->put('panier_nom',$panier_nom);
        }

        $panier=$request->session()->get('panier');
        $panier_nom=$request->session()->get('panier_nom');

        if(isset($panier[$pizza_id])){
            $request->session()->flash('etat','Pizza déja dans le panier');
            return back();

        }else{
            $pizza=Pizza::findOrFail($pizza_id);
            $panier[$pizza_id]=1;
            $panier_nom[$pizza_id]=$pizza->nom;
        }

        $request->session()->put('panier',$panier);
        $request->session()->put('panier_nom',$panier_nom);

        $request->session()->flash('etat','Ajout de la pizza dans le panier effectué');
        return back();
    }


    public function afficherPanier(Request $request){
        $panier=$request->session()->get('panier');
        $panier_nom=$request->session()->get('panier_nom');
        return view('user.commandes.panier.index',['panier'=>$panier],['panier_nom'=>$panier_nom]);
    }


    public function modificationQteform(){
        return view('user.commandes.panier.modificationQte');
    }


    public function modificationQte(Request $request,$pizza_id){
        $request->validate([
           'quantite'=>'required|integer'
        ]);

        $panier=$request->session()->get('panier');
        $panier[$pizza_id]=$request->quantite;
        $request->session()->put('panier',$panier);
        $panier_nom=$request->session()->get('panier_nom');

        return view('user.commandes.panier.index',['panier'=>$panier],['panier_nom'=>$panier_nom]);
    }


    public function delPizza(Request $request,$pizza_id){
        $panier=$request->session()->get('panier');
        $panier_nom=$request->session()->get('panier_nom');
        unset($panier[$pizza_id]);
        unset($panier_nom[$pizza_id]);
        $request->session()->put('panier',$panier);
        $request->session()->put('panier_nom',$panier_nom);
        return view('user.commandes.panier.index',['panier'=>$panier],['panier_nom'=>$panier_nom]);
    }


    public function confirmation(Request $request){
        $total=0;
        $panier=$request->session()->get('panier');
        foreach ($panier as $cle=>$val){
            $pizza=Pizza::findOrFail($cle);
            $pizza_prix=$pizza->prix;
            $total=$total+$pizza_prix*$val;
        }

        return view('user.commandes.panier.confirmation',['total'=>$total]);
    }


    public function confirmer(Request $request){

        $panier=$request->session()->get('panier');
        foreach ($panier as $cle=>$val){
            $commande=new Commande();
            $commande->user_id=AUTH::User()->id;
            $commande->save();
            $pizza=Pizza::findOrFail($cle);
            $commande->pizzas()->attach($pizza,['qte'=>$val]);
        }
        $panier_vide=[];
        $request->session()->put('panier',$panier_vide);
        $request->session()->put('panier_nom',$panier_vide);

        $request->session()->flash('etat','Achat effectué');
        return redirect()->route('user.commandes.panier.pizza');

    }
}
