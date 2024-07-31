@extends('layout.main')
@section('content')

<div class="login section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Update Password </h6>
            <h2>Lorem ipsum dolor sit amet.</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <form id="login-form" action="{{route('password-update',$token)}}" method="post">
            @csrf
              <div class="row">
                <div class="col-lg-12">
                  <fieldset>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"" placeholder="Enter New Password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <label for="password_confirmation">Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password') is-invalid @enderror"" placeholder="Enter New Password">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="orange-button">Update Password</button>
                  </fieldset>
                </div>
              </div>
              <div class="row mt-3">
                  <div class="col-lg-12">
                      <a href="{{route('login')}}" >Login</a>
                  </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>


@endsection