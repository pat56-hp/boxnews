@if($latestNews->count() > 0)
    <section class="tc-breaking-news-style2 pt-70 pb-70">
        <div class="container">
            <div class="section-title-style2 mb-30 justify-content-between align-items-end text-white">
                <h3 class="lh-2">Dernières Nouvelles</h3>
            </div>
            <div class="content">
                <div class="tc-breaking-news-slider2">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($latestNews as $latestNew)
                            <div class="swiper-slide">
                                <div class="card-breaking-style2">
                                        <div class="img img-cover">
                                            <a class="h-100" href="{{ route('post.show', ['catname' => Str::slug(get_category_title($latestNew->categories()->latest()->first()->id), '-'), 'slug' => $latestNew->slug]) }}">
                                                <img src="{{ makepreview($latestNew->thumb, 's', 'posts') }}" alt="{{ $latestNew->title }}">
                                                <div class="tags">
                                                    <a href="{{ route('frontend.categories', ['categ' => Str::slug(get_category_title($latestNew->categories()->latest()->first()->id), '-')]) }}" class="{{ get_class_by_category($latestNew->categories()->latest()->first()->id) }} text-white py-1 px-3 rounded-pill fsz-10px text-uppercase me-2">{{ get_category_title($latestNew->categories()->latest()->first()->id) }}</a>
                                                </div>
                                            </a>
                                        </div>
                                    <div class="info">
                                        <h6 class="title">
                                            <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($latestNew->categories()->latest()->first()->id), '-'), 'slug' => $latestNew->slug]) }}">{{ Str::of(strip_tags(html_entity_decode(html_entity_decode($latestNew->title))))->words(5, ' ...') }}</a>
                                        </h6>
                                        <div class="date">
                                            <i class="la la-clock me-1"></i>
                                            {!! $latestNew->published_at->diffForHumans() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
