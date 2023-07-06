@extends('backend.index')
@section('title','')
@section('content')
    <div id="page-wrapper">
    <div class="container-fluid">
        <h4>ADD PRODUCT</h4>
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" role="form">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Product's Name"
                    value="{{old('name')}}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Product's price" 
                    value="{{old('price')}}">
                    @error('price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Sale Price</label>
                <input type="text" name="sale_price" class="form-control" placeholder="Product's sale_price" 
                value="0">
                    @error('sale_price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Quantity</label>
                <input type="number" name="quantity" class="form-control" placeholder="Product's quantity" 
                value="{{old('quantity')}}">
                    @error('quantity')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input type="file" name="image" id="image" class="form-control" >
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" name="description" class="form-control" placeholder="Product's Description" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}" {{old('category_id') == $item->id ? 'check':''}} >{{$item->id}} - {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <p>Status</p>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="" value="{{ 1 ?? old('status')}}" checked>
                    In stock
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="" value="{{0 ?? old('status')}}">
                    Out of stock
                </label>
            </div>
            <br>
            <button class="btn btn-primary" type="Submit">Submit</button>
        </form>
    </div>
    </div>
@endsection
