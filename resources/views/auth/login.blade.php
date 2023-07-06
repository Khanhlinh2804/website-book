{{-- @extends('fontend.account.login_regisert') --}}
@extends('fontend.app')
@section('titless','Login')
@section('login_regisert')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div id="form">
  <div class="container">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
      <div id="userform">
        <ul class="nav nav-tabs nav-justified" role="tablist">
          <li><a href="#"  role="tab" data-toggle="tab">Log in</a></li>
        </ul>
        <div class="tab-content">
            <form id="login" method="POST" action="{{route('login')}}">
                @csrf
                <div class="form-group">
                    <p> Your Email <span class="req">*</span> </p>

                    <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." 
                        value="{{old('email')}}" placeholder="Email" autocomplete="email" >
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group mrgn-30-top">
                    <p> Password<span class="req">*</span> </p>
                    <input type="password" class="form-control" id="password" required data-validation-required-message="Please enter your password" 
                        value="{{old('password')}}" placeholder="Password"  autocomplete="current-password" >
                    <p class="help-block text-danger"></p>
                </div>
                    
                <div class="mrgn-30-top">
                    <button type="submit" class="btn btn-larger btn-block" >
                    Log in
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    @endif
                </div>
            </form>
          
        </div>
      </div>
    </div>
  </div>
</div> --}}
@endsection
