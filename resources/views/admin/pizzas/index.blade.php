@extends('trame.app')

@section('contents')
    <ul>
        <li><a href="{{route('admin.pizzas.add')}}">Ajouter une pizza</a></li>
        <li><a href="{{route('admin.pizzas.list')}}">Liste des pizza</a></li>
        <li><a href="{{route('admin.pizzas.edit')}}">Modifier Pizza</a></li>
        <li><a href="{{route('admin.pizzas.delForm')}}">Supprimer pizza</a></li>
    </ul>
@endsection
