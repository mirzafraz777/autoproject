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
        @foreach ($categories as  $category)
        <li>
          <a href="#!" data-filter="{{'.'.$category->category_name}}">{{$category->category_name}}</a>
        </li>
            
        @endforeach
      </ul>
        <div class="row properties-box" style="position: relative; height: 1903.41px;">
            @foreach ($packages as  $package)
                <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 {{$package->category->category_name}}">
                    <div class="item">
                        <a href="{{ route('buy-package',$package->id) }}"><img src="{{ ( $package->image ? asset('storage/images/'.$package->image): asset('storage/images/package_default.png') ) }}" alt="{{$package->name}}"></a>
                        <span class="category">{{$package->category->category_name}}</span>
                        <h6>{{ '$' . $package->price }}</h6>
                        <h4><a href="{{ route('buy-package',$package->id) }}"> {{$package->name}} </a></h4>
                        <ul>
                            <li>Package Id: <span>{{ $package->id }}</span></li>
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
      {{-- <div class="row">
        <div class="col-lg-12">
          <ul class="pagination">
            <li><a href="#">1</a></li>
            <li><a class="is_active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">>></a></li>
          </ul>
        </div>
      </div> --}}
    </div>
  </div>



@endsection
