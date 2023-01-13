<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta charset="utf-8"> --}}
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin, dashboard" />
	<meta name="author" content="{{ config('app.name') }}" />
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/images/favicon.png">
    <link href="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/chartist/css/chartist.min.css">
	<!-- Daterange picker -->
    <link href="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
    <!-- Material color picker -->
    <link href="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/pickadate/themes/default.date.css">
    <!-- Datatable -->
    <link href="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Vectormap -->
    <link href="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/css/style.css" rel="stylesheet">
	<link href="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    {{-- SweetAlert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-YCHtULs46ydSA7tV"></script>
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="javascript:void(0);" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/images/logo.png" alt="">
                <img class="logo-compact" src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/images/logo-text.png" alt="">
                <img class="brand-title" src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
