@extends('fontend.app')
@section('titles','Home')
@section('content')
{{-- banner  --}}
<div>
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://i.pinimg.com/564x/67/18/22/671822c2f63dd5f65d8fd15c9710420b.jpg"
                    class="d-block w-100 height-400" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p class="font-size40 mg-20">Finds Books For</p>
                    <p class="font-size40 ">All Ages!</p>
                    <button class="m-5 p-3 pl-5 pr-5 bold-text white-text black-background borderless-button">DISCOVER
                        YOUR NEXT BOOK</button>
                </div>
            </div>
            @foreach ($banners as $item)
                
            <div class="carousel-item ">
                <img src="{{url('uploads')}}/{{$item->image}}"
                class="d-block w-100 height-400" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p>Choose Your Book!</p>
                    <p class="font-size40 mg-20" style="color: rgb(126, 62, 62)">{{$item->name}} </p>
                    <p class="font-size40">All Ages!</p>
                   
                    <a href="{{$item->link}}"  class="m-5 p-3 pl-5 pr-5 bold-text white-text black-background borderless-button">DISCOVER
                        YOUR NEXT BOOK
                    </a>
                </div>
            </div>
            @endforeach
                
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
</div>
{{-- product --}}
<div class="container ">
    <h1 class="text-center pt-5 pb-3 ">Discover Your Next Book</h1>
    <div class="divider center pr-5"></div>
    {{-- <form action="" method="get"> --}}
        <div class="row">
            @forelse ($newproducts as $item)
                
            <div class="col-lg-3 pt-5">
                <div class="" style="">
                    <a href="{{route('home.detail',['id'=>$item->id])}}">
                        <img src="{{url('uploads')}}/{{$item->image}}"
                            class="card-img-top img-product" alt="...">
                    </a>
                    <div class="card-body">
                        <a href="{{route('home.detail',['id'=>$item->id])}}" class="bold-text a-text-decoration">
                            <p class="text-center "> {{ $item->name }}</p>
                        </a>
                        <h5 class="card-title color-red text-center">{{$item->price}} $</h5>
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse
        </div>
    {{-- </form> --}}
  </div>
</div>
<div class="button-center">
    <button class="mb-5 mt-3 p-3 pl-5 pr-5 bold-text pl-50 white-text black-backgroundS borderless-button">DISCOVER MORE BOOK</button>
