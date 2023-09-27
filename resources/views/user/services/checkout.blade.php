@extends('layouts.user-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'services',
    'elementName' => 'services-checkout'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Book Service</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user.services.index') }}">Services</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('user.services.index') }}" class="btn btn-sm btn-neutral">Back To Services</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('user.service.checkout') }}" method="POST">
                <div class="card rounded-3 mb-4">
                    <div class="card-body p-4">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <img src="{{ asset($service->image) }}" class="img-fluid rounded-3" alt="Service Image">
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                                <p class="lead fw-normal mb--1">{{ $service->name }}</p>
                                <p class="mb--1"><span class="text-muted">Industry: </span>{{ $service->industry_name }}</p>
                                <p><span class="text-muted">Duration: </span>{{ $service->duration }} Hrs</p>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h5 class="mb-0">{{ $service->price_discounted }} CHF</h5>
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                <a href="#" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card rounded-3 mb-4">
                    <div class="card-body p-4">
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <p><span class="text-muted">Payment Details: </span><br>Online</p>
                            </div>
                            <div class="col-md-8 col-lg-8 col-xl-8">
                               <input name="serviceId" value="{{ $service->id }}" type="hidden">
                               <input name="payment_method" value="online" type="hidden">
                               @csrf
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card rounded-3 mb-4">
                    <div class="card-body p-4">
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-12 col-lg-12 col-xl-12 text-center">
                                <input type="submit" class="btn btn-primary" value="Finalise Booking" />
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        @include('layouts.footers.user-footer')
    </div>
@endsection
@push('css')
    <?php /* <link rel="stylesheet" href="{{ asset('admin') }}/vendor/select2/dist/css/select2.min.css"> */ ?>
    <link rel="stylesheet" href="{{ asset('admin') }}/vendor/quill/dist/quill.core.css"> 
@endpush 
@push('js')
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('admin') }}/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('admin') }}/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src="{{ asset('admin') }}/vendor/quill/dist/quill.min.js"></script>
@endpush