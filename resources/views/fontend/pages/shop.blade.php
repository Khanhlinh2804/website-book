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
                <a href="#">
    
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
                    <a href="{{route('home.shop')}}" class="category-a">All</a>
                    @forelse ($classify as $item)
                    <div>
                        <a href="{{route('home.shop_cate', ['id'=>$item->id])}}"
                             class="category-a" {{ request()->route('id') == $item->id ? 'active' : '' }}>
                             {{$item->name}}</a>
                    </div>   
                    @empty
                         <p>No classify.</p>
                    @endforelse
                </div>
                <div class="pt-5">
                    <h3>Author</h3>
                    <div class="dividern"></div>
                    @forelse ($author as $item)
                    <div>
                        <a href="{{route('home.shop_author',['id'=>$item->id])}}" class="category-a"
                            >{{$item->name}}</a>
                    </div>
                        
                    @empty
                    No author
                    @endforelse
                </div>
                
                <div class="pt-5">
                    <h4>RECENT PRODUCTS</h4>
                    <div class="dividern"></div>
                    <form action="" class="pt-3">
                        <div class="">
                            @forelse ($randomShop as $item)
                            <a href="{{route('home.detail',['id'=>$item->id])}}" class="d-flex category-a pt-2">
                                <img src="{{url('uploads')}}/{{$item->image}}" alt="" class="img-shop">
                                <div>
                                    <p class="name-product-master color-text-black">{{$item->name}}</p>
                                    <div class="d-flex">
                                        @if ($item->sale_price==0)
                                        <p class="name-product-master color-text-red">{{$item->price}} $</p>
                                        @else 
                                        <p class="name-product-master" style="text-decoration: line-through;">{{$item->price}} $</p>
                                        <p class="name-product-master color-text-red">{{$item->sale_price}} $</p>
                                        @endif

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
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="pt-2 pl-4">
                            <p class="font-size-16">Showing all <span>{{$product_count}}</span> results</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="">
                            <div class="r-1 d-flex"> 
                                <input class="shop-checkout-input" name="key" placeholder="Search by name..." aria-label="Search">
                                <button class="shop-search" type="submit"><i class="fa-solid fa-magnifying-glass shop-icon-color"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row pt-5 pl-2">
                    {{-- @yield('product') --}}
                    @forelse ($allproduct as $product)
                    <div class="col-lg-4">
                        <div >
                            <div class="image-container-effect">
                                <a href="{{route('home.detail',['id'=>$product->id])}}">
                                    <img src="{{url('uploads')}}/{{$product->image}}" alt="Image">
                                </a>
                                
                                <a href="">
                                    <div class="icon-product">
                                        <a href="{{route('cart.add', ['id'=>$product->id])}}">
                                            <div class="heart-overlay ">
                                                <i class="fa-solid fa-cart-plus" style="color: #b7060f;"></i>
                                            </div>
                                        </a>
                                </a>
                                </div>
                            </div>
                            <div class="pt-3 text-align-center">
                                <h3 class="text-align-center ">{{$product->name}}</h3>
                                <p class="text-align-center">{{$product->author->name}}</p>
                                <div class="d-flex pr-4 text-align-center" >
                                    @if ($product->sale_price ==0 )
                                    
                                    <p class="price-product text-align-center" style="text-align: center" >{{$product->price}}$</p>
                                    
                                    @else
                                    <p class="price-product text-align-center" style="text-decoration: line-through; color:black" >{{$product->price}}$</p>
                                    <p class="price-product text-align-center"> - {{$product->sale_price}}$</p>
                                    @endif
                                        

                                </div>

                            </div>
                        </div>
                    </div>  
                    @empty
                    <p>Không có dữ liệu gì đâu nên bạn phải thêm vào đi nha </p> 
                    @endforelse
                    {{ $allproduct->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
