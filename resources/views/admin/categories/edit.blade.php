@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'categories',
    'elementName' => 'categories-edit'
])
@push('css')

<?php /* <link rel="stylesheet" href="{{ asset('admin') }}/vendor/select2/dist/css/select2.min.css"> */ ?>
<link rel="stylesheet" href="{{ asset('admin') }}/vendor/quill/dist/quill.core.css">
<style>
    .toggle {
  position: relative;
  box-sizing: border-box;
}
.toggle input[type="checkbox"] {
  position: absolute;
  left: 0;
  top: 0;
  z-index: 10;
  width: 100%;
  height: 100%;
  cursor: pointer;
  opacity: 0;
}
.toggle label {
  position: relative;
  display: flex;
  align-items: center;
  box-sizing: border-box;
}
.toggle label:before {
  content: '';
  width: 75px;
  height: 42px;
  background: #ccc;
  position: relative;
  display: inline-block;
  border-radius: 46px;
  box-sizing: border-box;
  transition: 0.2s ease-in;
}
.toggle label:after {
  content: '';
  position: absolute;
  width: 38px;
  height: 38px;
  border-radius: 50%;
  left: 2px;
  top: 2px;
  z-index: 2;
  background: #fff;
  box-sizing: border-box;
  transition: 0.2s ease-in;
}
.toggle input[type="checkbox"]:checked + label:before {
  background: #4BD865;
}
.toggle input[type="checkbox"]:checked + label:after {
  left: 35px;
}
    </style>
    @endpush
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Edit Category</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('categories.index') }}">Categories</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-neutral">Back To Categories</a>
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
                                <form method="post"  action="{{ route('categories.update', $category) }}" enctype="multipart/form-data" role="form">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group{{ $errors->has('category_name') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label" for="input-name">{{ __('Category Name') }}</label>
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" type="text" name="name" value="{{ old('name', $category->name) }}" required autofocus>
                                    </div>
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
                                        <textarea id="categoryEditDescription" class="form-control" name="description">{!! old('description', $category->description) !!}</textarea>
                                        <script> tinymce.init({ plugins: 'link', selector: '#categoryEditDescription', promotion: false, branding: false, height: 250 }); </script>
                                    </div>

                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description German') }}</label>
                                        <textarea id="categoryEditDescription" class="form-control" name="description_german">{!! old('description', $category->description_german) !!}</textarea>
                                        <script> tinymce.init({ plugins: 'link', selector: '#categoryEditDescription', promotion: false, branding: false, height: 250 }); </script>
                                    </div>

                                    <div class="form-group{{ $errors->has('description_france') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description France') }}</label>
                                        <textarea id="categoryEditDescription" class="form-control" name="description_france">{!! old('description', $category->description_france) !!}</textarea>
                                        <script> tinymce.init({ plugins: 'link', selector: '#categoryEditDescription', promotion: false, branding: false, height: 250 }); </script>
                                    </div>


                                    <div class="form-group">
                                        <label for="image">Current Image</label>
                                        <img src="{{ asset($category->image) }}" height="100" width="100" alt="Category Image" class="img-fluid">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Change Image</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Status</label>
                                        <div class="toggle">
                                            <input type="checkbox" name = "status" {{( $category->status == '1') ? 'Checked' : ''}}>
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="text-center" id="createCategory">
                                        <button type="submit" class="btn btn-primary btn-block my-5">{{ __('Edit Category') }}</button>
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
