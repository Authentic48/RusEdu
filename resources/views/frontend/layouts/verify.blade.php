<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="schools&teachers - HTML Template" />
    <meta property="og:title" content="schools&teachers - HTML Template" />
    <meta property="og:description" content="schools&teachers - HTML Template" />
    <meta property="og:image" content="schools&teachers - HTML Template" />
    <meta name="format-detection" content="telephone=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- FAVICONS ICON -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('assets/images/favicon.png') }}" />

    <title>{{ config('app.name', 'Schools and teachers') }}</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/templete.css') }}">
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link class="skin" rel="stylesheet" type="text/css"
        href="{{ asset('assets/css/skin/skin-1.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/datepicker/css/bootstrap-datetimepicker.min.css') }}" />
    <!-- Revolution Slider Css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/revolution/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/revolution/revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/revolution/revolution/css/navigation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/css/dashboard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style2.css') }}">
    <!-- Revolution Navigation Style -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="page-wraper">
        <div class="page-content">
            <main>
                @yield('content')
            </main>
        </div>
    </div>

    <!-- JAVASCRIPT FILES ========================================= -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script><!-- JQUERY.MIN JS -->
    <script src="{{ asset('assets/plugins/wow/wow.js') }}"></script><!-- WOW JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <!-- BOOTSTRAP.MIN JS -->
    <script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js') }}">
    </script><!-- FORM JS -->
    <script src="{{ asset('assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}">
    </script><!-- FORM JS -->
    <script src="{{ asset('assets/plugins/magnific-popup/magnific-popup.js') }}"></script>
    <!-- MAGNIFIC POPUP JS -->
    <script src="{{ asset('assets/plugins/counter/waypoints-min.js') }}"></script>
    <!-- WAYPOINTS JS -->
    <script src="{{ asset('assets/plugins/counter/counterup.min.js') }}"></script>
    <!-- COUNTERUP JS -->
    <script src="{{ asset('assets/plugins/imagesloaded/imagesloaded.js') }}"></script>
    <!-- IMAGESLOADED -->
    <script src="{{ asset('assets/plugins/masonry/masonry-3.1.4.js') }}"></script>
    <!-- MASONRY -->
    <script src="{{ asset('assets/plugins/masonry/masonry.filter.js') }}"></script>
    <!-- MASONRY -->
    <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.js') }}"></script>
    <!-- OWL SLIDER -->
    <script src="{{ asset('assets/plugins/rangeslider/rangeslider.js') }}"></script>
    <!-- Rangeslider -->
    <script src="{{ asset('assets/js/custom.js') }}"></script><!-- CUSTOM FUCTIONS  -->
    <script src="{{ asset('assets/js/dz.carousel.js') }}"></script><!-- SORTCODE FUCTIONS  -->
</body>
</html>
