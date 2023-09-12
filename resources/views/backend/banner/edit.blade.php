@extends('backend.index')
@section('title','Edit Author ')
    

@section('content')
<div id="page-wrapper">

    <div class="container-fluid">
        <h4 class="btn ">Update</h4>
        <form action="{{ route('admin.banner.update', $banners->id) }}" method="post" enctype="multipart/form-data" role="form">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $banners->name }}">
                @error('name')
                    <p class="text-danger">{{ $messages }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">link</label>
                <input type="link" name="link" class="form-control"value="{{ $banners->link }}" >
                @error('link')
                    <p class="text-danger">{{ $messages }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input type="file" name="image"  id="image" value="{{old('image') ?? $banners->image}}" class="form-control" >
                    <img src="/uploads/{{$banners->image}}" alt="" class="w-25">
                </span> 
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <p>Status</p>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="" value="1"
                        {{ $banners->status ? 'checked' : '' }}>
                    Active
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="" value="0"
                        {{ !$banners->status ? 'checked' : '' }}>
                    No Active
                </label>
            </div>
            <br>
            <button class="btn btn-primary" type="Submit">Submit</button>
        </form>
    </div>
</div>
@endsection
