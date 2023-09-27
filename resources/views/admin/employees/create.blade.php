@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'employees',
    'elementName' => 'employees-create'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Create Employee</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('employees.index') }}">Employees</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('employees.index') }}" class="btn btn-sm btn-neutral">Back To Employees</a>
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
                                <form role="form" method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-control-label" for="owner">Business Owner</label>
                                        <select class="form-control custom-select" id="owner" name="owner">
                                            @foreach($owners as $owner)
                                                <option value="{{ $owner->id }}">{{ ucwords($owner->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="department">Department</label>
                                        <select class="form-control custom-select" id="department" name="department">
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ ucwords($department->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label" for="input-name">{{ __('Employee Name') }}</label>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Email') }}</label>
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" type="email" name="email" value="{{ old('email') }}" required >
                                    </div>
                                    <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Phone') }}</label>
                                        <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="{{ __('') }}" type="text" value="{{ old('phone') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="gender">Gender</label>
                                        <select class="form-control custom-select" id="gender" name="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group{{ $errors->has('dob') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Date of Birth') }}</label>
                                        <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="dob" placeholder="{{ __('') }}" type="text" value="{{ old('dob') }}" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Address') }}</label>
                                        <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="{{ __('') }}" type="text" value="{{ old('address') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Select Photo</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                    <div class="text-center" id="createEmployee">
                                        <button type="submit" class="btn btn-primary btn-block my-5">{{ __('Create Employee') }}</button>
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