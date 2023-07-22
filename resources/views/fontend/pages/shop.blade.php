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
                    @forelse ($classify as $item)
                    <div>
                        
                        <a href="{{route('home.shop_classify', ['id'=>$item->id])}}" class="category-a">{{$item->name}}</a>
                    </div>   
                    @empty
                         <p>Không có dữ liệu phân loại.</p>
                    @endforelse
                </div>
                <div class="pt-5">
                    <h3>Category</h3>
                    <div class="dividern"></div>
                    @forelse ($author as $item)
                    <div>
                        <a href="" class="category-a">{{$item->name}}</a>
                    </div>
                        
                    @empty
                        
                    @endforelse
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
                        {{-- <form >
                            <div id="slider-range">
                            </div>
                            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                            <br>
                            <input type="submit" name="filter_price" value="filter-price" class="btn btn" >
                        </form> --}}
                    </div>  
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
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="pt-2 pl-4">
                            <p class="font-size-16">Showing all <span>{{$product_count}}</span> results</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="r-1">
                            {{-- lọc javasript  --}}
                            <script>
                                const filterSelect = document.getElementById('filter-select');
        
                                filterSelect.addEventListener('change', function() {
                                const selectedValue = filterSelect.value; 
                                
                                if (selectedValue === 'price') {
        
                                } else if (selectedValue === 'name') {
        
                                }
                                });
        
                            </script>
                            <div class="filter-container ">
                                {{-- <form action="" class="" style="width: 500px;">
                                    <select id="sort" name="sort" class="filter-select ">
                                        <option value="name-ASC">filter</option>
                                        <option value="name-ASC">Name (a - z)</option>
                                        <option value="name-DESC">Name (z - a)</option>
                                        <option value="price-ASC">Price (low - high)</option>
                                        <option value="price-DESC">Price (hight - low)</option>
                                    </select>

                                </form> --}}
                                <form class="" style="width: 500px;">
                                    @csrf
                                <select name="sort" id="sort" class="filter-select">
                                    <option>Hiện thị theo</option>
                                    <option value="{{Request::url()}}?sort_by=name-ASC">Name (a - zn)</option>
                                    <option value="{{Request::url()}}?sort_by=name-DESC">Name (z - a)</option>
                                    <option value="{{Request::url()}}?sort_by=price-ASC">Price (low - high)</option>
                                    <option value="{{Request::url()}}?sort_by=price-DESC">Price (hight - low)</option>
                                </select>
                                </form>
                            </div>
                        </div>
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
                            <div class="pt-3">
                                <h3 class="text-align-center ">{{$product->name}}</h3>
                                <p class="text-align-center">Author</p>
                                <div class="d-flex pr-4">
                                    <p class="price-product text-align-center" style="text-decoration: line-through; color:black" >{{$product->price}}$</p>
                                    <p class="price-product text-align-center"> - {{$product->sale_price}}$</p>

                                </div>

                            </div>
                        </div>
                    </div>  
                    @empty
                    <p>Không có dữ liệu gì đâu nên bạn phải thêm vào đi nha </p> 
                    @endforelse
                </div>
                {{ $allproduct->links() }}
            </div>
        </div>
    </div>
</div>


@endsection
