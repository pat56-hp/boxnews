@if($actuOfWeeks->count() > 0)
<section class="tc-trends-news-style2">
    <div class="container">
        <div class="content">
            <div class="section-title-style2 mb-30">
                <h3>Actualités de la semaine</h3>
            </div>
            <div class="tc-trends-news-slider2">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($actuOfWeeks as $actuOfWeek)
                        <div class="swiper-slide">
                            <div class="card-item">
                                <div class="img img-cover">
                                    <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($actuOfWeek->categories()->latest()->first()->id), '-'), 'slug' => $actuOfWeek->slug]) }}">
                                        <img src="{{ makepreview($actuOfWeek->thumb, 's', 'posts') }}" alt="{{ html_entity_decode($actuOfWeek->title) }}">
                                    </a>
                                </div>
                                <div class="info">
                                    <div class="tags mt-20">
                                        @foreach($actuOfWeek->categories as $category)
                                        <a href="{{ route('frontend.categories', ['categ' => Str::slug($category->name, '-')]) }}" class="{{ get_class_by_category($category->id) }} text-white py-1 px-3 rounded-pill fsz-12px text-uppercase me-2">{{ $category->name }}</a>
                                        @endforeach
                                    </div>
                                    <h4 class="title mt-20">
                                        <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($actuOfWeek->categories()->latest()->first()->id), '-'), 'slug' => $actuOfWeek->slug]) }}" class="hover-underline">
                                            {{ Str::of(strip_tags(html_entity_decode(html_entity_decode($actuOfWeek->title))))->words(10, ' ...') }}
                                        </a>
                                    </h4>
                                    <div class="meta-bot lh-1 text-capitalize color-666 fsz-13px mt-30">
                                        <ul class="d-flex">
                                            <li class="date me-4">
                                                <a href="#"><i class="la la-calendar me-1"></i> {!! $actuOfWeek->published_at->diffForHumans() !!}</a><br>
                                            </li>
                                            <li class="comment">
                                                <a href="#"><i class="la la-eye me-1"></i> {{ $actuOfWeek->all_time_stats ? number_format($actuOfWeek->all_time_stats) : "0" }} {{ trans('updates.views') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
@endif
