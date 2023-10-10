<div class="col-lg-4">
    <div class="tc-soon-posts-style3">
        <div class="title">
            <h5><a href="{{ route('frontend.categories', ['categ' => 'sport']) }}">Sport</a></h5>
            <span class="icon">
                <i class="la la-angle-right"></i>
            </span>
        </div>
        @foreach($sports as $sport)
        <div class="post-card">
            <div class="row gx-3">
                <div class="col-4">
                    <div class="img">
                        <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($sport->categories()->latest()->first()->id), '-'), 'slug' => $sport->slug]) }}">
                            <img src="{{ makepreview($sport->thumb, 's', 'posts') }}" alt="{{ $sport->title }}">
                        </a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="info">
                        <h6><a href="page-single-post-creative.html">{{ Str::of(strip_tags(html_entity_decode(html_entity_decode($sport->title))))->words(5, ' ...') }}</font></font></a></h6>
                        <div class="meta-bot">
                            <i class="la la-clock me-1"></i>{!! $sport->published_at->diffForHumans() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
