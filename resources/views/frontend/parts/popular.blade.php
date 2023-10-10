<div class="col-lg-3 mt-30 mt-lg-0">
    <div class="section-title-style2 mb-30 align-items-end">
        <h3 class="lh-1">Actualités populaires</h3>
    </div>
    <div class="tc-Post-overlay-style1">
        @foreach($populars->slice(0, 1) as $popular)
        <div class="item mb-20">
            <div class="img th-200 img-cover radius-7 overflow-hidden">
                <a class="h-100" href="{{ route('post.show', ['catname' => Str::slug(get_category_title($popular->categories()->latest()->first()->id), '-'), 'slug' => $popular->slug]) }}">
                    <img src="{{ makepreview($popular->thumb, 's', 'posts') }}" alt="{{ $popular->title }}">
                    <div class="tags-15">
                        <a href="{{ route('frontend.categories', ['categ' => Str::slug(get_category_title($popular->categories()->latest()->first()->id), '-')]) }}" class="{{ get_class_by_category($popular->categories()->latest()->first()->id) }} text-white py-1 px-3 rounded-pill fsz-12px text-uppercase me-2">{{ get_category_title($popular->categories()->latest()->first()->id) }}</a>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="tc-post-list-style2">
        <div class="items">
            @foreach($populars->slice(0, 1) as $popular)
            <div class="item pb-15 pt-0">
                <div class="content">
                    <h5 class="title fw-bold">
                        <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($popular->categories()->latest()->first()->id), '-'), 'slug' => $popular->slug]) }}" class="hover-underline">{{ Str::of(strip_tags(html_entity_decode(html_entity_decode($popular->title))))->words(10, ' ...') }}</a>
                    </h5>
                    <div class="meta-bot mt-15 fsz-13px color-000">
                        <i class="la la-calendar me-2"></i> {!! $popular->published_at->diffForHumans() !!} par {{ ucfirst($popular->user->username) }}
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($populars->slice(-3) as $popular)
            <div class="item pt-15 {{ $loop->index++ == $popular->count() ? 'pb-0 border-0' : 'pb-15' }}">
                <div class="content">
                    <h5 class="title fw-bold">
                        <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($popular->categories()->latest()->first()->id), '-'), 'slug' => $popular->slug]) }}" class="hover-underline">{{ Str::of(strip_tags(html_entity_decode(html_entity_decode($popular->title))))->words(10, ' ...') }}</a>
                    </h5>
                    <div class="meta-bot mt-15 fsz-13px color-000">
                        <i class="la la-calendar me-2"></i> {!! $popular->published_at->diffForHumans() !!} par {{ ucfirst($popular->user->username) }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
