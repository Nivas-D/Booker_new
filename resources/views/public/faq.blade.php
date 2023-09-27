@extends('public.layouts.app')
@section('content')
    <section class="breadcrumbs" style="margin:0px;padding:0px;">
        <div class="container-fluid" style="background-color:#d9dbe9;">
            <div class="container">
                <div class="row" style="padding-horizontal:60px;padding-top:0px;padding-bottom:10px;">
                    <div class="col-md-12">
                        <h3 style="font-weight:bold;">About</h3>
                        <ol>
                            <li><a href="{{ route('public.home') }}">Home</a></li>
                            <li>About</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="support" class="support" style="margin:0px;padding:50px;">
      <!-- <div class="container" data-aos="fade-up"> -->
      <div class="container">
        <div class="row no-gutters">
          <div class="col-sm-12 col-md-7 support_hover">
            <img src="{{ asset('front/img/confetti.png') }}" class="img_bg" />
            <img src="{{ asset('front/img/support-1.png') }}" class="img_1" />
            <img src="{{ asset('front/img/support-2.png') }}" class="img_2" />
            <img src="{{ asset('front/img/support-3.png') }}" class="img_3" />
          </div>
          <div class="col-sm-12 col-md-5">
            <h2>
              <span>
                <span>Enjoy Your Best Life By Booking at your</span>
                <br>
                <span>Fingertip</span>
              </span>
            </h2>
            <p class="mt-5">
              <span>
                Some booker description text booker description text  booker description text booker description text 
                booker description text booker description text booker description text booker description text 
                booker description text booker description text booker description text booker description text 
              </span>
            </p>
            <a href="{{ route('public.services') }}" class="btn btn-primary float-left" style="margin-top:50px;">Book Services Now</span></a>
          </div>
        </div>
      </div>
    </section>
    <section id="features" class="features" style="margin-top:40px;">
      <!-- <div class="container" data-aos="fade-up"> -->
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
    <section id="services" class="services" style="background-color:#F7F7FC;">
      <!-- <div class="container" data-aos="fade-up"> -->
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
              <h4>Benefit 1</h4>
              <p>Booker benefit 3 description booker benefit description booker benefit description 
              booker benefit description booker benefit description booker benefit description
              booker benefit description booker benefit description booker benefit description
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection