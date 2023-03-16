@extends('trame.app')

@section('title','Recette du jour')

@section('contents')
    <h1 style="text-align: center;">La recette du jour</h1>
    <p style="text-align: center;">La recette est à <b>{{$recette}} €</b></p>
@endsection
