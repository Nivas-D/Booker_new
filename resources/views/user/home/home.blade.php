@extends('public.layouts.app')
@section('content')
<!--  <section class="section">
        <div class="container">
            <div class="col-8">
                <h1>Système de réservation en ligne pour les sociétés de service</h1>
                <p class="lead bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Rutrum cum fermentum quam
                    egestas. Sed porta
                    dictum neque, elementum pulvinar. </p>
                <div><a href="#" class="btn btn-primary btn-lg me-3 mb-2"> Obtenir un compte gratuit</a> <a href="#"
                        class="btn btn-primary btn-lg mb-2 "> Obtenir un compte pro</a> </div>
                <div class="mt-4"> <a href="#" class="me-3 mb-2"> <img src="{{asset('images/img/btn-appstore.png')}}"> <a href="#"
                            class="me-3 mb-2"><img src="{{asset('images/img/btn-playstore.png')}}"></a></div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container justify-content-center">
            <h1 class="text-center mb-5">Nos prestations</h1>

            <div class="d-flex flex-wrap justify-content-center text-center">
                <div class="col-4 px-3">
                    <h3>Accepter les <br> réservations en ligne</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Rutrum cum fermentum quam egestas. Sed
                        porta dictum neque, elementum pulvinar. Massa gravida sodales morbi habitant risus. </p>
                </div>

                <div class="col-4 px-3">
                    <h3>Notifications via <br> SMS/Email</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Rutrum cum fermentum quam egestas. Sed
                        porta dictum neque, elementum pulvinar. Massa gravida sodales morbi habitant risus. </p>
                </div>

                <div class="col-4 px-3">
                    <h3>Application client et <br>administrateur</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Rutrum cum fermentum quam egestas. Sed
                        porta dictum neque, elementum pulvinar. Massa gravida sodales morbi habitant risus. </p>
                </div>
            </div>
        </div>

    </section>

    <section class="section" id="service">
        <div class="container justify-content-center">
            <h1 class="text-center mb-5"> Lorem Ipsum<br>
                dolor sit amet</h1>

            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <img class="card-img-top" src=" " alt="" height="150px">
                        <div class="card-body text-center">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="text-light">See more</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <img class="card-img-top" src=" " alt="" height="150px">
                        <div class="card-body text-center">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="text-light">See more</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card">
                        <img class="card-img-top" src=" " alt="" height="150px">
                        <div class="card-body text-center">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="text-light">See more</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="testimonials" class="testimonials" style="background-color:#F7F7FC;">
        <div class="container">
            <div class="text-center pt-5 pb-5">
                <h1>Customer Testimonials</h1>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 d-flex">
                    <img src="https://bookerapp.space/front/img/test-1.png" class="left-side">
                    <div class="carousel slide mt-0" data-ride="carousel" id="quote-carousel">
                        <div class="carousel-inner text-center">
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-12 d-flex">
                                            <div class="comments">
                                                <h4>I have been using the service for a while now and i can say it the
                                                    best you can have for
                                                    your booking</h4>
                                                <small class="float-start">Mark Johnson</small>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <div class="item active">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-12 d-flex">
                                            <div class="comments">
                                                <h4>I have been using the service for a while now and i can say it the
                                                    best you can have for
                                                    your booking</h4>
                                                <small class="float-start">Hari Anand</small>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-12 d-flex">
                                            <div class="comments">
                                                <div style="padding-bottom:10px;">
                                                    <h4>I have been using the service for a while now and i can say it
                                                        the best you can have for
                                                        your booking</h4>
                                                    <small class="float-start">Olivia Morris</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                        <div class="carousel-slide">
                            <ol class="carousel-indicators">
                                <li data-target="#quote-carousel" data-slide-to="0" class=""><img
                                        class="img-responsive " src="https://bookerapp.space/front/img/test-mini-1.png"
                                        alt="">
                                </li>
                                <li data-target="#quote-carousel" data-slide-to="1" class="active"><img
                                        class="img-responsive" src="https://bookerapp.space/front/img/test-mini-2.png"
                                        alt="">
                                </li>
                                <li data-target="#quote-carousel" data-slide-to="2" class=""><img class="img-responsive"
                                        src="https://bookerapp.space/front/img/test-mini-3.png" alt="">
                                </li>
                            </ol>
                        </div>
                        <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i
                                class="fas fa-angle-left"></i></a>
                        <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i
                                class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="whychooseus">
        <div class="container justify-content-center">
            <h1 class="text-center mb-5"> Why Choose Us</h1>

            <div class="row">
                <div class="col-sm-4 text-center">
                    <div class="text-center pt-3 pb-3"> <img src="{{asset('images/img/whychoose-icon1.png')}}" alt="" width="100px" ;
                            height="100px"></div>
                    <h5 class="card-title">Save Time</h5>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="text-center pt-3 pb-3"> <img src="{{asset('images/img/whychoose-icon2.png')}}" alt="" width="100px" ;
                            height="100px"></div>
                    <h5 class="card-title">Reliable</h5>
                </div>

                <div class="col-sm-4 text-center">
                    <div class="text-center pt-3 pb-3"> <img src="{{asset('images/img/whychoose-icon3.png')}}" alt="" width="100px" ;
                            height="100px"></div>
                    <h5 class="card-title">Affordable</h5>
                </div>
            </div>

        </div>
    </section> -->

    <section class="section">
        <div class="container mt-5">
            <div class=" px-5 text-center">
                <h1>{{ __('translation::pages.home.h1') }}</h1>
                <p class="lead bold">{{ __('translation::pages.home.content1') }}</p>
                <div>
                    <a href="#" class="btn btn-primary btn-lg  mb-2 w-35 btn-home">{{ __('translation::pages.home.button1') }}</a>

                    <a href="#" class="btn btn-primary btn-lg mb-2 w-35 btn-home">{{ __('translation::pages.home.button2') }}</a> </div>
                <!-- <div class="mt-4"> <a href="#" class="me-3 mb-2"> <img src="img/btn-appstore.png"> <a href="#"
                            class="me-3 mb-2"><img src="img/btn-playstore.png"></a></div> -->
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container justify-content-center">
            <h1 class="text-center mb-5">{{ __('translation::pages.home.section_h1') }}</h1>

            <div class="row justify-content-center text-center">
                <div class="col-md-4">
                    <h3>{{ __('translation::pages.home.section.title1') }}</h3>
                    <p>{{ __('translation::pages.home.section.content1') }}</p>
                </div>

                <div class="col-md-4">
                    <h3>{{ __('translation::pages.home.section.title2') }}</h3>
                    <p>{{ __('translation::pages.home.section.content2') }}</p>
                </div>

                <div class="col-md-4">
                    <h3>{{ __('translation::pages.home.section.title3') }}</h3>
                    <p>{{ __('translation::pages.home.section.content3') }}</p>
                </div>
            </div>
        </div>

    </section>

    <section class="section" id="service">
        <div class="container justify-content-center">
            <h1 class="text-center mb-5">{{ __('translation::pages.home.service_h1') }}</h1>

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
                                        <a href="driving-page.html"> <img src="{{asset('images/img/img-cardriving.png')}}" height="250"
                                                class="card-img-top" alt="cardriving" /> </a>
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">{{ __('translation::pages.home.exclusive_driving') }}</h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <a href="driving-page.html"> <img src="{{asset('images/img/first-aid.avif')}}" height="250"
                                                class="card-img-top" alt="cardriving" /> </a>
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">{{ __('translation::pages.home.exclusive_driving') }}</h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <a href="driving-page.html"> <img src="{{asset('images/img/driving-theory.jpg')}}" height="250"
                                                class="card-img-top" alt="cardriving" /> </a>
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">{{ __('translation::pages.home.exclusive_driving') }}</h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <a href="driving-page.html"> <img src="{{asset('images/img/bike_driving.jpg')}}" height="250"
                                                class="card-img-top" alt="cardriving" /> </a>
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">{{ __('translation::pages.home.exclusive_driving') }}</h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>


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
                                        <img src="{{asset('images/img/img-cardriving.png')}}" height="250" class="card-img-top"
                                            alt="cardriving" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">{{ __('translation::pages.home.exclusive_driving') }}</h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <img src="{{asset('images/img/first-aid.avif')}}" height="250" class="card-img-top"
                                            alt="cardriving" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">{{ __('translation::pages.home.exclusive_driving') }}</h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <img src="{{asset('images/img/driving-theory.jpg')}}" height="250" class="card-img-top"
                                            alt="cardriving" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">{{ __('translation::pages.home.exclusive_driving') }}</h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <img src="{{asset('images/img/bike_driving.jpg')}}" height="250" class="card-img-top"
                                            alt="cardriving" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">{{ __('translation::pages.home.exclusive_driving') }}</h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>


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
    </section>
@endsection
