@extends('trame.app')

@section('title','Modification de mot de passe')

@section('contents')
    <h1>Modifier mdp</h1>
    <form action="{{route('admin.users.editPassChef',['login'=>$login])}}" method="post">

        <p></p><label for="f_p">Nouveau mot de passe :</label>
        <input type="password" id="f_p" name="mdp"></p>

        <p></p><label for="f_c_p">Confirmer nouveau mot de passe :</label>
        <input type="password" id="f_c_p" name="mdp_confirmation"></p>

        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection
