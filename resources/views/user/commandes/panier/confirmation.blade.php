@extends('trame.app')

@section('title','Paiement')

@section('contents')
    <p><h1>Confirmation du panier</h1></p>
    <p><h2>Le prix total de votre commande est de {{$total}} €.</h2></p>
    <p><h2><a href="{{route('user.commandes.panier.confirmer')}}">Confirmer achat</a> </h2></p>
@endsection
