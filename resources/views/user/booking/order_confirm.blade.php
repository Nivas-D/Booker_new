@extends('public.layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <div class="ptb-100">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="mb-5">Your Orders</h1>


                        <div class="mb-4">

                            <h5 class="uppercase"><img src="{{asset('images/img/check.png')}}" height="24px;" class="me-2">
                                Your Order is
                                Confirmed</h5>
                            <p class=" text-mute">
                                An email had been sent to the support@domain.com address.</p>
                        </div>

                        <div class="mb-4" style="padding:15px; border:1px solid #eee;">

                            <h5 class="mb-3">Order Items</h5>

                            <div class="d-flex">

                                <div class="col-4">
                                    <img src="{{asset('images/img/first-aid.avif')}}" style="width: 110px;"> 
                                </div>
                                <div class="col-4">
                                    <h6>Product Name</h6>
                                    <p>First Aid</p>
                                </div>
                                <div class="col-4">
                                    <h6>Dates</h6>
                                    <p>23 mars 2021 17:00-18:30</p>
                                </div>


                            </div>

                            <div class="row flex mt-5">
                                <div class="col-10 bold">Subtotal </div>
                                <div class="col-2">80 CHF</div>
                            </div>
                            <div class="row flex">
                                <div class="col-10 bold">Shipping and handling </div>
                                <div class="col-2">Free</div>
                            </div>
                            <div class="row flex bg-light p-2 my-2">
                                <div class="col-10">Total (TAX INCL.) </div>
                                <div class="col-2">80 CHF</div>
                            </div>

                            <div class="row mt-5">
                                <h6>Order deails</h6>
                                <p>Order reference: MYAPJFASP</p>
                                <p>Payment method: Payments by check </p>
                                <p>Date Change: you have 72 hours to change or canccel your dates</p>

                            </div>


                        </div>

                        <div class="mb-4" style="padding:15px; border:1px solid #eee;">
                            <h6>Your order in Shop in complete</h6>
                            <p>
                                Your check must include:<br>
                                - Payment amount: 68.93 CHF <br>
                                - Payable to the order of -------- <br>
                                - Mail to ---------------- <br>
                                - Do not forget to insert your order reference: MYAPJFASP</p>

                            <p>An email has been sent to you with this information </p>
                            <p class="bold">Your order will be sent as soon as we receive your payment. </p>

                            <p>For any questions or for further information, please contact our <a href="#"
                                    class="bold">Customer and
                                    department </a> </p>

                        </div>

                        </form>
                    </div>

                    <!-- <div class="col-md-4 p-5">
                        <form class="mt-3">
                            <p class="bold">There is 1 item in your cart.</p>
                            <div class="row flex">
                                <div class="col-10 bold">Lorem Ipsum </div>
                                <div class="col-2 bold">$68.93</div>
                                <small class="text-mute">23 march 2021 17:00-18:30 </small>
                            </div>
                            <div class="row flex bg-light p-2 my-2">
                                <div class="col-10 bold">Total (TAX INCL.) </div>
                                <div class="col-2 bold">$68.93</div>
                            </div>
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




                    </div> -->
                </div>
            </div>
        </div>

    </section>



@endsection
