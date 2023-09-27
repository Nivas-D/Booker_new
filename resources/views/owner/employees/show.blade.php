@extends('layouts.owner-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'employees',
    'elementName' => 'employees-show'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">View Employee</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('owner/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('owner.employees.index') }}">Employees</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View</li>
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
                                                <td class="text-primary">Department</td>
                                                <td class="text-primary">{{ ucfirst($department->name) }}</td>
                                            </tr> 
                                            <tr>
                                                <td class="text-primary">Employee Name</td>
                                                <td class="text-primary">{{ ucwords($employee->name) }}</td>
                                            </tr> 
                                            <tr>
                                                <td class="text-primary">Email</td>
                                                <td class="text-primary">{{ $employee->email }}</td>
                                            </tr> 
                                            <tr>
                                                <td class="text-primary">Phone</td>
                                                <td class="text-primary">{{ $employee->phone }}</td>
                                            </tr> 
                                            <tr>
                                                <td class="text-primary">Gender</td>
                                                <td class="text-primary">{{ ucwords($employee->gender) }}</td>
                                            </tr> 
                                            <tr>
                                                <td class="text-primary">Date of Birth</td>
                                                <td class="text-primary">{{ $employee->dob }}</td>
                                            </tr> 
                                            <tr>
                                                <td class="text-primary">Address</td>
                                                <td class="text-primary">{{ $employee->address }}</td>
                                            </tr> 
                                            <tr>
                                                <td class="text-primary">Photo</td>
                                                <td class="text-primary"><img src="{{ asset($employee->photo) }}" height="100" width="100" alt="Employee Photo" class="img-fluid" /></td>
                                            </tr>
                                            <tr>
                                                <td class="text-primary">Created At</td>
                                                <td class="text-primary">{{ $employee->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-primary">Edited At</td>
                                                <td class="text-primary">{{ $employee->updated_at }}</td>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-muted mb-0">Assigned Services</h5>
                        <div class="row mt-4 mb-5">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="table-responsive py-4" id="categories-table">
                                    <table class="table align-items-center table-flush"  id="datatable-basic">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">{{ __('Sr.') }}</th>
                                                <th scope="col">{{ __('Service') }}</th>
                                                <th scope="col">{{ __('Employee') }}</th>
                                                <th scope="col">{{ __('Assigned By') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($assignedServices as $row)
                                                <tr>
                                                    <td class="text-primary">{{ $loop->iteration }}</td>
                                                    <td class="text-primary">{{ ucwords($row->service_name) }}</td>
                                                    <td class="text-primary">{{ ucwords($row->employee_name) }}</td>
                                                    <td class="text-primary">{{ $row->assigned_by }}</td>
                                                </tr> 
                                            @endforeach
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