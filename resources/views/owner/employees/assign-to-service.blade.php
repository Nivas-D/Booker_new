@extends('layouts.owner-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'employees',
    'elementName' => 'employees-edit'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Assign To Service</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('owner/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('owner.employees.index') }}">Employees</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Assign</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('owner.employees.index') }}" class="btn btn-sm btn-neutral">Back To Employees</a>
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
                        @if(Session::has('errorMessage'))
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong> {{ Session::get('errorMessage') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row mt-5 mb-5">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <form method="post"  action="{{ route('owner.employee.assign.p') }}" enctype="multipart/form-data" role="form">
                                    @csrf
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" type="text" name="name" value="{{ old('name', $employee->name) }}" readonly>
                                    </div>
                                    <input type="hidden" value="{{ $employee->id }}" name="employee">
                                    <div class="form-group">
                                        <label class="form-control-label" for="service">Service</label>
                                        <select class="form-control custom-select" id="service" name="service" autofocus>
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="text-center" id="assignEmployee">
                                        <button type="submit" class="btn btn-primary btn-block my-5">{{ __('Assign Employee') }}</button>
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