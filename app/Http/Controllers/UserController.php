<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function editPasswordForm(){
        return view('user.account.editPassword');
    }
  

    public function editPassword(Request $request){
        $validated=$request->validate([
            'old_password'=>'required|string|max:60',
            'password'=>'required|string|max:60|confirmed'
        ]);
        
        $mdp_c=AUTH::User()->mdp;

        if(Hash::check($validated['old_password'],$mdp_c)){
            $user_id=Auth::User()->id;
            $user=User::findOrFail($user_id);
            $user->mdp=Hash::make($validated['password']);
            $user->save();
            $request->session()->flash('etat','Modification avec succès !');
            return redirect()->route('home.user');
        }

        $request->session()->flash('etat','Mot de passe incorrect !');
        return redirect()->route('user.editPassword');
    }



    public function adminSearchChefLoginForm(){
        return view('admin.users.searchChefLogin');
    }

    public function adminSearchChefLogin(Request $request){

        $validated=$request->validate([
            'login'=>'required|string|max:30'
        ]);

        return redirect()->route('admin.users.editPassChefForm',['login'=>$validated['login']]);
    }


    public function adminEditPassChefForm($login){
        return view('admin.users.chefPassEdit',['login'=>$login]);
    }

    public function adminEditPassChef(Request $request,$login){
        
        $validated=$request->validate([
            'mdp'=>'required|string|max:60|confirmed'
        ]);

        $user=User::where('login','=',$login)->first();

        if(isset($user)){

            if($user->type=="cook" || $user->type=="admin"){
                $user->mdp=Hash::make($validated['mdp']);
                $user->save();
                $request->session()->flash('etat','Modification effectuée');
                return redirect()->route('admin.users.moderation');
            }
            $request->session()->flash('etat',"l'utilisateur n'est pas un chef ni administrateur");
            return redirect()->route('admin.users.moderation');
        }

        $request->session()->flash('etat','login incorrect');
        return redirect()->route('admin.users.moderation');
    }

    public function delForm(){
        $users=User::Where('type','=','admin')->orWhere('type','=','cook')->get();
        return view('admin.users.delete',['users'=>$users]);
    }

    public function del(Request $request,$user_id){
        $user=User::findOrFail($user_id);
        $user->forceDelete();
        $request->session()->flash('etat','Supprimé definitivement !');
        return back();
    }
}
