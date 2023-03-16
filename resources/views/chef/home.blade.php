@extends('trame.app')

@section('title','Home - Chef')

@section('contents')
    <ul>
        <li><p><a href="{{route('chef.commandes.nonTraitee')}}">Commandes: Non-Traitées</a> </p></li>
        <li><a href="{{route('chef.commandes.majStatutpage',['statut'=>'traitement'])}}">Commandes: En Traitement</a></li>
        <li><a href="{{route('chef.commandes.majStatutpage',['statut'=>'pret'])}}">Commandes: Prêtes</a></li>
        <li><a href="{{route('chef.commandes.majStatutpage',['statut'=>'recupere'])}}">Commandes: Recuperées</a></li>
    </ul>

@endsection
