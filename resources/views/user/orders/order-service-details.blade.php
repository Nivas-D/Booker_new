@extends('public.layouts.app')
@section('content')

<!-- confirmation page content start -->
    <section class="container mb-5 pb-5">
      <div class="row">
        <div class="col-lg-12 mt-5 pt-5">
          <h1 class="Page_Heading text-start mb-5">My orders</h1>
        </div>

        <div class="col-lg-12 border border_Style">
          <div class="padding_css">
            <h3 class="Sub_3_Heading">Order items</h3>
            <div class="row">
              <div class="col-lg-2">
                <img
                  src="./Assets/images/Screenshot_23.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="col-lg-2">
                <h4 class="Order_heading">Product name</h4>
                <span class="d-block">Pack Sensi/ Conduite</span>
              </div>
              <div class="col-lg-2">
                <h4 class="Order_heading">Quantity</h4>
                <span class="d-block">1</span>
              </div>
              <div class="col-lg-3">
                <h4 class="Order_heading">Status - Pack part 1</h4>
                <span class="d-block sub_head_sub d-flex justify-content-start"
                  >3/3 effectués</span
                >
                <span class="product_sub d-block"
                  >Sensi Part 1 - 15.06.2022
                </span>
                <span class="product_sub d-block"
                  >Sensi Part 2 - 16.06.2022
                </span>
                <span class="product_sub d-block">
                  Sensi Part 3 - 17.06.2022</span
                >
              </div>
              <div class="col-lg-3">
                <h4 class="Order_heading">Status - Pack part 2</h4>
                <span class="d-block sub_head_sub d-flex justify-content-start"
                  >0/3 effectués</span
                >
                <button
                  class="theme_btn mt-4"
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal"
                >
                  Choose dates
                </button>
              </div>
              <div class="col-lg-12 d-flex justify-content-between">
                <span class="d-block text_style">Subtotal</span>
                <span class="d-block text_style">CHF 68.93</span>
              </div>

              <div
                class="col-lg-12 d-flex justify-content-between Bg_total align-items-center"
              >
                <span class="d-block Total_text text-decoration-underline"
                  >TOTAL (TAX INCL.)</span
                >
                <span class="d-block Total_text text-decoration-underline"
                  >CHF 68.93</span
                >
              </div>

              <div class="col-lg-12 mt-3">
                <h4 class="heading_order">Order details</h4>
                <p class="mt-2 para_order m-0">
                  Payment method: Payments by credit card
                </p>
                <p class="para_order m-0">
                  Date change: You have 72 hours to change or cancel your dates
                </p>
                <p class="para_order m-0 mt-5">
                  For any questions or for further information, please contact
                  our customer and department.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- confirmation page content end -->

	<!-- Modal -->
	    <div
	      class="modal fade"
	      id="exampleModal"
	      tabindex="-1"
	      aria-labelledby="exampleModalLabel"
	      aria-hidden="true"
	    >
	      <div class="modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	          <div class="modal-header border-0">
	            <button
	              type="button"
	              class="btn-close"
	              data-bs-dismiss="modal"
	              aria-label="Close"
	            ></button>
	          </div>
	          <div class="modal-body">
	            <span class="d-block Select_Lable">Type de vécicule</span>
	            <select
	              class="form-select Select_style form-select-lg mb-3"
	              aria-label="Large select example"
	            >
	              <option selected></option>
	              <option value="1">Manual</option>
	              <option value="2">Automatic</option>	              
	            </select>
	            <span class="d-block Select_Lable"> Monitor </span>
	            <select
	              class="form-select Select_style form-select-lg mb-3"
	              aria-label="Large select example"
	            >
	              <option selected></option>
	              <option value="1">Daniel Moreno</option>
	              
	            </select>
	          </div>
	          <div class="modal-footer border-0">
	            <button class="theme_btn mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal1">Continue</button>
	          </div>
	        </div>
	      </div>
	    </div>

	<!-- Modal -->
  	<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered">
	      <div class="modal-content">
	        <!-- <div class="modal-header border-0">
	          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	        </div> -->
	        <div class="modal-body">
	          <form class="calendar-body">
	            <div class="calendar">
	              <div class="top">
	                <label>
	                  <select class="month" name="months" size="1">
	                    <option class="mon" name="1">Januar</option>
	                    <option class="mon" name="2">Februar</option>
	                    <option class="mon" name="3">März</option>
	                    <option class="mon" name="4">April</option>
	                    <option class="mon" name="5">Mai</option>
	                    <option class="mon" name="6">Juni</option>
	                    <option class="mon" name="7">Juli</option>
	                    <option class="mon" name="8">August</option>
	                    <option class="mon" name="9">September</option>
	                    <option class="mon" name="10">Oktober</option>
	                    <option class="mon" name="11">November</option>
	                    <option class="mon" name="12">Dezember</option>
	                  </select>
	                </label>
	                <label>
	                  <select class="year" name="years" size="1">
	                    <option class="yer">2030</option>
	                    <option class="yer">2029</option>
	                    <option class="yer">2028</option>
	                    <option class="yer">2027</option>
	                    <option class="yer">2026</option>
	                    <option class="yer">2025</option>
	                    <option class="yer">2024</option>
	                    <option class="yer">2023</option>
	                    <option class="yer">2022</option>
	                    <option class="yer">2021</option>
	                    <option class="yer">2020</option>
	                    <option class="yer">2019</option>
	                    <option class="yer">2018</option>
	                    <option class="yer">2017</option>
	                    <option class="yer">2016</option>
	                  </select>
	                </label>
	              </div>
	              <div class="week">
	                <div class="week__day">Mon</div>
	                  <div class="week__day">Tues</div>
	                  <div class="week__day">wed</div>
	                  <div class="week__day">Thur</div>
	                  <div class="week__day">Fri</div>
	                  <div class="week__day">Sat</div>
	                  <div class="week__day">Sun</div>
	              </div>
	              <div class="date">
	                <div class="date__row">
	                  <div class="date__number">1</div>
	                  <div class="date__number">2</div>
	                  <div class="date__number">3</div>
	                  <div class="date__number">4</div>
	                  <div class="date__number">5</div>
	                  <div class="date__number">6</div>
	                  <div class="date__number">7</div>
	                </div>
	                <div class="date__row">
	                  <div class="date__number">8</div>
	                  <div class="date__number">9</div>
	                  <div class="date__number">10</div>
	                  <div class="date__number">11</div>
	                  <div class="date__number">12</div>
	                  <div class="date__number">13</div>
	                  <div class="date__number">14</div>
	                </div>
	                <div class="date__row">
	                  <div class="date__number">15</div>
	                  <div class="date__number">16</div>
	                  <div class="date__number">17</div>
	                  <div class="date__number">18</div>
	                  <div class="date__number">19</div>
	                  <div class="date__number">20</div>
	                  <div class="date__number">21</div>
	                </div>
	                <div class="date__row">
	                  <div class="date__number">22</div>
	                  <div class="date__number">23</div>
	                  <div class="date__number">24</div>
	                  <div class="date__number">25</div>
	                  <div class="date__number">26</div>
	                  <div class="date__number">27</div>
	                  <div class="date__number">28</div>
	                </div>
	                <div class="date__row">
	                  <div class="date__number">29</div>
	                  <div class="date__number">30</div>
	                  <div class="date__number">31</div>
	                  <div class="date__number"></div>
	                  <div class="date__number"></div>
	                  <div class="date__number"></div>
	                  <div class="date__number"></div>
	                </div>
	              </div>
	            </div>
	            <div class="choosen"></div>
	          </form>
	          </main>
	        </div>
	        <div class="modal-footer border-0">
	          <button class="theme_btn ">Continue</button>
	        </div>
	      </div>
	    </div>
  	</div>	    

@endsection    