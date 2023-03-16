@extends('trame.app')

@section('contents')
    <form method="post">
        <p><label for="fnom">Nom :</label>
            <input type="text" id="fnom" name="nom">

            <input type="submit" value="Envoyer"></p>
    @csrf
    </form>
@endsection
