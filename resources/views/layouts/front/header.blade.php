<!DOCTYPE html>
<html lang="en">
<head>

	<!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- FAVICONS ICON -->
    <link rel="icon" href="{{ asset("assets/front/images/favicon.ico") }}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("assets/front/images/favicon.png") }}" />

    <!-- PAGE TITLE HERE -->
    <title>@yield("title") | JobNest</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href={{ asset("assets/front/css/bootstrap.min.css") }}><!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/front/css/font-awesome.min.css") }}><!-- FONTAWESOME STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/front/css/feather.css") }}><!-- FEATHER ICON SHEET -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/front/css/owl.carousel.min.css") }}><!-- OWL CAROUSEL STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/front/css/magnific-popup.min.css") }}><!-- MAGNIFIC POPUP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/front/css/lc_lightbox.css") }}><!-- Lc light box popup -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/front/css/bootstrap-select.min.css") }}><!-- BOOTSTRAP SLECT BOX STYLE SHEET  -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/front/css/dataTables.bootstrap5.min.css") }}><!-- DATA table STYLE SHEET  -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/front/css/select.bootstrap5.min.css") }}><!-- DASHBOARD select bootstrap  STYLE SHEET  -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/front/css/dropzone.css") }}><!-- DROPZONE STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/front/css/scrollbar.css") }}><!-- CUSTOM SCROLL BAR STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/front/css/datepicker.css") }}><!-- DATEPICKER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/front/css/flaticon.css") }}> <!-- Flaticon -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/front/css/swiper-bundle.min.css") }}><!-- Swiper Slider -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/front/css/style.css") }}><!-- MAIN STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/front/css/toastr.min.css") }}><!-- DASHBOARD select bootstrap  STYLE SHEET  -->
    @stack("css")

</head>

<body>

    <!-- LOADING AREA START ===== -->
    @include("layouts.front.components.preloader")
    <!-- LOADING AREA  END ====== -->

	<div class="page-wraper">

        <!-- HEADER START -->
        @include("layouts.front.components.navbar")
        <!-- HEADER END -->
