@extends('backend.index')
@section('title','Edit Blog')

@section('content')
<div id="page-wrapper">
    
    <div class="container-fluid">
        <h4 class="btn">Update Blog</h4>
        <form action="{{ route('admin.blog.update', $blog->id) }}" method="post" enctype="multipart/form-data" role="form">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $blog->name }}">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $blog->title }}">
                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" rows="5">{{ $blog->content }}</textarea>
                @error('content')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                <img src="/uploads/{{ $blog->image }}" alt="" style="width: 200px; height: 150px;">
                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <p>Status</p>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="statusActive" value="1"
                        {{ $blog->status ? 'checked' : '' }}>
                    Active
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="statusInactive" value="0"
                        {{ !$blog->status ? 'checked' : '' }}>
                    No Active
                </label>
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>


@endsection
