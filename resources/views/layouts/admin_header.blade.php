
<!DOCTYPE html>

@if(session('lang')=='en')
<html lang="en" data-textdirection="ltr" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>{{trans('admin.public_web_title')}}</title>
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/app-assets/images/ico/apple-icon-60.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/app-assets/images/ico/apple-icon-76.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/app-assets/images/ico/apple-icon-152.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/app-assets/images/ico/favicon.ico') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/app-assets/images/ico/favicon-32.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/bootstrap.css') }}">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/fonts/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/extensions/pace.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/colors.css') }}">
    <!-- END ROBUST CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style.css') }}">
    <!-- END Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/colors/palette-gradient.css') }}">
{{--    Begain Page Level Style--}}

{{--    End Page Level Style--}}
    @else

        <html lang="en" data-textdirection="ltr" class="loading">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
            <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
            <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
            <meta name="author" content="PIXINVENT">
            <title>{{trans('admin.public_web_title')}}</title>
            <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/app-assets/images/ico/apple-icon-60.png') }}">
            <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/app-assets/images/ico/apple-icon-76.png') }}">
            <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/app-assets/images/ico/apple-icon-120.png') }}">
            <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/app-assets/images/ico/apple-icon-152.png') }}">
            <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/app-assets/images/ico/favicon.ico') }}">
            <link rel="shortcut icon" type="image/png" href="{{ asset('/app-assets/images/ico/favicon-32.png') }}">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-touch-fullscreen" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="default">
            <!-- BEGIN VENDOR CSS-->
            <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css-rtl/bootstrap.css') }}">
            <!-- font icons-->
            <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/fonts/icomoon.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/extensions/pace.css') }}">
            <!-- END VENDOR CSS-->
            <!-- BEGIN ROBUST CSS-->
            <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css-rtl/bootstrap-extended.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css-rtl/app.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css-rtl/colors.css') }}">
            <!-- END ROBUST CSS-->

            <!-- BEGIN Custom CSS-->
            <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style-rtl.css') }}">
            <!-- END Custom CSS-->
            <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css-rtl/core/menu/menu-types/vertical-overlay-menu.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css-rtl/core/colors/palette-gradient.css') }}">
            {{--    Begain Page Level Style--}}

            {{--    End Page Level Style--}}



        @endif
    @yield('styles')
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
