@extends('fontend.app')
@section('titles','About US')
@section('content')
<div class="linh-ne">
    <div class="black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-4 pb-4 text-align-center">
                    <h1 class="white-text selector text-align-center ">Suggest</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="jumbotron">
                <h1 class="display-3">You need to login to continue buying</h1>
                <a href="{{route('register')}}" class="lead">You don't no account</a>
                <hr class="my-2">
                <a href="{{route('home.shop')}}" >BACK</a>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="{{route('login')}}" role="button">Login</a>
                </p>
            </div>
        </div>
    </div>
    
</div>


@endsection
