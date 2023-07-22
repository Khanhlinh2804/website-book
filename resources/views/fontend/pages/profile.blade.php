@extends('fontend.app')
@section('titles','Profile')
@section('content')
<div class="linh-ne">
    <div class="black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-4 pb-4 text-align-center">
                    <h1 class="white-text selector text-align-center ">Profile</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="">
            <p class="profile-name">Hello: <span>Name</span></p>
        </div>        
        <div class="row">
            <div class="col-lg-3 white pt-4">
                 <div class="pl-3">
                    <h3>Order</h3>
                    <div class="dividern"></div>
                    <div class="pl-3">

                        <div>
                            <a href="" class="category-a"> Order detail</a>
                        </div>
                        <div>
                            <a href="" class="category-a"> Order histor</a>
                        </div> 
                    </div>
                    
                </div>
                

            </div>
            <div class="col-lg-9">
                <table class="table">
                <thead>
                    <tr>
                    <th>STT</th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>  
                    <tr>
                        <td>1</td>
                        <td>Name</td>
                        <td>price</td>
                        <td>hihi</td>
                        <td>hihi</td>
                    </tr>  
                </tbody>
            </table>
            <div class="white ">
                <div class="row">
                    
                    <div class="col-lg-4">
                        <p class="profile-order-status">Order status: <span style="color: #de3241"> đang giao</span></p>
                    </div>
                    <div class="col-lg-8">
                        <p class="cart-totals"> Cart totals</p>
                        <div class="d-flex subtotals">
                            <p class="profile-cart-subtotals">Subtotals</p>
                            <p class="profile-cart-price">hihihi $</p>
                        </div>
                        <div class="d-flex">
                            <p class="profile-cart-subtotals">totals</p>
                            <p class="profile-cart-price">hihihi $</p>
                        </div>   
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
