@extends('trame.app')

@section('title','Modification de pizza')

@section("contents")

    <div class="table-wrapper">
    <table class="fl-table">
        <h3 style="text-align: center">Liste des Pizzas à modifier</h3>
        <tr style="color: black;">
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
        </tr>
        @foreach($list as $pi)
            <tr>
                <td><a href="{{route('admin.pizzas.edit.menu',['id'=>$pi->id])}}" style="background-color: grey; color: white;" >{{$pi->id}} </a></td>
                <td>{{$pi->nom}}</td>
                <td>{{$pi->description}}</td>
            </tr>
        @endforeach
    </table>
    </div>


@endsection
