@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'industries',
    'elementName' => 'industries-index'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Industries</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Industries</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('industries.create') }}" class="btn btn-sm btn-neutral">Create New Industry</a>
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
                        <form action="{{ route('industries.index') }}" method="POST" id="categories-idndex">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div> 
                                <div class="col-sm-12 col-md-6">
                                    <div class="search">
                                        <input type="text" class="search-input form-control" placeholder="Search By Name/Code" name="searchIndustries" value="{{ $searchText }}">
                                    </div>                                                                                                                            
                                </div>                                        
                            </div>
                        </form>
                        <div class="table-responsive py-4" id="industries-table">
                            <table class="table align-items-center table-flush"  id="datatable-basic">
                                <thead class="thead-light">
                                    <form action="{{ route('industries.index') }}" method="POST" id="industries-sort">                                                
                                        @csrf 
                                        @method('POST')
                                        <input type="hidden" name="orderByValue" id="orderByValue" value="{{$orderByValue}}" />                                                   
                                        <input type="hidden" name="orderBy" id="orderBy" value="{{$orderBy}}" />                                                   
                                    </form>
                                    <tr>
                                        <th scope="col">{{ __('Sr.') }}</th>
                                        <th scope="col">{{ __('Code') }} <i onclick="sortIndustry('code','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col">{{ __('Industry Name') }} <i onclick="sortIndustry('name','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i></th>
                                        <th scope="col"><span class="float-right mr-2">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($industries as $industry)
                                        <tr>
                                            <td class="text-primary">{{ $loop->iteration }}</td>
                                            <td class="text-primary">{{ $industry->code }}</td>
                                            <td class="text-primary">{{ $industry->name }}</td>
                                            <td>
                                                <span class="float-right">
                                                    <a class="btn btn-sm btn-neutral" href="{{ route('industries.show', $industry) }}">
                                                        <i class="fas fa-eye"></i> View
                                                    </a>
                                                    <a class="btn btn-sm btn-neutral" href="{{ route('industries.edit', $industry) }}">
                                                        <i class="fas fa-info"></i> Edit
                                                    </a>
                                                    <a class="btn btn-sm btn-neutral" href="#" onclick="deleteIndustry()">
                                                        <i class="fas fa-eraser"></i> Delete
                                                    </a>
                                                    <form action="{{ route('industries.destroy', $industry) }}" method="POST" id="deleteIndustry">
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
<?php if(sizeof($industries)): ?>
  <script>
    function deleteIndustry(){
      if(confirm('Are you sure to delete?')){
        document.getElementById("deleteIndustry").submit();
      }
    }
    function sortIndustry(orderByValue,orderBy){
        document.getElementById('orderByValue').value = orderByValue;
        document.getElementById('orderBy').value = orderBy;
        document.getElementById("industries-sort").submit(); 
    }
  </script>
  <?php endif ?>
@push('js')
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('admin') }}/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('admin') }}/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
@endpush