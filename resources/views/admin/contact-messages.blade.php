@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'contact-messages',
    'elementName' => 'contact-messages-index'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Contact Messages</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Messages</li>
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
                        <form action="{{ route('admin.contactmessages.post') }}" method="POST" id="contact-messages-index">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div> 
                                <div class="col-sm-12 col-md-6">
                                    <div class="search">
                                        <input type="text" class="search-input form-control" placeholder="Search By Name/Email/Title/Message" name="searchContactMessages" value="{{ $searchText }}">
                                    </div>                                                                                                                            
                                </div>                                        
                            </div>
                        </form>
                        <div class="table-responsive py-4" id="services-table">
                            <table class="table align-items-center table-flush" id="datatable-basic">
                                <thead class="thead-light">
                                    <form action="{{ route('admin.contactmessages.post') }}" method="POST" id="contact-messages-sort">                                                
                                        @csrf 
                                        @method('POST')
                                        <input type="hidden" name="orderByValue" id="orderByValue" value="{{$orderByValue}}" />                                                   
                                        <input type="hidden" name="orderBy" id="orderBy" value="{{$orderBy}}" />                                                   
                                    </form>
                                    <tr>
                                        <th scope="col">{{ __('Sr.') }}</th>
                                        <th scope="col">{{ __('Name') }} <i onclick="sortContactMessage('name','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Email') }} <i onclick="sortContactMessage('email','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Title') }} <i onclick="sortContactMessage('title','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Message') }} <i onclick="sortContactMessage('message','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Time') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message)
                                        <tr>
                                            <td class="text-primary">{{ $loop->iteration }}</td>
                                            <td class="text-primary">{{ ucwords($message->name) }}</td>
                                            <td class="text-primary">{{ ucwords($message->email) }}</td>
                                            <td class="text-primary">{{ ucwords($message->title) }}</td>
                                            <td class="text-primary">{{ ucwords($message->message) }}</td>
                                            <td class="text-primary">{{ ucwords($message->created_at) }}</td>
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
<?php if(sizeof($messages)): ?>
  <script>    
    function sortContactMessage(orderByValue,orderBy){
        document.getElementById('orderByValue').value = orderByValue;
        document.getElementById('orderBy').value = orderBy;
        document.getElementById("contact-messages-sort").submit(); 
    }
  </script>
  <?php endif ?>
@push('js')
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('admin') }}/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('admin') }}/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
@endpush