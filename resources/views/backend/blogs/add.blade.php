@extends('backend.index')
@section('content')
    <div id="page-wrapper">
    <div class="container-fluid">
        <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data" role="form">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input type="file" name="image" class="form-control" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Content</label>
                <textarea class="form-control" name="content" id="" rows="5"></textarea>
            </div>
            <p>Status</p>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="" value="1" checked>
                    Active
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="" value="0">
                    No Active
                </label>
            </div>
            <br>
            <button class="btn btn-primary" type="Submit">Submit</button>
        </form>
    </div>
    </div>
@endsection
