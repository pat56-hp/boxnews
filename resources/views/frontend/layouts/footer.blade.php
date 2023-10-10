<!-- ====== start footer ====== -->
<footer class="footer-style2 pt-70">
    <div class="container">
        <div class="content">
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <div class="info">
{{--                        <h6 class="foot-tilte mb-40">{{get_buzzy_config('sitename')}}</h6>--}}
                        <a href="{{ route('home') }}" class="foot-logo">
                            <img src="{{ asset('v2/logo-light.png') }}" alt="{{get_buzzy_config('sitename')}}">
                        </a>
                        <ul class="contact-info m-0">
{{--                            <li>--}}
{{--                                <i class="la la-home me-2"></i>--}}
{{--                                <span>223 Orchard St, Manhattan, NY 9032</span>--}}
{{--                            </li>--}}
                            <li>
                                <i class="la la-phone me-2"></i>
                                <span>+031 5689 89 98</span>
                            </li>
                            <li>
                                <i class="la la-envelope me-2"></i>
                                <span>services@boxnews.com</span>
                            </li>
                        </ul>
                        <div class="social-links mt-50">
                            <a href="#">
                                <i class="la la-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="la la-facebook-f"></i>
                            </a>
                            <a href="#">
                                <i class="la la-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @if(getMenu('main-menu')->count() > 0)
                <div class="col-lg-2 mt-5 mt-lg-0">
                    <div class="link-group">
                        <h6 class="foot-tilte mb-40">Sujets</h6>
                        <ul>
                            @foreach (getMenu('main-menu') as $m)
                            <li>
                                <a href="{{ generate_menu_url($m->url) }}" class="f-link">{{ $m->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                <div class="col-lg-2 mt-5 mt-lg-0">
                    <div class="link-group">
                        <h6 class="foot-tilte mb-40">Aide</h6>
                        <ul>
                            <li>
                                <a href="{{ route('about') }}" class="f-link">A-propos</a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}" class="f-link">Contact</a>
                            </li>
                            {{--<li>
                                <a href="#" class="f-link">Emploi</a>
                            </li>--}}
                            @foreach($pages as $page)
                            <li>
                                <a href="{{ route('page.show', ['page' => $page->slug]) }}" class="f-link">{{ $page->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 mt-5 mt-lg-0">
                    <div class="newsletter">
                        <h6 class="foot-tilte mb-40">newsletter</h6>
                        <div class="cont">
                            <div class="text">
                                Inscrivez-vous à notre newsletter pour ne rien manquer
                            </div>
                            <form method="post" action="{{ route('newsletter.post') }}" class="form mt-30">
                                @csrf
                                <div class="form-group">
                                        <span class="icon">
                                            <i class="la la-envelope"></i>
                                        </span>
                                    <input type="text" name="email" placeholder="monadresse@email.com">
                                    <button type="submit">
                                        <span> <i class="la la-send"></i> </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="foot mt-70 pb-60">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="">
{{--                        <a href="{{ route('home') }}" class="foot-logo">--}}
{{--                            <img src="{{ asset(get_buzzy_config('footerlogo')) }}" alt="{{get_buzzy_config('sitename')}}">--}}
{{--                        </a>--}}
                        <div class="text ps-100 fsz-14px text-center">
                            {!! trans("updates.copyright", ['year' => now()->format('Y'), 'sitename'=> get_buzzy_config('sitename')]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== start to top button ====== -->
    <a href="#" class="to_top">
        <i class="la la-angle-up"></i>
    </a>
    <!-- ====== end to top button ====== -->
</footer>
<!-- ====== end footer ====== -->

<!-- ====== start to top button ====== -->
<!-- <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102"><path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 220.587;"></path></svg>
</div> -->
<!-- ====== end to top button ====== -->

<!-- ====== request ====== -->
<script src="{{ asset('v2/js/lib/jquery-3.0.0.min.js') }}"></script>
<script src="{{ asset('v2/js/lib/jquery-migrate-3.0.0.min.js') }}"></script>
<script src="{{ asset('v2/js/lib/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('v2/js/lib/wow.min.js') }}"></script>
<script src="{{ asset('v2/js/lib/jquery.fancybox.js') }}"></script>
<script src="{{ asset('v2/js/lib/lity.js') }}"></script>
<script src="{{ asset('v2/js/lib/swiper.min.js') }}"></script>
<script src="{{ asset('v2/js/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('v2/js/lib/jquery.counterup.js') }}"></script>
<!-- <script src="v2/js/lib/pace.js"></script> -->
<script src="{{ asset('v2/js/lib/back-to-top.js') }}"></script>
<script src="{{ asset('v2/js/lib/parallaxie.js') }}"></script>
<script src="{{ asset('v2/js/main.js') }}"></script>

<script src="{{ asset('v2/toast/toastr.js') }}"></script>
<script>
    @if(Session()->has('type'))
        show_message('{{Session::get('type')}}', '{{Session::get('message')}}');
    @endif

    @if($errors->any())
        @foreach ($errors->all() as $error)
        toastr.error('{!!  $error !!}', {
            containerId : 100,
            timeOut: 3000,
            closeHtml : '<button type="button">&times;</button>',
            progressBar : true
        });
        @endforeach
    @endif

    function show_message(type, message){
        if(type == 'alert-success'){
            toastr.success(message, {
                containerId : 100,
                timeOut: 3000,
                closeHtml : '<button type="button">&times;</button>',
                progressBar : true
            });
        }else{
            toastr.error(message, {
                containerId : 100,
                timeOut: 3000,
                closeHtml : '<button type="button">&times;</button>',
                progressBar : true
            });
        }
    }
</script>

@stack('js')
</body>

</html>
