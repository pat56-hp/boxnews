<!doctype html>
<html @include("_particles.app.html_attr")>
<head>
    @include("_particles.app.head_meta_tags")
    @include("_particles.app.head_scripts")
    <link rel="stylesheet" href="{{ asset('assets/theme/boxed/css/style'. get_buzzy_rtl_prefix() .'.css') }}">
    @include("style")
    @yield("header")
    @include("_particles.app.head_code")
</head>
<body class="@yield('body_class') mode-add">
    <div class="buzz-container">
        <div class="global-container container add-container ">
{{--            @include("layout.header")--}}

            @yield("content")

            @include("layout.footer")
        </div>
    </div>

    @include("_particles.app.footer_scripts")

    @yield("footer")

    @include("_particles.app.footer_code")
</body>
</html>
