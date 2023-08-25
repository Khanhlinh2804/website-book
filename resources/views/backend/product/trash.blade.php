@extends('backend.index')
@section('title','List Product')
    
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div style="display: inline;">
            <?php $user = Auth::user(); ?>
            <p></p>
            <form class="form-inline my-2 my-lg-0" action="">
                
                <div class="col-lg-7">
                {{-- @if ($user->can('admin.product.create') && $user->can('admin.product.store')) --}}
                    <a href="{{ route('admin.product.index') }}" class="btn btn-outline-primary">Back</a>
                {{-- @endif --}}
                </div>
                <form action="">
                    <div class="col-lg-5 right">
                        <input class="form-control mr-sm-2" style="width: 80%;" name="key" placeholder="Search by name..." aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </div>
                    
                </form>

            </form>
        </div>
    </div>
        <h2>List of product</h2>
        <hr> 

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>sale_price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Author</th>
                    <th>Classify</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($products)
                    
                @foreach ($products as $item)
                    
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->sale_price}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>
                            <style>
                                .w-20{
                                    width: 120px;
                                    height: 150px;
                                }
                            </style>
                            <img src="{{url('uploads')}}/{{$item->image}}" class="w-20" alt="">
                        </td>
                        <td>
                            {{$item->author->name}}
                        </td>
                        <td>{{$item->classifies->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            @if ($item->status)
                                <span >stocking</span>
                                @else
                                <span >out of stock</span>
                                
                            @endif
                        </td>
                        <td class="">
                            
                            {{-- @if ($user->can('admin.product.tra')) --}}
                            <a href="{{route('admin.product.restore',$item->id)}}" class="btn btn-outline-success">Back</a>
                            <a href="{{route('admin.product.deleteforce',$item->id)}}" class="btn btn-outline-success">Clead</a>
                            
                            
                        </td>
                    </tr>
                @endforeach
                @else
                <p>No data</p>
                    
                @endif
            </tbody>
        </table>
    {{-- </div> --}}
    {{$products->appends(request()->all())->links()}}
</div>
@endsection
{{-- @endsection --}}