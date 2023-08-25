@extends('backend.index')
@section('title','edit user_role')
    
@section('content')
<div id="page-wrapper"> 
    <div class="container-fluid">
        <div class="row">
            <div class="jumbotron">
                <h1 class="display-3">No delete</h1>
                <p class="lead">Can't not delete because there are products in this category </p>
                <hr class="my-2">
                <p></p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="{{route('admin.dashboard')}}" role="button">Back</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection