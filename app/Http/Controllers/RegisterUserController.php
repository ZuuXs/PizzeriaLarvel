<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function formRegister(){
        return view('authentication.register');
    }

    public function register(Request $request){
        $request->validate([
            'nom'=>'required|string|max:40',
            'prenom'=>'required|string|max:40',
            'login'=>'required|string|max:30|unique:users',
            'mdp'=>'required|string|max:60|confirmed'
        ]);

        $user=new User();
        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->login=$request->login;
        $user->mdp=hash::make($request->mdp);
        $user->save();

        Auth::login($user);

        return redirect('/');
    }

    public function registerAdmin(Request $request){
        $request->validate([
            'nom'=>'required|string|max:40',
            'prenom'=>'required|string|max:40',
            'login'=>'required|string|max:30|unique:users',
            'mdp'=>'required|string|max:60|confirmed'
        ]);

        $user=new User();
        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->login=$request->login;
        $user->mdp=hash::make($request->mdp);
        $user->type="admin";
        $user->save();

        
        $request->session()->flash('etat',"Admin created !");
        return redirect()->route('admin.users.moderation');
    }
    public function registerChef(Request $request){
        $request->validate([
            'nom'=>'required|string|max:40',
            'prenom'=>'required|string|max:40',
            'login'=>'required|string|max:30|unique:users',
            'mdp'=>'required|string|max:60|confirmed'
        ]);

        $user=new User();
        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->login=$request->login;
        $user->mdp=hash::make($request->mdp);
        $user->type="cook";
        $user->save();

        
        $request->session()->flash('etat','Pizza chef created !');
        return redirect()->route('admin.users.moderation');
    }
}
