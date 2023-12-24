<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Liderinfo.org</title>
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('site/logo.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('site/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" />

    <!-- CSS
    ================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}">
    <!-- Template styles-->
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
    <!-- Responsive styles-->
    <link rel="stylesheet" href="{{ asset('site/css/responsive.css') }}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('site/css/font-awesome.min.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('site/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/owl.theme.default.min.css') }}">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{ asset('site/css/colorbox.css') }}">

{{--    <script src="{{ asset('site/js/html5shiv.js') }}"></script>--}}
{{--    <script src="{{ asset('site/js/respond.min.js') }}"></script>--}}
</head>
<body>
<div class="body-inner">
    @include('site.layouts.parents.header')



    @yield('site.content')

    @include('site.layouts.parents.footer')
    <!-- Javascript Files
    ================================================== -->
    <!-- initialize jQuery Library -->
    <script data-cfasync="false" src="{{ asset('site/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('site/js/jquery.js') }}"></script>
    <!-- Popper Jquery -->
    <script type="text/javascript" src="{{ asset('site/js/popper.min.js') }}"></script>
    <!-- Bootstrap jQuery -->
    <script type="text/javascript" src="{{ asset('site/js/bootstrap.min.js') }}"></script>
    <!-- Owl Carousel -->
    <script type="text/javascript" src="{{ asset('site/js/owl.carousel.min.js') }}"></script>
    <!-- Color box -->
    <script type="text/javascript" src="{{ asset('site/js/jquery.colorbox.js') }}"></script>
    <!-- Smoothscroll -->
{{--    <script type="text/javascript" src="{{ asset('site/js/smoothscroll.js') }}"></script>--}}
    <!-- Template custom -->
    <script type="text/javascript" src="{{ asset('site/js/custom.js') }}"></script>

</div>
<!-- Body inner end -->
</body>
</html>
