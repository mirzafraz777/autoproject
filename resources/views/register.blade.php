@extends('layout.main')
@section('content')

<div class="login section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Sign Up</h6>
            <h2>Lorem ipsum dolor sit amet.</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form id="login-form" action="{{route('register')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <fieldset>
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name" placeholder="Your Name..." autocomplete="on" required>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..."
                                required>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password..." autocomplete="on" required>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password..." autocomplete="on" required>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <button type="submit" id="form-submit" class="orange-button">Sign Up</button>
                        </fieldset>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <span>Already have an account </span><a href="{{route('login')}}">Login here</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>
  </div>


@endsection
