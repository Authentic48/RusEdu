<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="репетиторы, школы, языковые школы, Языковая школа, школа танцев, художественная школа, школа плавания, вакансия, найти учителей, найти школы, найти работу учителя, учитель английского, учитель испанского, учитель немецкого, учитель китайского, учитель французского, учитель итальянского, автошколы, школа вождения, тренер, поиск школ и учителей, поиск школ, поиск репетиторов" />
    <meta name="author" content="Smart Dev" />
    <meta name="robots" content="" />
    <meta name="description" content="schools-teachers.com - это онлайн-сервис, который помогает найти школы, репетиторов и работу.
    Создайте профиль и продвигайте себя бесплатно." />
    <meta property="og:title" content="schools&teachers" />
    <meta property="og:description" content="schools&teachers" />
    <meta property="og:image" content="schools&teachers" />
    <meta name="format-detection" content="telephone=no">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- FAVICONS ICON -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('assets/images/favicon.ico') }}" />

    <title>{{ config('app.name', 'Welcome | Schools & Teachers') }}</title>

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
        @include('frontend.includes.header')

        <div class="page-content">
            <main>
                @yield('content')
            </main>
        </div>
        @include('frontend.includes.footer')
    </div>

    <!-- JAVASCRIPT FILES ========================================= -->
    <script  src="{{ asset('assets/js/jquery.min.js') }}"></script><!-- JQUERY.MIN JS -->
    <script src="{{ asset('assets/plugins/wow/wow.js') }}"></script><!-- WOW JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <!-- BOOTSTRAP.MIN JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
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

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        function activatePlacesSearch()
        {
           var input = document.getElementById('search_form');
           var autocomplete = new google.maps.places.Autocomplete(input);
           var input1 = document.getElementById('address');
           var autocomplete = new google.maps.places.Autocomplete(input1);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB15AWQnsC76ztsLd54p6YHMJYPokwWEZ4&libraries=places&callback=activatePlacesSearch"></script>
    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 300,
                tabsize: 2
            });
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      
        ga('create', 'UA-173946133-1', 'auto');
        ga('send', 'pageview');
      
    </script>
</body>
</html>
