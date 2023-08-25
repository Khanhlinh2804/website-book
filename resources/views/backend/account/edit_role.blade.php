@extends('backend.index')
@section('title','edit user_role')
    
@section('content')
<div id="page-wrapper"> 
    <div class="container-fluid">
        <div class="row" style="padding-top: 50px;">
                <div class="col-lg-6">
                    <form action="{{route('admin.account.update',$user->id)}}" method="post" role="form">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name </label>
                            <input type="text" name="name" class="form-control" 
                                value=" {{$user->name}}">
                            @error('name')
                                <p style="color: red">{{$messages}}</p>
                            @enderror
                        </div>
                        <div class="form-group" style="">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" name="phone" class="form-control" 
                                value=" {{$user->phone}}">
                                @error('phone')
                                     <p style="color: red">{{$message}}</p>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control"
                                value=" {{$user->email}}">
                                @error('email')
                                     <p style="color: red">{{$message}}</p>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="password" class="form-control"
                                value="">
                                 @error('password')
                                     <p style="color: red">{{$message}}</p>
                                @enderror
                                
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Confirm password</label>
                            <input type="password" name="confirm_password" class="form-control"
                                value="">
                                 @error('comfirm_password')
                                     <p style="color: red">{{$message}}</p>
                                @enderror
                                
                        </div>
                        <button type="submit" style="padding-left: 20px;text-align: center; padding-right: 20px">
                            Submit</button>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Role</label>
                        @foreach ($roles as $item)
                        <div class="form-check" style="">  
                            <?php $checked =in_array($item->name,$role_assignments) ? 'checked' :''; ?>
                            <label class="form-check-label">
                                <input type="checkbox" {{$checked}} class="form-check-input" 
                                name="role[]" value="{{$item->id}}">
                                {{$item->name}}
                            </label>
                        </div>
                        @endforeach
                        
                    </div>
                </form>
                
                
            </div>

        </div>
    </div>
</div>
{{-- @endsection --}}
@endsection