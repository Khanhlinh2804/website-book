@extends('backend.index')
@section('title', 'update product')
@section('content')

    <div id="page-wrapper">
    <div class="container-fluid">
        <h4>EDIT CLASSIFY</h4>
        <form action="{{route('classify.update',$classify->id)}}" method="post" >
            @csrf
            @method('Put')
            <input type="hidden" name="id" value="{{ $classify->id }}">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Product's Name"
                    value="{{old('name') ?? $classify->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
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
