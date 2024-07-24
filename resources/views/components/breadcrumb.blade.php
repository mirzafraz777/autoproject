@props(['pageTitle'])

{{-- Breadcrumb --}}
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="{{ route('home') }}">Home</a>  / {{$pageTitle}}</span>
          <h3>{{$pageTitle}}</h3>
        </div>
      </div>
    </div>
  </div>
