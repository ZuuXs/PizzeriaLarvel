@extends('trame.app')

@section('title','Listes commandes')

@section('contents')
    <p><h1>Liste des commandes de cet état</h1></p>
    @if(isset($commande[0]) && isset($pizzaN)&& isset($userLog))
        <div class="table-wrapper">
        <table class="fl-table">
            <tr>
                <th>Client</th>
                <th>Pizza</th>
                <th>Statut</th>
            </tr>
            @foreach($commande as $c)
                <tr>
                    <td>{{$userLog[$c->user_id]}} </td>
                    <td>{{$pizzaN[$c->id]}}</td>
                    <td><h1>{{$c->statut}}</h1> 
                        @if($c->statut=="envoye")
                            modifier en :
                            <a href="{{route('chef.commandes.majStatut',['commande_id'=>$c->id,'statut'=>'traitement'])}}">Traitement</a>

                        @elseif($c->statut=="traitement")
                            modifier en :
                            <a href="{{route('chef.commandes.majStatut',['commande_id'=>$c->id,'statut'=>'pret'])}}">Pret</a>

                        @elseif($c->statut=="pret")
                            <a href="{{route('chef.commandes.majStatut',['commande_id'=>$c->id,'statut'=>'recupere'])}}">Recuperé</a>

                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        </div>
    @else
        <p><h2>Aucune pizza retrouvée</h2></p>
    @endif
@endsection
