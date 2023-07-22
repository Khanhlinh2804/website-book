@extends('fontend.app')
@section('titles', 'register')
@section('content')
<div class="linh-ne">
  <div class="black">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 pt-4 pb-4 text-align-center">
          <h1 class="white-text selector text-align-center ">register</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center ">
      <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="row">
            <div class="col-lg-6">
                <div>
                    <label for="name" class="checkout-first-name">Name <span
                        style="color: red; font-weight: bold; ">*</span></label>
      
                    <div class="">
                      <input id="name" type="text" class="checkout-input @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                </div>
                <div class="pt-4">
                    <label for="email" class="checkout-first-name">Email Address<span
                        style="color: red; font-weight: bold; ">*</span></label>
        
                    <div class="">
                        <input id="email" type="email" class="checkout-input @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
        
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="">
                  <label for="phone" class="checkout-first-name">Phone</label>
      
                  <div class="">
                    <input id="phone" type="text" class="checkout-input @error('email') is-invalid @enderror" name="phone"
                      value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone">
      
                    {{-- @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror --}}
                  </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="">
                  <label for="password" class="checkout-first-name">Password<span
                            style="color: red; font-weight: bold; ">*</span></label>
      
                  <div class="">
                    <input id="password" type="password" class="checkout-input @error('password') is-invalid @enderror"
                      name="password" required autocomplete="new-password" placeholder="Password">
      
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
    
                </div>
                <div class="pt-4">
                  <label for="password-confirm" class="checkout-first-name">Confirm Password<span
                            style="color: red; font-weight: bold; ">*</span></label>
      
                  <div class="">
                    <input id="password-confirm" type="password" class="checkout-input" placeholder="Confirm Password" name="password_confirmation" required
                      autocomplete="new-password">
                  </div>
                </div>
            </div>
  
            <div class="row mb-0 pt-4">
              <div class="offset-md-4">
                <button type="submit" class="register-button">
                  Register
                </button>
              </div>
            </div>
          </div>



        </form>
      </div>
    </div>
  </div>

</div>
@endsection