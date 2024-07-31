@extends('layout.main')


@section('content')


<div class="main-banner">
    <div class="owl-carousel owl-banner">
      <div class="item item-1">
        <div class="header-text">
          <span class="category">Toronto, <em>Canada</em></span>
          <h2>Hurry!<br>Get the Best Villa for you</h2>
        </div>
      </div>
      <div class="item item-2">
        <div class="header-text">
          <span class="category">Melbourne, <em>Australia</em></span>
          <h2>Be Quick!<br>Get the best villa in town</h2>
        </div>
      </div>
      <div class="item item-3">
        <div class="header-text">
          <span class="category">Miami, <em>South Florida</em></span>
          <h2>Act Now!<br>Get the highest level penthouse</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="properties section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Properties</h6>
            <h2>We Provide The Best Property You Like</h2>
          </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($packages as  $package)
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
  </div>


  <div class="featured section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image">
            <img src="{{ ( $featured_package->image ? asset('storage/images/'.$featured_package->image): asset('storage/images/package_default.png') ) }}" alt="">
            <a href="property-details.html"><img src="{{ asset('frontend/assets/images/featured-icon.png') }}" alt=""
                style="max-width: 60px; padding: 0px;"></a>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h6>| Featured</h6>
            <h2 class="pb-3">{{ $featured_package->name }}</h2>
            <div class="icon-button pt-3">
              <a href="{{route('buy-package',$featured_package->id)}}"><i class="fa fa-cart-shopping"></i> Buy Now</a>
            </div>

          </div>
          {{-- <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                  aria-expanded="true" aria-controls="collapseOne">
                  Best useful links ?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Get <strong>the best villa</strong> website template in HTML CSS and Bootstrap for your business.
                  TemplateMo provides you the <a href="https://www.google.com/search?q=best+free+css+templates"
                    target="_blank">best free CSS templates</a> in the world. Please tell your friends about it.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  How does this work ?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor
                  incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut
                  labore et dolore magna aliqua.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Why is Villa Agency the best ?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor
                  incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut
                  labore et dolore magna aliqua.
                </div>
              </div>
            </div>
          </div> --}}
        </div>
        <div class="col-lg-3">
          <div class="info-table">
            <ul>
              <li>
                <img src="{{ asset('frontend/assets/images/info-icon-01.png') }}" alt="" style="max-width: 52px;">
                <h4>{{'$'.$featured_package->price}}<br><span>Price</span></h4>
              </li>
              <li>
                <img src="{{ asset('frontend/assets/images/info-icon-02.png') }}" alt="" style="max-width: 52px;">
                <h4>{{$featured_package->category->category_name}}<br><span>Category</span></h4>
              </li>
              <li>
                <img src="{{ asset('frontend/assets/images/info-icon-03.png') }}" alt="" style="max-width: 52px;">
                <h4>{{$featured_package->no_of_days.' Days'}}<br><span>Bonus Interval</span></h4>
              </li>
              <li>
                <img src="{{ asset('frontend/assets/images/info-icon-04.png') }}" alt="" style="max-width: 52px;">
                <h4>{{$featured_package->counter}}<br><span>Buying Times</span></h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="video section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Video View</h6>
            <h2>Get Closer View & Different Feeling</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="video-frame">
            <img src="{{ asset('frontend/assets/images/video-frame.jpg') }}" alt="">
            <a href="https://youtube.com" target="_blank"><i class="fa fa-play"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div> -->



  <div class="section best-deal">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="section-heading">
            <h6>| Best Deal</h6>
            <h2>Find Your Best Deal Right Now!</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab"
                      data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment"
                      aria-selected="true">Appartment</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button"
                      role="tab" aria-controls="villa" aria-selected="false">Villa House</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab" data-bs-target="#penthouse"
                      type="button" role="tab" aria-controls="penthouse" aria-selected="false">Penthouse</button>
                  </li>
                </ul>
              </div>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
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
                      <img src="{{ asset('frontend/assets/images/deal-01.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Extra Info About Property</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut
                        labore et dolore magna aliqua quised ipsum suspendisse.
                        <br><br>When you need free CSS templates, you can simply type TemplateMo in any search engine
                        website. In addition, you can type TemplateMo Portfolio, TemplateMo One Page Layouts, etc.
                      </p>
                      <div class="icon-button">
                        <a href="{{route('buy-package',$package->id)}}"><i class="fa fa-cart-shopping"></i> Buy Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Flat Space <span>250 m2</span></li>
                          <li>Floor number <span>26th</span></li>
                          <li>Number of rooms <span>5</span></li>
                          <li>Parking Available <span>Yes</span></li>
                          <li>Payment Process <span>Bank</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="{{ asset('frontend/assets/images/deal-02.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Detail Info About Villa</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut
                        labore et dolore magna aliqua quised ipsum suspendisse. <br><br>Swag fanny pack lyft blog twee.
                        JOMO ethical copper mug, succulents typewriter shaman DIY kitsch twee taiyaki fixie hella venmo
                        after messenger poutine next level humblebrag swag franzen.</p>
                      <div class="icon-button">
                        <a href="{{route('buy-package',$package->id)}}"><i class="fa fa-cart-shopping"></i> Buy Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="penthouse" role="tabpanel" aria-labelledby="penthouse-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Flat Space <span>320 m2</span></li>
                          <li>Floor number <span>34th</span></li>
                          <li>Number of rooms <span>6</span></li>
                          <li>Parking Available <span>Yes</span></li>
                          <li>Payment Process <span>Bank</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="{{ asset('frontend/assets/images/deal-03.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Extra Info About Penthouse</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut
                        labore et dolore magna aliqua quised ipsum suspendisse. <br><br>Swag fanny pack lyft blog twee.
                        JOMO ethical copper mug, succulents typewriter shaman DIY kitsch twee taiyaki fixie hella venmo
                        after messenger poutine next level humblebrag swag franzen.</p>
                      <div class="icon-button">
                        <a href="{{route('buy-package',$package->id)}}"><i class="fa fa-cart-shopping"></i> Buy Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Valued Customers</h6>
            <!-- <h2>We Provide The Best Property You Like</h2> -->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="34" data-speed="1000"></h2>
                  <p class="count-text ">Buildings<br>Finished Now</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="12" data-speed="1000"></h2>
                  <p class="count-text ">Years<br>Experience</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2>
                  <p class="count-text ">Awwards<br>Won 2023</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Contact Us</h6>
            <h2>Get In Touch With Our Agents</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div id="map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth"
              width="100%" height="500px" frameborder="0"
              style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);"
              allowfullscreen=""></iframe>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="item phone">
                <img src="{{ asset('frontend/assets/images/phone-icon.png') }}" alt="" style="max-width: 52px;">
                <h6>010-020-0340<br><span>Phone Number</span></h6>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item email">
                <img src="{{ asset('frontend/assets/images/email-icon.png') }}" alt="" style="max-width: 52px;">
                <h6>info@villa.co<br><span>Business Email</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <x-alert />
          <form id="contact-form" action="{{ route('contactSubmit') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <label for="name">Full Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}"  placeholder="Your Name...">
                    @error('name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror
              </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Email Address</label>
                  <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail...">
                  @error('email')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="subject">Subject</label>
                  <input type="text" name="subject" value="{{ old('subject') }}" class="form-control @error('subject') is-invalid @enderror" id="subject" placeholder="Subject..." autocomplete="on">
                  @error('subject')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="message">Message</label>
                  <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" placeholder="Your Message">{{ old('message') }}</textarea>
                  @error('message')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection
