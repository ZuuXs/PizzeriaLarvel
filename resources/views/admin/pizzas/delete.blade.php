@extends('trame.app')

@section('title','Suppression de pizza')

@section('contents')
    <p><h1>Suppression de pizza</h1></p>
        <div class="table-wrapper">
        <table class="fl-table">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Suppression</th>
        </tr>
        @foreach($list as $pi)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$pi->nom}}</td>
                <td>{{$pi->description}}</td>
                <td>{{$pi->prix}}</td>
                <td><a href="{{route('admin.pizza.delete',['pizza_id'=>$pi->id])}}" style="background-color: red; color: white;"><img src="{{ asset('img/iconTrash.png') }}" ></a> </td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection
