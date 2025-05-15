<!doctype html>
<html lang="en">

<head>
    <!-- Title Meta -->
    <meta charset="utf-8" />
    <title>@yield("title") | JobNest Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
        name="description"
        content="A fully responsive premium admin dashboard template"
    />
    <meta name="author" content="Techzaa" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset("assets/admin/images/favicon.ico") }}" />

    <!-- Vendor css (Require in all Page) -->
    <link href="{{ asset("assets/admin/css/vendor.min.css") }}" rel="stylesheet" type="text/css" />

    <!-- Icons css (Require in all Page) -->
    <link href="{{ asset("assets/admin/css/icons.min.css") }}" rel="stylesheet" type="text/css" />

    <!-- App css (Require in all Page) -->
    <link href="{{ asset("assets/admin/css/app.min.css") }}" rel="stylesheet" type="text/css" />

    <!-- Theme Config js (Require in all Page) -->
    <script src="{{ asset("assets/admin/js/config.js") }}"></script>
    @stack("css")

</head>

<body>
<!-- START Wrapper -->
<div class="wrapper">
