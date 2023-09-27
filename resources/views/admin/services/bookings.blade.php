@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'service-bookings',
    'elementName' => 'service-bookings'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Service Bookings</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Service Bookings</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right"></div>
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
                                        <th scope="col">{{ __('Service') }}</th>
                                        <th scope="col">{{ __('Type') }}</th>
                                        <th scope="col">{{ __('Amount') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                         {{-- <th scope="col" class=""><span class="float-right mr-2">Actions</span></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td class="text-primary">{{ $loop->iteration }}</td>
                                            <td class="text-primary">{{ ucwords($booking->service_name) }}</td>
                                            <td class="text-primary">{{ ucwords($booking->type) }}</td>
                                            <td class="text-primary">{{ $booking->amount }} CHF</td>
                                            <td class="text-primary">{{ ucwords($booking->booking_status) }}</td>
                                            <td>
                                              {{--  <span class="float-right">
                                                    <a class="btn btn-sm btn-neutral" href="{{ route('admin.service.bookings.show', ['id' => $booking->id]) }}">
                                                        <i class="fas fa-eye"></i> View
                                                    </a>
                                                </span> --}}
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
@push('js')
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('admin') }}/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('admin') }}/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
@endpush