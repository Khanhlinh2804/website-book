<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titles')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Font_awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- CSS  --}} 
    <link rel="stylesheet" href="{{asset("fontend/css/app.css") }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="">
                   <img src="https://booklovers.ancorathemes.com/wp-content/uploads/2021/02/logo-1.png" alt="">
                </a>
                

                <div class="collapse navbar-collapse text-left" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto pl-5  ">
                    </ul>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li>
                            <a class="nav-link pl-5" href="{{route('home.index')}}">HOME</a>
                        </li>
                        <li>
                            <a class="nav-link pl-5" href="#">PRODUCT</a>
                        </li>
                        <li>
                            <a class="nav-link pl-5" href="{{route('home.contact')}}">CONTACT</a>
                        </li>
                        <li>
                            <a class="nav-link pl-5" href="{{route('home.about')}}">ABOUT</a>
                        </li>
                        {{-- <li>
                            <a class="nav-link pl-5" href="#">BLOG</a>
                        </li> --}}
                        
                       
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link pl-5" href="{{ route('login') }}"><i class="fa-regular fa-user" style="color: #0a0a0a;"></i></a>
                                </li>
                            @endif

                           
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link pl-5" href="{{ route('register') }}">REGIEST</a>
                                </li>
                            @endif --}}
                                <li class="nav-item">
                                    <a class="nav-link pl-5" href="{route('')}"><i class="fa-solid fa-bag-shopping" style="color: #0e0d0d;"></i></a>
                                </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

<footer class="footer ">
    <div class="container pt-5">
        <div class="row ">
            <div class="col-lg-3">
                <a href="">
                    <img src="https://booklovers.ancorathemes.com/wp-content/uploads/2021/02/logo-1.png" alt="">
                </a>
            </div>
            <div class="col-lg-3">
                <h3>What's new</h3>
                <form action="" method="post" class="pt-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="..." alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text"></p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3">
                <h3 class="pl-4 ">Links</h3>
                <ul class="none">
                    <li class="pt-4">
                        <a href="">Home</a>
                    </li>
                    <li class="pt-4">
                        <a href="">Store</a>
                    </li>
                    <li class="pt-4">
                        <a href="">About</a>
                    </li>
                    <li class="pt-4">
                        <a href="">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h3>GET IN TOUCH</h3>
                <p class="pt-4">
                    Germany —
                    785 15h Street, Office 478
                    Berlin, De 81566
                </p>
                <p>
                    Khanhlinh6863@gmail.com
                </p>
                <p class="p-footer">
                    0986797018
                </p>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-5">
        <div class="divider"></div>
        {{-- <div class="container"> --}}

            <div class="d-flex pl-5 ml-5">
                <a href="" class="red-text">
                    Khánh Linh 
                </a>
                <p> © 2023. All Rights Reserved</p>
            </div>
        {{-- </div> --}}
    </div>
</footer>
</body>
    {{-- js  --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    {{-- buldle  --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</html>
