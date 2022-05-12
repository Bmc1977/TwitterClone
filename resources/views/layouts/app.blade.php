<!Doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Twitter Clone</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-gray-200">
        <nav class="p-6 bg-white flex justify-between mb-5">
            <ul class="flex items-center">
                <li class="p-3">
                    <a href="/">Home</a>
                </li>
                <li class="p-3">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="p-3">
                    <a href="{{ route('posts') }}">Post</a>
                </li>

            </ul>

            <ul class="flex items-center">
                @auth
                    <li class="p-3">
                        <a href="">{{auth()->user()->name}}</a>
                    </li>
                    <li class="p-3">
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <a href="{{ route('login') }}">Login</a>
                    <li class="p-3">
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
{{--                @if(isset(auth()->user()->name))--}}
{{--                    <li class="p-3">--}}
{{--                        <a href="">{{auth()->user()->name}}</a>--}}
{{--                    </li>--}}
{{--                    <li class="p-3">--}}
{{--                        <a href="">Logout</a>--}}
{{--                    </li>--}}
{{--                @else--}}
{{--                    <a href="">Login</a>--}}
{{--                    <li class="p-3">--}}
{{--                        <a href="{{ route('register') }}">Register</a>--}}
{{--                    </li>--}}
{{--                @endif--}}
            </ul>
        </nav>
        @yield('content')
    </body>
</html>
