<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ingreso panel de control</title>
    <!-- For-Mobile-Apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Classy Forms Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <!-- //For-Mobile-Apps -->
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('login-admin/css/style.css') }}" type="text/css" media="all" />
    <!-- Default-JavaScript-File -->
    <script type="text/javascript" src="{{ asset('login-admin/js/jquery.min.js') }}"></script>
    <!-- Web-Fonts -->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <!-- //Web-Fonts -->
</head>
<body>
    <h1>Ingreso panel de control</h1>
    @yield('content')
    <div class="footer">
        <strong>Copyright &copy; 2018 <a href="gkinder.com">GKinder</a>. Designed by<a href="www.mikant.com" target="_blank"> MikAnt</a></strong>
    </div>
</body>
</html>