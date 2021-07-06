<!DOCTYPE html>
<html lang="en">

<head>
	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="" />
	
	<!-- OG -->
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="../error-404.html" type="image/x-icon" />
	<link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>{{ config('app.name', 'Schools and teachers') }}</title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('administration/css/assets.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('administration/css/typography.css')}}">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('administration/css/shortcodes/shortcodes.css')}}">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('administration/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('administration/css/dashboard.css')}}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{ asset('administration/css/color/color-1.css')}}">
	
</head>
<body class="ttr-opened-sidebar ttr-pinned-sidebar">

  @include('admin.includes.header')

  @include('admin.includes.sidebar')
  
  <main class="ttr-wrapper">
    @yield('content')
  </main>


 <!-- External JavaScripts -->
<script src="{{ asset('administration/js/jquery.min.js')}}"></script>
<script src="{{ asset('administration/vendors/bootstrap/js/popper.min.js')}}"></script>
<script src="{{ asset('administration/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('administration/vendors/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('administration/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{ asset('administration/vendors/magnific-popup/magnific-popup.js')}}"></script>
<script src="{{ asset('administration/vendors/counter/waypoints-min.js')}}"></script>
<script src="{{ asset('administration/vendors/counter/counterup.min.js')}}"></script>
<script src="{{ asset('administration/vendors/imagesloaded/imagesloaded.js')}}"></script>
<script src="{{ asset('administration/vendors/masonry/masonry.js')}}"></script>
<script src="{{ asset('administration/vendors/masonry/filter.js')}}"></script>
<script src="{{ asset('administration/vendors/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{ asset('administration/vendors/scroll/scrollbar.min.js')}}"></script>
<script src="{{ asset('administration/js/functions.js')}}"></script>
<script src="{{ asset('administration/vendors/chart/chart.min.js')}}"></script>
<script src="{{ asset('administration/js/admin.js')}}"></script>
<script src="{{ asset('administration/vendors/switcher/switcher.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
      $('.summernote').summernote({
        height: 300,
        tabsize: 2
      });
    });
</script>
</body>
</html>   