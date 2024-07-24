@extends('layout.main')
@section('content')

@php
    $pageTitle = "Buy Package";
@endphp

<x-breadcrumb :pageTitle="$pageTitle"/>


<div class="section best-deal">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="section-heading">
            <h6>| Buy Package</h6>
            <h2>Lorem ipsum dolor sit amet consectetur!</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-3">
              <div class="info-table">
                <ul>
                  <li>Total Flat Space <span>185 m2</span></li>
                  <li>Floor number <span>26th</span></li>
                  <li>Number of rooms <span>4</span></li>
                  <li>Parking Available <span>Yes</span></li>
                  <li>Payment Process <span>Bank</span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6">
              <img src="assets/images/deal-01.jpg" alt="">
            </div>
            <div class="col-lg-3">
              <h4>Extra Info About Property</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut
                labore et dolore magna aliqua quised ipsum suspendisse.
                <br><br>When you need free CSS templates, you can simply type TemplateMo in any search engine
                website. In addition, you can type TemplateMo Portfolio, TemplateMo One Page Layouts, etc.
              </p>
              <div class="icon-button">
                <a href="#"><i class="fa fa-money-check-dollar"></i> Pay Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="properties section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading text-center">
            <h6>| Related Packages</h6>
            <h2>Lorem ipsum dolor sit amet consectetur.</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="{{route('buy-package')}}"><img src="assets/images/property-01.jpg" alt=""></a>
            <span class="category">Luxury Villa</span>
            <h6>$2.264.000</h6>
            <h4><a href="{{route('buy-package')}}">18 New Street Miami, OR 97219</a></h4>
            <ul>
              <li>Bedrooms: <span>8</span></li>
              <li>Bathrooms: <span>8</span></li>
              <li>Area: <span>545m2</span></li>
              <li>Floor: <span>3</span></li>
              <li>Parking: <span>6 spots</span></li>
            </ul>
            <div class="icon-button">
              <a href="{{route('buy-package')}}"><i class="fa fa-cart-shopping"></i>Buy Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="{{route('buy-package')}}"><img src="assets/images/property-02.jpg" alt=""></a>
            <span class="category">Luxury Villa</span>
            <h6>$1.180.000</h6>
            <h4><a href="{{route('buy-package')}}">54 Mid Street Florida, OR 27001</a></h4>
            <ul>
              <li>Bedrooms: <span>6</span></li>
              <li>Bathrooms: <span>5</span></li>
              <li>Area: <span>450m2</span></li>
              <li>Floor: <span>3</span></li>
              <li>Parking: <span>8 spots</span></li>
            </ul>
            <div class="icon-button">
              <a href="{{route('buy-package')}}"><i class="fa fa-cart-shopping"></i>Buy Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="{{route('buy-package')}}"><img src="assets/images/property-03.jpg" alt=""></a>
            <span class="category">Luxury Villa</span>
            <h6>$1.460.000</h6>
            <h4><a href="{{route('buy-package')}}">26 Old Street Miami, OR 38540</a></h4>
            <ul>
              <li>Bedrooms: <span>5</span></li>
              <li>Bathrooms: <span>4</span></li>
              <li>Area: <span>225m2</span></li>
              <li>Floor: <span>3</span></li>
              <li>Parking: <span>10 spots</span></li>
            </ul>
            <div class="icon-button">
              <a href="{{route('buy-package')}}"><i class="fa fa-cart-shopping"></i>Buy Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection