<div class="col-lg-5">
    <div class="section-title-style2 mb-30 justify-content-between mt-30 mt-lg-0">
        <h3 class="lh-1">Regarder maintenant</h3>
        <a href="{{ route('frontend.categories', ['categ' => 'video']) }}" class="more ms-5 text-capitalize color-666">
            Voir plus
            <i class="las la-angle-right"></i>
        </a>
    </div>
    <div class="tc-Post-overlay-style1">
        @foreach($videos->slice(0, 1) as $video)
        <div class="item mb-30">
            <div class="img th-330 img-cover radius-7 overflow-hidden">
                <a class="h-100" href="{{ route('post.show', ['catname' => Str::slug(get_category_title($video->categories()->latest()->first()->id), '-'), 'slug' => $video->slug]) }}">
                    <img src="{{ makepreview($video->thumb, 's', 'posts') }}" alt="{{ $video->title }}">
                    <div class="tags-30">
                        <a href="{{ route('frontend.categories', ['categ' => Str::slug(get_category_title($video->categories()->latest()->first()->id), '-')]) }}" class="{{ get_class_by_category($video->categories()->latest()->first()->id) }} text-white py-1 px-3 rounded-pill fsz-12px text-uppercase me-2">{{ get_category_title($video->categories()->latest()->first()->id) }}</a>
                    </div>
                </a>
            </div>
            <div class="content p-30">
                <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($video->categories()->latest()->first()->id), '-'), 'slug' => $video->slug]) }}"  class="video_icon icon-65">
                    <i class="la la-play"></i>
                </a>
                <div class="cont">
                    <h4 class="title"><a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($video->categories()->latest()->first()->id), '-'), 'slug' => $video->slug]) }}">{{ Str::of(strip_tags(html_entity_decode(html_entity_decode($video->title))))->words(10, ' ...') }}</a></h4>
                    <div class="meta-bot mt-20 text-white fsz-13px">
                        <i class="la la-clock me-1"></i>{!! $video->published_at->diffForHumans() !!} par {{ ucfirst($video->user->username) }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row">
            @foreach($videos->slice(-2) as $video)
            <div class="col-lg-6">
                <div class="item">
                    <div class="img th-230 img-cover radius-7 overflow-hidden">
                        <a class="h-100" href="{{ route('post.show', ['catname' => Str::slug(get_category_title($video->categories()->latest()->first()->id), '-'), 'slug' => $video->slug]) }}">
                            <img src="{{ makepreview($video->thumb, 's', 'posts') }}" alt="{{ $video->title }}">
                            <div class="tags-20">
                                <a href="{{ route('frontend.categories', ['categ' => Str::slug(get_category_title($video->categories()->latest()->first()->id), '-')]) }}" class="{{ get_class_by_category($video->categories()->latest()->first()->id) }} text-white py-1 px-3 rounded-pill fsz-12px text-uppercase me-2">{{ get_category_title($video->categories()->latest()->first()->id) }}</a>
                            </div>
                        </a>
                    </div>
                    <div class="content py-4 px-3">
                        <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($video->categories()->latest()->first()->id), '-'), 'slug' => $video->slug]) }}" class="video_icon icon-45">
                            <i class="la la-play fsz-20px"></i>
                        </a>
                        <div class="cont">
                            <h6 class="title"><a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($video->categories()->latest()->first()->id), '-'), 'slug' => $video->slug]) }}">{{ Str::of(strip_tags(html_entity_decode(html_entity_decode($video->title))))->words(3, ' ...') }}</a></h6>
                            <div class="meta-bot mt-10 text-white fsz-13px">
                                {!! $video->published_at->diffForHumans() !!} par {{ ucfirst($video->user->username) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
