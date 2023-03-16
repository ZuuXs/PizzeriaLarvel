@extends('trame.app')

@section('contents')
    <div class="table-wrapper">
    <table class="fl-table">
        <h3 style="text-align: center">Liste des Pizzas</h3>
        <tr style="color: black;">
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
        </tr>
        @foreach($list as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->nom}}</td>
                <td>{{$p->description}}</td>
                <td>{{$p->prix}}</td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection
