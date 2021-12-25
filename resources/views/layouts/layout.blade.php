<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="Enes Kurbetoğlu">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    @yield('css')
    @yield('headerjs')
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    @include('home._header')
    @include('home._jumbotron')

    @section('content')
    @show

    @include('home._footer')
    @yield('footerjs')

</body>
</html>
