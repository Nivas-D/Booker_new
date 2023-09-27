@extends('layouts.user-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'products',
    'elementName' => 'products-index'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Products</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
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
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card ">
                        <img class="card-img-top" src="{{ asset($product->image) }}" alt="Product Image">
                        <div class="card-body text-center">
                            <h5 class="h3 card-title mb-0">{{ ucwords($product->name) }}</h5>
                            <h5 class="h5 card-title mb-0">
                                <span class="text-primary">{{ ucwords($product->price_discounted) }} CHF</span>
                                <span class="text-muted ml-2" style="text-decoration: line-through;">{{ ucwords($product->price_original) }} CHF</span>
                            </h5>
                            <div class="d-flex flex-row justify-content-center mt-2">
                                <div class="mr-2">
                                    <a href="{{ route('user.products.show', $product) }}" class="btn btn-sm btn-primary" style="padding-right:35px;padding-left:35px;">View</a>
                                </div>
                                <div class="">
                                    @if($product->quantity)
                                        <a href="{{ route('user.product.buy', ['id' => $product->id] ) }}" class="btn btn-sm btn-danger" style="padding-right:23px;padding-left:23px;">Buy Now</a>
                                    @else
                                        <button type="button" class="btn btn-danger btn-sm" style="padding-left:23px;padding-right:23px;cursor:pointer;" disabled>Buy Now</button>
                                    @endif
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