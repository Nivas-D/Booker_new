@extends('layouts.owner-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'plans',
    'elementName' => 'plans-show'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">View Plan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('owner/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('plans.index') }}">Plans</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View</li>
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
                        <h5 class="card-title text-uppercase text-muted mb-0">Plan Information</h5>
                        <div class="row mt-4 mb-5">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="table-responsive py-4" id="categories-table">
                                    <table class="table align-items-center table-flush"  id="datatable-basic">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">{{ __('Column') }}</th>
                                                <th scope="col">{{ __('Value') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-primary">Plan Name</td>
                                                <td class="text-primary">{{ ucwords($plan->name) }}</td>
                                            </tr> 
                                            <tr>
                                                <td class="text-primary">Description</td>
                                                <td class="text-primary">{{ ucfirst($plan->description) }}</td>
                                            </tr> 
                                            <tr>
                                                <td class="text-primary">Price</td>
                                                <td class="text-primary">{{ $plan->price }}</td>
                                            </tr> 
                                            <tr>
                                                <td class="text-primary">Features</td>
                                                <td class="text-primary">{{ $plan->features }}</td>
                                            </tr> 
                                            <tr>
                                                <td class="text-primary">Frequency</td>
                                                <td class="text-primary">{{ $plan->frequency }}</td>
                                            </tr> 
                                            <tr>
                                                <td class="text-primary">Trial Period</td>
                                                <td class="text-primary">{{ $plan->trial_period }}</td>
                                            </tr> 
                                            <tr>
                                                <td class="text-primary">Created At</td>
                                                <td class="text-primary">{{ $plan->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-primary">Edited At</td>
                                                <td class="text-primary">{{ $plan->updated_at }}</td>
                                            </tr>          
                                        </tbody>
                                    </table>
                                </div>
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