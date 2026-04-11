<?php
$genSetting = \App\Models\Setting::first();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('meta_title', config('app.name', 'Eshan Buildwell – Expert Construction Services'))</title>
    <meta name="description" content="@yield('meta_description', 'Eshan Buildwell – Expert Construction Services')" />
    <meta name="keywords" content="@yield('meta_keywords', 'Eshan Buildwell – Expert Construction Services')">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>

    @yield('meta')
    <link rel="icon" type="image/png" href="{{ url('storage/' . $genSetting['favicon']) }}">


    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.min.css') }}" />
    <link href=" {{ url('assets/css/all.min.css') }}" rel="stylesheet">
    <link href=" {{ url('assets/css/custom.css') }}" rel="stylesheet">
    <link href=" {{ url('assets/css/slider.css') }}" rel="stylesheet">
    <link href=" {{ url('assets/css/media.css') }}" rel="stylesheet">
    <link href=" {{ url('assets/css/main.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>


@include('layouts.frontendHeader')

@yield('content')

@include('layouts.frontendFooter')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
<span id="PING_IFRAME_FORM_DETECTION" style="display: none;"></span>