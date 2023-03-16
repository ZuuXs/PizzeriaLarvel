@extends('trame.app')


@section('contents')
<div class="container">
    <h2>Nos pizzas populaires</h2>
    <div class="row">
        
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/pizza1.png') }}" alt="Pizza 1" style="width: 300px">
                <div class="card-body">
                <h3 class="card-title">Pizza Margherita</h3>
                <p class="card-text">La pizza Margherita est une des pizzas les plus célèbres d'Italie.</p>
            </div>
        
    </div>
    
        <div class="card">
            <img class="card-img-top" src="{{ asset('img/pizza2.avif') }}" alt="Pizza 2" style="width: 300px">
            <div class="card-body">
                <h3 class="card-title">Pizza Pepperoni</h3>
                <p class="card-text">La pizza Pepperoni est garnie de rondelles de saucisson italien piquant.</p>
            
            </div>
        
    </div>
    
        <div class="card">
            <img class="card-img-top" src="{{ asset('img/pizza3.avif') }}" alt="Pizza 3" style="width: 300px">
            <div class="card-body">
                <h3 class="card-title">Pizza Végétarienne</h3>
                <p class="card-text">La pizza végétarienne est garnie de légumes frais et savoureux.</p>
            </div>
        </div>
    
</div>
@endsection
