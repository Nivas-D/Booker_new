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
                        <form action="{{ route('admin.service.bookings.post') }}" method="POST" id="services-booking-index">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div> 
                                <div class="col-sm-12 col-md-6">
                                    <div class="search">
                                        <input type="text" class="search-input form-control" placeholder="Search By /Service/Type/Client/Amount/Payment Method" name="searchServiceBooking" value="{{ $searchText }}">
                                    </div>                                                                                                                            
                                </div>                                        
                            </div>
                        </form>
                        <div class="table-responsive py-4" id="categories-table">
                            <table class="table align-items-center table-flush"  id="datatable-basic">
                                <thead class="thead-light">
                                    <form action="{{ route('admin.service.bookings.post') }}" method="POST" id="service-bookings-sort">                                                
                                        @csrf 
                                        @method('POST')
                                        <input type="hidden" name="orderByValue" id="orderByValue" value="{{$orderByValue}}" />                                                   
                                        <input type="hidden" name="orderBy" id="orderBy" value="{{$orderBy}}" />                                                   
                                    </form>
                                    <tr>
                                        <th scope="col">{{ __('Sr.') }}</th>
                                        <th scope="col">{{ __('Service') }} <i onclick="sortServiceBookings('services.name','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Type') }} <i onclick="sortServiceBookings('service_bookings.type','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Client') }} <i onclick="sortServiceBookings('users.name','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Amount') }} <i onclick="sortServiceBookings('service_bookings.amount','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Payment') }} <i onclick="sortServiceBookings('service_bookings.payment_method','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th> 
                                        <th scope="col">{{ __('Payment Status') }} <i onclick="sortServiceBookings('service_bookings.payment_status','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Booking Status') }} <i onclick="sortServiceBookings('service_bookings.booking_status','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Date') }} <i onclick="sortServiceBookings('service_bookings.created_at','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                         {{-- <th scope="col" class=""><span class="float-right mr-2">Actions</span></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                    
                                        <tr>
                                            <td class="text-primary">{{ $loop->iteration }}</td>
                                            <td class="text-primary">{{ ucwords($booking->service_name) }}</td>
                                            <td class="text-primary">{{ ucwords($booking->type) }}</td>
                                            <td class="text-primary">{{ ucwords($booking->user_name) }}</td>
                                            <td class="text-primary">{{ $booking->amount }} CHF</td>
                                            <td class="text-primary">{{ $booking->payment_method }}</td>
                                            <td class="text-primary">
                                                <span  class="p-1 {{ in_array(strtolower($booking->payment_status), ['success', 'paid']) ? 'alert-success' : (in_array(strtolower($booking->payment_status), ['unsuccess', 'unpaid']) ? 'alert-danger' : 'alert-info') }}">{{ ucwords($booking->payment_status) }}</span>
                                            </td>
                                            <td class="text-primary">{{ ucwords($booking->booking_status) }}</td>
                                            <td class="text-primary">{{ date('m/d/Y',strtotime($booking->created_at)) }}</td>
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
<?php if(sizeof($bookings)): ?>
  <script>    
    function sortServiceBookings(orderByValue,orderBy){
        document.getElementById('orderByValue').value = orderByValue;
        document.getElementById('orderBy').value = orderBy;
        document.getElementById("service-bookings-sort").submit(); 
    } 
  </script>
  <?php endif ?>
@push('js')
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('admin') }}/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('admin') }}/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
@endpush