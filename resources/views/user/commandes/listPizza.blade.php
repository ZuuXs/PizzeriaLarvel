@extends('trame.appBS')

@section('title','Pizzas')

@section('contents')
        <div class="table-wrapper">
        <table class="fl-table">
        <tr>
            <th>Numero</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
        </tr>
        @foreach($pizzas as $p)
            <tr>
                <td>{{$p->id}} </td>
                <td>{{$p->nom}}</td>
                <td>{{$p->description}}</td>
                <td>{{$p->prix}}</td>
            </tr>
        @endforeach
    </table>
    </div>
    {{$pizzas->links()}}
@endsection
