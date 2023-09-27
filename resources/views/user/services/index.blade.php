@extends('layouts.user-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'services',
    'elementName' => 'services-index'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Services</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Services</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        @if(Session::has('error'))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ Session::get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @elseif(Session::has('success'))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-4">
                    <div class="card ">
                        <img class="card-img-top" src="{{ asset($service->image) }}" alt="Product Image">
                        <div class="card-body text-center">
                            <h5 class="h3 card-title mb-0">{{ ucwords($service->name) }}</h5>
                            <h5 class="h5 card-title mb-0">
                                <span class="text-primary">{{ ucwords($service->price_discounted) }} CHF</span>
                                <span class="text-muted ml-2" style="text-decoration: line-through;">{{ ucwords($service->price_original) }} CHF</span>
                            </h5>
                            <div class="d-flex flex-row justify-content-center mt-2">
                                <div class="mr-2">
                                    <a href="{{ route('user.services.show', $service) }}" class="btn btn-sm btn-primary" style="padding-right:35px;padding-left:35px;">View</a>
                                </div>
                                <div class="">
                                    <a href="{{ route('user.service.book', ['id' => $service->id] ) }}" class="btn btn-sm btn-danger" style="padding-right:23px;padding-left:23px;">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @include('layouts.footers.user-footer')
    </div>
@endsection
@push('js')
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('admin') }}/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('admin') }}/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
@endpush