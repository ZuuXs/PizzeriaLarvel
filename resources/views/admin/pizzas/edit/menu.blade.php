@extends('trame.app')


@section('contents')

    <p><a href="{{route('admin.pizza.edit.name',['id'=>$ida])}}">Modifier le Nom</a></p>
    <a href="{{route('admin.pizza.edit.desc',['id'=>$ida])}}">Modifier La Description</a>
    <p><a href="{{route('admin.pizza.uploadForm')}}">Modifier l'image</a></p>



@endsection
