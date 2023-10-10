<!doctype html>
<html @include("_particles.app.html_attr")>
<head>
    @include("_particles.app.head_meta_tags")
    <link href="{{ asset('login/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('login/css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('login/css/theme-03.css') }}" rel="stylesheet">
</head>
<body>
<div class="forny-container">
    <div class="forny-inner">
        <div class="forny-form">
            <div class="mb-8 text-center forny-logo">
                <img src="{{ asset(get_buzzy_config('sitelogo')) }}" alt="{{get_buzzy_config('sitename')}}" width="250px">
            </div>

            @yield('content')

        </div>
    </div>
</div>
<script src="{{ asset('login/js/jquery.min.js') }}"></script>
<script src="{{ asset('login/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('login/js/main.js') }}"></script>
<script src="{{ asset('login/js/demo.js') }}"></script>

<script>
    var buzzy_base_url ="{{ route('home') }}";
    var buzzy_language ="{{ get_buzzy_config('sitelanguage', 'en_US') }}";
    var buzzy_facebook_app ="{{ get_buzzy_config('facebookapp') }}";
</script>
<script src="{{ asset('assets/js/manifest.js?v='.config('buzzy.version')) }}"></script>
<script src="{{ asset('assets/js/vendor.js?v='.config('buzzy.version')) }}"></script>
<script src="{{ asset('assets/js/app.min.js?v='.config('buzzy.version')) }}"></script>

@include('errors.swalerror')

<div id="auth-modal" class="modal auth-modal"></div>

<div id="fb-root"></div>

<div class="hide">
    <input name="_requesttoken" id="requesttoken" type="hidden" value="{{ csrf_token() }}" />
</div>
</body>
</html>
