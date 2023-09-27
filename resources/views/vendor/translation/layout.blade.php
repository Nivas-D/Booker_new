@extends('layouts.admin-app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'languages',
    'elementName' => 'languages-create'
])

@push('css')
<link rel="stylesheet" href="{{ asset('/vendor/translation/css/main.css') }}">
@endpush

@section('content')

<div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4"></div>
            </div>
        </div>
    </div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                    <div id="app">
                    @include('translation::nav')
                    @include('translation::notifications')

                    @yield('body') 
                    </div>                   
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.admin-footer')
</div>

@endsection







