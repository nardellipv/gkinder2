<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'GKinder') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href={{ asset( 'bootstrap/css/bootstrap.min.css') }}>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    @yield('style')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-blue.css') }}">

    {{--analytics--}}
    @include('external.analytics')
    {{--analytics--}}

</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- Main Header -->
    @include('layouts.nav')
        <!-- Left side column. contains the logo and sidebar -->
    @include('tutor.menu.menu')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">

            </section>
            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
    @include('layouts.footer')
    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED JS SCRIPTS -->    
    <!-- jQuery 2.2.3 -->
    <script src={{ asset( 'vendor/jQuery/jquery-2.2.3.min.js') }}></script>
    <!-- Bootstrap 3.3.7 -->
    <script src={{ asset( 'bootstrap/js/bootstrap.min.js') }}></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/app.min.js') }}"></script>
    @yield('scripts')
</body>
</html>