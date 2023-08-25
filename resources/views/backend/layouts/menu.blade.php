<?php 
$user = Auth::user();
$menu = config('admin');
?> 
<div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">

            <li class="active">
                <a href="{{route('admin.dashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            @foreach ($menu as $item)
                @if ($user->can($item['route']))
                    <li>
                        <a href="{{route($item['route'])}}"><i class="fa fa-fw fa-table"></i></i></i>
                            {{$item['label']}}</a>
                    </li>   
                @endif
            @endforeach
            {{-- <li>
                <a href="{{route('admin.author.index')}}"><i class="fa fa-fw fa-edit"></i></i> Author</a>
            </li>
            <li>
                <a href="{{route('admin.product.index')}}"><i class="fa fa-fw fa-edit"></i></i> Product</a>
            </li>
            <li>
                <a href="{{route('admin.account.index')}}"><i class="fa fa-fw fa-edit"></i></i> Account</a>
            </li>
            <li>
                <a href="{{route('admin.role.index')}}"><i class="fa fa-fw fa-edit"></i></i> Role</a>
            </li>
            
            <li>
                <a href="{{route('admin.order.index')}}"><i class="fa fa-fw fa-table"></i> Order</a>
            </li>--}}
        </ul>
    </div>
