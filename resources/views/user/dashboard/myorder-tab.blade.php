<?php 
// $arrayData = $myorder->toArray();
//  echo json_encode($arrayData);
 ?>

<div class="container"> 
  <div class="row">

    <div class="col-lg-12 mt-4">
      <div class="">
        <h3 class="Sub_3_Heading">Order items</h3>
        <div class="row">
          <div class="col-lg-2">
            <img src="{{ asset('images/img/order_noimage.png') }}" class="img-fluid" alt="" />
          </div>
          <div class="col-lg-2">
            <h4 class="Order_heading">Product name</h4>
            <span class="d-block pt-2">Lorem Ipsum</span>
          </div>          
          <div class="col-lg-2">
            <h4 class="Order_heading">Quantity</h4>
            <div class="d-flex pt-2">
              <span class="d-block"
                ><i class="bi bi-plus icon_style"></i
              ></span>
              <span class="d-block mx-2">1</span>
              <span class="d-block"
                ><i class="bi bi-dash icon_style"></i
              ></span>
            </div>
          </div>
          <div class="col-lg-2">
            <h4 class="Order_heading">Total Amount</h4>
            <span class="d-block pt-2">68.93 CHF</span>
          </div>
          <div class="col-lg-2">
            <h4 class="Order_heading">Payment method</h4>
            <span class="d-block pt-2">Stripe</span>
          </div>
          <div class="col-lg-2">
            <h4 class="Order_heading">Status</h4>
            <span class="d-block pt-2">1/2 effectués</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-12 mb-4 d-flex justify-content-end">
      <a class="theme_btn me-3" href="{{ route('user/myservice/order') }}">Choose dates</a>
      <a class="theme_btn" href="{{ route('user/myservice/order') }}">See more</a>
    </div>

    <div class="col-12">
      <div>
      @foreach($myorder as $item)
        <div class="row mt-3 mt-md-5">
          <div class="col-lg-2 text-sm-center align-items-center">
            <div style="width: 180px;height: 180px;overflow: hidden;">
              <img src="{{ asset($item->product->image)}}" style="max-width: 100%;max-height: 100%;" alt="{{$item->product->name}}">
            </div>
          </div>
          <div class="col-lg-2">
            <h4 class="Order_heading">Product name</h4>
            <span class="d-block pt-2">{{$item->product->name}}</span>
          </div> 
          <div class="col-lg-2">
            <h4 class="Order_heading">Quantity</h4>
            <div class="d-flex pt-2">
              <span class="d-block"
                ><i class="bi bi-plus icon_style"></i
              ></span>
              <span class="d-block mx-2">{{$item->quantity}}</span>
              <span class="d-block"
                ><i class="bi bi-dash icon_style"></i
              ></span>
            </div>
          </div>
          <div class="col-lg-2">
            <h4 class="Order_heading">Total Amount</h4>
            <span class="d-block pt-2">{{$item->amount}} CHF</span>
          </div>
          <div class="col-lg-2">
            <h4 class="Order_heading">Payment method</h4>
            <span class="d-block pt-2">{{$item->payment_method}}</span>
          </div>
          <div class="col-lg-2">
            <h4 class="Order_heading">Status</h4>
            <span class="d-block pt-2">{{$item->order_status}}</span>
          </div>
          <div class="col-lg-12 mb-4 d-flex justify-content-end">            
            <a class="theme_btn" href="{{ route('user/myorders/order', ['id' => base64_encode($item->id)]) }}">See more</a>
          </div>
          
        </div>
        @endforeach
       
      </div>
    </div>
  </div>
</div>