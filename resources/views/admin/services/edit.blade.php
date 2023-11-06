@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'services',
    'elementName' => 'services-edit'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Edit Service</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('services.index') }}">Services</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                                <form method="post"  action="{{ route('services.update', $service) }}" enctype="multipart/form-data" role="form">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group{{ $errors->has('active') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Active') }}</label>
                                        <select class="form-control custom-select" id="active" name="active">
                                            @if($service->active == 'yes')
                                                <option value="yes" selected>Yes</option>
                                                <option value="no">No</option>
                                            @elseif($service->active == 'no')
                                                <option value="yes">Yes</option>
                                                <option value="no" selected>No</option>
                                            @endif
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="form-control-label" for="owner">Business Owner</label>
                                        <select class="form-control custom-select" id="owner" name="owner">
                                            @foreach($owners as $owner)
                                                @if($owner->id == $service->owner_id)
                                                    <option value="{{ $owner->id }}" selected>{{ ucwords($owner->name) }}</option>
                                                @else
                                                    <option value="{{ $owner->id }}">{{ ucwords($owner->name) }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    <div class="form-group">
                                        <label class="form-control-label" for="industry">Industry</label>
                                        <select class="form-control custom-select" id="industry" name="industry">
                                            @foreach($industries as $industry)
                                                @if($industry->id == $service->industry_id)
                                                    <option value="{{ $industry->id }}" selected>{{ ucwords($industry->name) }}</option>
                                                @else
                                                    <option value="{{ $industry->id }}">{{ ucwords($industry->name) }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                     <div class="form-group">
                                        <label class="form-control-label" for="industry">Industry</label>
                                        <select class="form-control custom-select" id="industry" name="category">
                                            @foreach($categories as $industry)
                                                @if($industry->id == $service->category_id)
                                                    <option value="{{ $industry->id }}" selected>{{ ucwords($industry->name) }}</option>
                                                @else
                                                    <option value="{{ $industry->id }}">{{ ucwords($industry->name) }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label" for="input-name">{{ __('Service Name') }}</label>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" type="text" name="name" value="{{ old('name', ucwords($service->name)) }}" required autofocus>
                                    </div>
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
                                        <textarea id="serviceEditDescription" class="form-control" name="description">{!! old('description', $service->description) !!}</textarea>
                                        <script> tinymce.init({ plugins: 'link', selector: '#serviceEditDescription', promotion: false, branding: false, height: 250 }); </script>
                                    </div>
                                    <div class="form-group{{ $errors->has('description_german') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description German') }}</label>
                                        <textarea id="serviceEditDescription" class="form-control" name="description_german">{!! old('description_german', $service->description_german) !!}</textarea>
                                        <script> tinymce.init({ plugins: 'link', selector: '#serviceEditDescription', promotion: false, branding: false, height: 250 }); </script>
                                    </div>
                                    <div class="form-group{{ $errors->has('description_france') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description France') }}</label>
                                        <textarea id="serviceEditDescription" class="form-control" name="description_france">{!! old('description_france', $service->description_france) !!}</textarea>
                                        <script> tinymce.init({ plugins: 'link', selector: '#serviceEditDescription', promotion: false, branding: false, height: 250 }); </script>
                                    </div>
                                    {{-- <div class="form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Service Code') }}</label>
                                        <input class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" placeholder="{{ __('') }}" type="text" value="{{ old('code', $service->code) }}" required>
                                    </div> --}}
                                    <div class="form-group{{ $errors->has('price_original') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Price Original (CHF)') }}</label>
                                        <input class="form-control{{ $errors->has('price_original') ? ' is-invalid' : '' }}" name="price_original" placeholder="{{ __('') }}" type="text" value="{{ old('price_original', $service->price_original) }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('price_discounted') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Price Discounted (CHF)') }}</label>
                                        <input class="form-control{{ $errors->has('price_discounted') ? ' is-invalid' : '' }}" name="price_discounted" placeholder="{{ __('') }}" type="text" value="{{ old('price_discounted', $service->price_discounted) }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('duration') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Duration (In Hours)') }}</label>
                                        <input class="form-control{{ $errors->has('duration') ? ' is-invalid' : '' }}" name="duration" placeholder="{{ __('') }}" type="text" value="{{ old('duration', $service->duration) }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('cancellation_limit') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Canellation Limit(In Hours)') }}</label>
                                        <input class="form-control{{ $errors->has('cancellation_limit') ? ' is-invalid' : '' }}" name="cancellation_limit" placeholder="{{ __('') }}" type="text" value="{{ old('cancellation_limit', $service->cancellation_limit) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Current Image</label>
                                        <img src="{{ asset($service->image) }}" height="100" width="100" alt="Service Image" class="img-fluid">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Change Image</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                    <div class="text-center" id="editService">
                                        <button type="submit" class="btn btn-primary btn-block my-5">{{ __('Submit') }}</button>
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
