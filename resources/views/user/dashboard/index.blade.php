@extends('public.layouts.app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard-alternative'
])
@section('content')
     <section class="section">
        <div class="container">
            <h1 class="mb-5">Settings</h1>
            <!-- Tabs navs -->
            <div id="myorder-tab1">
                @include('user.dashboard.header-tabs')
                <!-- Tabs navs -->

                <!-- Tabs content -->
                <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade active show" id="general-tab" role="tabpanel" aria-labelledby="general-tab" tabindex="1">
                        @include('user.dashboard.general-tab')
                    </div>                                        
                    <div class="tab-pane fade" id="my-appointments-tab" role="tabpanel" aria-labelledby="my-appointments-tab" tabindex="3">
                        @include('user.dashboard.my-appointments-tab')
                    </div>
                    <div class="tab-pane fade" id="myorder-tab" role="tabpanel" aria-labelledby="myorder-tab" tabindex="2">
                        @include('user.dashboard.myorder-tab')
                    </div>
                    <div class="tab-pane fade" id="mycart-tab" role="tabpanel" aria-labelledby="mycart-tab" tabindex="4">
                        @include('user.dashboard.mycart-tab')
                    </div>
                    <div class="tab-pane fade" id="my-mes-formations-tab" role="tabpanel" aria-labelledby="my-mes-formations-tab" tabindex="5">
                        @include('user.dashboard.mes-formations-tab')
                    </div>
                    <div class="tab-pane fade" id="savedlocation-tab" role="tabpanel" aria-labelledby="savedlocation-tab" tabindex="6">
                        @include('user.dashboard.location-tab')
                    </div>
                </div>
                <!-- Tabs content -->

            </div>

        </div> <!-- my order tab end -->
    </section>
        @include('layouts.footers.user-footer')
    </div>
@endsection
@push('js')
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('admin') }}/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('admin') }}/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
@endpush