@extends('trame.app')

@section('title','Home - user')

@section('contents')

    <ul>
        <li><a href="{{route('user.editPassword')}}" >Modifier votre mot de passe</a></li>
        <li><a href="{{route('user.commandes.listPizza')}}" >PIZZA <img src="{{ asset('img/iconPizza.png') }}"></a></li>
        <li><a href="{{route('user.commandes.panier.pizza')}}" >Commander des pizzas</a></li>
        <li><a href="{{route('user.commandes.mod.index')}}">Historique des commandes</a> </li>
    </ul>

@endsection
