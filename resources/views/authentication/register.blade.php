
@extends('trame.app')

@section('title','Enregistrement')

@section('contents')
    <p style="font-size: 24px; font-weight: bold; margin-bottom: 10px; text-align: center; text-decoration: underline;">Enregistrement</p>
    <form method="post">
        <label for="fnom">Nom :</label>
        <input type="text" id="fnom" name="nom" ><br>

        <label for="fprenom">Prenom :</label>
        <input type="text" id="fprenom" name="prenom" ><br>

        <label for="flogin">Login :</label>
        <input type="text" id="flogin" name="login" ><br>

        <label for="fmdp">Password :</label>
        <input type="password" id="fmdp" name="mdp"><br>

        <label for="fcmdp">Confirmation Password : </label>
        <input type="password" id="fcmdp" name="mdp_confirmation"><br>

        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection
