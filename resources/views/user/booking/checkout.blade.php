@extends('public.layouts.app')
@section('content')
 <section class="section">
        <div class="container">
            <div class="ptb-100">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="mb-5">Checkout</h1>


                        <div class="mb-4" style="padding:15px; border:1px solid #eee;">
                            <span class="float-end" style="font-weight: bold; color:#4700AB;"> <i
                                    class="fas fa-pen-to-square"></i> Edit</span>
                            <h5 class="uppercase"><i class="fas fa-check"></i> PERSONAL INFORMATION</h5>
                        </div>
                        <form id="payment-form">
                        <div class="mb-4" style="padding:15px; border:1px solid #eee;">

                            <h5 class="mb-3">PAYEMENT</h5>

                            <div class="form-check bg-light py-3 mb-3">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" value="card" />
                                <label class="form-check-label" for="flexRadioDefault2"> Card </label>
                            </div>

                            <div class="form-check bg-light py-3 mb-3">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2"  value="cash" />
                                <label class="form-check-label" for="flexRadioDefault2"> Cash </label>
                            </div>

                           <!--  <div class="form-check bg-light py-3 mb-3">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" value="invoice" />
                                <label class="form-check-label" for="flexRadioDefault2"> Invoice </label>
                            </div> -->
                        <div class="card-details" id="card-details" style="display: none">

                            <div id="payment-element"></div>

                          <!--   <div class="mb-3">
                                <label for="name" class="form-label">Type of Card </label>
                                <input type="text" class="form-control" id="name" aria-describedby="name"
                                    placeholder="Lorem Ipsum">
                            </div>
                                
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Name on Card </label>
                                <input type="text" class="form-control" id="name" aria-describedby="name"
                                    placeholder="Lorem Ipsum">
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Expiration Date
                                </label>
                                <input type="text" class="form-control" id="name" aria-describedby="name"
                                    placeholder="Lorem Ipsum">
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Security Code
                                </label>
                                <input type="text" class="form-control" id="name" aria-describedby="name"
                                    placeholder="Lorem Ipsum">
                            </div> -->

                            <!-- Default checked radio -->
                            <div class="form-check mb-3 mt-2" style="padding-left:1.5rem;">
                                <input class="form-check-input" type="radio" name="flexRadioDefault8"
                                    id="flexRadioDefault2" checked />
                                <label class="form-check-label" for="flexRadioDefault2"> I accept general
                                    conditions</label>
                            </div>


                            <!-- Default checked radio -->
                            <div class="form-check mb-3" style="padding-left:1.5rem;">
                                <input class="form-check-input" type="radio" name="flexRadioDefault2"
                                    id="flexRadioDefault3" checked />
                                <label class="form-check-label" for="flexRadioDefault3"> save my personnal data for the
                                    next
                                    orders </label>
                            </div>


                            <!-- Default checked radio -->
                            <div class="form-check mb-3" style="padding-left:1.5rem;">
                                <input class="form-check-input" type="radio" name="flexRadioDefault3"
                                    id="flexRadioDefault4" checked />
                                <label class="form-check-label" for="flexRadioDefault4"> Receive offers from our
                                    partners
                                </label>
                            </div>

                            <!-- Default checked radio -->
                            <div class="form-check mb-3" style="padding-left:1.5rem;">
                                <input class="form-check-input" type="radio" name="flexRadioDefault5"
                                    id="flexRadioDefault5" />
                                <label class="form-check-label" for="flexRadioDefault5"> Sign up for our newsletter
                                </label>
                                <p>you may unsubscribe at any moment. for that purpose, please find out contact info in
                                    the
                                    legal notice.</p>
                            </div>
                             <!-- <span id="button-text">Pay now</span> -->

                            <button class="float-end mt-3 mb-3" id="submit" type="submit">  <span id="button-text">Payer</span>
                                 <div class="spinner hidden" id="spinner"></div>
                            </button>
                             <!-- <div class="spinner hidden" id="spinner"></div> -->
                             <div id="payment-message" class="hidden"></div>
                          <!--   <div class="float-end mt-3 mb-3"> <a href="{{route('booking.order_confirmation')}}" type="submit"
                                    class="btn btn-primary">Payer
                                </a>
                            </div> -->

                            <div class="clearfix"></div>

                        </div>
                        </div>

                        </form>
                    </div>

                    <div class="col-md-4 p-5">
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
<script type="text/javascript">
var elements;
var stripe;
    document
  .querySelector("#payment-form")
  .addEventListener("submit", handleSubmit);
$('input[type=radio][name=flexRadioDefault]').change(function() {
  let emailAddress = '';

     // stripe = Stripe('pk_test_51IVyvECgG9Z1id5F0O39Lqhh1QLn08jYc9IrN175nyhFDa0ak4FTj1daWvNxfgn1UVRh1DAawEOa6QLPkeh6wDF600OCeIB7je');

     stripe = Stripe('pk_test_51JvvSdA7giYczcnr7o3ZLd82BpCv8nuRYjGAQwG8WG4D5kM2we9scikZzLtufNeLiX33urs3rC41C0FJFAni0ksD00EMehACWm');

const appearance = { /* appearance */ };
const options = {
  layout: {
    type: 'tabs',
    defaultCollapsed: false,
  }
};
   // alert(this.value);
    if(this.value == 'card'){
         $('#card-details').css('display','block');
         $.ajax({
            type: 'GET',
            url: "{{route('create-stripe-intent')}}",
            //data: formData,
           // dataType: 'json',
            success: function (data) {
               console.log(data);
               clientSecret = data.data.clientSecret;
             elements = stripe.elements({ clientSecret, appearance });
             paymentElement = elements.create('payment', options);
            paymentElement.mount('#payment-element');
            },
            error: function (data) {
                console.log(data);
            }
       });

    }else{
        $('#card-details').css('display','none');
    }
    // if (this.value == 'allot') {
    //     // ...
    // }
    // else if (this.value == 'transfer') {
    //     // ...
    // }
});

