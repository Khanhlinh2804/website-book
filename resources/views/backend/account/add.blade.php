@extends('backend.index')
@section('title','Add account')
@section('content')
    <div id="page-wrapper">
    <div class="container-fluid">
        <h4>ADD ACCOUNT</h4>
        <form action="{{route('admin.account.store')}}" method="post" >
            @csrf
            <div class="row">
                <div class="col-lg-7">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Account Name"
                            value="{{old('name')}}">
                            @error('name')
                                <p class="text-danger">{{ $messages }}</p>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Account Email " 
                            value="{{old('email')}}">
                            {{-- @error('email')
                                <p class="text-danger">{{ $messages }}</p>
                            @enderror --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Account Phone" 
                        value="{{old('phone')}}">
                            @error('phone')
                            <p class="text-danger">{{ $messages }}</p>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password" value="" aria-describedby="helpId">
                            @error('password')
                            <p class="text-danger">{{ $messages }}</p>
                            @enderror
                    </div>
                    
                </div>
                <div class="col-lg-5">
                    <label for="">Role</label>
                        @foreach ($roles as $item)
                        <div class="form-check" style="">  
                            <label class="form-check-label">
                                <input type="checkbox" class="" 
                                name="role[]" value="{{$item->id}}">
                                {{$item->name}}
                            </label>
                        </div>
                        @endforeach
                </div>
            
            </div>
            <button class="btn btn-primary" type="Submit">Submit</button>
        </form>
    </div>
@endsection
