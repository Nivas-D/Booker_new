@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'services',
    'elementName' => 'services-create'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Create Service</h6>
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
                        <a href="{{ route('services.index') }}" class="btn btn-sm btn-neutral">Back To Services</a>
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
                                <form role="form" method="POST" id = "service_form" action="{{ route('services.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group{{ $errors->has('active') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Active') }}</label>
                                        <select class="form-control custom-select" id="active" name="active">
                                            <option value="yes" selected>Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="form-control-label" for="owner">Business Owner</label>
                                        <select class="form-control custom-select" id="owner" name="owner">
                                            @foreach($owners as $owner)
                                                <option value="{{ $owner->id }}">{{ ucwords($owner->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    <div class="form-group">
                                        <label class="form-control-label" for="industry">Industry</label>
                                        <select class="form-control custom-select" id="industry" name="industry">
                                            @foreach($industries as $industry)
                                                <option value="{{ $industry->id }}">{{ ucwords($industry->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label" for="input-name">{{ __('Service Name') }}</label>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                    </div>
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
                                        <textarea id="serviceCreateDescription" class="form-control" name="description">{!! old('description') !!}</textarea>
                                        <script> tinymce.init({ plugins: 'link', selector: '#serviceCreateDescription', promotion: false, branding: false, height: 250 }); </script>
                                    </div>
                                    <div class="form-group{{ $errors->has('description_german') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description German') }}</label>
                                        <textarea id="serviceCreateDescription" class="form-control" name="description_german">{!! old('description') !!}</textarea>
                                        <script> tinymce.init({ plugins: 'link', selector: '#serviceCreateDescription', promotion: false, branding: false, height: 250 }); </script>
                                    </div>
                                    <div class="form-group{{ $errors->has('description_france') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description France') }}</label>
                                        <textarea id="serviceCreateDescription" class="form-control" name="description_france">{!! old('description_france') !!}</textarea>
                                        <script> tinymce.init({ plugins: 'link', selector: '#serviceCreateDescription', promotion: false, branding: false, height: 250 }); </script>
                                    </div>
                                    {{-- <div class="form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Service Code') }}</label>
                                        <input class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" placeholder="{{ __('') }}" type="text" value="{{ old('code') }}" required>
                                    </div> --}}
                                    <div class="form-group{{ $errors->has('price_original') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Price Original (CHF)') }}</label>
                                        <input class="form-control{{ $errors->has('price_original') ? ' is-invalid' : '' }}" name="price_original" placeholder="{{ __('') }}" type="text" value="{{ old('price_original') }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('price_discounted') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Price Discounted (CHF)') }}</label>
                                        <input class="form-control{{ $errors->has('price_discounted') ? ' is-invalid' : '' }}" name="price_discounted" placeholder="{{ __('') }}" type="text" value="{{ old('price_discounted') }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('duration') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Duration (In Hours)') }}</label>
                                        <input class="form-control{{ $errors->has('duration') ? ' is-invalid' : '' }}" name="duration" placeholder="{{ __('') }}" type="text" value="{{ old('duration') }}" required>
                                    </div>

                                    <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Location') }}</label>
                                        <input class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" placeholder="{{ __('') }}" type="text" value="{{ old('location') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Select Image</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                    <div class="text-center" id="createService">
                                        <button type="submit" class="btn btn-primary btn-block my-5">{{ __('Create Service') }}</button>
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
@push('custom-scripts')

<script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<script src="{{ asset('admin') }}/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
<script src="{{ asset('admin') }}/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
<script src="{{ asset('admin') }}/vendor/quill/dist/quill.min.js"></script>


<script>
    $(document).ready(function() {



        $(document).find('#service_form').validate({


      rules:{
        'name':
        {
          required:true,
        },


        'description':
        {
          required:true,

        },

      },
      messages:{
        'name':
        {
          'required':'Service Name is required.'
        },

        'description':
        {
          'required':'Description  is required.'
        },

      },
    });


    });
</script>


@endpush
