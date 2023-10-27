@extends('public.layouts.app')
@section('content')
<?php 
// $arrayData = $orderDetails->toJson();
$item = $orderDetails;
//  echo json_encode($orderDetails);
 ?>
<script src="{{ asset('libs/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<section>
   <div class="container">
     <div class="row pt-3">
       <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
           <li class="breadcrumb-item">
             <a href="{{ route('public.home') }}">Home</a>
           </li>
           <li class="breadcrumb-item active" aria-current="page">
             <a href="{{ route('user/dashboard') }}">Dashboard</a>
           </li>
         </ol>
       </nav>
     </div>
     <div class="row">
       <div class="col-lg-12 mt-5 pt-5">
         <h1 class="Page_Heading text-start mb-5">Order Details</h1>
       </div>
       <div class="col-lg-12 border border_Style">
         <div class="padding_css">
           <h3 class="Sub_3_Heading">Order items</h3>
           <div class="row">
             <div class="col-lg-2">
               <img src="{{ asset($item->product->image)}}" class="img-fluid" alt="">
             </div>
             <div class="col-lg-2">
               <h4 class="Order_heading">Product name</h4>
               <span class="d-block">{{$item->product->name}}</span>
             </div>
             <div class="col-lg-2">
               <h4 class="Order_heading">Quantity</h4>
               <span class="d-block">{{$item->quantity}}</span>
             </div>
             <div class="col-lg-3">
               <h4 class="Order_heading">Status - Order status</h4>
               <span class="d-block sub_head_sub d-flex justify-content-start">3/3 effectués</span>
               <span class="product_sub d-block">{{$item->order_status}}</span>
               <!-- <span class="product_sub d-block">Sensi Part 2 - 16.06.2022 </span>
               <span class="product_sub d-block"> Sensi Part 3 - 17.06.2022</span> -->
             </div>
             <div class="col-lg-3">
               <h4 class="Order_heading">Status - Pack part 2</h4>
               <span class="d-block sub_head_sub d-flex justify-content-start">0/3 effectués</span>
               <button class="theme_btn mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal"> Choose dates </button>
             </div>
             <div class="col-lg-12 d-flex justify-content-between">
               <span class="d-block text_style">Subtotal</span>
               <span class="d-block text_style">CHF {{$item->amount}}</span>
             </div>
             <div class="col-lg-12 d-flex justify-content-between Bg_total align-items-center">
               <span class="d-block Total_text text-decoration-underline">TOTAL (TAX INCL.)</span>
               <span class="d-block Total_text text-decoration-underline">CHF {{$item->amount}}</span>
             </div>
             <div class="col-lg-12 mt-3">
               <h4 class="heading_order">Order details</h4>
               <p class="mt-2 para_order m-0"> Payment method: Payments by {{$item->payment_method}} </p>
               <p class="mt-2 para_order m-0"> Payment status: {{$item->payment_status}} </p>
               <p class="para_order m-0"> Date change: You have 72 hours to change or cancel your dates </p>
               <p class="para_order m-0 mt-5"> For any questions or for further information, please contact our customer and department. </p>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
    
<script>
</script>
@endsection
