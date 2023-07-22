@extends('backend.index')
@section('title','List Product')
    
@section('content')
<div id="page-wrapper">
        <div style="display: inline;">
            <p></p>
            <form class="form-inline my-2 my-lg-0" action="">
                <a href="{{ route('product.create') }}" class="btn btn-outline-primary">ADD PRODUCT</a>
                
                <input class="form-control mr-sm-2" name="key" placeholder="Search by name..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
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
                            {{-- {{$item->authors->name}} --}}
                        </td>
                        <td>{{$item->classifies->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            @if ($item->status)
                                <span class="badge badge-primary">stocking</span>
                                @else
                                <span class="badge badge-danger">out of stock</span>
                                
                            @endif
                        </td>
                        <td class="">
                            <form action="{{route('product.destroy',$item->id)}}" method="post">
                                <a href="{{route('product.edit',$item->id)}}" class="btn btn-outline-success">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    {{-- </div> --}}
    {{$products->appends(request()->all())->links()}}
</div>
@endsection
{{-- @endsection --}}