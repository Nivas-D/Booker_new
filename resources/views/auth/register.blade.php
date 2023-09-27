@php $class = 'bg-default' @endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title itemprop="name">{{ 'Booker' }}</title>
        <link href="{{ asset('images/favicon.ico') }}" rel="icon">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('admin') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('admin') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        @stack('css')
        <link type="text/css" href="{{ asset('admin/css') }}/app.css?v=2.2.0" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        <div class="main-content">
            <div class="container mt-5 pb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center mb-3">
                                    <img src="{{ asset('images/booker-logo.png') }}" class="navbar-brand-img" alt="...">
                                </div>
                                <div class="text-muted text-center mt-2 mb-4"><small>{{ __('Please create your booker account') }}</small></div>
                                <form role="form" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                            </div>
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('user_type') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                            </div>
                                            <select class="form-control{{ $errors->has('user_type') ? ' is-invalid' : '' }}" id="user_type" name="user_type">
                                                <option value="3" selected @if (old('user_type') == 3) selected @endif>{{ __('User') }}</option>
                                                <option value="2" @if (old('user_type') == 2) selected @endif>{{ __('Business Owner') }}</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('user_type'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('user_type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" required>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-4">{{ __('Create Account') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <a href="{{ route('login') }}" class="text-light">
                                    <small>{{ __('Already have account? Please Login') }}</small>
                                </a>
                            </div>
                            <div class="col-6 text-right">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-light">
                                        <small>{{ __('Forgot Password?') }}</small>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="{{ asset('admin') }}/vendor/js-cookie/js.cookie.js"></script>
        <script src="{{ asset('admin') }}/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="{{ asset('admin') }}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <script src="{{ asset('admin') }}/vendor/lavalamp/js/jquery.lavalamp.min.js"></script>
        <?php /* @stack('js') */ ?>
        <script src="{{ asset('admin') }}/js/app.js?v=1.0.1"></script>
    </body>
</html>