@extends('trame.app')

@section('title','Modification de mot de passe')

@section('contents')
    <h1>Modification de mot de passe</h1>
    <form method="post">

        <p></p><label for="f_o_p">Ancien mot de passe :</label>
        <input type="password" name="old_password"></p>

        <p></p><label for="f_p">Nouveau mot de passe :</label>
        <input type="password" id="f_p" name="password"></p>

        <p></p><label for="f_c_p">Confirmer nouveau mot de passe :</label>
        <input type="password" id="f_c_p" name="password_confirmation"></p>

        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection
