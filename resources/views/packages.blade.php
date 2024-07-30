@extends('layout.main')
@section('content')

@php
    $pageTitle = "Packages";
@endphp

<x-breadcrumb :pageTitle="$pageTitle"/>
<div class="section properties">
    <div class="container">
      <ul class="properties-filter">
        <li>
          <a class="is_active" href="#!" data-filter="*">Show All</a>
        </li>
        <li>
          <a href="#!" data-filter=".adv">Apartment</a>
        </li>
        <li>
          <a href="#!" data-filter=".str">Villa House</a>
        </li>
        <li>
          <a href="#!" data-filter=".rac">Penthouse</a>
        </li>
      </ul>
      <div class="container">
        <div class="row">
            @foreach ($packages as  $package)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="item">
                        <a href="{{ route('buy-package') }}"><img src="{{ asset('frontend/assets/images/property-01.jpg') }}" alt=""></a>
                        <span class="category">{{$package->category->category_name}}</span>
                        <h6>{{ '$' . $package->price }}</h6>
                        <h4><a href="{{ 'ahmad'.route('buy-package') }}"></a></h4>
                        <ul>
                            <li>Package Id: <span>{{ $package->id }}</span></li>
                            <li>Buying Times: <span>{{ $package->counter }}</span></li>
                            <li>Days: <span>{{ $package->no_of_days }}</span></li>
                            <li class="ps-4">Type: <span>{{ $package->type ? 'Featured' : 'Normal' }}</span></li>
                        </ul>
                        <div class="icon-button">
                            <a href="{{ route('buy-package') }}"><i class="fa fa-cart-shopping"></i> Buy Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="pagination">
            <li><a href="#">1</a></li>
            <li><a class="is_active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">>></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>



@endsection
