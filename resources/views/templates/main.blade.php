<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'User Management System') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">



    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

</head>

<body>


    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <div class="form-inline my-2 my-lg-0">

                    @if (Route::has('login'))
                        <div>
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                @auth

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.profile') }}">Profile</a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">@csrf</form>
                                @else
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">Log
                                            in</a></li>

                                    @if (Route::has('register'))
                                        <li class="nav-item"> <a class="nav-link"
                                                href="{{ route('register') }}">Register</a></li>
                                    @endif
                                @endauth
                            </ul>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </nav>

    @can('logged-in')


        <nav class="navbar sub-nav navbar-expand-lg">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Get the users name -->

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                        </li>
                        @can('is-admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.users.index') }}">User</a>
                            </li>
                        @endcan
                    </ul>

                </div>
            </div>
        </nav>

    @endcan

    <div class="container rw-container">
        <div class="row">
            <main>
                @include('partials.alerts')
                @yield('content')
            </main>
        </div>
    </div>

    <!-- js -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
