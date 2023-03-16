@extends('trame.app')

@section('title','Commandes non traitées')

@section('contents')
    <p><h1>Liste des pizzas non traitées</h1></p>
    @if(isset($commande[0]) && isset($pizzaN) && isset($userLog))
        <div class="table-wrapper">
        <table class="fl-table">
            <tr>
                <th>Client</th>
                <th>Pizza</th>
                <th>Statut</th>
                <th>Details</th>
                <th>Date</th>
                <th>Modifier</th>
            </tr>
            @foreach($commande as $c)
                <tr>
                    <td>{{$userLog[$c->user_id]}} </td>
                    <td>{{$pizzaN[$c->id]}}</td>
                    <td>{{$c->statut}}</td>
                    <td><a href="{{route('chef.commandes.detailNonTraitee',['commande_id'=>$c->id])}}">Details</a> </td>
                    <td>{{$c->updated_at}}</td>
                    <td><a href="{{route('chef.commandes.majStatutpage',['statut'=>$c->statut])}}">MAJ (cook only)</a> </td>
                </tr>
            @endforeach
        </table>
        </div>
    @else
        <p><h2>Aucune pizza non traitée</h2></p>
    @endif
@endsection
