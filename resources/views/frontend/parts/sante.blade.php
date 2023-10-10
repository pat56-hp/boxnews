@if($santes->count() > 0)
<section class="collectibles mb-70">
    <div class="container">
        <div class="content p-30 bg-dark radius-5">
            <div class="d-flex align-items-center mb-40">
                <h3 class="lh-1 me-30 fsz-14px text-uppercase text-white">Bien être</h3>
                <a href="{{ route('frontend.categories', ['categ' => 'sante']) }}" class="fsz-12px text-white text-uppercase">Voir plus <i class="la la-angle-right"></i></a>
            </div>
            <div class="tc-post-grid-style8">
                @foreach($santes as $sante)
                <div class="item mb-40">
                    <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($sante->categories()->latest()->first()->id), '-'), 'slug' => $sante->slug]) }}" class="img img-cover radius-5 th-230">
                        <img src="{{ makepreview($sante->thumb, 's', 'posts') }}" alt="{{ $sante->title }}">
                    </a>
                    <div class="content pt-15">
                        <h6 class="title">
                            <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($sante->categories()->latest()->first()->id), '-'), 'slug' => $sante->slug]) }}" class="hover-underline">{{ Str::of(strip_tags(html_entity_decode(html_entity_decode($sante->title))))->words(7, ' ...') }}</a>
                        </h6>
                        <div class="meta-bot lh-1 mt-20 fsz-13px">
                            <a href="#"> <i class="la la-clock"></i> {!! $sante->published_at->diffForHumans() !!}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
