@extends('trame.app')

@section('title','Panier')

@section('contents')
    <h1>Panier des commandes</h1>
    @if(isset($panier) && isset($panier_nom) && count($panier)>0)
        <div class="table-wrapper">
        <table class="fl-table">
        <tr>
            <th>Pizza</th>
            <th>Quantite</th>
        </tr>

        @foreach($panier as $cle=>$val)
        <tr>
            <td>{{$panier_nom[$cle]}} </td>
            <td> <h1> {{$val}} </h1> <a href="{{route('user.commandes.panier.modificationQte',['pizza_id'=>$cle])}}" ><img src="{{ asset('img/iconEdit.png') }}" ></a> 
                          <a href="{{route('user.commandes.panier.delPizza',['pizza_id'=>$cle])}}" style="background-color: red"><img src="{{ asset('img/iconTrash.png') }}" ></a>  </td>
        </tr>
        @endforeach
    </table>
    </div>
    <p><h3><a href="{{route('user.commandes.panier.confirmation')}}" style="text-align: center;background-color: green; color: white">Confirmer commandes</a></h3></p>
    @else
        <h3 style="text-align: center;">Pas de pizza dans le panier</h3>
    @endif

@endsection
