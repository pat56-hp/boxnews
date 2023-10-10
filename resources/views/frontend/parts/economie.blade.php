@php
    $economieThirds = $economies->slice(0, 3);
    $economieFives = $economies->slice(-5)->reverse();
@endphp

<section class="tc-new-posts-style2 pt-60 pb-60 bg-gray1">
    <div class="container">
        <div class="section-title-style2 mb-30 justify-content-between">
            <h3 class="lh-2">Economies</h3>
            <a href="{{ route('frontend.categories', ['categ' => 'economie']) }}" class="more ms-5 mb-1 color-blue1 text-uppercase">
                Voir plus
                <i class="las la-angle-right"></i>
            </a>
        </div>
        <div class="row">
            @if($firstEconomie)
            <div class="col-lg-5 border-1 border-end brd-gray">
                <div class="tc-post-overlay-default">
                    <div class="img th-525 img-cover">
                        <img src="{{ makepreview($firstEconomie->thumb, 's', 'posts') }}" alt="{{ $firstEconomie->title }}">
                        <div class="tags bg-transparent">
                            @foreach($firstEconomie->categories as $category)
                                <a href="{{ route('frontend.categories', ['categ' => Str::slug($category->name, '-')]) }}" class="{{ get_class_by_category($category->id) }} text-white py-1 px-3 rounded-pill fsz-12px text-uppercase me-2">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="content ps-40 pe-40 pb-40">
                        <h3 class="title mb-20">
                            <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($firstEconomie->categories()->latest()->first()->id), '-'), 'slug' => $firstEconomie->slug]) }}">{{ Str::of(strip_tags(html_entity_decode(html_entity_decode($firstEconomie->title))))->words(15, ' ...') }}</a>
                        </h3>
                        <div class="meta-bot lh-1">
                            <ul class="d-flex">
                                <li class="date me-4">
                                    <a href="#"><i class="la la-calendar me-1"></i> {!! $firstEconomie->published_at->diffForHumans() !!}</a>
                                </li>
                                <li class="author me-4">
                                    <a href="#"><i class="la la-user me-1"></i> {{ ucfirst($firstEconomie->user->username) }}</a>
                                </li>
                                <li class="comment">
                                    <a href="#"><i class="la la-eye me-1"></i> {{ $firstEconomie->all_time_stats ? number_format($firstEconomie->all_time_stats) : "0" }} {{ trans('updates.views') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-3 border-1 border-end brd-gray">
                <div class="tc-post-grid-default my-5 my-lg-0">
                    @foreach($economieThirds->slice(0, 1) as $economieThird)
                        <div class="item">
                            <div class="img img-cover th-200">
                                <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($economieThird->categories()->latest()->first()->id), '-'), 'slug' => $economieThird->slug]) }}">
                                    <img src="{{ makepreview($economieThird->thumb, 's', 'posts') }}" alt="{{ $economieThird->title }}">
                                </a>
                            </div>
                            <div class="content pt-20">
                                <div class="tags mb-10">
                                    <a href="{{ route('frontend.categories', ['categ' => Str::slug( get_category_title($economieThird->categories()->latest()->first()->id), '-')]) }}" class="{{ get_class_by_category($economieThird->categories()->latest()->first()->id) }} text-white py-1 px-3 rounded-pill fsz-10px text-uppercase me-2">{{ get_category_title($economieThird->categories()->latest()->first()->id) }}</a>
                                </div>
                                <h4 class="title">
                                    <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($economieThird->categories()->latest()->first()->id), '-'), 'slug' => $economieThird->slug]) }}">
                                        {{ Str::of(strip_tags(html_entity_decode(html_entity_decode($economieThird->title))))->words(10, ' ...') }}
                                    </a>
                                </h4>
                                <div class="meta-bot lh-1 mt-20">
                                    <ul class="d-flex">
                                        <li class="date me-4">
                                            <a href="#"><i class="la la-calendar me-2"></i> {!! $firstEconomie->published_at->diffForHumans() !!}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="pt-15 mt-20 border-1 border-top brd-gray">
                        <span class="fsz-12px color-999 text-capitalize fst-italic">Article Similaire</span>
                        @foreach($economieThirds->slice(-2) as $economieThird)
                        <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($economieThird->categories()->latest()->first()->id), '-'), 'slug' => $economieThird->slug]) }}" class="d-flex my-3">
                            <span class="icon-6 rounded-circle bg-dark me-3 flex-shrink-0 op-4 mt-10"></span>
                            <h6 class="fsz-16px fw-bold">
                                {{ Str::of(strip_tags(html_entity_decode(html_entity_decode($economieThird->title))))->words(5, ' ...') }}
                            </h6>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="tc-post-list-style2">
                    <div class="items">
                        @foreach($economieFives as $economieFive)
                            <div class="item {{ $loop->index == 0 ? 'pt-0 pb-15' : 'pt-15 pb-15' }} {{ ($loop->index + 1 == $economieFives->count()) ? 'border-0' : '' }}">
                                <div class="row gx-3 align-items-center">
                                    <div class="col-4">
                                        <div class="img th-80 img-cover">
                                            <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($economieFive->categories()->latest()->first()->id), '-'), 'slug' => $economieFive->slug]) }}">
                                                <img src="{{ makepreview($economieFive->thumb, 's', 'posts') }}" alt="{{ $economieFive->title }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="content">
                                            <div class="tags mb-10">
                                                @foreach($economieFive->categories as $category)
                                                    <a href="{{ route('frontend.categories', ['categ' => Str::slug( $category->name, '-')]) }}" class="{{ get_class_by_category($category->id) }} text-white py-1 px-3 rounded-pill fsz-10px text-uppercase me-2">{{ $category->name }}</a>
                                                @endforeach
                                            </div>
                                            <h5 class="title">
                                                <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($economieFive->categories()->latest()->first()->id), '-'), 'slug' => $economieFive->slug]) }}" class="hover-underline">
                                                    {{ Str::of(strip_tags(html_entity_decode(html_entity_decode($economieFive->title))))->words(7, ' ...') }}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
