@extends('public.layouts.app')
@section('content')
   <section>
        <div class="container">
            <div class="row pt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item " aria-current="page"><a href="{{route('public.categories')}}">Industries</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$service->name}}</li>
                    </ol>
                </nav>
            </div>
            {{-- <div class="row mt-3">
                <div class="col-md-9">
                    <h2>{{$service->name}}</h2>
                    <p>{!! $service->description !!}
                    </p>
                </div>
                <div class="col-md-3 pt-4 text-end">
                    <a href="#" class="btn btn-default btn-rounded"> <i class="fa-sharp fa-solid fa-location-dot"></i>
                        Map View</a>
                </div>
            </div> --}}
            <hr>
        </div>

    </section>

    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">

                <div class="col-md-7">

                    <!--card 1-->
                    <div class="mb-3 card">
                        <div class="d-flex flex-wrap justify-content-center">
                            <div class="col-md-12">
                                <img src="{{asset($service->image)}}" height="300" class="card-img-top"
                                    alt="cardriving" /></div>
                            <div class="col-md-12">
                                <div class="card-body">
                                    {{-- <h5 class=" card-title">{{$service->name}} <span
                                            class="badge bg-success float-end">4km</span> </h5> --}}
                                            <h2>{{$service->name}}</h2>
                                    <p class="card-text text-muted">
                                        <i class="fa-sharp fa-solid fa-location-dot"></i>
                                        Lémanique, Rue de Lyon 6, 1201 Genève, Switzerland
                                    </p>
                                    <p>{!! $service->description !!}
                                        @if(\Auth::user())
                                    <p  id="auth-check" style="display: none">{{\Auth::user()->id}}
                                    </p>
                                    @endif
                                    {{-- <h6 class="bold">{!! $service->description !!}</h6> --}}
                                    <p class="text-muted"> Friday, 22th September 2023 <br>
                                        10:30 - 11:30 pm
                                    </p>
                                    <del class="fw-600 opacity-50 ">
                                       {{$service->price_original}}  CHF
                               </del>
                                    <h6 class="bold">{{$service->price_discounted}} CHF</h6>
                                     <input type='button' value='-' class='qtyminus minus' field='quantity'style="background-color: #610bef;color: #ffff ;border-radius: 5px;"/>
                                      <input type='text' name='quantity'  class="quantity-add"value='1' class='qty' style="width: 30px;height: 27px" />
                                      <input type='button' value='+' class='qtyplus plus' field='quantity' style="background-color: #610bef;color: #ffff;border-radius: 5px;" />
                                    <a href="#"  onclick="addToCart({{$service}})" class="btn btn-primary">Add to Cart</a>
                                    <a href="{{route('booking.bookcategory',1)}}" class="btn btn-primary" style="margin-top: 10px; width: 213px;">Book Appointment</a>


                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- card 2-->



                    <!-- pagination-->






                </div>
                <div class="col-md-5">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d5522.118713843893!2d6.1383796!3d46.2092742!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x478c636d870b0e3b%3A0x685b8cd82efe6f5f!2sAel%20Driving%20School%20Gen%C3%A8ve%20L%C3%A9manique%20Rue%20de%20Lyon%206%201201%20Gen%C3%A8ve%20Switzerland!3m2!1d46.209274199999996!2d6.1383795999999995!5e0!3m2!1sen!2sin!4v1690953816128!5m2!1sen!2sin"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>

        </div>


    </section>


    <section class="mt-5 mb-5">
        <div class="container">
            <h2 class="px-1">Other Categories</h2>
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
                                        <img src="{{asset('images/img/img-cardriving.png')}}" height="250" class="card-img-top"
                                            alt="cardriving" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Exclusive Driving </h5>
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
                                        <img src="{{asset('images/img/img-cardriving.png')}}" height="250" class="card-img-top"
                                            alt="cardriving" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Exclusive Driving </h5>
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
                                        <img src="{{asset('images/img/img-cardriving.png')}}" height="250" class="card-img-top"
                                            alt="cardriving" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Exclusive Driving </h5>
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
                                        <img src="{{asset('images/img/img-cardriving.png')}}" height="250" class="card-img-top"
                                            alt="cardriving" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Exclusive Driving </h5>
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
                                        <img src="{{asset('images/img/img-cardriving.png')}}" height="250" class="card-img-top"
                                            alt="cardriving" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Exclusive Driving </h5>
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
                                        <img src="{{asset('images/img/img-cardriving.png')}}" height="250" class="card-img-top"
                                            alt="cardriving" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Exclusive Driving </h5>
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
                                        <img src="{{asset('images/img/img-cardriving.png')}}" height="250" class="card-img-top"
                                            alt="cardriving" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Exclusive Driving </h5>
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
                                        <img src="{{asset('images/img/img-cardriving.png')}}" height="250" class="card-img-top"
                                            alt="cardriving" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Exclusive Driving </h5>
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
    </section>
@endsection

@push('js')

<script>

     
     $(document).ready(function() {
        $('.plus').click( function(e) {
            console.log('plus');
            let $input = $(this).prev('input.qty');
            let val = parseInt($input.val());
            $input.val( val+1 ).change();
        });
 
        $('.minus').click( 
            function(e) {
                console.log('minus');
            let $input = $(this).next('input.qty');
            var val = parseInt($input.val());
            if (val > 0) {
                $input.val( val-1 ).change();
            } 
        });
    });


    function addToCart(service){
         console.log(service);
        user_id = null;
        qty = $('.quantity-add').val();
        usera = $('#auth-check').html();

        console.log(usera);
        if(usera){
             user_id = usera
        }
        // if({{\Auth::check()}}){
        //     user_id = {{\Auth::user()}}
        // }

        console.log(usera);
        var CartData = {
        _token:'<?php echo csrf_token() ?>',
        service: service,
        user_id: user_id,
        qty:qty
    };
    
    $.ajax({
       type:'POST',
       url:'/add-to-cart',
       data:CartData,
       success:function(data) {
        swal("Successfully added to cart");
         // $("#msg").html(data.msg);
       }
    });
        console.log(service);

    }
</script>
@endpush
