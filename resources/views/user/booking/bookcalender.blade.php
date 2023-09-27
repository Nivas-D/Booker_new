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

.flatpickr-calendar.animate.inline {
    margin: 2rem;
}

</style>
@endpush
@section('content')



<section>
    <div class="container">
        <div class="row pt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item " aria-current="page"><a href="{{route('public.categories')}}">Industries</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Driving</li>
                </ol>
            </nav>
        </div>
        <div class="row mt-3">
            <div class="col-md-9">
                <h2>List of Mentors (124)</h2>
            </div>
            <div class="col-md-3 pt-4 text-end">
                <a href="#" class="btn btn-default btn-rounded"> <i class="fa-sharp fa-solid fa-location-dot"></i>
                    Map View</a>
            </div>
        </div>
        <hr>
    </div>

</section>

<section class="mt-5 mb-5">
    <div class="container">
        <div class="row px-4">

            <div class="col-md-7">

                <div class="row">
                    {{-- <span class="text-end"><a href="list-mentors.html">Back</a></span> --}}
                    <h4 class="mb-4">SERVETTE voiture automatique 45' </h4>

                    <div class="d-flex flex-wrap mb-3">
                        <div class="col-1 me"> <img src="{{asset('images/img/users/user1.png')}}" width="30px" height="30px"> </div>
                        <div class="col=8"> <a href="#" data-mdb-toggle="modal" data-mdb-target="#calendarModel">
                                Daniel Moreno </a> </div>
                    </div>


                   <!--  <div class="d-flex flex-wrap mb-3">
                        <div class="col-1 me"> <img src="{{asset('images/img/users/user2.png')}}" width="30px" height="30px"> </div>
                        <div class="col=8"> Daniel Moreno </div>
                    </div>

                    <div class="d-flex flex-wrap mb-3">
                        <div class="col-1 me"> <img src="{{asset('images/img/users/user3.png')}}" width="30px" height="30px"> </div>
                        <div class="col=8"> Daniel Moreno </div>
                    </div> -->



                </div> <!-- end row -->
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

<!-- Calender model start-->
<div class="modal fade" id="calendarModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Choose your date</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6   ms-auto">
                        <input class="datetimepicker " type="text" style="
                        display: none;
                    ">

                    </div>

                    <div class="col-md-6  ms-auto">
                        <h5>Disponibilité pour le Vendredi, Août 11, 2023</h5>
                        <ul class="text-center list-unstyled">
                            <li class="mb-3"> <a href="{{route('booking.booking_personal_info')}}" class="btn btn-primary">11:00</a></li>
                            <li class="mb-3"><a href="{{route('booking.booking_personal_info')}}" class="btn btn-primary"> 12:00</a></li>
                            <li class="mb-3"><a href="{{route('booking.booking_personal_info')}}" class="btn btn-primary"> 13:00</a></li>
                        </ul>

                        <div </div>


                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Calender model end -->

@endsection
@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>

<script>
    function rmySpecificdays(date) {
        const rdatedData = ["2019-10-16", "2019-10-22", "2019-10-25"];
        return rdatedData.includes(date.toISOString().substring(0, 10));
    }

    function rmydays(date) {
        return (date.getDay() === 0 || date.getDay() === 6);
    }
    var coolDates = [
  Date.parse(new Date(2023, 08, 11)),
  Date.parse(new Date(2023, 08, 12)),
  Date.parse(new Date(2023, 08, 2)),
  Date.parse(new Date(2023, 08, 20)),
];

    const fp = flatpickr(".datetimepicker", {
    inline: true,
    dateFormat: "d-M-Y",
    minDate: new Date(),
    onDayCreate: function(dObj, dStr, fp, dayElem) {
        if (coolDates.indexOf(+dayElem.dateObj) !== -1) {
          dayElem.className += " has-action";
        }
    },


    onChange: function(selectedDates, dateStr, instance) {
      // if selectedDates length equal to 1 then add it to variable "first_clicked_date"
      first_clicked_date = selectedDates.length === 1 ? selectedDates[0] : first_clicked_date;
      console.log(`First click is: ${first_clicked_date}`);

      if (selectedDates.length > 1) {
       console.log('raj');
      }
    },

});


//     const fp = flatpickr(".datetimepicker", {
//   dateFormat: "d-M-Y h:i K",
//   enableTime: true,
//   allowInput: true,
// });

fp.setDate(new Date());






</script>




@endpush
