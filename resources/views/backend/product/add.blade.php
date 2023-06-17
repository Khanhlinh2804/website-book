@extends('backend.index')
@section('content')
    <div id="page-wrapper">
    <div class="container-fluid">
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" name="price" class="form-control" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Sale Price</label>
                <input type="text" name="sale_price" class="form-control" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input type="text" name="name" class="form-control" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Classily</label>
                <select class="form-control" id="exampleFormControlSelect1" name="classify_id">
                    @foreach ($classify as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
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
