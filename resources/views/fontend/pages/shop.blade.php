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
                    <h3>Category</h3>
                    <div class="dividern"></div>
                    <div>
                        <a href="" class="category-a">Hihi</a>
                    </div>
                </div>
                <div class="pt-5">
                    <h3>Category</h3>
                    <div class="dividern"></div>
                    <div>
                        <a href="" class="category-a">Hihi</a>
                    </div>
                </div>
                <div class="pt-5">
                    {{-- thanh ngang  --}}
                    {{-- <script>
                        const slider = document.getElementById('price-slider');
                        const minPrice = document.getElementById('min-price');
                        const maxPrice = document.getElementById('max-price');

                        slider.addEventListener('input', function() {
                        minPrice.textContent = "0";
                        maxPrice.textContent = slider.value;
                        });

                        slider.addEventListener('change', function() {
                        });
                    </script> --}}
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
                            <a href="" class="d-flex category-a">
                                <img src="https://booklovers.ancorathemes.com/wp-content/uploads/2020/05/book12-copyright-400x600.jpg" alt="" class="img-shop">
                                <div>
                                    <p class="name-product-master color-text-black">Name</p>
                                    <p class="name-product-master color-text-red">price</p>
                                </div>
                            </a>
                            
                        </div>
                        <div class="dividers"></div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="pt-2 pl-4">
                            <p class="font-size-16">Showing all <span>12</span> results</p>
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
                                <select id="filter-select" class="filter-select ">
                                    <option value="">Name (a - z)</option>
                                    <option value="">Name (z - a)</option>
                                    <option value="">Price (low - high)</option>
                                    <option value="">Price (hight - low)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-5 pl-2">
                    <div class="col-lg-4">
                        <div >
                            <div class="image-container-effect">
                                <img src="https://booklovers.ancorathemes.com/wp-content/uploads/2020/05/book11-copyright-400x600.jpg" alt="Image">
                                
                                <a href="">
                                    <div class="icon-product">
                                    <div class="heart-overlay ">
                                        <i class="fa-solid fa-cart-plus" style="color: #b7060f;"></i>
                                    </div>
                                </a>
                                </div>
                            </div>
                            <div class="pt-3">
                                <h3 class="text-align-center ">Name</h3>
                                <p class="text-align-center">Author</p>
                                <p class="price-product text-align-center">Price</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
