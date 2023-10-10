<!DOCTYPE html>
<html @include("_particles.app.html_attr")>
<head>
    <title>@yield('head_title', get_buzzy_config('sitetitle'))</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="@yield('head_description', get_buzzy_config('sitemetadesc'))" />
    <meta name="keywords" content="@yield('head_keywords', get_buzzy_config('sitemetakeywords'))" />
    <meta property="fb:app_id" content="{{  get_buzzy_config('facebookapp') }}" />
    <meta property="og:type" content="@yield('og_type',  'website')" />
    <meta property="og:site_name" content="{{  str_replace(' ', '', get_buzzy_config('sitename')) }}" />
    <meta property="og:title" content="@yield('head_title',  get_buzzy_config('sitetitle'))" />
    <meta property="og:description" content="@yield('head_description', get_buzzy_config('sitemetadesc'))" />
    <meta property="og:url" content="@yield('head_url', url('/'))" />
    <meta property="og:locale" content="{{  get_buzzy_config('sitelanguage') }}">
    <meta property="og:image" content="@yield('head_image', asset(get_buzzy_config('sitelogo')))" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="{{ str_replace(' ', '', get_buzzy_config('sitename')) }}" />
    <meta name="twitter:title" content="@yield('head_title',  get_buzzy_config('sitetitle'))" />
    <meta name="twitter:url" content="@yield('head_url', url('/'))" />
    <meta name="twitter:description" content="@yield('head_description', get_buzzy_config('sitemetadesc'))" />
    <meta name="twitter:image" content="@yield('head_image', asset(get_buzzy_config('sitelogo')))" />
    <link rel="shortcut icon" href="{{ asset(get_buzzy_config('favicon')) }}" />

    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="{{ asset('v2/css/lib/bootstrap.min.css') }}">

    <!-- font family -->
    <link href="{{ asset('v2/fonts.googleapis.com/css2c948.css?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap') }}" rel="stylesheet">

    <!-- ionicons icons  -->
    <link rel="stylesheet" href="{{ asset('v2/css/lib/ionicons.css') }}">
    <!-- line-awesome icons  -->
    <link rel="stylesheet" href="{{ asset('v2/css/lib/line-awesome.css') }}">
    <!-- animate css  -->
    <link rel="stylesheet" href="{{ asset('v2/css/lib/animate.css') }}" />
    <!-- fancybox popup  -->
    <link rel="stylesheet" href="{{ asset('v2/css/lib/jquery.fancybox.css') }}" />
    <!-- lity popup  -->
    <link rel="stylesheet" href="{{ asset('v2/css/lib/lity.css') }}" />
    <!-- swiper slider  -->
    <link rel="stylesheet" href="{{ asset('v2/css/lib/swiper.min.css') }}" />

    <!-- ====== main style ====== -->
    <link rel="stylesheet" href="{{ asset('v2/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('v2/toast/toastr.css') }}"/>

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v8.0" nonce="ZMsfNXQP"></script>


    {{--<script>
        // Désactiver le clic droit
        document.addEventListener("contextmenu", function (event) {
            event.preventDefault();
        });
    </script>--}}
</head>

<body class="home-style2 tc-blog-page home-style1 tc-single-post-creative-page tc-about-page  pace-done tc-contact-page tc-404-page">
