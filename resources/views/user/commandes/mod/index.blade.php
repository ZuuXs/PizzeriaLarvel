@extends('trame.app')

@section('title','ses commandes')

@section('contents')
    <h1>Gestion de ses commandes</h1>
    <ul>
        <li><a href="{{route('user.commandes.mod.detail')}}">Historique des commandes</a> </li>
        <li><a href="{{route('user.commandes.mod.fail')}}">Les commandes non recuperer</a> </li>
    </ul>
@endsection
