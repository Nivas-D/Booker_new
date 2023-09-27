@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'categories',
    'elementName' => 'categories-index'
])
<style>
    .toggle {
  position: relative;
  box-sizing: border-box;
}
.toggle input[type="checkbox"] {
  position: absolute;
  left: 0;
  top: 0;
  z-index: 10;
  width: 100%;
  height: 100%;
  cursor: none;
  opacity: 0;
}
.toggle label {
  position: relative;
  display: flex;
  align-items: center;
  box-sizing: border-box;
}
.toggle label:before {
  content: '';
  width: 75px;
  height: 42px;
  background: #ccc;
  position: relative;
  display: inline-block;
  border-radius: 46px;
  box-sizing: border-box;
  transition: 0.2s ease-in;
}
.toggle label:after {
  content: '';
  position: absolute;
  width: 38px;
  height: 38px;
  border-radius: 50%;
  left: 2px;
  top: 2px;
  z-index: 2;
  background: #fff;
  box-sizing: border-box;
  transition: 0.2s ease-in;
}
.toggle input[type="checkbox"]:checked + label:before {
  background: #4BD865;
}
.toggle input[type="checkbox"]:checked + label:after {
  left: 35px;
}
    </style>

@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Categories</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Categories</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('categories.create') }}" class="btn btn-sm btn-neutral">Create Category</a>
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
                                <form action="{{ route('categories.index') }}" method="POST" id="categories-idndex">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6"></div> 
                                        <div class="col-sm-12 col-md-6">
                                            <div class="search">
                                                <input type="text" class="search-input form-control" placeholder="Search By Name/Code" name="searchCategories" value="{{ $searchText }}">
                                            </div>                                                                                                                            
                                        </div>                                        
                                    </div>
                                </form>
                                <div class="table-responsive py-4" id="categories-table">
                                    <table class="table align-items-center table-flush"  id="datatable-basic">
                                        <thead class="thead-light">
                                            <form action="{{ route('categories.index') }}" method="POST" id="categories-sort">                                                
                                                @csrf 
                                                @method('POST')
                                                <input type="hidden" name="orderByValue" id="orderByValue" value="{{$orderByValue}}" />                                                   
                                                <input type="hidden" name="orderBy" id="orderBy" value="{{$orderBy}}" />                                                   
                                            </form>
                                            <tr>
                                                <th scope="col">{{ __('Sr.') }}</th>
                                                <th scope="col">
                                                    {{ __('Code') }} <i onclick="sortCategory('code','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i>                                                    
                                                </th>
                                                <th scope="col">
                                                    {{ __('Category Name') }} <i onclick="sortCategory('name','{{$orderByOpp}}')" class="fa fa-sort" style="cursor:pointer"></i>
                                                </th>
                                                <th scope="col">{{ __('Status') }}</th>
                                                <th scope="col" class=""><span class="float-right mr-2">Actions</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td class="text-primary">{{ $loop->iteration }}</td>
                                                    <td class="text-primary">{{ $category->code }}</td>
                                                    <td class="text-primary">{{ ucwords($category->name) }}</td>
                                                    <td class="text-primary"> <div class="form-group">

                                                        <div class="toggle">
                                                            <input type="checkbox" name = "status" {{( $category->status == '1') ? 'Checked' : ''}} @readonly(true)/>
                                                            <label></label>
                                                        </div>
                                                    </div></td>
                                                        <td class="">
                                                            <span class="float-right">
                                                                <a class="btn btn-sm btn-neutral" href="{{ route('categories.show', $category) }}">
                                                                    <i class="fas fa-eye"></i> View
                                                                </a>
                                                                <a class="btn btn-sm btn-neutral" href="{{ route('categories.edit', $category) }}">
                                                                    <i class="fas fa-info"></i> Edit
                                                                </a>
                                                                <a class="btn btn-sm btn-neutral" href="#" onclick="deleteCategory()">
                                                                    <i class="fas fa-eraser"></i> Delete
                                                                </a>
                                                                <form action="{{ route('categories.destroy', $category) }}" method="POST" id="deleteCategory">
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
<?php if(sizeof($categories)): ?>
  <script>
    function deleteCategory(){
      if(confirm('Are you sure to delete?')){
        document.getElementById("deleteCategory").submit();
      }
    }
    function sortCategory(orderByValue,orderBy){
        document.getElementById('orderByValue').value = orderByValue;
        document.getElementById('orderBy').value = orderBy;
        document.getElementById("categories-sort").submit(); 
    }
  </script>
  <?php endif ?>
@push('js')
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('admin') }}/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('admin') }}/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
@endpush
