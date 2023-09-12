@extends('fontend.app')
@section('titles','Blogs')
@section('content')
<div class="linh-ne">
    <div class="black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-4 pb-4 text-align-center">
                    <h1 class="white-text selector text-align-center ">Blogs</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row pt-5">
            <h1 style="text-align: center">{{$blogs->name}}</h1>
        </div>
        <div class="row pt-5">
            <img src="{{url('uploads')}}/{{$blogs->image}}" alt="" style="height: 500px; width:100% " >
        </div>
        <div class="row" style="text-align: center">
            <p>{{$blogs->title}}</p>
        </div>
        <div class="row">
            <p>{{$blogs->content}}</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h1 class="text-center pt-5 pb-3 ">Related Blogs</h1>
            <div class="divide center pr-5"></div>
            @foreach ($data as $item)
                <div class="col-lg-4 pt-5"  style="display: flex">
                        <a class=" about-center" href="{{route('blog.show', ['id' => $item->id])}}">
                            <img src="{{url('uploads')}}/{{$item->image}}" class="about-image" alt="">
                        </a>
                        <div class="pl-1">
                            <h3>{{$item->name}}</h3>
                            <p>{{$item->title}}</p>
                        </div>
    
                    </div>
            @endforeach
            
        </div>
    </div>
    


</div>
    




@endsection
