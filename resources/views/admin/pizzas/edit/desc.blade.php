@extends('trame.app')

@section('contents')
    <form method="post">
        <p><label for="fdesc">Descritpion :</label>
            <input type="text" id="fdesc" name="description">

            <input type="submit" value="Envoyer"></p>
        @csrf
    </form>
@endsection