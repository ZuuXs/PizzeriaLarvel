@extends('trame.app')

@section('title','Home - Admin')

@section('contents')
    <ul>
        <li><p><a href="{{route('admin.pizzas.index')}}">Gestion des pizzas</a> </p></li>
        <li><p><a href="{{route('admin.commandes.index')}}">Gestion des commandes</a> </p></li>
        <li><p><a href="{{route('admin.users.moderation')}}">Gestion des utilisateurs</a> </p></li>
    </ul>
@endsection
