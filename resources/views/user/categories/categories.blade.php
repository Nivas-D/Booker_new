@extends('public.layouts.app')
@section('content')
  <section>
        <div class="container">
            <div class="row pt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('public.home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('public.categories')}}">Industries</a></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <h1>Industries</h1>
                {{-- <h3>Featured Business</h3> --}}
            </div>
        </div>
    </section>


    <section class="mt-5 mb-5">
        <div class="container">
            <h2 class="px-1">Driving School</h2>
            <!-- Carousel wrapper -->
            <div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center"
                data-mdb-ride="carousel">
                <!-- Controls -->
                <div class="d-flex justify-content-center">
                    <button class="carousel-control-prev position-relative" type="button"
                        data-mdb-target="#carouselMultiItemExample" data-mdb-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next position-relative" type="button"
                        data-mdb-target="#carouselMultiItemExample" data-mdb-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- Inner -->
                <div class="carousel-inner py-4">
                    <!-- Single item -->

                    @php
                                           $imagearr = explode(",",$categories->image)  ;
                                        @endphp
                    @foreach(array_chunk($imagearr ,4) as $categoriesCollections)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="container">
                            <div class="row">
                                @foreach($categoriesCollections as $industry)
                                <div class="col-lg-3">
                                    <div class="card">

                                        <a href="{{route('booking.book_now',$categories->id)}}">
                                            <img src="{{asset( $industry)}}" height="250"
                                                class="card-img-top" alt="cardriving" /> </a>
                                        <div class="card-body">



                                        </div>
                                    </div>
                                </div>
                                @endforeach






                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Single item -->



                </div>
                <!-- Inner -->
            </div>
            <!-- Carousel wrapper -->
        </div>
    </section>


    {{-- <section class="mt-5 mb-5">
        <div class="container">
            <h2 class="px-1">Hair Dresser</h2>
            <!-- Carousel wrapper -->
            <div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center"
                data-mdb-ride="carousel">
                <!-- Controls -->
                <div class="d-flex justify-content-center">
                    <button class="carousel-control-prev position-relative" type="button"
                        data-mdb-target="#carouselMultiItemExample" data-mdb-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next position-relative" type="button"
                        data-mdb-target="#carouselMultiItemExample" data-mdb-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- Inner -->
                <div class="carousel-inner py-4">
                    <!-- Single item -->
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="card">
                                        <a href="categories-list-map.html"> <img src="{{asset('images/img/img-hairdresser.png')}}"
                                                height="250" class="card-img-top" alt="hairdresser" /> </a>
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Hair Dresser </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                            <p class="card-text text-muted">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i> 2715 Ash Dr.san Jose,
                                                South Dakota 83475
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <a href="categories-list-map.html"> <img src="{{asset('images/img/img-hairdresser.png')}}"
                                                height="250" class="card-img-top" alt="hairdresser" /> </a>
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Hair Dresser </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                            <p class="card-text text-muted">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i> 2715 Ash Dr.san Jose,
                                                South Dakota 83475
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <a href="categories-list-map.html"> <img src="{{asset('images/img/img-hairdresser.png')}}"
                                                height="250" class="card-img-top" alt="hairdresser" /> </a>
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Hair Dresser </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                            <p class="card-text text-muted">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i> 2715 Ash Dr.san Jose,
                                                South Dakota 83475
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <a href="categories-list-map.html"> <img src="{{asset('images/img/img-hairdresser.png')}}"
                                                height="250" class="card-img-top" alt="hairdresser" /> </a>
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Hair Dresser </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                            <p class="card-text text-muted">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i> 2715 Ash Dr.san Jose,
                                                South Dakota 83475
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Single item -->
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-12">
                                    <div class="card">
                                        <a href="categories-list-map.html"> <img src="{{asset('images/img/img-hairdresser.png')}}"
                                                height="250" class="card-img-top" alt="hairdresser" /> </a>
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Hair Dresser </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                            <p class="card-text text-muted">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i> 2715 Ash Dr.san Jose,
                                                South Dakota 83475
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <img src="{{asset('images/img/img-hairdresser.png')}}" height="250" class="card-img-top"
                                            alt="hairdresser" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Hair Dresser </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                            <p class="card-text text-muted">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i> 2715 Ash Dr.san Jose,
                                                South Dakota 83475
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <img src="{{asset('images/img/img-hairdresser.png')}}" height="250" class="card-img-top"
                                            alt="hairdresser" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Hair Dresser </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                            <p class="card-text text-muted">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i> 2715 Ash Dr.san Jose,
                                                South Dakota 83475
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <img src="{{asset('images/img/img-hairdresser.png')}}" height="250" class="card-img-top"
                                            alt="hairdresser" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Hair Dresser </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                            <p class="card-text text-muted">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i> 2715 Ash Dr.san Jose,
                                                South Dakota 83475
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <!-- Inner -->
            </div>
            <!-- Carousel wrapper -->
        </div>
    </section> --}}


    {{-- <section class="mt-5 mb-5">
        <div class="container">
            <h2 class="px-1">Sports</h2>
            <!-- Carousel wrapper -->
            <div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center"
                data-mdb-ride="carousel">
                <!-- Controls -->
                <div class="d-flex justify-content-center">
                    <button class="carousel-control-prev position-relative" type="button"
                        data-mdb-target="#carouselMultiItemExample" data-mdb-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next position-relative" type="button"
                        data-mdb-target="#carouselMultiItemExample" data-mdb-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- Inner -->
                <div class="carousel-inner py-4">
                    <!-- Single item -->
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="card">
                                        <img src="{{asset('images/img/img-sports.png')}}" height="250" class="card-img-top" alt="sports" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Fitness Center </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                            <p class="card-text text-muted">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i> 2715 Ash Dr.san Jose,
                                                South Dakota 83475
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <img src="{{asset('images/img/img-sports.png')}}" height="250" class="card-img-top" alt="sports" />

                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Fitness Center </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                            <p class="card-text text-muted">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i> 2715 Ash Dr.san Jose,
                                                South Dakota 83475
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <img src="{{asset('images/img/img-sports.png')}}" height="250" class="card-img-top" alt="sports" />

                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Fitness Center </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                            <p class="card-text text-muted">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i> 2715 Ash Dr.san Jose,
                                                South Dakota 83475
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <img src="{{asset('images/img/img-sports.png')}}" height="250" class="card-img-top" alt="sports" />

                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Fitness Center </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                            <p class="card-text text-muted">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i> 2715 Ash Dr.san Jose,
                                                South Dakota 83475
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Single item -->
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-12">
                                    <div class="card">
                                        <img src="{{asset('images/img/img-sports.png')}}" height="250" class="card-img-top" alt="sports" />

                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Fitness Center </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                            <p class="card-text text-muted">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i> 2715 Ash Dr.san Jose,
                                                South Dakota 83475
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <img src="{{asset('images/img/img-sports.png')}}" height="250" class="card-img-top" alt="sports" />

                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Fitness Center </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                            <p class="card-text text-muted">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i> 2715 Ash Dr.san Jose,
                                                South Dakota 83475
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <img src="{{asset('images/img/img-sports.png')}}" height="250" class="card-img-top" alt="sports" />

                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Fitness Center </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                            <p class="card-text text-muted">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i> 2715 Ash Dr.san Jose,
                                                South Dakota 83475
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <img src="{{asset('images/img/img-sports.png')}}" height="250" class="card-img-top" alt="sports" />

                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Fitness Center </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                            <p class="card-text text-muted">
                                                <i class="fa-sharp fa-solid fa-location-dot"></i> 2715 Ash Dr.san Jose,
                                                South Dakota 83475
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <!-- Inner -->
            </div>
            <!-- Carousel wrapper -->
        </div>
    </section> --}}

    {{-- <div class="container">
        <div class="mt-5 mb-5 me-3 text-end"><a href="#" class="btn btn-outline-primary">See All</a></div>
    </div> --}}
@endsection
