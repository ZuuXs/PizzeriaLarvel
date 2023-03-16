@extends('trame.app')

@section('title','Commandes du jour')

@section('contents')
    <p><h1>Liste des commandes d'ajourd'hui</h1></p>
    @if(isset($commande[0]) && isset($pizzaN) && isset($userLog))
        <div class="table-wrapper">
        <table class="fl-table">
                <th>Client</th>
                <th>Pizza</th>
                <th>Statut</th>
                <th>Details</th>
                <th>Date</th>
            </tr>
            @foreach($commande as $c)
                <tr>
                    <td>{{$userLog[$c->user_id]}} </td>
                    <td>{{$pizzaN[$c->id]}}</td>
                    <td>{{$c->statut}}</td>
                    <td><a href="{{route('chef.commandes.detailNonTraitee',['commande_id'=>$c->id])}}"><img src="{{ asset('img/iconDetail.png') }}" ></a> </td>
                    <td>{{$c->updated_at}}</td>
                </tr>
            @endforeach
        </table>
        </div>
    @else
        <p><h2>Aucune commande pour le moment</h2></p>
    @endif
@endsection
