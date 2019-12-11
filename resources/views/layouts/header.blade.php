<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ setting('site.title') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    @yield('css')
</head>
<?php 
$body_classes = isset($body_classes) ? $body_classes : "";

if (Auth::check()) :
    $body_classes .= ' logged-in';
else :
    $body_classes .= ' not-logged-in';
endif;
?>
<body class="{{ @$body_classes }}">
    <!-- App -->
    <div id="app">

        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="col-md-6">
                    <nav class="navbar topbar__navbar-left navbar-expand-lg">
                        {{ menu('topbar_left', 'bootstrap') }}
                    </nav>
                </div>
                <div class="col-md-6">
                    
                </div>
            </div>    
        </div>

        <!-- Header -->
        <div class="header">
            <div class="container">
                <nav class="navbar main__menu navbar-expand-lg">
                   <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ Voyager::image(setting('site.logo')) }}"></a>
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse" id="mainMenu">
                       {{ menu('main', 'bootstrap') }}
                   </div>
                </nav>
            </div>
        </div>