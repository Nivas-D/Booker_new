@extends('public.layouts.app')
@section('content')
 <section class="section">
        <div class="container">
            <div class="ptb-100">
                <div class="row">
                    <div class="col-md-8 px-4">
                        <h1 class="mb-5">Booking</h1>
                        <h5 class="uppercase mb-5 ">PERSONAL INFORMATION</h5>

                        <form  class="mt-3" id="personal-information-form">
                            @csrf
                            <div class="mb-3">


                                <label for="name" class="form-label">Name * </label>
                                <input type="text" name="name" class="form-control" id="name" aria-describedby="name"
                                    placeholder="Jhon Doe" value="@if(\Auth::check()) {{\Auth::user()->name}} @endif">
                                    <div class="errordisplay"></div>
                            </div>
                            <div class="mb-3">
                                <label for="surname" class="form-label">Surname *</label>
                                <input type="text" name="surname" class="form-control" id="surname" aria-describedby="surname">
                            </div>

                            <div class="mb-3">
                                <label for="birthdate" class="form-label">Birth Date *</label>
                                <input type="date" name="birthdate" class="form-control" id="birthdate" aria-describedby="birthdate">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-Mail Confirmation *</label>
                                <input type="email"  name='email'
                                class="form-control" id="email" aria-describedby="email"
                                    placeholder="jhon@abc.com">
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number *</label>
                                <input type="tel" name="phone" class="form-control" id="phone" aria-describedby="phone"
                                    placeholder="+91 1234567890">
                            </div>

                            <div class="mb-3">
                                <label for="address1" class="form-label">Addess line 1 </label>
                                <input type="text" name="address1" class="form-control" id="address1" aria-describedby="emailHelp"
                                    placeholder="Address 1">
                            </div>

                            <div class="mb-3">
                                <label for="address2" class="form-label">Address Line 2</label>
                                <input type="text" name="address2" class="form-control" id="address2" aria-describedby="address"
                                    placeholder="Address 2">
                            </div>


                            <button class="float-end btn btn-primary mb-3"> Submit </button>
                            <!-- <a href="{{route('booking.checkout')}}" type="submit" class="btn btn-primary"></a> -->
                        </form>
                    </div>
                    <div class="col-md-4 px-4">
                        <form class="mt-3">
                           
                            @if(\Auth::check())
                            <p class="bold">There is {{count($cart)}} item in your cart.</p>
                            @else
                            <p class="bold">There is 2 item in your cart.</p>
                            @endif
                            <?php $price = 0;?>
                            @foreach($cart as $product)
                            @php
                            $item = \App\Models\Service::find($product->product_id);
                             
                            if($item){
                                $price += (int)$item->price_discounted;
                            }else{
                                $price += 0;
                                //$item->price_discounted =0;
                            }
                            
                            @endphp
                            @if($item)
                            <div class="row flex">
                                <div class="col-8 bold">{{$item->name}} </div>
                                <div class="col-3 bold " style="display: contents;">{{$item->price_discounted}} CHF</div>
                                <div onclick="removeItem({{$product->id}})" style="color: red">X</div>
                                <small class="text-mute">23 march 2021 17:00-18:30 </small>
                            </div>
                            @endif
                            @endforeach

                            @if(\Auth::check())
                            <div class=" flex bg-light p-2 my-2 px-2">
                                <div class="col-9 bold">Total (TAX INCL.) </div>
                                <div class="col-2 bold" style="display: contents;">{{$price}} CHF</div>
                            </div>
                            @else
                             <div class=" flex bg-light p-2 my-2 px-2">
                                <div class="col-9 bold">Total (TAX INCL.) </div>
                                <div class="col-2 bold" style="display: contents;">68.93 CHF</div>
                            </div>
                            @endif



                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Discound Code </label>
                                <input type="text" class="form-control" id="text" aria-describedby="text">
                            </div>
                        </form>
                        <div class="terms">
                            <div class="d-flex flex-nowrap border-bottom">
                                <div class="order-2 p-2"><i class="fas fa-shield"></i></div>
                                <div class="order-3 p-2">Security Policy (edit with customer reassurance module)</div>
                            </div>

                            <div class="d-flex flex-nowrap border-bottom">
                                <div class="order-2 p-2"><i class="fas fa-truck"></i></div>
                                <div class="order-3 p-2">Delivery policy (edit with customer reassurance module)</div>
                            </div>

                            <div class="d-flex flex-nowrap border-bottom">
                                <div class="order-2 p-2"><i class="fas fa-repeat"></i></div>
                                <div class="order-3 p-2">Return Policy (edit with customer reassurance module)</div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>

    window.addEventListener('load', function() {
    $("#personal-information-form").validate({
        rules: {
            name: {
                required: true,
                maxlength: 20,
            },
            email: {
                required: true,
                email: true,
                maxlength: 50
            },
            surname: {
                required: true,

            },
            phone: {
                required: true,

            },
            birthdate: {
                required: true,

            },
            address1: {
                required: true,

            },
            address2: {
                required: true,

            },
        },
        messages: {
            name: {
                required: "Name is required",
                maxlength: "Name cannot be more than 20 characters"
            },
            email: {
                required: "Email is required",
                email: "Email must be a valid email address",
                maxlength: "Email cannot be more than 30 characters",
            },
            phone: {
                required: "Phone is required",

            },
            surname: {
                required:  "Surname is required",

            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            console.log(element);
            error.addClass('invalid-feedback');
            element.closest('.mb-3').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function(){
        window.location.href = "{{route('booking.checkout')}}";
    }
    });

//     $("form").submit(function() {
//     if($(this).valid()) {
//        //go ahead
//     } else {
//        //do some error handling
//     }
// });

//     if($("#personal-information-form").valid()) {
//  alert('valid');
// }
});

   function removeItem(id){
    var url = '{{ route("remove_cart_item", ":id") }}';
    url = url.replace(':id', id);
     $.ajax({
            type: 'GET',
            url:url,
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
               if(data.msg == 'success'){
               // window.location.href = 'http://bookertest.aryvart.com/order-confirmation';
               swal("Successfully Removed item from cart");

               setTimeout(() => {
 window.location.reload();
}, "2000");
               }
            },
            error: function (data) {
                console.log(data);
            }
        });
   }
</script>

@endpush
