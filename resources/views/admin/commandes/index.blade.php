@extends('trame.app')

@section('contents')
    <ul>
        <li><a href="{{route('admin.commandes.date')}}">Commandes d'une date précise</a></li>
        <li><a href="{{route('admin.commandes.today')}}">Commandes du jour</a> </li>
        <li><a href="{{route('admin.commandes.all')}}">Toutes les commandes</a> </li>
        <li><a href="{{route('admin.commandes.recetteDuJour')}}">Recette du jour</a> </li>
    </ul>
@endsection
