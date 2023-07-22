@extends('fontend.app')
@section('titles','detail product')
@section('content')
<div class="linh-ne">
    <div class="black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-4 pb-4 text-align-center">
                    <h1 class="white-text selector text-align-center ">Shop</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row pt-5 pb-5">
            <div class="col-lg-6 detail-image">
                <img src="{{url('uploads')}}/{{$pro->image}}" alt="" class="detail-image">
            </div>
            <div class="col-lg-6 pl-2 pt-5">
                <div class="">
                    <p class="color-7979 detail-product-name">{{$pro->name}}</p>
                    {{-- <p class="color-7979 detail-product-author"> Author : <span> {{$pro->author->name}}</span></p> --}}
                    {{-- <p class="color-7979 detail-product-author"> Classify : <span> {{$pro->classify->name}}</span></p> --}}
                    <p class="color-7979 detail-product-author">Số lượng:  {{$pro->quantity}}</p>
                    <p class="color-7979">ID: {{$pro->id}}</p>
                    <p class="color-7979">{{$pro->description}}</p>
                    <p class="color-7979"> Trạng Thái: 
                        @if ($pro->status)
                            <span class="red-text">stocking</span>
                        @else
                            <span class="">out of stock</span>        
                        @endif

                    </p>
                </div>
                {{-- tăng giảm sp  --}}
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                    const decreaseBtn = document.querySelector('.btn-decrease');
                    const increaseBtn = document.querySelector('.btn-increase');
                    const quantityInput = document.querySelector('.quantity-input');
                    
                    decreaseBtn.addEventListener('click', function() {
                        decreaseQuantity();
                    });
                    
                    increaseBtn.addEventListener('click', function() {
                        increaseQuantity();
                    });
                    
                    function decreaseQuantity() {
                        let currentQuantity = parseInt(quantityInput.value);
                        if (currentQuantity > 1) {
                        quantityInput.value = currentQuantity - 1;
                        }
                    }
                    
                    function increaseQuantity() {
                        let currentQuantity = parseInt(quantityInput.value);
                        quantityInput.value = currentQuantity + 1;
                    }
                    });

                </script>
                <div class="d-flex pt-4">
                    <div class="quantity-control pr-5">
                        <div class="detail-btn-left">
                            <button class="btn-decrease">-</button>
                        </div>
                        <div class="detail-input">
                            <input type="text" class="quantity-input" value="1">
                        </div>
                        <div class="detail-btn-right">
                            <button class="btn-increase">+</button>
                        </div>
                    </div>
                    <a href=""></a>
                    <button
                        class=" detail-text-buy  pl-4 pr-4 bold-text white-text black-backgroundS borderless-button">
                        BUY 
                    </button>
                </div>
                <div class="pt-4">
                    <a href="{{route('cart.add', ['id'=>$product->id])}}">

                        <button
                            class=" detail-text-add-to-card p-3 pl-5 pr-5 bold-text white-text black-backgroundS borderless-button">
                            ADD TO CARD 
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <h1 class="text-center pt-5 pb-3 ">Related Products</h1>
            <div class="divide center pr-5"></div>
            @forelse ($randomcard as $item)
                
            <div class="col-lg-3 pt-5">
                <a href="{{url('uploads')}}/{{$pro->image}}">
                    <div class="zoom-container">
                        <img class="zoom-image" src="{{url('uploads')}}/{{$item->image}}" alt="Ảnh">
                    </div>
                </a>
                <div class="card-body">
                    <a href="#" class="bold-text a-text-decoration">
                        <p class="text-center  ">{{$item->name}}</p>
                    </a>
                    <div class="d-flex pl-5">
                        <h5 class="card-title strike-through text-center" style="color: rgb(166, 166, 166)">{{$item->price}} $</h5>
                        <p class="color-red pl-2 pr-2 bold-text ">-</p>
                        <h5 class="card-title color-red text-center">{{$item->sale_price}} $</h5>                        </div>                       
                    </div>       
            </div>
            @empty
                
            @endforelse
        </div>
    </div>
</div>
    




@endsection