</div>
<div class="pt-5">
    <div class="red pt-5 p-red">
        <div class="container">
            <h1 class="text-center pt-4 white-text">Stay in Touch with Our Updates</h1>
            <div class="divider"></div>
            <div class="button-center">
                <input type="text" class="p-3 pr-5 input-email" placeholder="Enter Your Emai Address">
                <button class="m-5 p-3 pl-5 pr-5 bold-text pl-50 white-text black-icon borderless-button pd1"><i
                        class="fa-sharp fa-solid fa-paper-plane" style="color: #fafafa;"></i> GET IN TOUCH</button>
            </div>
            <div class="from-agree">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label pb-5 white-text" for="defaultCheck1">
                        I agree to the <a href="" class="white-text text-decoration ">Privacy Policy</a>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="gray">
    <div class="container ">

        <h1 class="text-center pt-5 pb-3 ">Discover Your Next Book</h1>
        <div class="divider center pr-5"></div>
            <form action="" method="get">
                <div class="d-flex">
                    @foreach ($clas as $item)    
                    <div class="col-lg-3 pt-3 ">
                        <div class="zoom-container ">
                            <img class="zoom-image "
                            src="{{url('uploads')}}/{{$item->image}}" alt="Ảnh">
                            <div class="text-overlay">
                                <a href="{{route('home.shop')}}" class="white-text text-decoration">{{$item->name}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </form>
        {{-- </div> --}}
    {{-- </div> --}}
</div>
    <div class="button-center pb-5">
        
        <a href="{{route('home.shop')}}" class="mb-5 mt-3 p-3 pl-5  pr-5 bold-text pl-50 white-text black-backgroundS borderless-button">DISCOVER
            MORE BOOK</a>
    </div>
</div>
<div class="pt-5">
    <div class="container ">
        <h1 class="text-center pt-5 pb-4 ">Picked by Readers</h1>
        <div class="divider center pr-5"></div>
        <div class="row">
            @forelse ($saleProducts as $item)
                <div class="col-lg-3 pt-5 ">
                    <a href="{{route('home.detail',['id'=>$item->id])}}">
                        <div class="zoom-container">
                            <img class="zoom-image"
                                src="{{url('uploads')}}/{{$item->image}}" alt="Ảnh">
                                <div class="sale-overlay">
                                    <span>{{ number_format((1 - $item->sale_price / $item->price) * 100, 2, '.', ',') }}
                                    %</span>
                                </div>
                        </div>
                    </a>
                    <div class="card-body">
                        <a href="{{route('home.detail',['id'=>$item->id])}}" class="bold-text">
                            <p class="text-center a-text-decoration">{{$item->name}}</p>
                        </a>
                        <div class="d-flex pl-5">
                            <h5 class="card-title strike-through text-center" style="color: rgb(166, 166, 166)">{{$item->price}} $</h5>
                            <p class="color-red pl-2 pr-2 bold-text ">-</p>
                            <h5 class="card-title color-red text-center" >{{$item->sale_price}} $</h5>
                        </div>                       
                    </div>
                </div>
            @empty
                
            @endforelse
        </div>
        </div>
    </div>
</div>
    <div class="button-center pb-5">
        <button class="mb-5 mt-3 p-3 pl-5  pr-5 bold-text pl-50 white-text black-backgroundS borderless-button">DISCOVER
            MORE BOOK</button>
    </div>
</div>
<div class="image filter">
    <div class="container pt-5">
        <div class="pt-5 col-lg-8">
            <p class="size-50 pt-5 bold-text selector color-f5f5f4">Inspire Daily Reading</p>

            <div class="dividers"></div>
            {{--
        </div> --}}
        <span class="text selector size-30 color-f5f5f4">Visit Our Blog and Page Find Out Daily Inspiration
            Quotes</span>
        <p class="text selector size-30 color-f5f5f4">from the Best Authors</p>
        <div class="">
            <button
              class="mb-5 mt-3 p-3 pl-5 pr-5 bold-text pl-50 white-text black-background borderless-button">DISCOVER
              MORE BOOK
            </button>
        </div>
    </div>
</div>
</div>
<div class="container ">
  <div class="row pt-5">
    <div class="col-lg-9">
      <h4 class="pl-2">FEATURED BESTSELLERS</h4>
      <div class=" dividers"></div>
      <div class="d-flex">
          @forelse ($RandomProduct as $item)
              
          <div class=" pt-5 ">
              <img src="{{url('uploads')}}/{{$item->image}}" alt="" style="height:500px; width:400px" style="width: 450px">
          </div>
          <div class="pl-5 pt-5">
              <p class="font-size45 text selector">{{$item->name}}</p>
              {{-- <p class="red-text">Author : <span class="text-797979"> {{$item->author->name}}</span></p> --}}
              <p class="text-797979">{{$item->description}}</p>
              @if($item->sale_price != 0)
                <p class="text-797979">
                    Price:
                    <span class="card-title  strike-through text-center size-30">{{$item->price}} $</span>
                </p>
                <p class="text-797979">
                    Price Sale:
                    <span class="red-text bold-text size-30">{{$item->sale_price}} $</span>
                </p>
            @else
                <p class="text-797979">
                    Price:
                    <span class="card-title red-text text-center size-30">{{$item->price}} $</span>
                </p>
            @endif


            <a href="{{route('home.shop')}}">
                <button
                  class="mb-5 mt-4 p-3 pl-4 pr-4 bold-text white-text black-backgroundS borderless-button">
                  VIEW SHOP
                </button>

            </a>
          </div>
          @empty
          @endforelse
              
         
      </div>
    </div>
    <div class="col-lg-3">
      <h4>WHAT'S NEW</h4>
      <div class="dividers pb-3"></div>
        @forelse ($RandomProducts as $item)
            <div class="d-flex">
                <div>
                    <a href="{{route('home.detail',['id'=>$item->id])}}">
                        <form action="" method="post" >
                            <img src="{{url('uploads')}}/{{$item->image}}" alt="" class="product-image">
                        </form>
                    </a>
                </div>
                <div class="random-products">
                    <a href="" class="a-text-decoration">{{$item->name}}</a>
                    @if ($item->sale_price == 0)
                        <p class="red-text">{{$item->price}} $</p>
                    @else
                    <p class="red-text">{{$item->sale_price}} $</p>
                        
                    @endif
                </div>   
            </div>
        </div>
        @empty
            
        @endforelse
    </div>
  </div>
</div>

<div class="pt-5">
    <div class="red">
        <script>
            const spans = document.querySelectorAll('.text-effect span');
            function animateText() {
            spans.forEach((span, index) => {
                setTimeout(() => {
                span.style.animation = 'fade-out 1s forwards';
                }, index * 100);
            });
            }
            setTimeout(animateText, 5000);
    
        </script>
        <div class="background container pt-5 pb-5">
            <div class="row">
    
                <div class="col-lg-10 d-flex">
                    <p class="text-get text-decoration">
                        Get -30% purchase
                    </p>
                    <div class="d-flex pt-2 selector white-text text-effect">
                        <h1>
                             <span class="selector">on</span>
                             <span class="selector">order </span>
                             <span class="selector">over</span>
                             <span class="selector">$299.00</span>
                        </h1>
                    </div>    
                </div>
                <div class="col-lg-2">
                    <button
                        class=" p-3 pl-4 pr-4 bold-text white-text black-backgroundS borderless-button">
                        MOVE INFO
                    </button>
                </div>
            </div>
    
            
        </div>
    </div>
</div>



  


@endsection
