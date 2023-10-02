 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Booker</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{ asset('front//img/favicon.png') }}" rel="icon">
    <link href="{{ asset('front/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
 <!--    <link href="{{ asset('front/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/bootstrap3.4.1/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/vendor/bootstrap3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->

     <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <!-- Icons -->
    <link href="{{asset('css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">

    <!-- Font Awesome -->
    <link href="{{asset('css/mdb-min.css')}}" rel="stylesheet" />
    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script> 

    <!-- Main Css -->
    <link href="{{asset('css/colors/purple.css')}}" rel="stylesheet" id="color-opt">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/testimonial.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" id="theme-opt" />
    <style>

@media screen and (max-width: 992px) {
    .btn-home {
        padding: 14px 30px;
        font-size: 14px;
        width: 90%;
    }

}

@media screen and (max-width: 600px) {
    .btn-home {
    padding: 14px 30px;
    font-size: 14px;
    width: 90%;
}

}

        </style>
<style>
    /* Variables */
/** {
  box-sizing: border-box;
}

body {
  font-family: -apple-system, BlinkMacSystemFont, sans-serif;
  font-size: 16px;
  -webkit-font-smoothing: antialiased;
  display: flex;
  justify-content: center;
  align-content: center;
  height: 100vh;
  width: 100vw;
}*/

/*form {
  width: 30vw;
  min-width: 500px;
  align-self: center;
  box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),
    0px 2px 5px 0px rgba(50, 50, 93, 0.1), 0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);
  border-radius: 7px;
  padding: 40px;
}*/

.hidden {
  display: none;
}

.invalid-feedback{
  display: contents !important;
}

#payment-message {
  color: rgb(105, 115, 134);
  font-size: 16px;
  line-height: 20px;
  padding-top: 12px;
  text-align: center;
}

#payment-element {
  margin-bottom: 24px;
}

/* Buttons and links */
/*button {
  background: #5469d4;
  font-family: Arial, sans-serif;
  color: #ffffff;
  border-radius: 4px;
  border: 0;
  padding: 12px 16px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  display: block;
  transition: all 0.2s ease;
  box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
  width: 100%;
}
button:hover {
  filter: contrast(115%);
}
button:disabled {
  opacity: 0.5;
  cursor: default;
}*/

/* spinner/processing state, errors */
.spinner,
.spinner:before,
.spinner:after {
  border-radius: 50%;
}
.spinner {
  color: #ffffff;
  font-size: 22px;
  text-indent: -99999px;
  margin: 0px auto;
  position: relative;
  width: 20px;
  height: 20px;
  box-shadow: inset 0 0 0 2px;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
}
.spinner:before,
.spinner:after {
  position: absolute;
  content: "";
}
.spinner:before {
  width: 10.4px;
  height: 20.4px;
  background: #5469d4;
  border-radius: 20.4px 0 0 20.4px;
  top: -0.2px;
  left: -0.2px;
  -webkit-transform-origin: 10.4px 10.2px;
  transform-origin: 10.4px 10.2px;
  -webkit-animation: loading 2s infinite ease 1.5s;
  animation: loading 2s infinite ease 1.5s;
}
.spinner:after {
  width: 10.4px;
  height: 10.2px;
  background: #5469d4;
  border-radius: 0 10.2px 10.2px 0;
  top: -0.1px;
  left: 10.2px;
  -webkit-transform-origin: 0px 10.2px;
  transform-origin: 0px 10.2px;
  -webkit-animation: loading 2s infinite ease;
  animation: loading 2s infinite ease;
}

