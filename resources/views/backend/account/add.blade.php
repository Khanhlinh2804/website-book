@extends('backend.index')
@section('title','Add account')
@section('content')
    <div id="page-wrapper">
    <div class="container-fluid">
        <h4>ADD ACCOUNT</h4>
        <form action="{{route('account.store')}}" method="post" >
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Account Name"
                    value="{{old('name')}}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Account Email " 
                    value="{{old('email')}}">
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="text" name="phone" class="form-control" placeholder="Account Phone" 
                value="{{old('phone')}}">
                    @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Address" 
                value="{{old('address')}}">
                    @error('address')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="Password" value="" aria-describedby="helpId">
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="form-group ">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="Password Confirmation" value="{{ old('password_confirmation') }}"
                        aria-describedby="helpId">
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            <button class="btn btn-primary" type="Submit">Submit</button>
        </form>
    </div>
    </div>
@endsection
