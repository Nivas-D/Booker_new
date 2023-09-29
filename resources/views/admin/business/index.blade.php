@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'admin-business-index',
    'elementName' => 'admin-business-index'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Business</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Business</li>
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
                        <form action="{{ route('admin.business.index') }}" method="POST" id="admin-business-index">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div> 
                                <div class="col-sm-12 col-md-6">
                                    <div class="search">
                                        <input type="text" class="search-input form-control" placeholder="Search By Category/Compnay/Email/Telephone/Title/Date" name="searchBusiness" value="{{ $searchText }}">
                                    </div>                                                                                                                            
                                </div>                                        
                            </div>
                        </form>
                        <div class="table-responsive py-4" id="categories-table">
                            <table class="table align-items-center table-flush"  id="datatable-basic">
                                <thead class="thead-light">
                                    <form action="{{ route('admin.business.index') }}" method="POST" id="business-sort">                                                
                                        @csrf 
                                        @method('POST')
                                        <input type="hidden" name="orderByValue" id="orderByValue" value="{{$orderByValue}}" />                                                   
                                        <input type="hidden" name="orderBy" id="orderBy" value="{{$orderBy}}" />                                                   
                                    </form>
                                    <tr>
                                        <th scope="col">{{ __('Sr.') }}</th>
                                        <th scope="col">{{ __('Category') }} <i onclick="sortBusiness('categories.name','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Company Login') }}<i onclick="sortBusiness('business.name','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Email') }} <i onclick="sortBusiness('business.email','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Telephone') }} <i onclick="sortBusiness('business.telephone','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Title') }} <i onclick="sortBusiness('business.company_name','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Date') }}<i onclick="sortBusiness('business.created_at','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Status') }}<i onclick="sortBusiness('business.status','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col" class=""><span class="float-right mr-2">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($business as $businessItem)
                                    
                                        <tr>
                                        <td class="text-primary">{{ $loop->iteration }}</td>
                                        <td class="text-primary">{{ ucwords($businessItem->category) }}</td>
                                            <td class="text-primary">{{ ucwords($businessItem->name) }}</td>
                                             <td class="text-primary">{{ ucwords($businessItem->email) }}</td>
                                             <td class="text-primary">{{ ucwords($businessItem->telephone) }}</td>
                                             <td class="text-primary">{{ $businessItem->company_name }}</td>
                                             <td class="text-primary">{{ date('m/d/Y',strtotime($businessItem->created_at)) }}</td>
                                             <td class="text-primary">
                                                <span class="p-1 {{ ($businessItem->status==1) ? 'alert-success': 'alert-danger' }}">{{ ($businessItem->status==1)?'Active':'InActive' }}</span>
                                            </td>
                                            <td>
                                                
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
<?php if(sizeof($business)): ?>
  <script>    
    function sortBusiness(orderByValue,orderBy){
        document.getElementById('orderByValue').value = orderByValue;
        document.getElementById('orderBy').value = orderBy;
        document.getElementById("business-sort").submit(); 
    } 
  </script>
  <?php endif ?>
@push('js')
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('admin') }}/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('admin') }}/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
@endpush