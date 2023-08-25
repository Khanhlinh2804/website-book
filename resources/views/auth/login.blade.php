@extends('..fontend.app')
@section('titless','Login')
@section('content')
<div class="linh-ne">
    <div class="black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-4 pb-4 text-align-center">
                    <h1 class="white-text selector text-align-center ">login</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row ">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6 pt-5">
                                    <div class="">
                                        <div>
                                            <label for="email" class="checkout-first-name" >Email <span style="color: red; font-weight: bold; ">*</span></label>
                                        </div>
                                        <div class="">
                                            <input id="email" type="email" class="checkout-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>    
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
        
                                    <div class="pt-4">
                                        <label for="password" class="checkout-first-name">Password <span style="color: red; font-weight: bold; ">*</span></label>
            
                                        <div class="">
                                            <input id="password" type="password" class="checkout-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="">
                                        <div class="pl-3 pt-3">
                                            <div class="">
                                                <input class="form-check-input " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <div>
                                                    <label class="login-input " for="remember">
                                                        Remember Me
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button type="submit" class=" login-button ">LOGIN</button>
        
                                        @if (Route::has('password.request'))
                                            <a class="pl-3 login-a" href="{{ route('password.request') }}">Forgot Your Password?
                                            </a>
                                        @endif
                                    </div>
                                    <div class="">
                                        @if(Route::has('register'))
                                            <a class="pl-3 login-a" href="{{ route('register') }}">You don't have an account!
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
