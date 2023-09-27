@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'freelancers',
    'elementName' => 'freelancers-edit'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Edit Freelancer</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('freelancers.index') }}">Freelancers</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('freelancers.index') }}" class="btn btn-sm btn-neutral">Back To Freelancers</a>
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
                                <form method="post"  action="{{ route('freelancers.update', $freelancer) }}" enctype="multipart/form-data" role="form">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" type="text" name="name" value="{{ old('name', $freelancer->name) }}" required autofocus>
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('email') }}</label>
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" type="email" name="email" value="{{ old('email', $freelancer->email) }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Phone') }}</label>
                                        <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="{{ __('') }}" type="text" value="{{ old('code', $freelancer->phone) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="gender">Gender</label>
                                        <select class="form-control custom-select" id="gender" name="gender">
                                            @if ($freelancer->gender === "male")
                                                <option value="male" selected>Male</option>
                                                <option value="female">Female</option>
                                            @elseif ($freelancer->gender === "female")
                                                <option value="male">Male</option>
                                                <option value="female" selected>Female</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group{{ $errors->has('skills') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Skills') }}</label>
                                        <input class="form-control{{ $errors->has('skills') ? ' is-invalid' : '' }}" name="skills" placeholder="{{ __('') }}" type="text" value="{{ old('skills', $freelancer->dob) }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('experience') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Experience') }}</label>
                                        <input class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}" name="experience" placeholder="{{ __('') }}" type="text" value="{{ old('experience', $freelancer->experience) }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('payment_type') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Payment Type') }}</label>
                                        <input class="form-control{{ $errors->has('payment_type') ? ' is-invalid' : '' }}" name="payment_type" placeholder="{{ __('') }}" type="text" value="{{ old('payment_type', $freelancer->payment_type) }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('hourly_rate') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Hourly Rate') }}</label>
                                        <input class="form-control{{ $errors->has('hourly_rate') ? ' is-invalid' : '' }}" name="hourly_rate" placeholder="{{ __('') }}" type="text" value="{{ old('hourly_rate', $freelancer->hourly_rate) }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('availability') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Availability') }}</label>
                                        <input class="form-control{{ $errors->has('availability') ? ' is-invalid' : '' }}" name="availability" placeholder="{{ __('') }}" type="text" value="{{ old('availability', $freelancer->availability) }}">
                                    </div>
                                    <div class="form-group{{ $errors->has('linkedin_url') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Linkedin URL') }}</label>
                                        <input class="form-control{{ $errors->has('linkedin_url') ? ' is-invalid' : '' }}" name="linkedin_url" placeholder="{{ __('') }}" type="text" value="{{ old('linkedin_url', $freelancer->linkedin_url) }}" >
                                    </div>
                                    <div class="form-group{{ $errors->has('portfolio_url') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Portfolio URL') }}</label>
                                        <input class="form-control{{ $errors->has('portfolio_url') ? ' is-invalid' : '' }}" name="portfolio_url" placeholder="{{ __('') }}" type="text" value="{{ old('portfolio_url', $freelancer->portfolio_url) }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Current Photo</label>
                                        <img src="{{ asset($freelancer->photo) }}" height="100" width="100" alt="Freelancer Photo" class="img-fluid">    
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Change Photo</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                    <div class="text-center" id="createFreelancer">
                                        <button type="submit" class="btn btn-primary btn-block my-5">{{ __('Edit Freelancer') }}</button>
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