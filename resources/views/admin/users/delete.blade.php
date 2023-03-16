@extends ('trame.app')

@section('title','Suppression d Admin/Chef')

@section('contents')
        <div class="table-wrapper">
        <table class="fl-table">
        <h3 style="text-align: center">Liste des Admin/Chef</h3>
        <tr style="color: black;">
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Login</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
        @foreach($users as $u)
            <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->nom}}</td>
                <td>{{$u->prenom}}</td>
                <td>{{$u->login}}</td>
                <td>{{$u->type}}</td>
                <td><a href="{{route('admin.users.delete',['user_id'=>$u->id])}}" style="background-color: red; color: white;"><img src="{{ asset('img/iconTrash.png') }}" ></a> </td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection