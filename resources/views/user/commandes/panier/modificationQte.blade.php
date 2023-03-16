@extends('trame.app')

@section('title','Quantite de la pizza')

@section('contents')
    <form method="post">
        <p><label for="quantite">Quantite de la pizza</label>
        <input type="number" id="quantite" name="quantite"></p>
        <p><input type="submit" value="Envoyer"></p>
    @csrf
    </form>
@endsection
