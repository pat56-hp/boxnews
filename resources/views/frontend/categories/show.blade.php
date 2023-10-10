@extends('frontend.layouts.template')
@push('css')
    @section('head_title', str_replace('"', '', $post->title). ' | '.get_buzzy_config('sitename'))
@section('og_type', 'article')
@section('head_description', str_limit(str_replace('"', '', $post->body), 150))
@section('head_keywords', collect($tags)->implode('name', ','))
@section('head_image', url(makepreview($post->thumb, 'b', 'posts')))
@section('head_url', url($post->post_link))
@section('header')
    @if(get_buzzy_config('p_amp') === 'on')
        @if($post->type == 'news' || $post->type == 'list' || $post->type == 'video' )
            <link rel="amphtml" href="{{ url('amp/'.$post->type.'/'.$post->id) }}">
        @endif
    @endif
    <meta property="og:image:width" content="780" />
    <meta property="og:image:height" content="440" />
    @if( get_buzzy_config('site_default_text_editor', 'tinymce') == 'froala')
        <link rel="stylesheet" href="{{ asset('assets/plugins/froala_editor/css/froala_style.min.css')}}">
    @endif
    @if(isset($has_video_player))
        <link href="{{ asset('assets/plugins/video/video-js.min.css') }}" rel="stylesheet">
    @endif
@endsection
@endpush
@section('content')
    <main>
        <!-- ====== start tc-main-post-style1 ====== -->
        <section class="tc-blog-nav-search">
            <div class="container">
                <div class="tc-main-post-title pt-40 pb-40">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="text-uppercase mb-15">{{ $category->name }}</p>
                            <h2 class="title">{{ $post->title }}</h2>
{{--                            <p class="fsz-16px mt-20 color-666">Stay focused and remember we design the best WordPress News</p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="tc-popular-posts-blog tc-main-post-style1 pb-60">
            <div class="container">
                <div class="content-widgets pt-50 pb-50">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="tc-post-list-style3">
                                <div class="meta-nav pt-0 pb-30 brd-gray">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="author-side color-666 fsz-13px">
                                                <div class="author me-40 d-flex d-lg-inline-flex align-items-center">
                                                    <span class="icon-30 rounded-circle overflow-hidden me-10">
                                                        <img src="{{ makepreview($post->user->icon , 's', 'members/avatar') }}" alt="{{ $post->user->username }}">
                                                    </span>
                                                    <span>Publié par</span>
                                                    <a href="#" class="text-decoration-underline text-primary ms-1">{{ $post->user->username}}</a>
                                                </div>
                                                <span class="me-40">
                                                    <a href="#"><i class="la la-calendar me-1"></i> Posté {!! $post->published_at->diffForHumans() !!}</a>
                                                </span>
                                                <span class="">
                                                    <a href="#"><i class="la la-eye me-1"></i> {{ $post->all_time_stats ? number_format($post->all_time_stats) : "0" }} {{ trans('updates.views') }}</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tc-main-post-img img-cover mb-50">
                                    <img src="{{ makepreview($post->thumb, 'b', 'posts') }}" alt="{{ $post->title }}" width="788">
                                </div>
                                <div class="tc-main-post-content color-000">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="sharing">
                                                <p class="text-uppercase mb-20">Partager</p>
                                                <div class="share-icons">
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::fullUrl() }}" target="_blank"><i class="la la-facebook-f"></i></a>
                                                    <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ Request::fullUrl() }}" target="_blank"><i class="la la-twitter"></i></a>
                                                    <a href="https://wa.me/?text={{ Request::fullUrl() }}" target="_blank"><i class="la la-whatsapp"></i></a>
                                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ Request::fullUrl() }}" target="_blank"><i class="la la-linkedin"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <h4 class="sub-title sm-content-width">
                                                {!! nl2br($post->body) !!}
                                            </h4>

                                            @foreach($entries as $key => $entry)
{{--                                                <p class="info-text sm-content-width mt-40">--}}
{{--                                                    <span class="lg-letter">--}}
{{--                                                        a--}}
{{--                                                    </span>--}}
{{--                                                    uthor and journalist Leah McLaren was a precocious 13-year-old when she broke down at her mother’s kitchen table one night in Toronto and described a  harrowing sexual experience at a pool party. Her mother, Cessie, brewed her a mug of herbal tea, added a slug of whisky, and countered it with a tale of her own.At just 12, Cessie had been raped by her riding instructor. The Horseman, she called him. Having groomed her for assault, he then persuaded her that she was in love with him.--}}
{{--                                                </p>--}}
{{--                                                --}}
{{--                                                <h4 class="sub-title sm-content-width mt-40">--}}
{{--                                                    Sample Heading--}}
{{--                                                </h4>--}}
                                                @if($entry->title)
                                                    <h6 class="sub-title sm-content-width mt-30">
                                                        @if($post->ordertype != '')
                                                            {{ $entry->order+1 }}.
                                                        @endif

                                                        {{ $entry->title }}
                                                    </h6>
                                                @endif
                                                <div class="info-text-img mt-30">
                                                    <div class="row">
                                                        <div class="{{ !empty($entry->image) ? 'col-lg-7' : 'col-lg-12' }}">
                                                            <p class="info-text">
                                                                {!! html_entity_decode($entry->body) !!}
                                                            </p>
                                                        </div>
                                                        <div class="{{ !empty($entry->image) ? 'col-lg-5' : '' }}">
                                                            @if(!empty($entry->image))
                                                                <div class="img img-cover th-280 mt-15">
                                                                    <img src="{{ makepreview($entry->image, null, 'entries') }}" alt="{{ $entry->title }}">
                                                                </div>
                                                                @if($entry->source)
                                                                <div class="text-center color-999 py-3 fst-italic">
                                                                    <span>{!! $entry->source !!}</span>
                                                                </div>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="info-text sm-content-width mt-30">
                                                    @if( $entry->type=='text')
                                                        <small>{!! $entry->source !!}</small>
                                                    @endif
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="quote-message-content mt-50">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-12">
                                                        <div class="tc-main-post-content">
                                                            <div class="tc-subscribe-style9 mt-50">
                                                                <div class="row justify-content-around align-items-center">
                                                                    <div class="col-lg-4">
                                                                        <div class="sub-info">
                                                                            <h5 class="mb-10">Newsletter</h5>
                                                                            <p class="fsz-13px color-666">Souscrivez à notre newsletter pour ne manquer aucun contenu</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="sub-form mt-4 mt-lg-0">
                                                                            <form action="{{ route('newsletter.post') }}" method="post">
                                                                                @csrf
                                                                                <div class="form-group">
                                                                                <span class="icon">
                                                                                    <i class="la la-envelope"></i>
                                                                                </span>
                                                                                    <input type="text" name="email" class="form-control" placeholder="monadresse@email.com">
                                                                                    <button type="submit">souscrire</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="btm-share-post mt-50">
                                                            <div class="row items">
                                                                <div class="col-lg-6">
                                                                    @if($tags && get_buzzy_config('ShowTags') !== 'no')
                                                                    <div class="btm-tags mb-4 mb-lg-0">
                                                                        @foreach($tags as $tag)
                                                                            @if(!empty($tag->slug))
                                                                                <a href="#">{{ ucfirst($tag->name) }}</a>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="btm-sharing d-lg-flex align-items-lg-center justify-content-lg-end">
                                                                        <p class="text-capitalize me-20 mb-2 mb-lg-0">Partager</p>
                                                                        <div class="share-icons">
                                                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::fullUrl() }}" target="_blank"><i class="la la-facebook-f"></i></a>
                                                                            <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ Request::fullUrl() }}" target="_blank"><i class="la la-twitter"></i></a>
                                                                            <a href="https://wa.me/?text={{ Request::fullUrl() }}" target="_blank"><i class="la la-whatsapp"></i></a>
                                                                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ Request::fullUrl() }}" target="_blank"><i class="la la-linkedin"></i></a>
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
                                </div>
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


        <!-- ====== start a lire ====== -->
        @if($alires->count() > 0)
        <section class="tc-next-prev-post mb-60">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="tc-next-prev-post-slider">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach($alires as $post)
                                    <div class="swiper-slide">
                                        <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}" class="item">
                                            <p class="color-666 fsz-12px text-uppercase">A lire</p>
                                            <h6 class="title">{{ Str::of(strip_tags(html_entity_decode(html_entity_decode($post->title))))->words(10, ' [...]') }}</h6>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!-- ====== end a lire ====== -->

        <!-- ====== start another posts ====== -->
        @if($others->count() > 0)
        <section class="another-news">
            <div class="container">
                <div class="content pt-50 pb-50 border-1 border-top border-dark">
                    <div class="row">
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <a href="#" class="color-000 text-uppercase mb-30 ltspc-1"> Autres actualités intéressantes</a>
                        </div>
                    </div>
                    <div class="row">
                        @php($i = 0)
                        @foreach($others as $post)
                        <div class="col-lg-4 mb-5">
                            <div class="row">
                                <div class="col-12 {{  $loop->index % 4 == 0 ? 'border-1 border-end' : '' }} {{  ($loop->index + 1) % 4 == 0 ? 'border-1 border-end' : '' }} {{  $i == 1 ? 'border-1 border-end' : '' }}  brd-gray">
                                    <div class="tc-post-grid-default">
                                        <div class="item">
                                            <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}" class="">
                                                <div class="img img-cover th-250">
                                                    <img src="{{ makepreview($post->thumb, 's', 'posts') }}" alt="{{ html_entity_decode($post->title) }}">
                                                </div>
                                            </a>
                                            <div class="content pt-20">
                                                @if(get_sub_category($category->id, $post->categories))
                                                <a href="{{ route('frontend.categories', ['categ' => Str::slug(get_sub_category($category->id, $post->categories), '-')]) }}" class="news-cat color-999 fsz-13px text-uppercase mb-10">{{ get_sub_category($category->id, $post->categories) }}</a>
                                                @endif
                                                <h4 class="title ltspc--1 mb-10">
                                                    <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}">
                                                        {{ Str::of(strip_tags(html_entity_decode(html_entity_decode($post->title))))->words(10, ' ...') }}
                                                    </a>
                                                </h4>
                                                <div class="text color-666">
                                                    {{ Str::of(strip_tags(html_entity_decode(html_entity_decode($post->body))))->words(20, ' [...]') }}
                                                </div>
                                                <div class="meta-bot lh-1 mt-20">
                                                    <ul class="d-flex">
                                                        <li class="date me-4">
                                                            <a href="#"><i class="la la-calendar me-2"></i> {!! $post->published_at->diffForHumans() !!}</a>
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
                            </div>
                        </div>
                        @php($i++)
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!-- ====== start another posts ====== -->


        <!-- ====== start comments ====== -->
        <section class="tc-single-post-comments">
            <div class="container">
                <div class="comments-content pt-50 pb-50 border-1 border-top border-dark">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="content">
                                <h4 class="pt-20"><b>Commentaires</b></h4>
                                <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="10" data-width=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end comments ====== -->
        <!-- ====== end comments ====== -->
    </main>
