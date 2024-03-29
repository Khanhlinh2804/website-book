@extends('fontend.app')
@section('titles','Cart')
@section('content')
<div class="linh-ne">
    <div class="black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-4 pb-4 text-align-center">
                    <h1 class="white-text selector text-align-center ">Cart</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-5 pb-5">
        <div class="row pt-5">
            <div class="d-flex">
                <div class="d-flex cart-pt5">
                    <div class="circle">
                        <span class="number">1</span>
                    </div>
                    <div>
                        <p class="cart-shopping-cart">Shopping Cart</p>
                    </div>
                    <i class="fa-solid fa-arrow-right cart-shopping-cart-icon"></i>
                </div>
                <div class="d-flex">
                    <div class="circle" style="background-color: #ffff">
                        <span class="number" style="color:black ">2</span>
                    </div>
                    <div>
                        <p class="cart-shopping-cart">Payment & Delivery Options</p>
                    </div>
                    <i class="fa-solid fa-arrow-right cart-shopping-cart-icon"></i>
                </div>
                <div class="d-flex">
                    <div class="circle" style="background-color: #ffff">
                        <span class="number" style="color:black ">3</span>
                    </div>
                    <div>
                        <p class="cart-shopping-cart">Shopping Cart</p>
                    </div>

                </div>
            </div>
        </div>
        
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @forelse ($carts_view as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/' . $item['image']) }}" alt=""
                                            style="width: 130px; height: 150px">
                                    </td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>
                                        {{ isset($item['sale_price']) && $item['sale_price'] != 0 ? $item['sale_price'] : $item['price'] }}
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.update',$item['id']) }}" method="get" role="form" >
                                                @csrf
                                            <div class="button">
                                                <input type="number" style="width: 80px" min="1" max=""
                                                    id="quantityDisplay{{ $item['id'] }}" name="quantity" value="{{ $item['quantity'] }}">
                                                {{-- <div style="border: none; background-color: white;">
                                                    <i class="fa-solid fa-circle-plus" onclick="increaseQuantity('{{ $item['id'] }}')"></i>
                                                </div> --}}
                                            </div>
                                    </td>
                                    
                                    
                                    <td style="color: #de3241">
                                        {{ number_format($item['quantity'] * $item['sale_price']) }}
                                    </td>

                                    <td class="cart-icon-cancel">
                                        <button type="submit" name="update"  style="border: none; background-color: white">
                                            <i class="fa-solid fa-check"  style="color: #29ff04;"></i>
                                        </button>
                                        <a href="{{ route('cart.remove',['id'=>$item['id']]) }}"
                                            onclick="return confirm('Bạn có chắc không?')">
                                            <i class="fa-solid fa-x cart-icon-cancel " style="color: #ff0000; "></i>
                                        </a>
                                    </td>
                                </form>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Giỏ hàng trống</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="d-flex">
                            <input type="text" class="cart-custom-input" placeholder="Coupon or vocher">
                            <a class="cart-coupon" style="padding-top: 13px; padding-bottom: 13px; ">
                                Apply coupon
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="d-flex justify-content-end">
                           
                            <a href="{{ route('home.shop') }}" class="pr-2" style="text-decoration: none">
                                
                                    <div class="mb-5 p-3 pl-5 pr-5  bold-text pl-50 white-text black-backgroundS borderless-button">
                                        Comback store
                                    </div>
                            </a>
                            <a href="{{ route('cart.clear') }}" class="pl-2"  onclick="return confirm('Do you want all delete product???')" style="text-decoration: none">
                                    <div class="mb-5 p-3 pl-5 pr-5  bold-text pl-50 white-text black-backgroundS borderless-button">
                                        All delete
                                    </div>
                                
                            </a>
                        </div>
                    </div>
                    
                </div>
        <div class="row pt-2">
            <div class="col-lg-5"></div>
            <div class="col-lg-7">
                <div>
                    <p class="cart-totals"> Cart totals</p>
                </div>
                <div class="">
                    <div class="d-flex subtotals">
                        <p class="cart-subtotals">Quantity</p>
                        <p class="cart-price"> {{$cart->total_quantity}}</p>
                    </div>
                    <div class="d-flex">
                        <p class="cart-subtotals">totals</p>
                        <p class="cart-price">{{$cart->total_price}} $</p>
                    </div>

                </div>
                <div class="pt-4">
                    <a href="{{route('order.checkout')}}" style="text-decoration: none">
                        <div class="button-center">
                            <button
                                class="mb-5 p-3  pl-5 pr-5  pl-50 white-text cart-button  borderless-button">Continue
                                shopping</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="background cart-background pt-5 pb-5">
    <div class="container">
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
                <button class=" p-3 pl-4 pr-4 bold-text white-text black-backgroundS borderless-button">
                    MOVE INFO
                </button>
            </div>
        </div>
    </div>
</div>


@endsection