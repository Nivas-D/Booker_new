@extends('public.layouts.app', [
    'navClass' => 'navbar-light bg-secondary',
    'searchClass' => 'navbar-search-dark',
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard-alternative'
])
@section('content')
     <section class="section">
        <div class="container">
            <h1 class="mb-5">My Orders</h1>
            <!-- Tabs navs -->
            <div id="myorder-tab">
                <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab"
                            aria-controls="ex1-tabs-1" aria-selected="false">General</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab"
                            aria-controls="ex1-tabs-2" aria-selected="true">My Orders</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="tab" href="#ex1-tabs-3" role="tab"
                            aria-controls="ex1-tabs-3" aria-selected="false">My Appointments</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-4" data-mdb-toggle="tab" href="#ex1-tabs-4" role="tab"
                            aria-controls="ex1-tabs-4" aria-selected="false">Saved</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-5" data-mdb-toggle="tab" href="#ex1-tabs-5" role="tab"
                            aria-controls="ex1-tabs-5" aria-selected="false">MES Formations</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-6" data-mdb-toggle="tab" href="#ex1-tabs-6" role="tab"
                            aria-controls="ex1-tabs-6" aria-selected="false">Recommandations</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-7" data-mdb-toggle="tab" href="#ex1-tabs-7" role="tab"
                            aria-controls="ex1-tabs-7" aria-selected="false">Contacts</a>
                    </li>

                </ul>
                <!-- Tabs navs -->

                <!-- Tabs content -->
                <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade" id=" ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                        <div class="row pt-5 pb-5">
                            <h2>General</h2>
                        </div>
                    </div>
                    <div class="tab-pane fade show active"" id=" ex1-tabs-2" role="tabpanel"
                        aria-labelledby="ex1-tab-2">
                        <div class="row pt-5 pb-5">
                            <div class="d-flex flex-wrap">
                                <div class="col px-2">
                                    <img src="{{ asset('images/img/Image.png') }}" class="img-fluid">
                                </div>
                                <div class="col">
                                    <h6>Product Name</h6>
                                    <p>Pack sensi/ Conduite</p>
                                </div>
                                <div class="col px-2">
                                    <h6>Unit Price</h6>
                                    <p class="Price">$68.93</p>
                                </div>

                                <div class=" col px-2">
                                    <h6>Quantity</h6>
                                    <p>
                                    <div class="d-flex justify-content-between">
                                        <div class="input-group w-auto justify-content-start align-items-center">
                                            <input type="button" value="-"
                                                class="button-minus border rounded-circle  icon-shape icon-sm mx-1 "
                                                data-field="quantity">
                                            <input type="number" step="1" max="10" value="1" name="quantity"
                                                class="quantity-field border-0 text-center w-25">
                                            <input type="button" value="+"
                                                class="button-plus border rounded-circle icon-shape icon-sm lh-0"
                                                data-field="quantity">
                                        </div>
                                    </div>
                                    </p>
                                </div>
                                <div class="col px-2">
                                    <h6>Total Products</h6>
                                    <p class="Price">$68.93</p>
                                </div>

                                <div class="col px-2">
                                    <h6>Status</h6>
                                    <p>23 mars 2021 17:00-18:30</p>
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-outline-primary px-3">Choose Dates</a>
                                <a href="#" class="btn btn-primary px-3">See More</a>
                            </div>
                        </div> <!-- row end-->

                        <!-- 2-->
                        <div class="row pt-5 pb-5">
                            <div class="d-flex flex-wrap">
                                <div class=" col px-2">
                                    <img src="{{ asset('images/img/Image.png') }}" class="img-fluid">
                                </div>
                                <div class=" col px-2">
                                    <h6>Product Name</h6>
                                    <p>Pack sensi/ Conduite</p>
                                </div>
                                <div class="col px-2">
                                    <h6>Unit Price</h6>
                                    <p class="Price">$68.93</p>
                                </div>

                                <div class=" col px-2">
                                    <h6>Quantity</h6>
                                    <p>
                                    <div class="d-flex justify-content-between">
                                        <div class="input-group w-auto justify-content-start align-items-center">
                                            <input type="button" value="-"
                                                class="button-minus border rounded-circle  icon-shape icon-sm mx-1 "
                                                data-field="quantity">
                                            <input type="number" step="1" max="10" value="1" name="quantity"
                                                class="quantity-field border-0 text-center w-25">
                                            <input type="button" value="+"
                                                class="button-plus border rounded-circle icon-shape icon-sm lh-0"
                                                data-field="quantity">
                                        </div>
                                    </div>
                                    </p>
                                </div>
                                <div class="col px-2">
                                    <h6>Total Products</h6>
                                    <p class="Price">$68.93</p>
                                </div>

                                <div class="col px-2">
                                    <h6>Status</h6>
                                    <p>23 mars 2021 17:00-18:30</p>
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-primary px-3">See More</a>
                            </div>
                        </div> <!-- row end-->

                        <!-- 3-->
                        <div class="row pt-5 pb-5">
                            <div class="d-flex flex-wrap">
                                <div class="col px-2">
                                    <img src="{{ asset('images/img/Image.png') }}" class="img-fluid">
                                </div>
                                <div class="col px-2">
                                    <h6>Product Name</h6>
                                    <p>Pack sensi/ Conduite</p>
                                </div>
                                <div class="col px-2">
                                    <h6>Unit Price</h6>
                                    <p class="Price">$68.93</p>
                                </div>

                                <div class=" col px-2">
                                    <h6>Quantity</h6>
                                    <p>
                                    <div class="d-flex justify-content-between">
                                        <div class="input-group w-auto justify-content-start align-items-center">
                                            <input type="button" value="-"
                                                class="button-minus border rounded-circle  icon-shape icon-sm mx-1 "
                                                data-field="quantity">
                                            <input type="number" step="1" max="10" value="1" name="quantity"
                                                class="quantity-field border-0 text-center w-25">
                                            <input type="button" value="+"
                                                class="button-plus border rounded-circle icon-shape icon-sm lh-0"
                                                data-field="quantity">
                                        </div>
                                    </div>
                                    </p>
                                </div>
                                <div class="col px-2">
                                    <h6>Total Products</h6>
                                    <p class="Price">$68.93</p>
                                </div>

                                <div class="col px-2">
                                    <h6>Status</h6>
                                    <p>23 mars 2021 17:00-18:30</p>
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-primary px-3">See More</a>
                            </div>
                        </div> <!-- row end-->




                    </div>
                    <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                        Tab 3 content
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