@endsection
@push('js')
    @if(get_buzzy_config('p_buzzycomment')=='on')
        <script>
            var CommentsVar = {
                ajax: "{{ route('comments') }}",
                requestData: {
                    _token: "{{ csrf_token() }}",
                    post_id: "{{ $post->id }}",
                },
                lang: {
                    Success: "{{ trans('updates.success') }}",
                    Error: "{{ trans('updates.error') }}",
                    Ok: "{{ trans('updates.BuzzyEditor.lang.lang_15') }}",
                    Cancel: "{{ trans('updates.BuzzyEditor.lang.lang_4') }}",
                    Edit: "{{ trans('index.edit') }}",
                    EditComment: "{{ __('Edit Comment') }}",
                    Report: "{{ __('Report') }}",
                    ReportComment: "{{ __('Report Comment') }}",
                    ReportPlaceholder: "{{ __('Tell us why you are reporting this comment') }}",
                    WriteSomething: "{{ trans('updates.BuzzyEditor.lang.lang_7') }}",
                },
                settings: {
                    useUserTags: "{{ get_buzzy_config('COMMENTS_SHOW_USER_TAG') ? 1 : 0 }}",
                }
            };
        </script>
        <script src="{{ asset('assets/js/comments.js?v='.config('buzzy.version')) }}"></script>
    @endif
    @if($post->type=="quiz")
        <script>
            var BuzzyQuizzes = {
                lang_1: '{{ trans("buzzyquiz.shareonface") }}',
                lang_2: '{{ trans("buzzyquiz.shareontwitter") }}',
                lang_3: '{{ trans("buzzyquiz.shareface") }}',
                lang_4: '{{ trans("buzzyquiz.sharetweet") }}',
                lang_5: '{{ trans("buzzyquiz.sharedone") }}',
                lang_6: '{{ trans("buzzyquiz.sharedonedesc") }}',
            };
            Buzzy.Quizzes.init();
        </script>
    @endif
    @if(get_buzzy_theme_config('PostPageAutoload', 'autoload') === 'autoload')
        <script>
            if($(".news").length) {
                $(".news").buzzAutoLoad({
                    item: ".news__item"
                });
            }
        </script>
    @endif
    @if($has_video_player)
        <script src="{{ asset('assets/plugins/video/video.min.js') }}"></script>
    @endif
@endpush
