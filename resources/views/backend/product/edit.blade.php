@extends('backend.index')
@section('title', 'update product')
@section('content')

    <div id="page-wrapper">
    <div class="container-fluid">
        <h4>EDIT PRODUCT</h4>
        <form action="{{route('admin.product.update',$pro->id)}}" method="post" enctype="multipart/form-data" role="form">
            @csrf
            @method('Put')
            <input type="hidden" name="id" value="{{ $pro->id }}">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Product's Name"
                    value="{{old('name') ?? $pro->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="Product's price" 
                    value="{{old('price') ?? $pro->price}}">
                    @error('price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Sale Price</label>
                <input type="text" name="sale_price" class="form-control" placeholder="Product's sale_price" 
                value="{{old('sale_price') ?? $pro->sale_price}}" >
                    @error('sale_price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Quantity</label>
                <input type="text" name="quantity" class="form-control" placeholder="Product's sale_price" 
                value="{{old('quantity') ?? $pro->quantity}}" >
                    @error('quantity')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <style>
                .w-25{
                    width: 25%;
                } 
            </style>
            <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input type="file" name="image" id="image" value="{{old('image') ?? $pro->image}}" class="form-control" >
                    <img src="/uploads/{{$pro->image}}" alt="" class="w-25">
                </span> 
                {{-- </div> --}}
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" name="description" class="form-control" value="{{old('description')}} {{$pro->description}}"  placeholder="Product's Description" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Author</label>
                <select class="form-control" id="exampleFormControlSelect1" name="author_id">
                    @foreach ($author as $item)
                        <option value="{{ $item->id }}" {{old('author_id') == $item->id ? 'check':''}} >{{$item->id}} - {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Classify</label>
                <select class="form-control" id="exampleFormControlSelect1" name="classify_id">
                    @foreach ($cala as $item)
                        <option value="{{ $item->id }}" {{old('classify_id') == $item->id ? 'check':''}} >{{$item->id}} - {{ $item->name }}</option>
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
