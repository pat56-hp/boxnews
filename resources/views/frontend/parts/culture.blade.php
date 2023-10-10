<section class="pt-70">
    <div class="container">
        <div class="tc-posts-tabs-style3">
            <div class="section-title-style2 mb-40 align-items-end justify-content-between">
                <div class="d-flex align-items-center">
                    <h3 class="lh-1 me-30 color-000 fsz-14px text-uppercase">Cultures</h3>
                    <a href="{{ route('frontend.categories', ['categ' => 'culture']) }}" class="fsz-12px color-666 text-uppercase">Voir plus <i class="la la-angle-right"></i></a>
                </div>
                <ul class="nav nav-pills border-0" id="pills-tab" role="tablist">
                    @foreach($subCategCulture as $sub)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->index == 0 ? 'active' : '' }} ms-20 me-0 fsz-13px" id="pills-{{ Str::slug($sub->name, '-') }}-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-{{ Str::slug($sub->name, '-') }}" type="button" role="tab"
                                    aria-controls="pills-{{ Str::slug($sub->name, '-') }}" aria-selected="{{ $loop->index == 0 ? 'true' : 'false' }}">
                                {{ $sub->name }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            @foreach($subCategCulture as $sub)
            <div class="tab-pane fade {{ $loop->index == 0 ? 'show active' : '' }}" id="pills-{{ Str::slug($sub->name, '-') }}" role="tabpanel" aria-labelledby="pills-{{ Str::slug($sub->name, '-') }}-tab">
                @php
                    $firstPosts = $sub->posts()->byPublished()->byLanguage()->byApproved()->orderByDesc('id')->get()->take(10);
                @endphp
                @if($firstPosts->count() > 0)
                <div class="content pb-80">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="tc-Post-overlay-style1">
                                @foreach($firstPosts->slice(0, 1) as $post)
                                <div class="item mb-5 mb-lg-0">
                                    <div class="img th-525 img-cover radius-5 overflow-hidden">
                                        <a class="h-100" href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}" class="d-block h-100">
                                            <img src="{{ makepreview($post->thumb, 's', 'posts') }}" alt="{{ $post->title }}">
                                        </a>
                                        <div class="tags-30 fsz-12px fw-500">
                                            <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}" class="me-10 {{ get_class_by_category($post->categories()->latest()->first()->id) }} text-white text-uppercase rounded-pill">
                                                <span class="my-1 mx-3">{{ get_category_title($post->categories()->latest()->first()->id) }}</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="content p-30">
                                        <div class="cont">
                                            <h3 class="title">
                                                <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}">{{ Str::of(strip_tags(html_entity_decode(html_entity_decode($post->title))))->words(10, ' ...') }}</a>
                                            </h3>
                                            <div class="meta-bot lh-1 mt-30 text-white fsz-13px">
                                                <a href="#"> <i class="la la-clock"></i> {!! $post->published_at->diffForHumans() !!}</a>
                                                <a href="#" class="fsz-13px text-white ms-2"><i class="la la-user me-1"></i> {{ ucfirst($post->user->username) }}</a>
                                                <a href="#" class="fsz-13px text-white ms-2"><i class="la la-eye me-1"></i> {{ $post->all_time_stats ? number_format($post->all_time_stats) : "0" }} {{ trans('updates.views') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="tc-post-list-style7">
                                @foreach($firstPosts->slice(1, 5) as $post)
                                <div class="item mb-30">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}" class="img img-cover radius-4 w-100 m-0 th-80">
                                                <img src="{{ makepreview($post->thumb, 's', 'posts') }}" alt="{{ $post->title }}">
                                            </a>
                                        </div>
                                        <div class="col-8">
                                            <div class="info">
                                                <h6 class="title">
                                                    <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}">{{ Str::of(strip_tags(html_entity_decode(html_entity_decode($post->title))))->words(6, ' ...') }}</a>
                                                </h6>
                                                <a href="#" class="date fsz-13px color-666 mt-10"> <i class="la la-clock"></i> {!! $post->published_at->diffForHumans() !!}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="tc-post-grid-style7 mt-5 mt-lg-0">
                                @foreach($firstPosts->slice(6, 1) as $post)

                                    <div class="item pb-30 border-1 border-bottom brd-gray">
                                        <div class="img img-cover radius-5 th-200">
                                            <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}" class="d-block h-100">
                                                <img src="{{ makepreview($post->thumb, 's', 'posts') }}" alt="{{ $post->title }}">
                                            </a>
                                            <div class="tags-15 fsz-12px fw-500">
                                                <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}" class="me-10 {{ get_class_by_category($post->categories()->latest()->first()->id) }} text-white text-uppercase rounded-pill">
                                                    <span class="my-1 mx-3">{{ get_category_title($post->categories()->latest()->first()->id) }}</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="content pt-30">
                                            <h6 class="title">
                                                <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}">{{ Str::of(strip_tags(html_entity_decode(html_entity_decode($post->title))))->words(4, ' ...') }}</a>
                                            </h6>
                                            <div class="meta-bot lh-1 mt-20 fsz-13px">
                                                <a href="#"> <i class="la la-clock"></i> {!! $post->published_at->diffForHumans() !!} par {{ ucfirst($post->user->username) }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @foreach($firstPosts->slice(7, 3) as $post)
                            <div class="d-flex fsz-16px fw-bold mt-20">
                                <i class="ion-arrow-right-b me-3 mt-1"></i>
                                <p>
                                    <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}">{{ Str::of(strip_tags(html_entity_decode(html_entity_decode($post->title))))->words(7, ' ...') }}</a>
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @endforeach

        </div>
    </div>
</section>
