@extends('layouts.user-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard-alternative'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Dashboard</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user/dashboard') }}">Dashboard</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">Alternative</li> -->
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-gradient-primary border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Product Orders</h5>
                                <span class="h2 font-weight-bold mb-0 text-white">{{ $stats['productOrdersCount'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-gradient-info border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Service Bookings</h5>
                                <span class="h2 font-weight-bold mb-0 text-white">{{ $stats['serviceBookingsCount'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-gradient-danger border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Orders Amount</h5>
                                <span class="h2 font-weight-bold mb-0 text-white">{{ $stats['productOrdersAmount'] }} CHF</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-gradient-default border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Bookings Amount</h5>
                                <span class="h2 font-weight-bold mb-0 text-white">{{ $stats['serviceBookingsAmount'] }} CHF</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3"><h5 class="card-title text-uppercase text-muted mb-0">Latest Products</h5></div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3">
                    <a href="{{ route('user.products.show', $product) }}">
                    <div class="card ">
                        <img class="card-img-top" src="{{ asset($product->image) }}" alt="Product Image">
                        <div class="card-body text-center">
                            <h5 class="h4 card-title mb-0">{{ ucwords($product->name) }}</h5>
                            <h5 class="h5 card-title mb-0">
                                <span class="text-primary">{{ ucwords($product->price_discounted) }} CHF</span>
                                <span class="text-muted ml-2" style="text-decoration: line-through;">{{ ucwords($product->price_original) }} CHF</span>
                            </h5>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="mb-3"><h5 class="card-title text-uppercase text-muted mb-0">Latest Services</h5></div>
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-3">
                    <a href="{{ route('user.services.show', $service) }}">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset($service->image) }}" alt="Service Image">
                        <div class="card-body text-center">
                            <h5 class="h4 card-title mb-0">{{ ucwords($service->name) }}</h5>
                            <h5 class="h5 card-title mb-0">
                                <span class="text-primary">{{ ucwords($service->price_discounted) }} CHF</span>
                                <span class="text-muted ml-2" style="text-decoration: line-through;">{{ ucwords($service->price_original) }} CHF</span>
                            </h5>
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