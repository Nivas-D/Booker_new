@extends('public.layouts.app')
@section('content')
<section class="breadcrumbs" style="margin:0px;padding:0px;">
<div class="container-fluid" style="background-color:#d9dbe9;">
    <div class="container">
        <div class="row" style="padding-horizontal:60px;padding-top:0px;padding-bottom:10px;">
            <div class="col-md-12">
                <h3 style="font-weight:bold;">Categories</h3>
                <ol>
                    <li><a href="{{ route('public.home') }}">Home</a></li>
                    <li>Categories</li>
                </ol>
            </div>
        </div>
    </div>
</div>
</section>
    <section class="booking title-left mb-5">
      <div class="container">
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
      </div>
    </section>
@endsection