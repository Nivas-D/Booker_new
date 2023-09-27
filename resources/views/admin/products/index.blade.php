@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'products',
    'elementName' => 'products-index'
])
@section('content')
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Products</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('products.create') }}" class="btn btn-sm btn-neutral">Create New Product</a>
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
                        <div class="table-responsive py-4" id="products-table">
                            <table class="table align-items-center table-flush"  id="datatable-basic">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('Sr.') }}</th>
                                        <th scope="col">{{ __('Code') }}</th>
                                        <th scope="col">{{ __('Product Name') }}</th>
                                        <th scope="col">{{ __('Category') }}</th>
                                        <th scope="col">{{ __('Price') }}</th>
                                        <th scope="col">{{ __('Active') }}</th>
                                        <th scope="col"><span class="float-right mr-2">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td class="text-primary">{{ $loop->iteration }}</td>
                                            <td class="text-primary">{{ ucwords($product->code) }}</td>
                                            <td class="text-primary">{{ ucwords($product->name) }}</td>
                                            <td class="text-primary">{{ ucwords($product->category_name) }}</td>
                                            <td class="text-primary">{{ ucwords($product->price_discounted) }} CHF</td>
                                            <td class="text-primary">{{ ucfirst($product->active) }}</td>
                                            <td class="text-left">
                                                <span class="float-right">
                                                    <a class="btn btn-sm btn-neutral" href="{{ route('products.show', $product) }}">
                                                        <i class="fas fa-eye"></i> View
                                                    </a>
                                                    <a class="btn btn-sm btn-neutral" href="{{ route('products.edit', $product) }}">
                                                        <i class="fas fa-info"></i> Edit
                                                    </a>
                                                    <a class="btn btn-sm btn-neutral" href="#" onclick="deleteProduct()">
                                                        <i class="fas fa-eraser"></i> Delete
                                                    </a>
                                                    <form action="{{ route('products.destroy', $product) }}" method="POST" id="deleteProduct">
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
<?php if(sizeof($products)): ?>
  <script>
    function deleteProduct(){
      if(confirm('Are you sure to delete?')){
        document.getElementById("deleteProduct").submit();
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