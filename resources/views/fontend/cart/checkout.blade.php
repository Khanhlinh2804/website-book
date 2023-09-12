@extends('fontend.app')
@section('titles','checkout')
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
                    <div class="circle" >
                        <span class="number">2</span>
                    </div>
                    <div>
                        <p class="cart-shopping-cart">Payment & Delivery Options</p>
                    </div>
                    <i class="fa-solid fa-arrow-right cart-shopping-cart-icon"></i>
                </div>
                <div class="d-flex">
                    <div class="circle"  style="background-color: #ffff">
                        <span class="number" style="color:black ">3</span>
                    </div>
                    <div>
                        <p class="cart-shopping-cart">Shopping Cart</p>
                    </div>
                    
                </div>
            </div>
        </div>
        <form action="" method="post">
            @csrf
            <div class="row pt-5">
                <div class="col-lg-7">
                    <p class="checkout-text-billing-details">Billing details</p>
                    <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <label class="checkout-first-name"  > Name <span style="color: red; font-weight: bold; ">*</span></label>
                                </div>
                                <div>
                                    <input type="text" class="checkout-input" value="{{old('name')}}" name="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label class="checkout-first-name" >User <span style="color: red; font-weight: bold; ">*</span></label>
                                </div>
                                <div>
                                    <input type="text" class="checkout-input" value="{{ Auth::user()->name}}" >
                                    <input type="text" hidden class="checkout-input" name="user_id" value="{{ Auth::user()->id}}" >
                                </div>
                            </div>
                            
                        </div>
                        
                        <div>
                            <div>
                                <div class="pt-4">
                                    <label class="checkout-first-name" >Phone <span style="color: red; font-weight: bold; ">*</span></label>
                                </div>
                                <div>
                                    <input type="text" name="phone" value="{{old('phone')}}" class="checkout-input">
                                </div>
                            </div>
                            <div class="pt-4">
                                <label class="checkout-first-name">City<span style="color: red; font-weight: bold;">*</span></label>
                            </div>
                            <select class="checkout-input" id="city" name="city">
                                <option value="">--Select the city--</option>                        
                                @foreach ($city as $item)
                                    <option value="{{ $item->id }}" {{ old('city') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        
                        <div>
                            <div class="pt-4">
                                <label class="checkout-first-name" for="district">District<span style="color: red; font-weight: bold;">*</span></label>
                            </div>
                            {{-- <select id="district" name="district">
                                <option value="">--Select the district--</option>
                            </select> --}}
                            <select class="checkout-input" id="districts" name="districts">
                                <option value="">--Select the district--</option> 
                                @foreach ($districts as $item)
                                    <option value="{{ $item->id }}" {{ old('districts') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div>
                            <div class="pt-4">
                                <label class="checkout-first-name" >Stress Address<span style="color: red; font-weight: bold; ">*</span></label>
                            </div>
                            <div>
                                <input type="text" class="checkout-input" name="address" placeholder="House number and stress name">
                            </div>
                        </div>
                        <div>
                            <div class="pt-4">
                                <label class="checkout-first-name" >Email </label>
                            </div>
                            <div>
                                <input type="email" name="email" class="checkout-input" value="">
                            </div>
                        </div>
                        <div class="pt-5">
                            <p class="checkout-text-additional">Additional information</p>
                            <div class="">
                                <label class="checkout-first-name"  >Order notes (optional) </label>
                            </div>
                            <div>
                                <input  class="checkout-input" style="height: 50px" name="note" value="{{'Note'}}" placeholder="Notes about your order, e.g. special notes for delivery." ></input>
                            </div>
                        
                        </div>
                    
                </div>
                <div class="col-lg-5 pl-5">
                    <p class="checkout-text-billing-details pb-4">Your order</p>
                    <div class="background-white">
                        <div class="row">
                            @foreach ($cart->items as $product)
                                
                            <div class="col-lg-8">
                                <p class="checkout-name-book">{{$product['name']}}</p>
                            </div>
                            <div class="col-lg-4">
                                <p class="checkout-price ">${{ isset($product['sale_price']) && $product['sale_price'] != 0 ? $product['sale_price'] : $product['price'] }} </p>
                            </div>
                            @endforeach
                            <div class="checkout-dividert"></div>
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <p class="checkout-name-book">Total quantity</p>
                            </div>
                            <div class="col-lg-4">
                                <p class="checkout-price" >{{$cart->total_quantity}} </p>
                            </div>
                            <div class="checkout-dividert"></div>

                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <p class="checkout-name-book">Ship</p>
                            </div>
                            <div class="col-lg-4">
                                <p class="checkout-price red-text">$ 0</p>
                            </div>
                            <div class="checkout-dividert"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <p class="checkout-name-book">Total</p>
                            </div>
                            <div class="col-lg-4">
                                <p class="checkout-price red-text">$ {{$cart->total_price}} </p>
                            </div>

                        </div>
                    </div>
                    <p class="checkout-text-billing-details pt-5 pb-4">Payment</p>
                    <div class="background-white">
                        <div class="p-3 pl-5">
                            <input type="checkbox" class="payment-method" name="statu" value="cash-on-delivery"> Cash on delivery
                        </div>
                        <div class="checkout-divider"></div>
                        <div class="p-3 pl-5">
                            <input type="checkbox" class="payment-method" name="statu" value="paypal"> Paypal
                            <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" alt="" style="width: 110px;height: 40px;">
                        </div>
                        <div class="checkout-divider"></div>
                        <div class="p-3 pl-5">
                            <input type="checkbox" class="payment-method" name="statu" value="elegro-crypto-payment"> elegro Crypto Payment
                            <img src="https://elegro-public.s3.eu-central-1.amazonaws.com/elegro_email_logo.png" alt="" style="width: 110px;height: 40px;">
                        </div>
                        <a href="" style="text-decoration: none">
                            <div class="button-center">
                                <button class="mb-5 p-3 pl-5 pr-5 bold-text pl-50 white-text black-backgroundS borderless-button" id="proceed-button"
                                type="submit" name="payment"
                                >PROCEED TO PAYPAL</button>
                            </div>
                        </a>
                    </div>

                    

                    
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
