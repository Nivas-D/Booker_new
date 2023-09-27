@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'services',
    'elementName' => 'services-index'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Services</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Services</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('services.create') }}" class="btn btn-sm btn-neutral">Create New Service</a>
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
                        <div class="table-responsive py-4" id="services-table">
                            <table class="table align-items-center table-flush" id="datatable-basic">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('Sr.') }}</th>
                                        <th scope="col">{{ __('Code') }}</th>
                                        <th scope="col">{{ __('Service Name') }}</th>
                                        <th scope="col">{{ __('Price') }}</th>
                                        <th scope="col">{{ __('Industry') }}</th>
                                        <th scope="col">{{ __('Active') }}</th>
                                        <th scope="col"><span class="float-right mr-2">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td class="text-primary">{{ $loop->iteration }}</td>
                                            <td class="text-primary">{{ ucwords($service->code) }}</td>
                                            <td class="text-primary">{{ ucwords($service->name) }}</td>
                                            <td class="text-primary">{{ $service->price_discounted }} CHF</td>
                                            <td class="text-primary">{{ ucwords($service->industry_name) }}</td>
                                            <td class="text-primary">{{ ucfirst($service->active) }}</td>
                                            <td class="text-left">
                                                <span class="float-right">
                                                    <a class="btn btn-sm btn-neutral" href="{{ route('services.show', $service) }}">
                                                        <i class="fas fa-eye"></i> View
                                                    </a>
                                                    <a class="btn btn-sm btn-neutral" href="{{ route('services.edit', $service) }}">
                                                        <i class="fas fa-info"></i> Edit
                                                    </a>
                                                    <a class="btn btn-sm btn-neutral" href="#" onclick="deleteService()">
                                                        <i class="fas fa-eraser"></i> Delete
                                                    </a>
                                                    <form action="{{ route('services.destroy', $service) }}" method="POST" id="deleteService">
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
<?php if(sizeof($services)): ?>
  <script>
    function deleteService(){
      if(confirm('Are you sure to delete?')){
        document.getElementById("deleteService").submit();
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