<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @if (config('app.is_demo'))
            <?php /* Anti-flicker snippet (recommended) */ ?>
            <style>.async-hide { opacity: 0 !important} </style>
            <script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
            h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
            (a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
            })(window,document.documentElement,'async-hide','dataLayer',4000,
            {'GTM-K9BGS8K':true});</script>
            <?php /* Analytics-Optimize Snippet */ ?>
            <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-46172202-22', 'auto', {allowLinker: true});
            ga('set', 'anonymizeIp', true);
            ga('require', 'GTM-K9BGS8K');
            ga('require', 'displayfeatures');
            ga('require', 'linker');
            ga('linker:autoLink', ["2checkout.com","avangate.com"]);
            </script>
            <?php /* Google Tag Manager */ ?>
            <script>
                (function(w,d,s,l,i) {
                    w[l]=w[l]||[];w[l].push({'gtm.start':
                        new Date().getTime(),event:'gtm.js'});
                        var f=d.getElementsByTagName(s)[0];
                        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
                        j.async=true;
                        j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
                        f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-NKDMSK6');</script>
        @endif
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title itemprop="name">{{ $metaTitle ?? 'Booker' }}</title>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom built theme - This already includes Bootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('vendor/maileclipse/css/maileclipse-app.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">
        <!-- Bootstrap & jquery & lodash & popper & lozad -->
        <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
        <!-- Notie Library -->
        <script src="https://unpkg.com/notie"></script>
        <!-- Axios Library -->
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        @if ( request()->route()->getName() === 'newTemplate' ||
              request()->route()->getName() === 'editMailable' || 
              request()->route()->getName() === 'viewTemplate')
        <!-- Editor Markdown/Html/Text -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/codemirror.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/codemirror.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.0/tinymce.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/xml/xml.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/css/css.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/javascript/javascript.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/htmlmixed/htmlmixed.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/display/placeholder.js"></script>
        @endif
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="{{ asset('vendor/maileclipse/js/maileclipse-app.js') }}"></script>


        @if (config('app.is_demo'))
        <link rel="canonical" href="https://booker.com" />
        <?php /*  Social tags */ ?>
        <meta name="keywords" content="booker">
        <meta name="description" content="booker">
        <?php /* Schema.org markup for Google */ ?>
        <meta itemprop="name" content="booker">
        <meta itemprop="description" content="booker">
        <meta itemprop="image" content="{{ asset('images/booker.png') }}">
        <?php /* Twitter Card data */ ?>
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@booker">
        <meta name="twitter:title" content="booker">
        <meta name="twitter:description" content="booker">
        <meta name="twitter:creator" content="@creativetim">
        <meta name="twitter:image" content="{{ asset('images/booker.png') }}">
        <?php /* Open Graph data */ ?>
        <meta property="fb:app_id" content="655968634437471">
        <meta property="og:title" content="booker" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="https://booker.com" />
        <meta property="og:image" content="{{ asset('images/booker.png') }}"/>
        <meta property="og:description" content="booker" />
        <meta property="og:site_name" content="booker" />
        @endif
        <link href="{{ asset('images/favicon.ico') }}" rel="icon">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('admin') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('admin') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('admin') }}/css/bootstrap-tourist.css" rel="stylesheet">
        @stack('css')
        <link type="text/css" href="{{ asset('admin/css') }}/app.css?v=2.2.0" rel="stylesheet">
        <!-- <script src="{{ asset('libs/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script> -->
    </head>
    <body class="{{ $class ?? '' }}">
        @if (config('app.is_demo'))
            <?php /* Google Tag Manager (noscript) */ ?>
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <?php /* End Google Tag Manager (noscript) */ ?>
        @endif
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.admin-sidebar')
        @endauth
        <div class="main-content">
            @include('layouts.navbars.admin-navbar')
            @yield('content')
        </div>
        <?php /* <script src="{{ asset('admin') }}/vendor/jquery/dist/jquery.min.js"></script> 
         <script src="{{ asset('admin') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script> 
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> */ ?>        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="{{ asset('admin') }}/vendor/js-cookie/js.cookie.js"></script>
        <script src="{{ asset('admin') }}/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="{{ asset('admin') }}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <script src="{{ asset('admin') }}/vendor/lavalamp/js/jquery.lavalamp.min.js"></script>
        <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('admin') }}/vendor/chart.js/dist/Chart.extension.js"></script>
        <?php /* @stack('js') */ ?>
        <script src="{{ asset('admin') }}/js/app.js?v=1.0.1"></script>
        <script src="{{ asset('admin') }}/js/demo.min.js"></script>
        <script src="{{ asset('admin') }}/js/bootstrap-tourist.js"></script>
        @if (config('app.is_demo'))
            <script src="{{ asset('admin') }}/js/tour.js?v=1"></script>
        @endif
    </body>
</html>
