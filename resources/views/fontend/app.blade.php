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
    <link rel="stylesheet" href="{{asset("fontend/css/cart.css") }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            <a class="nav-link pl-5" href="{{route('home.shop')}}">PRODUCT</a>
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
                        
                       
                        <li class="nav-item">
                            <div class="d-flex">
                            <a class="nav-link pl-5" href="{{route('cart.cart')}}" >
                                    <i class="fa-solid fa-bag-shopping" style="color: #0e0d0d;"></i> 
                                    {{$cart->total_quantity}}
                                </a>
                            </div>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item"> 
                                    <a class="nav-link pl-5" href="{{ route('login') }}">LOGIN</a>
                                </li>
                            @endif 
                           
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link pl-5" href="{{ route('register') }}">REGIEST</a>
                                </li>
                            @endif --}}
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
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
                <h3 class="text-fooler">What's new</h3>
                <form action="" method="post" class="pt-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        {{-- @foreach ($footer as $item) --}}
                            
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <a href="">
                                    {{-- <img src="{{url('uploads')}}/{{$item->image}}" alt="..."> --}}
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    {{-- <h5 class="card-title">{{$item->name}}</h5> --}}
                                    <p class="card-text"></p>
                                    {{-- <p class="card-text"><small class="text-muted">{{$item->author->name}}</small></p> --}}
                                </div>
                            </div>
                        </div>
                        {{-- @endforeach --}}
                    </div>
                </form>
            </div>
            <div class="col-lg-3">
                <h3 class="pl-4 text-fooler ">Links</h3>
                <ul class="none">
                    <li class="pt-4">
                        <a href="{{route('home.index')}}" class="a-text-decoration">Home</a>
                    </li>
                    <li class="pt-4">
                        <a href="{{route('home.shop')}}" class="a-text-decoration">Store</a>
                    </li>
                    <li class="pt-4">
                        <a href="{{route('home.about')}}" class="a-text-decoration">About</a>
                    </li>
                    <li class="pt-4">
                        <a href="{{route('home.contact')}}" class="a-text-decoration">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h3 class="text-fooler">GET IN TOUCH</h3>
                <p class="pt-4 text-fooler">
                    Germany —
                    785 15h Street, Office 478
                    Berlin, De 81566
                </p>
                <p class="text-fooler">
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
{{-- sắp xếp --}}
    <script>
    $('#sort').change(function() {
        var sortOption = $(this).val();
        $.ajax({
            url: '/sort-products',
            type: 'GET',
            data: {sort: sortOption},
            success: function(data) {
                $('#productList').empty();
                $.each(data, function(index, product) {
                    $('#productList').append('<div>' + product.name + ' - Price: ' + product.price + '</div>');
                });
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });
    </script>

    {{-- load  --}}
    <script>
        $(document).ready(function() {
            $('#city').change(function() {
                var city_id = $(this).val();
                if (city_id !== '') {
                    $.ajax({
                        url: '/get-districts/' + city_id,
                        type: 'GET',
                        success: function(data) {
                            var districts = data;
                            var districtDropdown = $('#district');
                            districtDropdown.empty();
                            districtDropdown.append('<option value="">--Select the district--</option>');
                            $.each(districts, function(index, district) {
                                districtDropdown.append('<option value="' + district.id + '">' + district.name + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>


</body>
    {{-- js  --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    {{-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}
    <script src="{{ asset('fontend/js/cart.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    

    



    {{-- buldle  --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</html>
