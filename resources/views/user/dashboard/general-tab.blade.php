<?php 
   // user
   // $user = $user->toJson();
   //  echo ($arrayData);
   ?>
<form  role="form"  method="POST" action="{{ route('user/general/update') }}" id="business_form">
   @csrf
   <div class="row">
      <div class="col-lg-12">
         <div class="row">
            <div class="col-lg-4 col-sm-12 ">
               <div class="form-group {{ $errors->has('first_name') ? ' has-danger' : '' }}  ">
                  <p class="C-setting-input">First Name</p>
                  <div class="C-setting-input-box11 ">
                     <input type="text" name="first_name" value="{{old('first_name', $user->first_name)}}"  placeholder="First Name" class="form-control">
                      @error('first_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-sm-12 ">
               <div class="form-group  {{ $errors->has('last_name') ? ' has-danger' : '' }} ">
                  <p class="C-setting-input">Last Name</p>
                  <div class="C-setting-input-box1">
                     <input type="text" name="last_name" value="{{old('last_name', $user->last_name)}}"  placeholder="Last Name" class="form-control">
                      @error('last_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-sm-12 ">
               <div class="form-group ">
                  <p class="C-setting-input">Email</p>
                  <div class="C-setting-input-box1">
                     <input type="text" name="email" readonly="readonly" disabled style="background-color: #eee !important;" value="{{$user->email}}" placeholder="type here" class="form-control">
                  </div>
               </div>
            </div>
         </div>
         <!-- 2 row start here -->
         <div class="row mt-lg-3 mt-sm-0">
            <div class="col-lg-4 col-sm-12 ">
               <div class="form-group ">
                  <p class="C-setting-input">Mobile Phone</p>
                  <div class="C-setting-input-box1">
                     <span>
                     <input type="text" name="phone" value="{{$user->phone}}" placeholder="Mobile Number" class="form-control">
                     </span>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-sm-12 ">
               <div class="form-group ">
                  <p class="C-setting-input">Address</p>
                  <div class="C-setting-input-box1">
                     <span>
                     <input type="text" name="address" value="{{$user->address}}" placeholder="Enter your address" class="form-control">
                     </span>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-sm-12 ">
               <div class="form-group ">
                  <p class="C-setting-input">City</p>
                  <div class="C-setting-input-box1">
                     <input type="text" name="city"  value="{{$user->city}}" class="form-control" placeholder="City">
                  </div>
               </div>
            </div>
         </div>
         <!-- 3 row start here -->
         <div class="row mt-lg-3 mt-sm-0">
            <div class="col-lg-4 col-sm-12 ">
               <div class="form-group ">
                  <p class="C-setting-input">State</p>
                  <div class="C-setting-input-box1">
                     <input type="text" name="state" value="{{$user->state}}" placeholder="State" class="form-control">
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-sm-12 ">
               <div class="form-group ">
                  <p class="C-setting-input">Pincode</p>
                  <div class="C-setting-input-box1">
                     <input type="text" name="pincode" value="{{$user->pincode}}" placeholder="Pincode" class="form-control">
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-sm-12 ">
               <div class="form-group ">
                  <p class="C-setting-input">Country</p>
                  <div class="C-setting-input-box1">
                     <input type="text" list="browsers" name="country" value="{{$user->country}}" id="browser" placeholder="Country" class="form-control">
                     <!-- <span class="">
                     <img src="./Assets/images/downarrow.svg" alt="">
                     </span> -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-6 mt-3">
         <input type="submit" class="theme_btn me-3" value="Update"/>
      </div>
   </div>
</form>