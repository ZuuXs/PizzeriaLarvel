@extends('trame.appBS')

@section('title','Image Upload')

@section('contents')
    <h1><b>Upload Image</b></h1>
    <form method="post" action="{{route('admin.pizza.upload')}}" enctype="multipart/form-data">
        <p><label for="fimage">File :</label>
        <input type="file" name="file"></p>
        <input type="submit" value="Envoyer">
        @csrf
    </form>
    <a href="{{route('admin.pizzas.index')}}" style="text-align: center; font-weight:bold">Skip this step</a>
@endsection