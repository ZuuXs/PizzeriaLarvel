<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoggedController extends Controller
{
    public function formLogin(){
        return view('authentication.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'mdp' => 'required|string'
        ]);

        $credentials = ['login' => $request->input('login'),
            'password' => $request->input('mdp')];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->flash('etat','Logged in successfully');
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'login' => 'Votre login ou mot de passe est incorrect',
        ]);

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
