@if($laUnes->count() > 0)
<div class="container">
    <div class="tc-featured-news-style8 mb-30" style="border-top: none">
        <div class="tc-featured-title">
            <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">A la une</font></font></h5>
{{--            <small><a href="page-blog.html"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">voir tout</font></font><i class="la la-angle-right"></i> </a></small>--}}
        </div>
        <div class="tc-post-overlay-style8">
            <div class="tc-featured-news-slider8">
                <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                    <div class="swiper-wrapper" style="transform: translate3d(-1493.33px, 0px, 0px); transition-duration: 0ms;">
                        @foreach($laUnes as $laUne)
                        <div class="swiper-slide swiper-slide-active swiper-slide-prev swiper-slide-next" data-swiper-slide-index="{{ $loop->index }}" style="width: 363.333px; margin-right: 10px;">
                            <div class="item">
                                <div class="img th-400 img-cover">
                                    <a class="h-100" href="{{ route('post.show', ['catname' => Str::slug(get_category_title($laUne->categories()->latest()->first()->id), '-'), 'slug' => $laUne->slug]) }}">
                                        <img src="{{ makepreview($laUne->thumb, 's', 'posts') }}" alt="{{ $laUne->title }}">
                                        <div class="tags">
                                            <a href="{{ route('frontend.categories', ['categ' => Str::slug(get_category_title($laUne->categories()->latest()->first()->id), '-')]) }}" class="{{ get_class_by_category($laUne->categories()->latest()->first()->id) }} text-white py-1 px-3 rounded-pill fsz-10px text-uppercase me-2">{{ get_category_title($laUne->categories()->latest()->first()->id) }}</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="content p-30">
                                    <h4 class="title">
                                        <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($laUne->categories()->latest()->first()->id), '-'), 'slug' => $laUne->slug]) }}">{{ Str::of(strip_tags(html_entity_decode(html_entity_decode($laUne->title))))->words(10, ' ...') }}</a>
                                    </h4>
                                    <div class="meta-bot lh-1 mt-30">
                                        <a href="#" class="fsz-13px text-white"> <i class="la la-clock me-1"></i>{!! $laUne->published_at->diffForHumans() !!}</a>
                                        <a href="#" class="fsz-13px text-white ms-2"><i class="la la-user me-1"></i> {{ ucfirst($laUne->user->username) }}</a>
                                        <a href="#" class="fsz-13px text-white ms-2"><i class="la la-eye me-1"></i> {{ $laUne->all_time_stats ? number_format($laUne->all_time_stats) : "0" }} {{ trans('updates.views') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                <!-- ====== arrows ====== -->
                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Diapositive suivante"></div>
                <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Diapositive précédente"></div>
                <!-- ====== pagination ====== -->
                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
            </div>
        </div>
    </div>
</div>
@endif
