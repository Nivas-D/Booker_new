<?php //$arrayData = $myorder->toArray();
 //echo json_encode($arrayData);?>
<div class="row">
  <div class="col-12">
    <div>
    @foreach($mycart as $item)
      <div class="row mt-3 mt-md-5">
        <div class="col-lg-2 text-sm-center align-items-center">
          <div style="width: 180px;height: 180px;overflow: hidden;">
            <img src="{{ asset($item->product->image)}}" style="max-width: 100%;max-height: 100%;" alt="{{$item->product->name}}">
          </div>
        </div>
        <div class="col-lg-2">
          <div>
            <h2 class="C-order-tittle">Poduct name</h2>
          </div>
          <div class="mt-5">
            <h6 class="C-order-para">{{$item->product->name}}</h6>
          </div>
        </div>
        <div class="col-lg-2">
          <div>
            <h2 class="C-order-tittle">Unit price</h2>
          </div>
          <div class="mt-5">
            <h6 class="C-order-para">{{$item->product->price_discounted}}CHF</h6>
          </div>
        </div>
        <div class="col-lg-2">
          <div>
            <h2 class="C-order-tittle">Quantity</h2>
          </div>
          <div class="mt-5">
            <div class="number d-flex">
              <span class="minus mx-3">-</span>
              <input type="text" class="input-border-none w-25" value="{{$item->qty}}">
              <span class="plus">+</span>
            </div>
          </div>
        </div>
        <div class="col-lg-2">
          <div>
            <h2 class="C-order-tittle">Total Amount</h2>
          </div>
          <div class="mt-5">
            <h6 class="C-order-para">{{$item->product->price_discounted*$item->qty}} CHF</h6>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="d-flex justify-content-between">
            <div>
              <h2 class="C-order-tittle">Status</h2>
            </div>
            <div class="d-flex">
              <div>
                <img src="{{ asset('images/edit.png')}}" alt="">
              </div>
              <div>
                <img src="{{ asset('images/delete.png')}}" alt="" class=" mx-3">
              </div>
            </div>
          </div>
          <div class="mt-5">
            <h6 class="C-order-para">Sent</h6>
          </div>
          <!-- <div>
            <button class="C-myorder-btn">see more</button>
          </div> -->
        </div>
      </div>
      @endforeach
     
    </div>
  </div>
</div>