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
            
        </div>        
        <div class="row pt-5 pb-1">
            <div class="col-lg-3 white ">
                 <div class="pl-3">
                    <p class="profile-name">Hello: <span>{{ Auth::user()->name }}</span></p>
                    <h3>Information</h3>
                    <div class="dividern"></div>
                    <div class="pl-3">
                        <div>
                            <p>Name: {{$customer->name}}</p>
                            <p>Email: {{$customer->email}}</p>
                            <p>Phone: {{$customer->phone}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <table class="table">
                <thead>
                    <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    </tr>
                </thead>
                <tbody> 
                    @if ($customer->orders)
                        @foreach ($customer->orders as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{route('user.detail',['id' => $item->id])}}" class="profile">
                                        {{$item->name}}
                                    </a>
                                </td>
                                <td>{{$item->created_at->format('d/m/Y')}}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <span style="color: green">Waiting for confirmation</span>
                                    @elseif($item->status == 2)
                                        <span style="color: rgb(151, 196, 4)">Order confirmed</span>
                                    @elseif($item->status == 3)
                                        <span style="color: rgb(9, 242, 226)">Packaged and sent to the shipping carrier</span>
                                    @elseif($item->status == 4)
                                        <span style="color: rgb(9, 32, 242)">Order in transit</span>
                                    @elseif($item->status == 5)
                                        <span style="color: rgb(143, 8, 8)">Delivery successful</span>
                                    @else
                                        <span style="color: rgb(0, 0, 0)">Delivery failed</span>
                                    @endif

                                </td>
                            </tr>  
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">Không có đơn hàng nào.</td>
                        </tr>
                    @endif

                </tbody>
            </table>
            
            

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
