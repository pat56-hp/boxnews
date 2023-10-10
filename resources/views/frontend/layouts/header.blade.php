<!-- ====== start navbar-container ====== -->
<div class="navbar-container">
    <section class="nav-discount text-center py-2 bg-dark">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="social-links">
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
                <div class="content text-white">
{{--                    <a href="#" class="fsz-14px pe-4 border-right border-1" style="border-right: 1px solid #fff"><b>Emploi</b></a>--}}
                    <a href="{{ route('home') }}" class="fsz-14px ms-4 border-right border-1"><b>Nous contacter</b></a>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <!-- ====== start top navbar ====== -->
        <div class="top-navbar style-2">
            <div class="container p-0">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-5">
                        <div class="date-weather mb-3 mb-lg-0 d-none d-lg-block">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <a href="{{route('home')}}" class="logo-brand">
                                        <img src="{{ asset(get_buzzy_config('sitelogo')) }}" alt="{{get_buzzy_config('sitename')}}" class="dark-none">
                                        <img src="{{ asset('v2/logo-light.png') }}" alt="{{get_buzzy_config('sitename')}}" class="light-none">
                                    </a>
                                </div>
                                <div class="col-5">
                                    <div class="item">
                                        <!-- <div class="icon me-lg-3  pt-1">
                                            <i class="la la-calendar"></i>
                                        </div> -->
                                        <div class="inf">
{{--                                            <strong>Monday</strong>--}}
{{--                                            <p>Nov 25, 2022</p>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sub-darkLight">
                            <div class="row text-end align-items-center">

                                <div class="col-12">
                                    <div class="nav-side text-center">
                                        <a href="#" class="text-uppercase fs-6 border-bottom border-1 border-dark subs">
                                            <i class="la la-envelope fs-5 me-1"></i>
                                            Newsletter
                                        </a>
                                        <a href="#0" class="icon-link search-btn-style2">
                                            <i class="la la-search fs-4 sOpen-btn"></i>
                                            <i class="la la-close fs-4 sClose-btn"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-subs-card">
                                <p class="fsz-16px text-uppercase mb-20"> Newsletter </p>
                                <div class="sub-form">
                                    <form action="{{ route('newsletter.post') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <span class="icon">
                                                <i class="la la-envelope"></i>
                                            </span>
                                            <input type="text" name="email" class="form-control" placeholder="monadresse@email.com">
                                            <button type="submit">Je m'inscris</button>
                                        </div>
                                        <p class="mt-3 color-666 fsz-12px fst-italic">Inscrivez-vous à notre newsletter pour ne rien manquer</p>
                                    </form>
                                </div>
                                <span class="cls"> <i class="la la-times"></i> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ====== end top navbar ====== -->

        <!-- ====== start navbar ====== -->
        <nav class="navbar navbar-expand-lg navbar-light style-2">
            <div class="container p-0">
                <div class="mob-nav-toggles d-flex align-items-center justify-content-between">
                    <a href="{{route('home')}}" class="logo-brand d-block d-lg-none w-50 my-4">
                        <img src="{{ asset(get_buzzy_config('sitelogo')) }}" alt="{{get_buzzy_config('sitename')}}" class="dark-none">
                        <img src="{{ asset(get_buzzy_config('sitelogo')) }}" alt="{{get_buzzy_config('sitename')}}" class="light-none">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

                    <ul class="navbar-nav mb-2 mb-lg-0 flex-shrink-0">
                        <li class="nav-item">
                            <a class="nav-link {{ $menu == 'accueil' ? 'active' : '' }}" href="{{route('home')}}">
                                Accueil
                            </a>
                        </li>

                        @if(getMenu('main-menu')->count() > 0)
                            @foreach (getMenu('main-menu') as $m)
                                <li class="nav-item {{count($m->children) > 0 ? 'dropdown' : ''}}">
                                    @if (count($m->children) > 0)
                                        <a class="nav-link dropdown-toggle {{ $menu == strtolower($m->title) ? 'active' : '' }}" href="#" id="navbarDropdown{{$m->id}}" role="button"
                                           data-bs-toggle="dropdown" aria-expanded="false">
                                    @else
                                        <a class="nav-link {{ $menu == strtolower($m->title) ? 'active' : '' }}" href="{{ generate_menu_url($m->url) }}" target="{{ $m->target }}">
                                    @endif
                                        {{ $m->title }}
                                    </a>
                                    <ul class="dropdownMenu" aria-labelledby="navbarDropdown{{$m->id}}">
                                        @foreach($m->children as $p)
                                        <li><a class="dropdown-item {{ $submenu == strtolower($p->title) ? 'active' : ''  }}" href="{{ generate_menu_url($p->url) }}">{{ $p->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        @endif

                        <li class="nav-item">
                            <a class="nav-link {{ $menu == 'contact' ? 'active' : '' }}" href="{{ route('contact') }}">
                                Contact
                            </a>
                        </li>
                    </ul>
                    <div class="side-navbar">
                        <div class="sub-darkLight">
                            <div class="darkLight-btn">
                                    <span class="icon active" id="light-icon">
                                        <i class="la la-sun"></i>
                                    </span>
                                <span class="icon" id="dark-icon">
                                        <i class="la la-moon"></i>
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- ====== end navbar ====== -->

        <!-- ====== start nav-search ====== -->
        <div class="nav-search-style2">
            <div class="row justify-content-center align-items-center gx-lg-5">
                <div class="col-lg-4">
                    <div class="info">
                        <h5 class="mt-2"> Recherche par mot clé </h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form class="form" action="{{ route('search') }}">
                        <span class="color-777 fst-italic text-capitalize mb-2 fsz-13px">Entrer un mot</span>
                        <div class="form-group">
                                <span class="icon">
                                    <i class="la la-search"></i>
                                </span>
                            <input type="text" name="q" class="form-control" placeholder="Les éléphants ... ">
                            <button type="submit">Rechercher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ====== end nav-search ====== -->
    </div>
</div>
<!-- ====== start navbar-container ====== -->

<!-- ====== start header ====== -->

<!-- ====== start header ====== -->
