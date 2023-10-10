@extends('frontend.layouts.template')
@push('css')

@endpush
@section('content')
    <!-- ====== start nav search ====== -->
    <section class="tc-blog-nav-search">
        <div class="container">
            <div class="tc-main-post-title pt-40 pb-40">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title">{{ $page_title ?? '' }}</h2>
                        <p class="fsz-16px mt-20 color-666">{{ html_entity_decode($search) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== end nav search ====== -->

    <!--Contents-->
    <main>

        <!-- ====== start popular posts ====== -->
        @if($posts->count() > 0)
            <section class="tc-popular-posts-blog">
                <div class="container">
                    <div class="content-widgets pt-50 pb-50">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="tc-post-list-style3">
                                    <div class="items">
                                        @foreach($posts as $post)
                                            <div class="item">
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <div class="img th-230 img-cover overflow-hidden">
                                                            <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}" class="">
                                                                <img src="{{ makepreview($post->thumb, 's', 'posts') }}" alt="{{ html_entity_decode($post->title) }}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="content mt-20 mt-lg-0">
                                                            <a href="{{ route('frontend.categories', ['categ' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-')]) }}" class="text-uppercase fsz-13px mb-1">{{ get_category_title($post->categories()->latest()->first()->id) }}</a>
                                                            <h4 class="title mb-15">
                                                                <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}">
                                                                    {{ Str::of(strip_tags(html_entity_decode(html_entity_decode($post->title))))->words(10, ' ...') }}
                                                                </a>
                                                            </h4>
                                                            <div class="text color-666">
                                                                {{ Str::of(strip_tags(html_entity_decode(html_entity_decode($post->body))))->words(35, ' [...]') }}
                                                            </div>
                                                            <div class="meta-bot fsz-13px color-666">
                                                                <ul class="d-flex">
                                                                    <li class="date me-5">
                                                                        <a href="#"><i class="la la-calendar me-2"></i>
                                                                            {!! $post->published_at->diffForHumans() !!}
                                                                        </a>
                                                                    </li>
                                                                    <li class="author me-5">
                                                                        <a href="#"><i class="la la-user me-2"></i>
                                                                            Par {{ ucfirst($post->user->username) }}
                                                                        </a>
                                                                    </li>
                                                                    <li class="comment">
                                                                        <a href="#"><i class="la la-eye me-2"></i>
                                                                            {{ $post->all_time_stats ? number_format($post->all_time_stats) : "0" }} {{ trans('updates.views') }}
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="pagination style-1 color-main justify-content-center mt-60">
                                    <a href="#" class="active">
                                        <span>1</span>
                                    </a>
                                    <a href="#">
                                        <span>2</span>
                                    </a>
                                    <a href="#">
                                        <span>3</span>
                                    </a>
                                    <a href="#">
                                        <span>4</span>
                                    </a>
                                    <a href="#">
                                        <span>...</span>
                                    </a>
                                    <a href="#">
                                        <span>20</span>
                                    </a>
                                    <a href="#">
                                        <span class="text text-uppercase">next <i class="la la-angle-right"></i> </span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="widgets-sticky mt-5 mt-lg-0">

                                    <!-- widget-trends -->
                                @include('frontend.categories.popular_section')
                                <!-- widget-sponsored -->
                                    @include('frontend.categories.pub')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ====== end popular posts ====== -->
        @else
            <section class="tc-popular-posts-blog">
                <div class="container">
                    <div class="content-widgets pt-50 pb-50">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tc-post-list-style3">
                                    <div class="items">
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="content mt-20 mt-lg-0">
                                                        <h4 class="title mb-15 text-center">
                                                            Aucune information disponible pour l'instant
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    @endif

    <!-- ====== start modals ====== -->

        <div class="offcanvas offcanvas-start sidebar-popup-style1" tabindex="-1" id="offcanvasExample"
             aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <div class="logo">
                    <img src="assets/img/logo_home1.png" alt="" class="dark-none">
                    <img src="assets/img/logo_home1_lt.png" alt="" class="light-none">
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mt-4">
                <h6 class="color-000 text-uppercase mb-15 ltspc-1"> about us <i class="la la-angle-right ms-1"></i>
                </h6>
                <div class="text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem optio tempora quia iure quae.
                    Soluta corporis quidem aperiam amet nihil.
                </div>

                <div class="sidebar-categories mt-40">
                    <h6 class="color-000 text-uppercase mb-30 ltspc-1"> categories <i
                            class="la la-angle-right ms-1"></i> </h6>
                    <a href="#" class="cat-card">
                        <div class="img img-cover">
                            <img src="assets/img/bussines/1.png" alt="">
                        </div>
                        <div class="info">
                            <h5>bussines</h5>
                            <span class="num">12</span>
                        </div>
                    </a>
                    <a href="#" class="cat-card">
                        <div class="img img-cover">
                            <img src="assets/img/trend/3.png" alt="">
                        </div>
                        <div class="info">
                            <h5>technology</h5>
                            <span class="num">14</span>
                        </div>
                    </a>
                    <a href="#" class="cat-card">
                        <div class="img img-cover">
                            <img src="assets/img/must_read/3.png" alt="">
                        </div>
                        <div class="info">
                            <h5>culture</h5>
                            <span class="num">20</span>
                        </div>
                    </a>
                    <a href="#" class="cat-card">
                        <div class="img img-cover">
                            <img src="assets/img/videos/1.png" alt="">
                        </div>
                        <div class="info">
                            <h5>videos</h5>
                            <span class="num">14</span>
                        </div>
                    </a>
                </div>
                <div class="sidebar-contact-info mt-50">
                    <h6 class="color-000 text-uppercase mb-20 ltspc-1"> Contact & follow <i
                            class="la la-angle-right ms-1"></i> </h6>
                    <ul class="m-0">
                        <li class="mb-3">
                            <i class="las la-map-marker me-2 color-main fs-5"></i>
                            <a href="#">streat name 12, hollywood City, USA</a>
                        </li>
                        <li class="mb-3">
                            <i class="las la-envelope me-2 color-main fs-5"></i>
                            <a href="#">Newzin@gmail.com</a>
                        </li>
                        <li class="mb-3">
                            <i class="las la-phone-volume me-2 color-main fs-5"></i>
                            <a href="#">+12 123 456 789</a>
                        </li>
                    </ul>
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
                        <a href="#">
                            <i class="la la-youtube"></i>
                        </a>
                        <a href="#">
                            <i class="la la-spotify"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ====== end modals ====== -->

    </main>
    <!--End-Contents-->
@endsection