@-webkit-keyframes loading {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes loading {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

@media only screen and (max-width: 600px) {
  form {
    width: 80vw;
    min-width: initial;
  }
}



/*counter styles*/
.qty {
    width: 40px;
    height: 25px;
    text-align: center;
}
.pointer-events{
    pointer-events: none;
    opacity: 0.3;
}
/*input.qtyplus { width:25px; height:25px;}
input.qtyminus { width:25px; height:25px;}*/

input.qtyplus { width:auto; height:auto;}
input.qtyminus { width:auto; height:auto;}

.success-email-text{
    background: #EAF9DE;
    padding: 19px;
    border-radius: 15px;
    margin-bottom: 15px;
}
</style>
@stack('front-css')
</head>
<body>
    <?php $getLocale = ''; if(!isset($page)){
       $page = '';
      
    }
     if(!isset($email)){

       $email = null;
       }
    ?>
   <header>
    @if(session('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
    @endif


        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
                <div class="col-md-1 mb-2 mb-md-0">
                    <a href="{{route('public.home')}}" class="d-inline-flex link-body-emphasis text-decoration-none">
                        <img src="{{asset('images/img/logo.png')}}">
                    </a>
                </div>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-3 ">{{ __('translation::menu.about') }}</a></li>
                    <li><a href="{{route('public.categories')}}"  class="nav-link px-3  @if($page == 'industries')link-secondary @endif">Industries</a></li>
                    <li><a href="{{ route('business.index') }}" class="nav-link px-3 @if($page == 'business')link-secondary @endif">{{ __('translation::menu.business') }}</a></li>
                </ul>
                @if(\Auth::check())
                <div class="col-md-3 text-end">
                    <!-- <h5>Welcome, 
                        <a href="{{ route('user/dashboard') }}" >{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a></h5> -->
                        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Welcome, {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a  class="dropdown-item" href="{{ route('user/dashboard') }}" >Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>

                </div>
                @else
                <div class="col-md-3 text-end">
                    <a type="button" class="btn btn-outline-primary me-2" data-mdb-toggle="modal"
                        data-mdb-target="#loginModel">{{ __('translation::menu.login') }}</a>
                    <button type="button" class="btn btn-primary" data-mdb-toggle="modal"
                        data-mdb-target="#registerModel">{{ __('translation::menu.register') }}</button>

                </div>
                @endif


                <div class="col-md-1 px-2">
                    <div class="dropdown country-drop">
                        <a class="dropdown-toggle" href="#" id="Dropdown" role="button" data-mdb-toggle="dropdown"
                            aria-expanded="false">
                            <?php
                            if(config('app.locale') === 'en'){
                            ?>
                                <i class="flag-united-kingdom flag m-0"></i>
                            <?php
                            }else{
                            ?>
                                <i class="flag-france flag m-0"></i>
                            <?php
                            }
                            ?>                            
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="Dropdown">
                            <?php
                            if(config('app.locale') === 'en'){
                            ?>
                            <li>
                                <a class="dropdown-item" href="{{route('lang', 'en')}}"><i class="flag-united-kingdom flag"></i>English <i
                                        class="fa fa-check text-success ms-2"></i></a>
                            </li>
                            <?php
                            }else{
                            ?>
                            <li>
                                <a class="dropdown-item" href="{{route('lang', 'fr')}}"><i class="flag-france flag"></i>Français <i
                                        class="fa fa-check text-success ms-2"></i></a>
                            </li>
                            <?php
                            }
                            ?>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <?php
                                if(config('app.locale') === 'en'){
                                ?>
                                    <a class="dropdown-item" href="{{route('lang', 'fr')}}"><i class="flag-france flag"></i>Français</a>
                                <?php
                                }else{
                                ?>
                                    <a class="dropdown-item" href="{{route('lang', 'en')}}"><i class="flag-united-kingdom flag"></i>English</a>
                                <?php
                                }
                                ?>    
                                
                            </li>
                            <!-- <li>
                                <hr class="dropdown-divider" />
                            </li>

                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('lang', 'fr')}}"><i class="flag-france flag"></i>Français</a>
                            </li> -->
                            <!-- <li>
                                <a class="dropdown-item" href="#"><i class="flag-spain flag"></i>Español</a>
                            </li> -->

                        </ul>
                    </div>
                </div>


            </header>
        </div>

        <!-- login model start-->
        <div class="modal fade" id="loginModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('translation::menu.login') }}</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-wrap justify-content-center mb-5">
                            <div class="col-4"><a href="#"><img src="{{asset('images/img/btn-fb.png')}}" class="img-fluid"></a> </div>
                            <div class="col-4"><a href="#"><img src="{{asset('images/img/btn-google.png')}}" class="img-fluid"></a></div>
                            <div class="col-4"><a href="#"><img src="{{asset('images/img/btn-apple.png')}}" class="img-fluid"></a> </div>
                        </div>
                       <form  method="post" action="{{route('login')}}">
                            @csrf
                            <!-- Email input -->
                            <div class="form-group mb-4">
                                <input type="email" name="email" id="form2Example1" class="form-control"
                                    placeholder="Email Address" />
                            </div>

                            <!-- Password input -->
                            <div class="form-group mb-4">
                                <input type="password"  name="password" id="form2Example2" class="form-control" placeholder="Password" />
                            </div>

                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">
                                <div class="col">
                                    <!-- Simple link -->
                                    <a data-mdb-toggle="modal"
                            data-mdb-target="#forgotpwdModel" class="cursor-pointer">{{ __('translation::menu.forgot_password') }}?</a>
                                </div>
                            </div>
                            <div class="success-email-text" style="display:none;">
                                Si cette adresse e-mail est enregistrée dans notre boutique, vous recevrez un lien pour réinitialiser votre mot de passe sur info@gmail.com.

                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4 py-3 cursor-pointer">{{ __('translation::menu.login') }} <i
                                    class="fas fa-arrow-right-long"></i>
                            </button>
                            <p>{{ __('translation::menu.have_an_account') }}? <br> <a class="cursor-pointer" data-mdb-toggle="modal"
                        data-mdb-target="#registerModel">{{ __('translation::menu.create_an_account') }}</a></p>


                        </form>
                    </div>
                </div>

            </div>
        </div>
        </div>
        <!-- login model end -->



        <!-- Register model start-->
        <div class="modal fade" id="registerModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('translation::menu.register') }}</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-wrap justify-content-center mb-5">
                            <div class="col-4"><a href="#"><img src="{{asset('images/img/btn-fb.png')}}" class="img-fluid"></a> </div>
                            <div class="col-4"><a href="#"><img src="{{asset('images/img/btn-google.png')}}" class="img-fluid"></a></div>
                            <div class="col-4"><a href="#"><img src="{{asset('images/img/btn-apple.png')}}" class="img-fluid"></a> </div>
                        </div>

                               <form method="post" action="{{ route('register') }}" >
                            @csrf
                            <!-- Email input -->
                            <div class="form-group d-flex mb-4">
                                <div class="col-6 px-3 row">
                                    <input type="text" name="first_name" class="form-control" placeholder="First name">
                                </div>
                                <div class="col-6 px-3">
                                    <input type="text" name="last_name" class="form-control" placeholder="Last name">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <input type="email" name = "email"id="form2Example1" class="form-control"
                                    placeholder="Email Address" />
                            </div>

                            <!-- Password input -->
                            <div class="form-group mb-4">
                                <input type="password" name = "password" id="form2Example2" class="form-control cursor-pointer"
                                    placeholder="Create a Password" />
                            </div>


                            <!-- Submit button -->
                            <!-- <button type="submit" class="btn btn-primary btn-block mb-4 py-3">Register <i
                                    class="fas fa-arrow-right-long"></i> -->
                            <!-- </button> -->
                                     <button type="submit" class="btn btn-primary cursor-pointer" data-mdb-toggle="modal"
                        data-mdb-target="#registerModel">{{ __('translation::menu.register') }}</button>
                            <p>{{ __('translation::menu.have_an_account') }}? <br> <a class="cursor-pointer" data-mdb-toggle="modal"
                        data-mdb-target="#loginModel">{{ __('translation::menu.login') }}</a></p>


                        </form>
                    </div>
                </div>

            </div>
        </div>
        </div>
        <!-- Register model end -->


        <div class="bg-light py-3 p-3">
            <div class="container-xxl">
                <div class="container">

                    <div class="d-flex float-right">
                        <div class="col-md-6 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text btn-primary" id="basic-addon2"> <i
                                            class="fas fa-search"></i></span>
                                </div>
                            </div>

                        </div>

                        {{-- <div class="col-6 px-3">
                            <div class="btn-group sort-btn choose-filters">
                                <button class="btn btn-default" type="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Choose Filters</button>
                                <button class="btn" data-sort="none"><i class="fa fa-sort"></i></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#" tabindex="-1" data-type="option1">Option 1</a></li>
                                    <li><a href="#" tabindex="-1" data-type="option2">Option 2</a></li>
                                </ul>
                            </div>

                        </div> --}}

                    </div>



                </div>
            </div>
        </div>
    </header>


    <!-- Forgot Password model start-->
    <div class="modal fade" id="forgotpwdModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mot de passe oublié? </h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <p> Veuillez renseigner l'adresse emial que vous avez utilisé à la création de votre compte.
                            Vous receverez zn lien temporaire pour réinitialiser votre mot de passe.</p>
                        <!-- Email input -->
                        <div class="form-group mb-4">
                            <input type="email" name="email" id="form2Example1" class="form-control reset-mail" placeholder="Email Address" onkeyup="checkValidEmail(this.value)" />
                        </div>

                        <p class="text-danger no-email" style="display:none">Email does not exist in our system</p>

                        <!-- Submit button -->
                        <!-- Send a link to reset -->
                        <a href="#" id="verifyEmailButton" onclick="sendResetPasswordMail()" class="btn btn-primary btn-block mb-4 py-3 pointer-events"  >Envoyer un lien de
                            réinitialisation <i class="fas fa-arrow-right-long"></i>
                            <!-- data-mdb-toggle="modal" -->
                            <!-- data-mdb-target="#newpwdModel" -->
                        </a>
                        <!-- Back to login -->
                        <p><a  data-mdb-toggle="modal"
                        data-mdb-target="#loginModel" > <i class="fas fa-arrow-left-long"></i> Retour à la connexion</a></p>


                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- Forgot Password  model end -->

    <!-- New Password model start-->
    <div class="modal fade" id="newpwdModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Réinitialiser votre
                        mot de passe </h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        @if(isset($email))
                        <p>{{$email}}</p>
                        @endif
                        <!-- Password input -->
                        <div class="form-group mb-4">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Nouveau mot de passe" />
                        </div>

                        <!-- Password input -->
                        <div class="form-group mb-4">
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirmation" />
                        </div>

</form>

                        <!-- Submit button -->
                        <button  id="confirmPasswordSubmit"class="btn btn-primary btn-block mb-4 py-3">Changer le mot de passe <i
                                class="fas fa-arrow-right-long"  onclick="confirmPassword()"></i>
                        </button>
                        <!-- Back to login -->
                        <p><a  data-mdb-toggle="modal"
                        data-mdb-target="#loginModel"> <i class="fas fa-arrow-left-long"></i> Retour à la connexion</a></p>


                    
                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- New Password  model end -->
    @yield('content')
    <!-- <footer id="footer">
        <div class="footer-top">
        <div class="container">
            <div class="row">
            <div class="col-12 ft-menu">
                <ul>
                <li><a href="{{ route('public.home') }}">Home</a></li>
                <li><a href="{{ route('public.about') }}">About Us</a></li>
                <li><a href="{{ route('public.categories') }}">Categories</a></li>
                <li><a href="{{ route('public.industries') }}">Industries</a></li>
                <li><a href="{{ route('public.products') }}">Products</a></li>
                <li><a href="{{ route('public.services') }}">Services</a></li>
                <li><a href="{{ route('public.contact') }}">Contact</a></li>
                </ul>
            </div>
            </div>
        </div>
        </div>
        <div class="footer-bottom container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-12 text-center"></div>
            <div class="col-md-4 col-sm-12 text-center"><p>Copyright © 2023, Booker. All Right Reserved</p></div>
        </div>
        </div>
    </footer>
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->


    <footer class=" footer">
        <div class="container pt-3 pb-3">
            <ul class="nav
            justify-content-center pb-3">
                <li class="nav-item"><a href="#" class="px-3">{{ __('translation::menu.about') }}</a></li>
                <li class="nav-item"><a href="#" class="px-3">{{ __('translation::menu.company') }}</a></li>
                <li class="nav-item"><a href="#" class="px-3">{{ __('translation::menu.business') }}</a></li>
                <li class="nav-item"><a href="{{route('public.faq')}}" class="px-3">{{ __('translation::menu.faq') }}</a></li>
            </ul>
            <p class="text-center Copyright"> {{ __('translation::menu.copyright') }} &copy; 2023. {{ __('translation::menu.all_right_reserved') }}
            </p>
            <div class="text-light">
                <a href="#" class="text-light p-1"> <i class="fab fa-snapchat"></i> </a>
                <a href="#" class="text-light p-1"> <i class="fab fa-instagram"></i> </a>
                <a href="#" class="text-light p-1"> <i class="fab fa-tiktok"></i> </a>
                <a href="#" class="text-light p-1"> <i class="fab fa-facebook"></i> </a>
            </div>

        </div>
    </footer>

    <!-- Back to top -->
    <a href="#" class="btn btn-icon btn-soft-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
    <!-- Back to top -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('front/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('front/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('front/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('front/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stack('js')

<script >


    $(document).ready(function(){
        console.log('showwwwwwww');
        


        var email = '{{$email}}';
 console.log(email);
        if(email){
          console.log(email);
              $('#newpwdModel').modal('show');
        }
       
    });

$(document).ready(function(){
    $('#confirmPasswordSubmit').click(function(){
        password = $('#password').val();
          email = '{{$email}}';
          console.log('confirmpass');
          console.log(email);

          var postData = {
                    _token:'<?php echo csrf_token() ?>',
                    password: password,
                    email:email
                };
                $.ajax({
                   type:'POST',
                   url:'/reset-password-ajax',
                   data:postData,
                   success:function(data) {
                    console.log(data);
                    console.log(data.email_exists);
                    console.log('sendResetPasswordMail');
                    if(data.email_updated){
                        $('#loginModel').modal('show');
                        // $('#forgotpwdModel').removeClass('show');
                        // $('#loginModel').modal('show');
                        //  $('.success-email-text').css('display','block');

                        //  setTimeout(() => {
                        //        $('.success-email-text').css('display','none');
                        //     }, 5000);


                    }else{
                        // $('.no-email').css('display','block');
                        // $('#verifyEmailButton').addClass('pointer-events');
                    }
                   }
                });
    });
      });
</script>

    <script>
        $(document).ready(function(){
             $("#successMessage").delay(5000).slideUp(300);

        });
        function checkValidEmail(email){

            console.log(email);
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
                console.log('valid email');
                var postData = {
                    _token:'<?php echo csrf_token() ?>',
                    email: email
                };
                $.ajax({
                   type:'POST',
                   url:'/check-valid-email',
                   data:postData,
                   success:function(data) {
                    console.log(data);
                    if(data.email_exists){
                        $('.no-email').attr('display','none')
                        $('#verifyEmailButton').removeClass('pointer-events');
                    }else{
                        $('.no-email').attr('display','block');
                        $('#verifyEmailButton').addClass('pointer-events');
                    }
                   }
                });

            }else{
                $('#verifyEmailButton').addClass('pointer-events');
            }
        }


        function sendResetPasswordMail(){
            email = $('.reset-mail').val();
              var postData = {
                    _token:'<?php echo csrf_token() ?>',
                    email: email
                };
                $.ajax({
                   type:'POST',
                   url:'/send-resetpassword-email',
                   data:postData,
                   success:function(data) {
                    console.log(data);
                    console.log(data.email_exists);
                    console.log('sendResetPasswordMail');
                    if(data.email_exists){
                        $('#forgotpwdModel').removeClass('show');
                        $('#loginModel').modal('show');
                         $('.success-email-text').css('display','block');

                         setTimeout(() => {
                               $('.success-email-text').css('display','none');
                            }, 5000);
                    }else{
                        $('.no-email').css('display','block');
                        $('#verifyEmailButton').addClass('pointer-events');
                    }
                   }
                });
        }


        function confirmPassword(){
          password = $('#password').val();
          email = '{{$email}}';
          console.log('confirmpass');
          console.log(email);

          var postData = {
                    _token:'<?php echo csrf_token() ?>',
                    password: password,
                    email:email
                };
                $.ajax({
                   type:'POST',
                   url:'/reset-password-ajax',
                   data:postData,
                   success:function(data) {
                    console.log(data);
                    console.log(data.email_exists);
                    console.log('sendResetPasswordMail');
                    if(data.email_updated){
                        $('#loginModel').modal('show');
                        // $('#forgotpwdModel').removeClass('show');
                        // $('#loginModel').modal('show');
                        //  $('.success-email-text').css('display','block');

                        //  setTimeout(() => {
                        //        $('.success-email-text').css('display','none');
                        //     }, 5000);


                    }else{
                        // $('.no-email').css('display','block');
                        // $('#verifyEmailButton').addClass('pointer-events');
                    }
                   }
                });

        }
    </script>

</body>
</html>
