@extends('layouts.user-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'services',
    'elementName' => 'services-show'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">View Service</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user.services.index') }}">Service</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View</li>
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
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row mt-4 mb-5">
                            <div class="col-md-6 text-center" >
                                <img src="{{ asset($service->image) }}" alt="Service image" style="box-shadow: 0px 0px 4px 4px rgba(0, 0, 0, 0.1);">
                            </div>
                            <div class="col-md-6">
                                <h2 class="card-title text-muted mb-0 mt-0">{{ $service->name }}</h2>
                                <p class="mt-0">{!! $service->description !!}</p>
                                <p class="mb-0 text-muted">Original Price: <span style="font-weight:550;">{{ ucwords($service->price_original) }} CHF</span></p>
                                <p class="mb-0 text-muted">Offer Price: <span style="font-weight:550;" class="text-primary">{{ ucwords($service->price_discounted) }} CHF</span></p>
                                <p class="mb-0 mt-0 text-muted">Industry: <span style="font-weight:550;">{{ ucwords($industry->name) }}</span></p>
                                <p class="mb-0 mt-0 text-muted">Code: <span style="font-weight:550;">{{ ucwords($service->code) }}</span></p>
                                <p class="mb-0 mt-0 text-muted">Duration: <span style="font-weight:550;">{{ $service->duration }} Hrs</span></p>
                                <hr>
                                <a href="{{ route('user.service.book', ['id' => $service->id] ) }}" class="btn btn-danger btn-md" style="padding-left:40px;padding-right:40px;">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
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