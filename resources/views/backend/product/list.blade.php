@extends('backend.index')
@section('title','List Product')
    
@section('content')
<div id="page-wrapper">
    
    {{-- <div class="container-fluid"> --}}
        <a href="{{route('product.create')}}" class="btn btn-outline-primary"> ADD PRODUCT</a>
        <p></p>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>sale_price</th>
                    <th>Quantity</th>
                    <th>image</th>
                    <th>Category_id</th>
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
                        
                        <td>{{$item->categories->name}}</td>
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
</div>
@endsection
{{-- @endsection --}}