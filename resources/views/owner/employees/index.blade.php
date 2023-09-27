@extends('layouts.owner-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'employees',
    'elementName' => 'employees-index'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Employees</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('owner/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Employees</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('owner.employees.create') }}" class="btn btn-sm btn-neutral">Create New Employee</a>
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
                        <div class="table-responsive py-4" id="categories-table">
                            <table class="table align-items-center table-flush"  id="datatable-basic">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('Sr.') }}</th>
                                        <th scope="col">{{ __('Dept') }}</th>
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">{{ __('Email') }}</th>
                                        <th scope="col" class=""><span class="float-right mr-2">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td class="text-primary">{{ $loop->iteration }}</td>
                                            <td class="text-primary">{{ ucwords($employee->dept_name) }}</td>
                                            <td class="text-primary">{{ ucwords($employee->name) }}</td>
                                            <td class="text-primary">{{ ucwords($employee->email) }}</td>
                                            <td>
                                                <span class="float-right">
                                                    <a class="btn btn-sm btn-neutral" href="{{ route('owner.employees.show', $employee) }}">
                                                        <i class="fas fa-eye"></i> View
                                                    </a>
                                                    <a class="btn btn-sm btn-neutral" href="{{ route('owner.employee.assign', ['id' => $employee->id]) }}">
                                                        Assign Service
                                                    </a>
                                                    <a class="btn btn-sm btn-neutral" href="{{ route('owner.employees.edit', $employee) }}">
                                                        <i class="fas fa-info"></i> Edit
                                                    </a>
                                                    <a class="btn btn-sm btn-neutral" href="#" onclick="deleteEmployee()">
                                                        <i class="fas fa-eraser"></i> Delete
                                                    </a>
                                                    <form action="{{ route('owner.employees.destroy', $employee) }}" method="POST" id="deleteEmployee">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                    
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.admin-footer')
    </div>
@endsection
<?php if(sizeof($employees)): ?>
  <script>
    function deleteEmployee(){
      if(confirm('Are you sure to delete?')){
        document.getElementById("deleteEmployee").submit();
      }
    }
  </script>
  <?php endif ?>
@push('js')
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('admin') }}/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('admin') }}/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
@endpush