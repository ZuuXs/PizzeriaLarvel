@extends('trame.appBS')

@section('title','Pizzas')

@section('contents')
    @if(isset($pizzas[0]))
        <p><h1>Ajouter les pizzas dans le panier</h1></p>
            <div class="table-wrapper">
            <table class="fl-table">
            <tr>
                <th>Ajout</th>
                <th>Pizza</th>
                <th>Description</th>
                <th>Prix</th>
            </tr>
            @foreach($pizzas as $p)
                <tr>
                    <td><a href="{{route('user.commandes.panier.ajout',['pizza_id'=>$p->id])}}" style="background-color: #70ff70; color: white;"><img src="{{ asset('img/iconAdd.png') }}" ></a></td>{{--{{$p->id}}--}}
                    <td>{{$p->nom}}</td>
                    <td>{{$p->description}}</td>
                    <td>{{$p->prix}}</td>
                </tr>
            @endforeach
    @else
        <h3 style="text-align: center;">Pas de pizza disponible</h3>
    @endif
    </table>
    </div>
    {{$pizzas->links()}}
    <h2><a href="{{route('user.commandes.panier.index')}}"><img src="{{ asset('img/iconCart.png') }}">   Voir panier   <img src="{{ asset('img/iconCart.png') }}"></a></h2>
    
@endsection
