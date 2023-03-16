@extends('trame.appBS')

@section('title','Toutes les commandes')

@section('contents')
    <p><h1>Liste de toutes les commandes</h1></p>
    @if(isset($commande[0]) && isset($pizzaN) && isset($userLog))
        <div class="table-wrapper">
            <table class="fl-table">
                <th>Commande n°</th>
                <th>Client</th>
                <th>Pizza</th>
                <th>Statut</th>
                <th>Detail</th>
                <th>Date</th>

            </tr>
            @foreach($commande as $c)
                <tr>
                    <td>{{$loop->iteration}}</td>
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
    {{$commande->links()}}
@endsection
