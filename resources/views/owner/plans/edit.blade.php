@extends('layouts.owner-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'plans',
    'elementName' => 'plans-edit'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Edit Plan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('owner/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('plans.index') }}">Plans</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('plans.index') }}" class="btn btn-sm btn-neutral">Back To Plans</a>
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
                                <form method="post"  action="{{ route('plans.update', $plan) }}" enctype="multipart/form-data" role="form">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label" for="input-name">{{ __('Plan Name') }}</label>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" type="text" name="name" value="{{ old('name', $plan->name) }}" required autofocus>
                                    </div>
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
                                        <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" type="text" name="description" value="{{ old('description', $plan->description) }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Price') }}</label>
                                        <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="code" placeholder="{{ __('') }}" type="text" value="{{ old('price', $plan->price) }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('features') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Features (Comma separated list)') }}</label>
                                        <input class="form-control{{ $errors->has('features') ? ' is-invalid' : '' }}" name="features" placeholder="{{ __('') }}" type="text" value="{{ old('features', $plan->features) }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('frequency') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Frequency (Monthly / Yearly)') }}</label>
                                        <input class="form-control{{ $errors->has('frequency') ? ' is-invalid' : '' }}" name="frequency" placeholder="{{ __('') }}" type="text" value="{{ old('frequency', $plan->frequency) }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('trial_period') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Trial Period (Days)') }}</label>
                                        <input class="form-control{{ $errors->has('trial_period') ? ' is-invalid' : '' }}" name="trial_period" placeholder="{{ __('') }}" type="text" value="{{ old('trial_period', $plan->trial_period) }}" required>
                                    </div>
                                    <div class="text-center" id="editPlan">
                                        <button type="submit" class="btn btn-primary btn-block my-5">{{ __('Edit Plan') }}</button>
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