@extends('public.layouts.app')
@section('content')
<section class="breadcrumbs" style="margin:0px;padding:0px;">
<div class="container-fluid" style="background-color:#d9dbe9;">
    <div class="container">
        <div class="row" style="padding-horizontal:60px;padding-top:0px;padding-bottom:10px;">
            <div class="col-md-12">
                <h3 style="font-weight:bold;">Services</h3>
                <ol>
                    <li><a href="{{ route('public.home') }}">Home</a></li>
                    <li>Services</li>
                </ol>
            </div>
        </div>
    </div>
</div>
</section>
  <section class="booking title-left mb-5">
      <div class="container">
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
      </div>
    </section>
@endsection