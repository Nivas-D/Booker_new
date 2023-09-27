@extends('public.layouts.app')
@section('content')
  <main id="main">
    <div style="background-color: coral;padding-top:50px;">
    <section id="about" class="about" style="background-image: url('{{ asset('images/booking.png') }}');">
      <div class="container mt-5" data-aos="fade-up">
        <div class="row">
          <div class="col-md-8 col-sm-12 content">
            <h3 class="text-primary">Booker Welcomes You</h3>
            <p>On Booker platform we provide various useful & high quality products and services/courses spread across several categories and industries</p>
            <div style="margin-top:70px;">
              <a href="{{ route('public.about') }}" class="btn btn-primary scrollto">Know More</a>
              <a href="{{ route('register') }}" class="btn btn-primary scrollto">Create Booker Account</a>
            </div>
            <div style="padding-bottom:100px;"></div>
          </div>
        </div>
      </div>
    </section>
    </div>
    <section class="booking title-left" style="padding-bottom:50px;">
      <!-- <div class="container" data-aos="fade-up"> -->
      <div class="container">
        <div class="section-title"><p>Products</p></div>
        <?php /* <div class="row domains-container" data-aos="fade-up" data-aos-delay="200"> */ ?>
        <div class="row">
          @foreach($products as $product)
            <div class="col-lg-4 col-md-6 col-sm-12" data-aos="zoom-in" data-aos-delay="100">
                <div class="pack-box">
                  <div class="text-center">
                    <img src="{{ $product->image; }}" class="img-fluid text-center" alt="Product Image" style="box-shadow: 0px 0px 4px 4px rgba(0, 0, 0, 0.1);">
                    <div class="text-center">
                      <h3 style="font-weight:bold;">{{ ucwords($product->name) }}</h3>
                    </div>
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-4" style="margin-right:0px;padding-right:0px;">
                        <h5 style="font-size:16px;color:#610BEF;">{{ $product->price_discounted }} CHF</></h5>
                      </div>
                      <div class="col-md-4" style="margin:0px;padding:0px;">
                        <h5 style="font-size:16px;text-decoration:line-through;color:#6c757d;">{{ $product->price_original }} CHF</></h5>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <a href="#" class="btn btn-sm btn-primary btn-block" style="padding-right:35px;padding-left:35px;">View</a>
                      </div>
                      <div class="col-md-6">
                        <a href="#" class="btn btn-sm btn-danger btn-block" style="padding-right:23px;padding-left:23px;">Buy Now</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          @endforeach
        </div>
        <?php /* <a href="#" class="btn btn-secondary float-right">See All</a> */ ?>
        <div class="text-center"><a href="{{ route('public.products') }}" class="btn btn-secondary text-center">See All Products</a></div>
      </div>
    </section>
    <section class="booking title-left" style="background-color:#F7F7FC;padding-bottom:50px;">
      <?php /* <div class="container" data-aos="fade-up"> */ ?>
      <div class="container">
        <div class="section-title"><p>Services / Courses</p></div>
        <?php /* <div class="row domains-container" data-aos="fade-up" data-aos-delay="200"> */ ?>
        <div class="row">
          @foreach($services as $service)
            <div class="col-lg-4 col-md-6 col-sm-12" data-aos="zoom-in" data-aos-delay="100">
                <div class="pack-box">
                  <div class="text-center">
                    <img src="{{ $service->image; }}" class="img-fluid text-center" alt="Rervice Image" style="box-shadow: 0px 0px 4px 4px rgba(0, 0, 0, 0.1);">
                    <div class="text-center">
                      <h3 style="font-weight:bold;">{{ ucwords($service->name) }}</h3>
                    </div>
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-4" style="margin-right:0px;padding-right:0px;">
                        <h5 style="font-size:16px;color:#610BEF;">{{ $service->price_discounted }} CHF</></h5>
                      </div>
                      <div class="col-md-4" style="margin:0px;padding:0px;">
                        <h5 style="font-size:16px;text-decoration:line-through;color:#6c757d;">{{ $service->price_original }} CHF</></h5>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <a href="#" class="btn btn-sm btn-primary btn-block" style="padding-right:35px;padding-left:35px;">View</a>
                      </div>
                      <div class="col-md-6">
                        <a href="#" class="btn btn-sm btn-danger btn-block" style="padding-right:23px;padding-left:23px;">Buy Now</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          @endforeach
        </div>
        <div class="text-center"><a href="{{ route('public.services') }}" class="btn btn-secondary text-center">See All Services</a></div>
      </div>
    </section>
    <section class="booking title-left" style="padding-bottom:50px;">
      <?php /* <div class="container" data-aos="fade-up"> */ ?>
      <div class="container">
        <div class="section-title"><p>Categories</p></div>
        <div class="row">
          @foreach($categories as $category)
            <div class="col-lg-4 col-md-6 col-sm-12" data-aos="zoom-in" data-aos-delay="100">
                <div class="pack-box">
                  <div class="text-center">
                    <img src="{{ $category->image; }}" class="img-fluid text-center" alt="Category Image" style="box-shadow: 0px 0px 4px 4px rgba(0, 0, 0, 0.1);">
                    <div class="d-flex justify-content-between" style="margin-top:15px;">
                      <div class="p-2">
                          <h3 style="font-weight:bold;">{{ $category->name; }}</h3>
                      </div>
                      <div class="p-2">
                        <a class="pd-default btn btn-fixed text-white" style="margin-top:20px;">0</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          @endforeach
        </div>
        <div class="text-center"><a href="{{ route('public.categories') }}" class="btn btn-secondary text-center">See All Categories</a></div>
      </div>
    </section>
    <section class="booking title-left" style="background-color:#F7F7FC;padding-bottom:50px;">
      <?php /* <div class="container" data-aos="fade-up"> */ ?>
      <div class="container">
        <div class="section-title"><p>Industries</p></div>
        <?php /* <div class="row domains-container" data-aos="fade-up" data-aos-delay="200"> */ ?>
        <div class="row">
          @foreach($industries as $industry)
            <div class="col-lg-4 col-md-6 col-sm-12" data-aos="zoom-in" data-aos-delay="100">
                <div class="pack-box">
                  <div class="text-center">
                    <img src="{{ $industry->image; }}" class="img-fluid text-center" alt="Industry Image" style="box-shadow: 0px 0px 4px 4px rgba(0, 0, 0, 0.1);">
                    <div class="d-flex justify-content-between" style="margin-top:15px;">
                      <div class="p-2">
                          <h3 style="font-weight:bold;">{{ $industry->name; }}</h3>
                      </div>
                      <div class="p-2">
                        <a class="pd-default btn btn-fixed text-white" style="margin-top:20px;">0</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          @endforeach
        </div>
        <div class="text-center"><a href="{{ route('public.industries') }}" class="btn btn-secondary text-center">See All Industries</a></div>
      </div>
    </section>
    <section id="prices" class="prices">
      <?php /* <div class="container" data-aos="fade-up"> */ ?>
      <div class="container">
        <div class="section-title"><p>Subscription Plans for Business Owners</p></div>
        <div class="row">
          @foreach($plans as $row)
            <div class="col col-xs-12 col-sm-12 col-md-4">
              <div class="icon-box">
                <h6>{{ $row->name }}</h6>
                <h4><sup>chf</sup>{{ $row->price }}<sub>/mois</sub></h4>
                <?php $features = explode(',', $row->features); ?>
                <ul>
                  @foreach($features as $feature)
                    <li>{{ $feature }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    <section id="services" class="services" style="background-color:#F7F7FC;">
      <?php /* <div class="container" data-aos="fade-up"> */ ?>
      <div class="container">
        <div class="section-title"><p>Booker Platform Benefits</p></div>
        <div class="row">
          <?php /* <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100"> */ ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <h4>Benefit 1</h4>
              <p>Booker benefit 1 description booker benefit 1 description booker benefit 1 description 
              booker benefit 1 description booker benefit 1 description booker benefit 1 description
              booker benefit 1 description booker benefit 1 description booker benefit 1 description
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
            data-aos-delay="200">
            <div class="icon-box">
              <h4>Benefit 2</h4>
              <p>Booker benefit 2 description booker benefit description booker benefit description 
              booker benefit description booker benefit description booker benefit description
              booker benefit description booker benefit description booker benefit description
              </p>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
            data-aos-delay="200">
            <div class="icon-box">
              <h4>Benefit 3</h4>
              <p>Booker benefit 3 description booker benefit description booker benefit description 
              booker benefit description booker benefit description booker benefit description
              booker benefit description booker benefit description booker benefit description
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="features" class="features" style="margin-top:30px;">
      <?php /* <div class="container" data-aos="fade-up"> */ ?>
      <div class="container">
        <div class="section-title"><p>Unique Features</p></div>
        <div class="row">
          <?php /* <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100"> */ ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4>Feature 1</h4>
              <p>
                Feature 1 description feature description feature description feature description feature description
                feature description feature description feature description feature description feature description
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
            data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4>Feature 2</h4>
              <p>
                Feature 2 description feature description feature description feature description feature description
                feature description feature description feature description feature description feature description
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
            data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4>Feature 3</h4>
              <p>
                Feature 3 description feature description feature description feature description feature description
                feature description feature description feature description feature description feature description
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="testimonials" class="testimonials" style="background-color:#F7F7FC;">
      <div class="container">
      <div class="section-title"><p>Customer Testimonials</p></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 d-flex">
            <img src="{{ asset('front/img/test-1.png') }}" class="left-side">
            <div class="carousel slide mt-0" data-ride="carousel" id="quote-carousel">
              <div class="carousel-inner text-center">
                <div class="item active">
                  <blockquote>
                    <div class="row">
                      <div class="col-sm-12 d-flex">
                        <div class="comments">
                          <h4>I have been using the service for a while now and i can say it the best you can have for
                            your booking</h4>
                          <small>Mark Johnson</small>
                        </div>
                      </div>
                    </div>
                  </blockquote>
                </div>
                <div class="item">
                  <blockquote>
                    <div class="row">
                      <div class="col-sm-12 d-flex">
                        <div class="comments">
                          <h4>I have been using the service for a while now and i can say it the best you can have for
                            your booking</h4>
                          <small>Hari Anand</small>
                        </div>
                      </div>
                    </div>
                  </blockquote>
                </div>
                <div class="item">
                  <blockquote>
                    <div class="row">
                      <div class="col-sm-12 d-flex">
                        <div class="comments">
                          <div style="padding-bottom:10px;">
                            <h4>I have been using the service for a while now and i can say it the best you can have for
                              your booking</h4>
                            <small>Olivia Morris</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </blockquote>
                </div>
              </div>
              <div class="carousel-slide">
                <ol class="carousel-indicators">
                  <li data-target="#quote-carousel" data-slide-to="0" class="active"><img class="img-responsive "
                      src="{{ asset('front/img/test-mini-1.png') }}" alt="">
                  </li>
                  <li data-target="#quote-carousel" data-slide-to="1"><img class="img-responsive"
                      src="{{ asset('front/img/test-mini-2.png') }}" alt="">
                  </li>
                  <li data-target="#quote-carousel" data-slide-to="2"><img class="img-responsive"
                      src="{{ asset('front/img/test-mini-3.png') }}" alt="">
                  </li>
                </ol>
              </div>
              <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i
                  class="fa fa-arrow-left"></i></a>
              <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i
                  class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection