@extends('public.layouts.app')
@push('front-css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css" rel="stylesheet" />
<style>
    .has-action {
  position: relative;
}

.has-action:before {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: red;
  content: "";
  position: absolute;
  bottom: 0;
  left: 50%;
  margin-left: -5px;
}
</style>
@endpush
@section('content')
   <section>
        <div class="container">
            <div class="row pt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('public.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('public.categories')}}">Industries</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Exclusive Driving</li>
                    </ol>
                </nav>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <h2>Exclusive Driving</h2>
                </div>

            </div>
            <hr>
        </div>

    </section>


    <section class="mt-5 mb-5">
        <div class="container px-4">
            <div class="row gx-5">

                <div class="col-md-8">
                    <!-- slide start -->

                    <div id="carouselExampleTouch" class="carousel slide" data-mdb-touch="false">
                        <div class="carousel-indicators">
                            <button type="button" data-mdb-target="#carouselExampleTouch" data-mdb-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-mdb-target="#carouselExampleTouch" data-mdb-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-mdb-target="#carouselExampleTouch" data-mdb-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset('images/img/1.jpg')}}" class="d-block w-100"
                                    alt="Wild Landscape" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Exclusive Drivers</h5>
                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('images/img/2.jpg')}}" class="d-block w-100"
                                    alt="Camera" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Exclusive Drivers</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('images/img/3.jpg')}}" class="d-block w-100"
                                    alt="Exotic Fruits" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Exclusive Drivers</h5>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleTouch"
                            data-mdb-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleTouch"
                            data-mdb-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- slide end -->

                    <!-- Book now start-->

                    <div class="mt-5 mb-5">
                        <h2>Book Now</h2>

                        <form action="" class="mt-3" >

                            <input class="datetimepicker" type="text" style="
                            display: none;
                        ">

                            <div class="form-group d-flex mb-4 row">
                                <div class="col-6 px-3 mb-3">
                                    <label for="name" class="form-label">Category </label>
                                    <select class="form-select" aria-label="Default select example" id ="category" name = "category">
                                        <option selected>Select Category</option>
                                        @foreach ($category as $data )
                                        <option value="{{$data->id}}">{{$data->name}}</option>

                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-6 px-3 mb-3">
                                    <label for="name" class="form-label">Location</label>
                                    <select class="form-select" aria-label="Default select example" name = "location"  id = "location" onchange = "loadlocation_collaborater(this.value)">
                                        <option selected>Select Location</option>
                                        <option value="1">Geneva</option>
                                       <!--  <option value="2">Hamburg</option>
                                        <option value="3">Munich </option> -->
                                    </select>
                                </div>
                                <div class="col-6 px-3">
                                    <label for="name" class="form-label">Collaborater </label>
                                    <select class="form-select" aria-label="Default select example" name ="collaborater" id = "collaborater">
                                        <option selected>Select Location</option>

                                    </select>
                                </div>
                            </div>



                            <div class="form-group d-flex mb-4 row">
                                <div class="col-6 px-3 p-3">
                                    <input type = "button" class = "btn btn-primary " value = "Submit" onclick="newappointment()">
                                    {{-- <label for="name" class="form-label">Date </label>
                                    <input type="date" class="form-control" id="date" aria-describedby="date"> --}}
                                </div>
                                <div class="col-6 px-3 p-3 mt-3 text-end">                                    
                                    {{-- <a href=" myorders-checkout.html" class="btn btn-primary mt-1">Submit </a> --}}
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Book now end-->

                    <!-- Next appointment start -->
                    <div class="mt-5 mb-5">
                        <h2 class="mb-3 appointmentsheader"  style="display: none;">Courses</h2>

                        <div class="row appointments">


                            <!--2 card -->


                            <!--3 card -->


                            <!--4 card -->


                        </div><!-- row end -->


                    </div>
                    <!-- Next appointment end -->


                </div>

                <div class="col-md-4">
                    <div class="box">
                        <div class="row ">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d5522.118713843893!2d6.1383796!3d46.2092742!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x478c636d870b0e3b%3A0x685b8cd82efe6f5f!2sAel%20Driving%20School%20Gen%C3%A8ve%20L%C3%A9manique%20Rue%20de%20Lyon%206%201201%20Gen%C3%A8ve%20Switzerland!3m2!1d46.209274199999996!2d6.1383795999999995!5e0!3m2!1sen!2sin!4v1690953816128!5m2!1sen!2sin"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>

                        </div>
                        <div class="px-4 pb-4">

                            <div class="mt-5 mb-5">
                                <h5>Staff</h5>
                                <div class="d-flex flex-wrap">
                                    <span class="me-2 mb-2"><img src="{{asset('images/img/users/user1.png')}}"
                                            class="rounded-circle" alt="Townhouses and Skyscrapers"
                                            height="30" width="30" /></span>
                                    <span class="me-2 mb-2 "><img src="{{asset('images/img/users/user2.png')}}"
                                            class="rounded-circle" alt="Townhouses and Skyscrapers"
                                            height="30" width="30" /></span>
                                    <span class="me-2 mb-2"><img src="{{asset('images/img/users/user3.png')}}"
                                            class="rounded-circle" alt="Townhouses and Skyscrapers"
                                            height="30" width="30" /></span>
                                    <span class="me-2 mb-2"><img src="{{asset('images/img/users/user4.png')}}"
                                            class="rounded-circle" alt="Townhouses and Skyscrapers"
                                            height="30" width="30" /></span>
                                </div>
                            </div>

                            <div class="mt-5 mb-5">
                                <h5>Contact</h5>
                                <p>+41 79 326 38 46 <br>info@ae-l.ch
                                </p>
                            </div>

                            <div class="mt-5 mb-5">
                                <h5>Driver Timing</h5>
                                <div class="d-flex">
                                    <div class="col">
                                        Monday<br>
                                        Tuesday<br>
                                        Wednesday<br>
                                        Thusday<br>
                                        Friday<br>
                                        Saturday<br>
                                        Sunday<br>
                                    </div>
                                    <div class="col"> </div>9:00-12:00, 13:00-19:00 <br>
                                    09:00-20:00<br>
                                    09:00-20:00<br>
                                    09:00-21:00<br>
                                    09:00-12:00<br>
                                    13:00-19:00,
                                    10:30-18:00<br>
                                    Closed
                                </div>
                            </div>

                            <div class="mt-5 mb-5">
                                <h5>Social Media</h5>
                                <div class="d-flex">
                                    <i class="fab fa-facebook me-3"></i>
                                    <i class=" fab fa-instagram me-3"></i>
                                    <i class="fab fa-twitter me-3"></i>
                                </div>
                            </div>
 @if(\Auth::user())
                                    <p  id="auth-check" style="display: none">{{\Auth::user()->id}}
                                    </p>
                                    @endif
                            <div class="mt-5 mb-5">
                                <h5>Recommandé par 10 personnes </h5>

                                <div class="d-flex flex-wrap">
                                    <span class="me-2 mb-2"><img src="{{asset('images/img/users/user1.png')}}"
                                            class="rounded-circle" alt="Townhouses and Skyscrapers"
                                            height="40" width="40" /></span>
                                    <span class="me-2 mb-2"><img src="{{asset('images/img/users/user2.png')}}"
                                            class="rounded-circle" alt="Townhouses and Skyscrapers"
                                            height="40" width="40" /></span>
                                    <span class="me-2 mb-2"><img src="{{asset('images/img/users/user3.png')}}"
                                            class="rounded-circle" alt="Townhouses and Skyscrapers"
                                            height="40" width="40" /></span>
                                    <span class="me-2 mb-2"><img src="{{asset('images/img/users/user4.png')}}"
                                            class="rounded-circle" alt="Townhouses and Skyscrapers"
                                            height="40" width="40" /></span>
                                </div>
                            </div>

                        </div><!-- end px-5-->


                    </div> <!--end px 4-->

                </div> <!-- end col-4 -->

            </div> <!-- end row -->
        </div> <!-- end container-->


    </section>


<!--     <section class="mt-5 mb-5">
        <div class="container">
            <h2 class="px-1 mb-4">Our Services</h2>

            <div class="table-responsive">
            <table class="table">
                <tbody>
                    @foreach ($services as $servicedata )
                    <tr>
                        <th scope="row">{{$servicedata->name}}</th>
                        <td>{{$servicedata->duration}} hrs</td>
                        <td>{{$servicedata->price_original}} CHF</td>
                        <td class="text-center"><a href="{{route('booking.book_appointment',$servicedata->id)}}" class="btn btn-primary btn-sm">Book Appointment</a></td>
                    </tr>

                    @endforeach





                </tbody>
            </table>
</div>
        </div>
    </section> -->


    <section class="mt-5 mb-5">
        <div class="container">
            <h2 class="px-1 mb-4">Our Products</h2>

        <!--     <div class="row">
                @foreach ($product as  $productcollection)



                <div class="col-lg-3">
                    <div class="card">
                        <img src="{{asset('images/img/img-cardriving.png')}}" height="250" class="card-img-top"
                            alt="cardriving" />
                        <div class="card-body">
                            <div class="d-flex flex-wrap">
                                <div class="col-9">
                                    <h5 class="card-title">{{$productcollection->name}}</h5>
                                </div>


                            </div>


                            <div class="buy d-flex justify-content-between align-items-center">
                                <div class="price text-success">
                                    <del class="fw-600 opacity-50 ">
                                        {{$productcollection->price_original}} CHF
                               </del>
                                    <h5 class="mt-0">{{$productcollection->price_discounted}}</ CHF</h5>
                                </div>
                                 <a href="{{route('booking.booking_personal_info')}}" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Buy</a>
                              </div>
                        </div>
                    </div>
                </div>
                @endforeach
             </div> -->
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
                                @foreach($product as  $productcollection)
                                 @if($loop->iteration % 2 == 0)
                                 <div class="col-lg-3">
                    <div class="card" style="background: #ffff!important;">
                        <img src="{{asset('/').$productcollection->image}}" height="250" class="card-img-top"
                            alt="cardriving" />
                        <div class="card-body">
                            <div class="d-flex flex-wrap">
                                <div class="col-12">
                                    <h5 class="card-title" style="font-size:initial;">{{$productcollection->name}}</h5>
                                </div>


                            </div>


                            <div class="">
                                <div class="price text-success">
                                    <del class="fw-600 opacity-50 ">
                                        {{$productcollection->price_original}} CHF
                               </del>
                                    <h5 class="mt-0">{{$productcollection->price_discounted}} CHF</h5>
                                </div>
                                
                              </div>
                              <input type='button' value='-' class='btn qtyminus minus' field='quantity'style="background-color: #e43f52;color: #ffff ;border-radius: 5px;"/>
                                      <input type='text' name='quantity'  class="quantity-add"value='1' class='qty' style="width: 38px;height: 30px;text-align:center;" />
                                      <input type='button' value='+' class='btn qtyplus plus' field='quantity' style="background-color: #e43f52;color: #ffff;border-radius: 5px;" />
                                   

                                <div>
                                    <a href="#"  onclick="addToCart({{$productcollection}})" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i>Cart</a>
                                    <a href="{{route('booking.booking_personal_info')}}" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Buy</a>
                                </div>
                        </div>
                    </div>
                </div>
                                @endif
                                @endforeach
<!-- 
                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <a href="driving-page.html"> <img src="{{asset('images/img/first-aid.avif')}}" height="250"
                                                class="card-img-top" alt="cardriving" /> </a>
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Exclusive Driving </h5>
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
                                                    <h5 class="card-title">Exclusive Driving </h5>
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
                                                    <h5 class="card-title">Exclusive Driving </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>


                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>

                    <!-- Single item -->
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">

                                 @foreach($product as  $productcollection)
                                 @if($loop->iteration % 2 != 0)
                                <div class="col-lg-3">
                    <div class="card" style="background: #ffff!important;">
                        <img src="{{asset('/').$productcollection->image}}" height="250" class="card-img-top"
                            alt="cardriving" />
                        <div class="card-body">
                            <div class="d-flex flex-wrap">
                                <div class="col-12">
                                    <h5 class="card-title" style="font-size:initial;">{{$productcollection->name}}</h5>
                                </div>


                            </div>


                            <div class="">
                                <div class="price text-success">
                                    <del class="fw-600 opacity-50 ">
                                        {{$productcollection->price_original}} CHF
                               </del>
                                    <h5 class="mt-0">{{$productcollection->price_discounted}} CHF</h5>
                                </div>
                                
                              </div>

                              <input type='button' value='-' class=' btn qtyminus minus' field='quantity'style="background-color: #e43f52;color: #ffff;border-radius: 5px;"/>
                                      <input type='text' name='quantity' class="quantity-add" value='1' class='qty' style="width: 38px;height: 30px;text-align:center;"/>
                                      <input type='button' value='+' class='btn qtyplus plus' field='quantity' style="background-color: #e43f52;color: #ffff;border-radius: 5px;" />
                                   

                                <div>
                                    <a href="#"  onclick="addToCart({{$productcollection}})" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i>Cart</a>
                                    <a href="{{route('booking.booking_personal_info')}}" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Buy</a>
                                </div>
                        </div>
                    </div>
                </div>
                                @endif
                                @endforeach

                            <!--     <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card">
                                        <img src="{{asset('images/img/first-aid.avif')}}" height="250" class="card-img-top"
                                            alt="cardriving" />
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="col-9">
                                                    <h5 class="card-title">Exclusive Driving </h5>
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
                                                    <h5 class="card-title">Exclusive Driving </h5>
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
                                                    <h5 class="card-title">Exclusive Driving </h5>
                                                </div>

                                                <div class="col-sm-3"><i class="fas fa-star"></i> 4.5</div>
                                            </div>


                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>


                </div>
                <!-- Inner -->
            </div>









        </div>
    </section>



@endsection
@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>

<script>

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
        swal("Successfully added to cart", "success");
         // $("#msg").html(data.msg);
       }
    });
        console.log(service);

    }







function loadlocation_collaborater(id){
   var country_id = id;
   var category  = $('#category').val();
    $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('get-collaboratera')}}",
                type: 'POST',
                data: {
                    country_id  : country_id,
                    category    : category,

                },
                success: function (response) {
                    var obj = JSON.parse(response);
                    if(obj != ''  ) {
                        $('[name="collaborater"]').html(obj);

                    }

                }
            });
}





function newappointment(){
    var location = $('#location').val();
   var category  = $('#category').val();
   var collaborater  = $('#collaborater').val();
   var locationtext = $('#location :selected').text();


    $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('get-appointment')}}",
                type: 'POST',
                data: {
                    location   : location,
                    category     : category,
                    collaborater : collaborater,
                    locationtext,locationtext,

                },
                success: function (response) {
                    var obj = JSON.parse(response);
                    if(obj != ''  ) {
                        $('.appointmentsheader').css({'display':'block'});;
                        $('.appointments').html(obj);

                    }


                }
            });




}
</script>




@endpush
