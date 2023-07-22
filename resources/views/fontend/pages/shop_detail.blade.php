@extends('fontend.app')
@section('titles','Shop')
@section('content')
<div class="hihi">
    <div class="black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-4 pb-4 text-align-center">
                    <h1 class="white-text selector text-align-center ">Shop</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-5"></div>
    <div class="container pt-5 ">
        <div class="containers"> 
            <div class="row pt-5">
                <h1 class="text-align-center pt-5 selector">Inspire Daily Reading</h1>
                <div class="left">
                    <div class="dividert"></div>
                </div>
                <p class="text-align-center pt-5 selector white-text font-size25 ">Visit Our Blog and Page Find Out Daily Inspiration Quotes from</p>
                <p class="text-align-center selector white-text font-size25">the best Authors</p>
            </div>
            <div class="button-center pb-5">
                <a href="">
    
                    <button class="mb-5 mt-3 p-3 pl-5  pr-5 bold-text pl-50 white-text black-backgroundS borderless-button">
                        VISIT OUR BLOG 
                    </div>
                </a>
        </div>
        
    </div>
    <div class="pt-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 white pt-4 ">
                <div>
                    <h3>Classify</h3>
                    <div class="dividern"></div>
                    <div>
                        <a href="{{route('home.shop_classify', ['id'=>$classify->id])}}" class="category-a">{{$classify->name}}</a>
                    </div>
                    <div class="pt-5">
                    <h3>Category</h3>
                    <div class="dividern"></div>
                    
                </div>
                <div class="pt-5">
                    <div>
                        <h3>Price</h3>
                        <div class="slider-container">
                            <input type="range" min="0" max="100" value="0" class="slider" id="price-slider">
                            <div class="d-flex">
                                <p class="pr-2">Price:</p>
                                <span id="min-price">0</span> - <span id="max-price">100</span>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="pt-5">
                    <h4>RECENT PRODUCTS</h4>
                    <div class="dividern"></div>
                    <form action="" class="pt-3">
                        <div class="">
                            @forelse ($randomShop as $item)
                            <a href="" class="d-flex category-a pt-2">
                                <img src="{{url('uploads')}}/{{$item->image}}" alt="" class="img-shop">
                                <div>
                                    <p class="name-product-master color-text-black">{{$item->name}}</p>
                                    <div class="d-flex">
                                        <p class="name-product-master" style="text-decoration: line-through;">{{$item->price}} $</p>
                                        <p class="name-product-master color-text-red">{{$item->sale_price}} $</p>

                                    </div>
                                </div>
                            </a>
                                
                            @empty
                                
                            @endforelse
                            
                        </div>
                        <div class="dividers"></div>
                    </form>
                </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row pt-5 pl-2">
                    @forelse ($product as $item)
                    <div class="col-lg-4">
                        <div >
                            <div class="image-container-effect">
                                <img src="{{url('uploads')}}/{{$item->image}}" alt="Image">
                                
                                <a href="">
                                    <div class="icon-product">
                                    <div class="heart-overlay ">
                                        <i class="fa-solid fa-cart-plus" style="color: #b7060f;"></i>
                                    </div>
                                </a>
                                </div>
                            </div>
                            <div class="pt-3">
                                <h3 class="text-align-center ">{{$item->name}}</h3>
                                <p class="text-align-center">Author</p>
                                <div class="d-flex pr-4">
                                    <p class="price-product text-align-center" style="text-decoration: line-through; color:black" >{{$item->price}}$</p>
                                    <p class="price-product text-align-center"> - {{$item->sale_price}}$</p>

                                </div>

                            </div>
                        </div>
                    </div>
                        
                    @empty
                        
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
{{-- @section('product')
    @forelse ($product as $item)
                    <div class="col-lg-4">
                        <div >
                            <div class="image-container-effect">
                                <img src="{{url('uploads')}}/{{$item->image}}" alt="Image">
                                
                                <a href="">
                                    <div class="icon-product">
                                    <div class="heart-overlay ">
                                        <i class="fa-solid fa-cart-plus" style="color: #b7060f;"></i>
                                    </div>
                                </a>
                                </div>
                            </div>
                            <div class="pt-3">
                                <h3 class="text-align-center ">{{$item->name}}</h3>
                                <p class="text-align-center">Author</p>
                                <div class="d-flex pr-4">
                                    <p class="price-product text-align-center" style="text-decoration: line-through; color:black" >{{$item->price}}$</p>
                                    <p class="price-product text-align-center"> - {{$item->sale_price}}$</p>

                                </div>

                            </div>
                        </div>
                    </div>
                        
                    @empty
                        
                    @endforelse
@endsection --}}