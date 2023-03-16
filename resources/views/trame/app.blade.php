<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta charset="utf-8">
    <title>@yield('title')</title>
</head>
 <body>
    <header>
        <a href="{{route('main')}}" class="btn">
            <div class="logo">
                Pizza<span style="color:#000">iolo</span>
            </div>
        </a>
        @guest
            <a class="btn" href="{{route('login')}}">Login</a>
            <a class="btn" href="{{route('register')}}">Sign-in</a>
        @endguest

        @auth
            <a class="btn" href="{{route('logout')}}">Logout</a>
            @if(Auth::user()->type == 'admin')
                <a class="btn" href="{{route('admin.home')}}">Admin menu</a>
            @endif
            @if(Auth::user()->type == 'cook')
                <a class="btn" href="{{route('chef.home')}}">Chef menu</a>
            @endif
            <a class="btn" href="{{route('home.user')}}">My Profile</a>
            <a href="{{route('user.commandes.panier.index')}}"><img src="{{ asset('img/iconCart.png') }}"></a>
        @endauth
    </header>

    @section('etat')
        @if(session()->has('etat'))
            <p class="etat">{{session()->get('etat')}}</p>
        @endif
    @show


    @section('errors')
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @show

    @yield('contents')


    </body>

</html>