// card payment submit

async function handleSubmit(e) {
  e.preventDefault();
  setLoading(true);
 // const stripe = Stripe('pk_test_51IVyvECgG9Z1id5F0O39Lqhh1QLn08jYc9IrN175nyhFDa0ak4FTj1daWvNxfgn1UVRh1DAawEOa6QLPkeh6wDF600OCeIB7je');
//  const customer = await stripe.customers.create({
//   name: 'Jenny Rosen',
//   address: {
//     line1: '510 Townsend St',
//     postal_code: '98140',
//     city: 'San Francisco',
//     state: 'CA',
//     country: 'US',
//   },
// });
  const { error } = await stripe.confirmPayment({
    elements,
    confirmParams: {
      // Make sure to change this to your payment completion page
      return_url: "http://bookertest.aryvart.com/checkout",
      receipt_email:  'madhu@gmail.com',
    },
  });

  // This point will only be reached if there is an immediate error when
  // confirming the payment. Otherwise, your customer will be redirected to
  // your `return_url`. For some payment methods like iDEAL, your customer will
  // be redirected to an intermediate site first to authorize the payment, then
  // redirected to the `return_url`.
  if (error.type === "card_error" || error.type === "validation_error") {
    showMessage(error.message);
  } else {
    showMessage("An unexpected error occurred.");
  }
  checkStatus();

  setLoading(false);
}

// Fetches the payment intent status after payment submission
async function checkStatus() {

  console.log('checkoutstatus')
  const clientSecret = new URLSearchParams(window.location.search).get(
    "payment_intent_client_secret"
  );
  const payment_intent = new URLSearchParams(window.location.search).get(
    "payment_intent"
  );

  if (!clientSecret) {
    return;
  }
   stripe = Stripe('pk_test_51JvvSdA7giYczcnr7o3ZLd82BpCv8nuRYjGAQwG8WG4D5kM2we9scikZzLtufNeLiX33urs3rC41C0FJFAni0ksD00EMehACWm');

  console.log(stripe);

  const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

  console.log(paymentIntent);

  switch (paymentIntent.status) {
    case "succeeded":
    price = {{$price}};

    console.log(price,'price');
    orderData = {payment_intent:payment_intent,payment_intent_client_secret:clientSecret,price:price}
      showMessage("Payment succeeded!");
       $.ajax({
            type: 'POST',
            url:"{{route('create-order')}}",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            data: orderData,
            dataType: 'json',
            success: function (data) {
               if(data.msg == 'success'){
                window.location.href = 'http://bookertest.aryvart.com/order-confirmation';
               }
            },
            error: function (data) {
                console.log(data);
            }
        });

      // setTimeout({
       
      // },5000);
//         console.log('asdadad');
//       setTimeout(() => {
//         console.log('asdadad');
//   window.location.href = 'http://bookertest.aryvart.com/order-confirmation';
// }, 5000);
      break;
    case "processing":
      showMessage("Your payment is processing.");
      break;
    case "requires_payment_method":
      showMessage("Your payment was not successful, please try again.");
      break;
    default:
      showMessage("Something went wrong.");
      break;
  }
}

// UI Helpers

function showMessage(messageText) {
  const messageContainer = document.querySelector("#payment-message");

  messageContainer.classList.remove("hidden");
  messageContainer.textContent = messageText;

  setTimeout(function () {
    messageContainer.classList.add("hidden");
    messageContainer.textContent = "";
  }, 4000);
}

// Show a spinner on payment submission
function setLoading(isLoading) {
  if (isLoading) {
    // Disable the button and show a spinner
    document.querySelector("#submit").disabled = true;
    document.querySelector("#spinner").classList.remove("hidden");
    document.querySelector("#button-text").classList.add("hidden");
  } else {
    document.querySelector("#submit").disabled = false;
    document.querySelector("#spinner").classList.add("hidden");
    document.querySelector("#button-text").classList.remove("hidden");
  }
}

</script>

<script>


  $(document).ready(function(){
     const clientSecret = new URLSearchParams(window.location.search).get(
    "payment_intent_client_secret"
  );
     if(clientSecret){
      checkStatus();
     }
  });
    //ajax call to create intent

     // $.ajax({
     //        type: 'GET',
     //        url: {{route('create-stripe-intent')}},
     //        //data: formData,
     //        dataType: 'json',
     //        success: function (data) {
     //           console.log(data);
     //        },
     //        error: function (data) {
     //            console.log(data);
     //        }
     //    });



//     const stripe = Stripe('pk_test_51IVyvECgG9Z1id5F0O39Lqhh1QLn08jYc9IrN175nyhFDa0ak4FTj1daWvNxfgn1UVRh1DAawEOa6QLPkeh6wDF600OCeIB7je');

// const appearance = { /* appearance */ };
// const options = {
//   layout: {
//     type: 'tabs',
//     defaultCollapsed: false,
//   }
// };

// clientSecret = 'sk_test_51IVyvECgG9Z1id5FuG7SacrbF8wTpux00lZ844KZX5VSconhCSbcc35HSb5QdkGZp4WmoPeHoG4HufiybavYyTOa00OunzwSFB';
// const elements = stripe.elements({ clientSecret, appearance });
// const paymentElement = elements.create('payment', options);
// paymentElement.mount('#payment-element');
</script>
@endpush