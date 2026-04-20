<?php
$genSetting = \App\Models\Setting::first();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('meta_title', config('app.name', 'Eshan Buildwell – Expert Construction Services'))</title>
    <meta name="description" content="@yield('meta_description', 'Eshan Buildwell – Expert Construction Services')" />
    <meta name="keywords" content="@yield('meta_keywords', 'Eshan Buildwell – Expert Construction Services')">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />

    @yield('meta')
    <link rel="icon" type="image/png" href="{{ url('storage/' . $genSetting['favicon']) }}">


    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.min.css') }}" />
    <link href="{{ url('assets/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href=" {{ url('assets/css/all.min.css') }}" rel="stylesheet">
    <link href=" {{ url('assets/css/custom.css') }}" rel="stylesheet">
    <link href=" {{ url('assets/css/slider.css') }}" rel="stylesheet">
    <link href=" {{ url('assets/css/media.css') }}" rel="stylesheet">
    <link href=" {{ url('assets/css/main.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @stack('style')
</head>


<style>
    .stricky_social {
        position: fixed;
        z-index: 99;
        bottom: 0;
        background: rgb(255, 255, 255);
        height: auto;
        border-radius: 0px 10px 10px 0px;
    }

    .stricky_social>.icon {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin-left: -6px;
        padding: 4px;
        position: relative;
        width: 50px;
        left: auto;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        color: rgb(255, 255, 255);
        box-shadow: 1px 1px 5px 1px rgba(154, 154, 154, 0.5);
    }

    .stricky_social>.icon>a {
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        padding: 6px;
        margin: 2px;
    }

    .stricky_social>.icon>.mail {
        color: #4285F4;
        font-size: 24px;
        font-weight: bold;
    }

    .stricky_social>.icon>.youtube {
        color: #f00000;
        font-size: 24px;
        font-weight: bold;
    }

    .stricky_social>.icon>.instagram {
        color: #f00000;
        font-size: 24px;
        font-weight: bold;
    }

    .stricky_social>.icon>.twitter {
        color: #000000;
        font-size: 24px;
        font-weight: bold;
    }

    .stricky_social>.icon>.whatsapp {
        color: #25D366;
        font-size: 24px;
        font-weight: bold;
    }

    .stricky_social>.icon>.linkedin {
        color: #0077B5;
        font-size: 24px;
        font-weight: bold;
    }

    .stricky_social>.icon>.facebook {
        color: #0077B5;
        font-size: 24px;
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .stricky_social {
            position: fixed;
            z-index: 99;
            bottom: 0;
            /* Stick to the bottom */
            left: 0;
            /* Stick to the left */
            width: 100%;
            /* Span full width for horizontal layout */
            background: rgb(255, 255, 255);
            display: flex;
            /* Align items horizontally */
            justify-content: center;
            /* Center the icons */
            align-items: center;
            padding: 0px 10px;
        }

        .stricky_social>.icon {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            box-shadow: none;
        }

        .stricky_social>.icon>a {
            display: flex;
            /* Ensure icons are centered */
            justify-content: center;
            align-items: center;
            padding: 10px;
            text-decoration: none;
        }

        .stricky_social>.icon>a:hover {
            background: #b30000;
            /* Darker shade on hover */
        }

    }
</style>
</head>

<body>
    <div class="stricky_social">
        <div class="icon">
            <a href="mailto:{{ $genSetting['email'] }}?subject=Consultation Request&body=Hi, I want to book a consultation"
                class="mail">
                <i class="fa-solid fa-envelope"></i>
            </a>

            <a href="{{ $genSetting['facebook'] }}" class="facebook" target="_blank">
                <i class="fa-brands fa-facebook-f"></i>
            </a>

            <a href="https://wa.me/919015444490?text=Hi%20I%20want%20to%20book%20a%20consultation" class="whatsapp"
                target="_blank">
                <i class="fa-brands fa-whatsapp"></i>
            </a>

            <a href="{{ $genSetting['linkedin'] }}" class="linkedin" target="_blank">
                <i class="fa-brands fa-linkedin-in"></i>
            </a>

            <a href="{{ $genSetting['google_plus'] }}" class="google" target="_blank">
                <i class="fa-brands fa-google-plus-g"></i>
            </a>

            <a href="{{ $genSetting['instagram'] }}" class="instagram" target="_blank">
                <i class="fa-brands fa-instagram"></i>
            </a>
        </div>
    </div>


    @include('layouts.frontendHeader')

    @yield('content')

    @include('layouts.frontendFooter')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @stack('scripts')
    <span id="PING_IFRAME_FORM_DETECTION" style="display: none;"></span>

</body>