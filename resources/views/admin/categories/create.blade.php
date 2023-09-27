@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'categories',
    'elementName' => 'categories-create'
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
                        <h6 class="h2 d-inline-block mb-0">Create New Category</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('categories.index') }}">Categories</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create New</li>
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
                                <form role="form" method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data" id="category_form">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-control-label" for="industry">Industry</label>
                                        <select class="form-control custom-select" id="industry" name="industry">
                                            <option value="">Select Industry</option>
                                            @foreach($industries as $industry)

                                                    <option value="{{ $industry->id }}">{{ ucwords($industry->name) }}</option>

                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group{{ $errors->has('category_name') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label" for="input-name">{{ __('Category Name') }}</label>
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                    </div>
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description English') }}</label>
                                        <textarea id="categoryCreateDescription" class="form-control" name="description" >{{ old('description') }}</textarea>
                                        <script> tinymce.init({ plugins: 'link', selector: '#categoryCreateDescription', promotion: false, branding: false, height: 250 }); </script>
                                    </div>

                                    <div class="form-group{{ $errors->has('description_german') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description German ') }}</label>
                                        <textarea id="categoryCreateDescription1" class="form-control" name="description_german" >{{ old('description') }}</textarea>
                                        <script> tinymce.init({ plugins: 'link', selector: '#categoryCreateDescription1', promotion: false, branding: false, height: 250 }); </script>
                                    </div>

                                    <div class="form-group{{ $errors->has('description_france') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description France ') }}</label>
                                        <textarea id="categoryCreateDescription" class="form-control" name="description_france" >{{ old('description') }}</textarea>
                                        <script> tinymce.init({ plugins: 'link', selector: '#categoryCreateDescription', promotion: false, branding: false, height: 250 }); </script>
                                    </div>

{{--
                                    <div class="form-group{{ $errors->has('category_code') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Category Code') }}</label>
                                        <input class="form-control{{ $errors->has('category_code') ? ' is-invalid' : '' }}" name="code" placeholder="{{ __('') }}" type="text" value="{{ old('code') }}" required>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="image">Select Image</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Status</label>
                                        <div class="toggle">
                                            <input type="checkbox" name = "status" checked/>
                                            <label></label>
                                        </div>
                                    </div>



                                    <div class="text-center" id="createCategory">
                                        <button type="submit" class="btn btn-primary btn-block my-5">{{ __('Create Category') }}</button>
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

@push('custom-scripts')

<script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<script src="{{ asset('admin') }}/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
<script src="{{ asset('admin') }}/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
<script src="{{ asset('admin') }}/vendor/quill/dist/quill.min.js"></script>


<script>
    $(document).ready(function() {



        $(document).find('#category_form').validate({


      rules:{
        'industry':
        {
          required:true,
        },


        'category_name':
        {
          required:true,
          validAge: true
        },

      },
      messages:{
        'industry':
        {
          'required':'Industry Name is Required.'
        },

        'category_name':
        {
          'required':'Category Name is Required.'
        },

      },
    });


    });
</script>


@endpush






