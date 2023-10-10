<div class="tc-trending-news-style5 border border-1 brd-gray mb-40">
    <p class="color-000 text-uppercase p-15">Actualités populaires</p>
    <div class="tc-post-list-style1">
        @foreach($populars->slice(0, 1) as $popular)
            <div class="tc-post-overlay-default">
                <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($popular->categories()->latest()->first()->id), '-'), 'slug' => $popular->slug]) }}" class="h-100">
                    <div class="img th-200 img-cover">
                        <img src="{{ makepreview($popular->thumb, 's', 'posts') }}" alt="{{ html_entity_decode($popular->title) }}">
                    </div>
                </a>
                <div class="content ps-20 pe-20 pb-20 text-white">
                    <a href="{{ route('frontend.categories', ['categ' => Str::slug(get_category_title($popular->categories()->latest()->first()->id), '-')]) }}" class="text-uppercase fsz-13px mb-1">{{ get_category_title($popular->categories()->latest()->first()->id) }}</a>
                    <h4 class="title">
                        <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($popular->categories()->latest()->first()->id), '-'), 'slug' => $popular->slug]) }}">
                            {{ Str::of(strip_tags(html_entity_decode(html_entity_decode($popular->title))))->words(5, ' ...') }}
                        </a>
                    </h4>
                </div>
            </div>
        @endforeach
        <div class="items px-4 py-2">
            @foreach($populars->slice(1, 4) as $popular)
                <div class="item">
                    <h2 class="num">
                        {{ $loop->index+2 }}
                    </h2>
                    <div class="content">
                        <a href="{{ route('frontend.categories', ['categ' => Str::slug(get_category_title($popular->categories()->latest()->first()->id), '-')]) }}" class="color-999 fsz-12px text-uppercase mb-1">{{ get_category_title($popular->categories()->latest()->first()->id) }}</a>
                        <h6 class="title fsz-16px fw-bold ltspc--1 hover-main">
                            <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($popular->categories()->latest()->first()->id), '-'), 'slug' => $popular->slug]) }}" class="">
                                {{ Str::of(strip_tags(html_entity_decode(html_entity_decode($popular->title))))->words(5, ' ...') }}
                            </a>
                        </h6>
                    </div>
                </div>
            @endforeach
            {{--<a href="#" class="fsz-13px text-capitalize color-666 mt-30 mb-20">
                <span>See all posts</span>
                <i class="las la-angle-right"></i>
            </a>--}}
        </div>
    </div>
</div>
