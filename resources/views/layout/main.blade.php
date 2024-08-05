<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"  rel="stylesheet">

  <title>Villa Agency - Real Estate HTML5 Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }} ">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>

<body>

{{-- Preloader Component --}}
    <x-preloader />

  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> info@company.com</li>
            <li><i class="fa fa-map"></i> Sunny Isles Beach, FL 33160</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="#" target="_blank"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="{{route('home')}}" class="logo">
              <h1>Villa</h1>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="/" class="{{ request()->is('/') ? 'active' : ''}}">Home</a></li>
              <li><a href="{{route('packages')}}" class="{{ request()->is('packages') ? 'active' : ''}}">Packages</a></li>
              <li><a href="{{route('contactShow')}}"  class="{{ request()->is('contactShow') ? 'active' : ''}}">Contact Us</a></li>
              @auth
              <li><a href="{{route('user.index')}}"><i class="fa fa-gauge-high"></i> Dashboard</a></li>
              @endauth
              @guest
              <li><a href="{{route('login')}}"><i class="fa fa-user"></i> Login</a></li>
              @endguest
              
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

    @yield('content');


  <!-- ***** Footer Area Start ***** -->

  <footer>
    <div class="container">
      <div class="col-lg-8">
        <p>Copyright © 2048 Villa Agency Co., Ltd. All rights reserved.

          Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
      </div>
    </div>
  </footer>
  <!-- ***** Footer Area End ***** -->

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }} "></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }} "></script>
  <script src="{{ asset('frontend/assets/js/isotope.min.js') }} "></script>
  <script src="{{ asset('frontend/assets/js/owl-carousel.js') }} "></script>
  <script src="{{ asset('frontend/assets/js/counter.js') }} "></script>
  <script src="{{ asset('frontend/assets/js/custom.js') }} "></script>

</body>

</html>
