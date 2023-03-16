@extends('trame.app')

@section('title','Date Commande')

@section('contents')
    <form method="post">
        <label for="fdate">Date:</label>
        <input type="date" id="fdate" name="date_f">
        <input type="submit">
        @csrf
    </form>
@endsection
