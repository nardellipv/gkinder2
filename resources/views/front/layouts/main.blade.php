<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestión de centros infantiles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Nursery Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <link href="{{ asset('front/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="{{ asset('front/js/jquery-2.1.4.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('front/css/easy-responsive-tabs.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/jquery.gallery.css') }}">
    <link href="{{ asset('front/css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('front/css/font-awesome.css') }}" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
          rel='stylesheet' type='text/css'>

    {{--prices--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700">
    <link href="{{ asset('front/css/prices.css') }}" rel="stylesheet">
    {{--prices--}}

    {{--google analytics--}}
    @include('external.analytics')
    {{--google analytics--}}
</head>
<body>
<script src="{{ asset('front/js/jquery.vide.min.js') }}"></script>
<!-- header -->
@include('front.layouts.parts.header')
<!-- //header -->

<!-- banner -->
@include('front.layouts.parts.banner')

<!-- banner-bottom -->
@include('front.layouts.parts.banner_bottom')
<!-- //banner-bottom -->
<!-- issues -->
@include('front.layouts.parts.issues')
<!-- //issues -->

<!-- stats -->
@include('front.layouts.parts.stats')
<!-- //stats -->
<!-- events -->
@include('front.layouts.parts.about')
<!-- //events -->
{{--faq's--}}
@include('front.layouts.parts.faq')
{{--//faq's--}}
<!-- prices-->
@include('front.layouts.parts.prices')
<!-- //prices-->
<!-- contact -->
@include('front.layouts.parts.contact')
<!-- //contact -->
<!-- footer -->
@include('front.layouts.parts.footer')
<!-- //footer -->
{{--script--}}
@include('front.layouts.parts.script')
{{--//script--}}
</body>
</html>