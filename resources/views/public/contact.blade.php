@extends('public.layouts.app')
@section('content')
<section class="breadcrumbs" style="margin:0px;padding:0px;">
<div class="container-fluid" style="background-color:#d9dbe9;">
    <div class="container">
        <div class="row" style="padding-horizontal:60px;padding-top:0px;padding-bottom:10px;">
            <div class="col-md-12">
                <h3 style="font-weight:bold;">Contact Us</h3>
                <ol>
                    <li><a href="{{ route('public.home') }}">Home</a></li>
                    <li>Contact Us</li>
                </ol>
            </div>
        </div>
    </div>
</div>
</section>
    <section class="booking title-left">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="section-title my-5"><p>Contact Us</p></div>
                        <div>
                            @if(isset($status) && $status == 'success')
                                <div class="alert alert-success" role="alert">
                                    Your contact message has been saved successfully
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @elseif(isset($status) && $status == 'failure')
                                <div class="alert alert-danger" role="alert">
                                    Sorry your contact message could not be saved
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <form action="{{ route('public.contactpost') }}" method="post" role="form" class="booking-form mb-1" id="contactForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label>Name</label>
                                    <Input type="text" id="name" name="name" class="form-control" required />
                                </div>
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label>Email</label>
                                    <Input type="email" id="email" name="email" class="form-control" required />
                                </div>
                                <div class="col-md-12 col-sm-12 form-group">
                                    <label>Title</label>
                                    <Input type="text" id="title" name="title" class="form-control" required />
                                </div>
                                <div class="col-md-12 col-sm-12 form-group mt-3 mt-md-0">
                                    <label>Message</label>
                                    <Textarea id="message" name="message" rows="5" class="form-control" required></Textarea>
                                </div>
                            </div>
                            <div class="row mb-5" >
                                <div class="col-md-2"></div>
                                <div class="col-md-6 col-sm-12">
                                    <button type="submit" value="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="booking-right">
                            <div class="map">
                                <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16599.500027401824!2d-122.43724312434479!3d37.76394321037775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan%20Francisco%2C%20CA%2C%20USA!5e0!3m2!1sen!2sin!4v1685602513811!5m2!1sen!2sin"
                                width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <div class="overlay"></div>
                            </div>
                            <div class="map-div">
                                <img src="{{ asset('front/img/logo.svg') }}">
                                <div class="map-text">
                                    <h5>Booker Platform</h5>
                                    <p>5674 Thornridge Cir. Shiloh, California 45764</p>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <h6>Staff</h6>
                                    <div class="staff">
                                        <img src="{{ asset('front/img/staff-1.png') }}">
                                        <img src="{{ asset('front/img/staff-2.png') }}">
                                        <img src="{{ asset('front/img/staff-3.png') }}">
                                        <img src="{{ asset('front/img/staff-4.png') }}">
                                    </div>
                                </li>
                                <li>
                                    <h6>Contact</h6>
                                    <p>+91 22 222 32 23</p>
                                    <p>contact@bookerplatform.com</p>
                                </li>
                                <li>
                                    <h6>Categories</h6>
                                    <table>
                                        @foreach($categories as $category)
                                            <tr><td>{{ $category->name }}</td><td></td></tr>
                                        @endforeach
                                    </table>
                                </li>
                                <li>
                                    <h6>Social Media</h6>
                                    <div class="social-links">
                                        <a href="#" class="facebook"><i class='bx bxl-facebook-circle'></i></a>
                                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                        <a href="#" class="linkedin"><i class='bx bxl-twitter'></i></a>
                                    </div>
                                </li>
                                <li>
                                    <h6>Recommended By</h6>
                                    <div class="recommend">
                                        <img src="{{ asset('front/img/staff-lg-1.png') }}">
                                        <img src="{{ asset('front/img/staff-lg-2.png') }}">
                                        <img src="{{ asset('front/img/staff-lg-3.png') }}">
                                        <img src="{{ asset('front/img/staff-lg-4.png') }}">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection