@extends('backend.index')
@section('title','Edit Author ')
    

@section('content')
<div id="page-wrapper">

    <div class="container-fluid">
        <h4 class="btn ">Update</h4>
        <form action="{{ route('author.update', $author->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $author->name }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Classify</label>
                <select class="form-control" id="exampleFormControlSelect1" name="classify_id">
                    @foreach ($classify as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <p>Status</p>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="" value="1"
                        {{ $author->status ? 'checked' : '' }}>
                    Active
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="" value="0"
                        {{ !$author->status ? 'checked' : '' }}>
                    No Active
                </label>
            </div>
            <br>
            <button class="btn btn-primary" type="Submit">Submit</button>
        </form>
    </div>
</div>
{{-- @endsection --}}
@endsection
