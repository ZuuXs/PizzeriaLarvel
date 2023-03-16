@extends('trame.app')

@section('title','Listes commandes non récuperées')

@section('contents')
    <p><h1>Historique des commandes non-récupérées</h1></p>
    @if(isset($commande[0]) && isset($pizzaN) && isset($userLog))
        <div class="table-wrapper">
        <table class="fl-table">
            <tr>
                <th>Pizza</th>
                <th>Details</th>
                <th>Date</th>
            </tr>
            @foreach($commande as $p)
                <tr>
                    <td>{{$pizzaN[$p->id]}}</td>
                    <td><a href="{{route('chef.commandes.detailNonTraitee',['commande_id'=>$p->id])}}"><img src="{{ asset('img/iconDetail.png') }}" ></a> </td>
                    <td>{{$p->updated_at}}</td>
                </tr>
            @endforeach
        </table>
        </div>
    @else
        <p><h2>Vous n'avez pas commandé de pizza</h2></p>
    @endif
    
@endsection
