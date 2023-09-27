@extends('layouts.owner-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'inventory',
    'elementName' => 'inventory-edit'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Inventory</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('owner/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('inventory.index') }}">Inventory</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('inventory.index') }}" class="btn btn-sm btn-neutral">Back To Inventory</a>
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
                        <h5 class="card-title text-uppercase text-muted mb-0">Update Product Inventory</h5>
                        <div class="row mt-5 mb-5">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <form method="post"  action="{{ route('owner.inventory.update', $inventory) }}" enctype="multipart/form-data" role="form">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group{{ $errors->has('category_name') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label" for="input-name">{{ __('Category Name') }}</label>
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" type="text" name="category_name" value="{{ old('category_name', $product->category_name) }}" readonly>
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Product Name') }}</label>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" type="text" value="{{ old('name', $product->name) }}" readonly>
                                    </div>
                                    <div class="form-group{{ $errors->has('quantity') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Quantity') }}</label>
                                        <input class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" placeholder="{{ __('') }}" type="text" value="{{ old('quantity', $inventory->quantity) }}" required autofocus>
                                    </div>
                                    <div class="text-center" id="updateInventory">
                                        <button type="submit" class="btn btn-primary btn-block my-5">{{ __('Update Inventory') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.admin-footer')
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