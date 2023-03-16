@extends('trame.app')

@section('title','Detail commande')

@section('contents')
    <p><h3>Nom de la pizza: {{$pizza->nom}}</h3></p>
    <p><h3>Description: {{$pizza->description}}</h3></p>
    <p><h3>Prix: {{$pizza->prix}}€</h3></p>
    <p><h3>Quantité: {{$qte}}</h3></p>
    <p><h3>Total a payé: {{$total}}€</h3></p>
@endsection
