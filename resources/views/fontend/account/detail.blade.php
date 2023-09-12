@extends('fontend.app')
@section('titles','Profile')
@section('content')
<div class="linh-ne">
    <div class="black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-4 pb-4 text-align-center">
                    <h1 class="white-text selector text-align-center ">Detail Order</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="">
            <p class="profile-name">Hello: <span>{{ Auth::user()->name }}</span></p>
        </div>        
        <div class="row">
            
            <div class="col-lg-12">
                <table class="table">
                <thead>
                    <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>TotlePrice</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php $T=0;?>
                    <?php $QT=0;?>
                        @foreach ($detail->order_detail as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$item->products->name}}</td>
                                <td>
                                    <img src="{{url('uploads')}}/{{$item->products->image}}" style="width: 150px; height: 200px;" alt="">
                                </td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price}}$</td>
                                <td style="color: red">{{number_format($item['quantity'] * $item['price'])}} $</td>
                                
                            </tr>  
                        <?php $T += $item->quantity * $item->price;?>
                        <?php $QT += $item->quantity;?>
                        @endforeach
                    

                </tbody>
            </table>
            <div class="white ">
                <div class="row">
                    <div class="col-lg-8">
                        <p class="cart-totals"> Cart totals</p>
                        <div class="d-flex subtotals">
                            <p class="profile-cart-subtotals">TotalQuantity</p>
                            <p class="profile-cart-price">{{$QT}} </p>
                        </div>
                        <div class="d-flex">
                            <p class="profile-cart-subtotals">totals</p>
                            <p class="profile-cart-price">{{$T}} $</p>
                        </div>   
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-2" style="padding-top: 125px">
                        <a href="{{route('user.profile')}}" class=" p-3 pl-4 pr-4 bold-text white-text black-backgroundS borderless-button">
                            BACK PROFILE </a>
                    </div>
                </div>
            </div>
            </div>
        </div>
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



@endsection
