@extends('trame.app')

@section('title','Modération des utilisateurs')

@section('contents')
    <ul>
        <li><a href="{{route('admin.users.createAdmin')}}">Creer un utilisateur Admin</a> </li>
        <li><a href="{{route('admin.users.createChef')}}">Creer un Chef</a> </li>
        <li><a href="{{route('admin.users.searchChefLoginForm')}}">Changer MDP d'un Admin/Chef</a></li>
        <li><a href="{{route('admin.users.delForm')}}">Supprimer un Admin/Chef</a></li>
    </ul>
@endsection
