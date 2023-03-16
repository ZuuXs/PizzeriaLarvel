@extends('trame.app')

@section('title ','Date Commande')

@section('contents')
    @if(isset($commande[0]))
        <div class="table-wrapper">
        <table class="fl-table">
        <h3 style="text-align: center">Commandes du jour choisi</h3>
        <tr style="color: white">
            <th>ID</th>
            <th>Nom</th>
            <th>user login</th>
            <th>Date</th>
        </tr>
        @foreach($commande as $c)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$pizzaN[$c->id]}}</td>
                <td>{{$userLog[$c->user_id]}}</td>
                <td>{{$c->created_at}}</td>
            </tr>
        @endforeach
        </table>
        </div>
    @else
        <p><h2>Aucune commande pour ce jour</h2></p>
    @endif
@endsection
