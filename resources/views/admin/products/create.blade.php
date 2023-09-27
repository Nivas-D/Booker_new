@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'products',
    'elementName' => 'products-create'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Create Product</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('products.index') }}">Products</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-neutral">Back To Products</a>
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
                        <div class="row mt-5 mb-5">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <form role="form" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group{{ $errors->has('active') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Active') }}</label>
                                        <select class="form-control custom-select" id="active" name="active">
                                            <option value="yes" selected>Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="owner">Business Owner</label>
                                        <select class="form-control custom-select" id="owner" name="owner">
                                            @foreach($owners as $owner)
                                                <option value="{{ $owner->id }}">{{ ucwords($owner->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="category">Category</label>
                                        <select class="form-control custom-select" id="category" name="category">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label" for="input-name">{{ __('Product Name') }}</label>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                    </div>
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
                                        <textarea id="peoductCreateDescription" class="form-control" name="description">{!! old('description') !!}</textarea>
                                        <script> tinymce.init({ plugins: 'link', selector: '#peoductCreateDescription', promotion: false, branding: false, height: 250 }); </script>
                                    </div>
                                    <div class="form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Product Code') }}</label>
                                        <input class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" placeholder="{{ __('') }}" type="text" value="{{ old('code') }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('price_original') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Price Original (CHF)') }}</label>
                                        <input class="form-control{{ $errors->has('price_original') ? ' is-invalid' : '' }}" name="price_original" placeholder="{{ __('') }}" type="text" value="{{ old('price_original') }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('price_discounted') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Price Discounted (CHF)') }}</label>
                                        <input class="form-control{{ $errors->has('price_discounted') ? ' is-invalid' : '' }}" name="price_discounted" placeholder="{{ __('') }}" type="text" value="{{ old('price_discounted') }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('quantity') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Inventory') }}</label>
                                        <input class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" placeholder="{{ __('') }}" type="text" value="{{ old('quantity') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Select Image</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                    <div class="text-center" id="createCategory">
                                        <button type="submit" class="btn btn-primary btn-block my-5">{{ __('Create Product') }}</button>
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