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
                  <li>Price <span>{{'$'.$package->price}}</span></li>
                  <li>Category<span>{{$package->category->category_name}}</span></li>
                  <li>Bonus <span>{{$package->no_of_days.' Days'}}</span></li>
                  <li>Type <span>{{ $package->type ? 'Featured' : 'Normal' }}</span></li>
                  <li>Buying Times <span>{{$package->counter}}</span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6">
              <img src="{{ ( $package->image ? asset('storage/images/'.$package->image): asset('storage/images/package_default.png') ) }}" alt="{{$package->name}}">
            </div>
            <div class="col-lg-3">
              <h4>{{$package->name}}</h4>
              {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut
                labore et dolore magna aliqua quised ipsum suspendisse.
                <br><br>When you need free CSS templates, you can simply type TemplateMo in any search engine
                website. In addition, you can type TemplateMo Portfolio, TemplateMo One Page Layouts, etc.
              </p> --}}
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
        @foreach ($related_package as $package)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="item">
                  <a href="{{ route('buy-package',$package->id) }}"><img src="{{ ( $package->image ? asset('storage/images/'.$package->image): asset('storage/images/package_default.png') ) }}" alt="Package Image"></a>
                  <span class="category">{{$package->category->category_name}}</span>
                  <h6>{{ '$' . $package->price }}</h6>
                  <h4><a href="{{ route('buy-package',$package->id) }}"> {{$package->name}} </a></h4>
                  <ul>
                      <li>Package ID: <span>{{ $package->id }}</span></li>
                      <li>Buying Times: <span>{{ $package->counter }}</span></li>
                      <li>Days: <span>{{ $package->no_of_days }}</span></li>
                      <li class="ps-4">Type: <span>{{ $package->type ? 'Featured' : 'Normal' }}</span></li>
                  </ul>
                  <div class="icon-button">
                      <a href="{{ route('buy-package',$package->id) }}"><i class="fa fa-cart-shopping"></i> Buy Now</a>
                  </div>
              </div>
          </div>
        @endforeach

      </div>
    </div>
  </div>


@endsection