@extends('trame.app')

@section('title','Changement du mot de passe du Chef')

@section('contents')
    <h1>Changement du mot de passe du Chef</h1>
    <form method="post">
        <p><label for="login">Login Chef :</label>
        <input type="text" id="login" name="login"></p>
        <p><input type="submit" value="Envoyer"></p>
    @csrf
    </form>
@endsection
