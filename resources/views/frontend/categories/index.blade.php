@extends('frontend.layouts.template')
@push('css')

@endpush
@section('content')
    <!-- ====== start nav search ====== -->
    <div class="tc-blog-nav-search">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="info d-flex justify-content-between">
                        <h2>{{ $page_title ?? '' }}</h2>
                        @if($subCategories->count() > 0)
                        <div class="links">
                            <a href="{{ route('frontend.categories', ['categ' => $category->name_slug]) }}" class="{{ $submenu == strtolower($category->name) ? 'active' : '' }}">Tous</a>
                            @foreach($subCategories as $subCategory)
                            <a href="{{ route('post.show', ['catname' => $category->name_slug, 'slug' => $subCategory->name_slug]) }}" class="{{ $submenu == strtolower($subCategory->name) ? 'active' : '' }}">{{ $subCategory->name }}</a>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== end nav search ====== -->

    <!--Contents-->
    <main>

        <!-- ====== start features posts ====== -->
        @if($postTops->count() > 0)
        <section class="features-posts pt-50 pb-50 bg-gray1">
            <div class="container">
                <div class="">
                    <div class="row">
                        @foreach($postTops as $post)
                        <div class="col-lg-6 {{ ($postTops->count() > 1 && $loop->index == 0) ? 'border-1 border-end brd-gray' : ''}}">
                            <div class="tc-post-overlay-default mb-30 mb-lg-0">
                                <div class="img th-600 img-cover">
                                    <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}" class="h-100">
                                        <img src="{{ makepreview($post->thumb, 's', 'posts') }}" alt="{{ html_entity_decode($post->title) }}">
                                        <div class="tags">
                                            @foreach($post->categories as $category)
                                                <a href="{{ route('frontend.categories', ['categ' => $category->name_slug]) }}">{{ $category->name }}{{ $loop->index < $post->categories->count() - 1 ? ',' : '' }}</a>
                                            @endforeach
                                        </div>
                                    </a>
                                </div>
                                <div class="content ps-30 pe-30 pb-30">
                                    <h2 class="title mb-20">
                                        <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}">
                                            {{ Str::of(strip_tags(html_entity_decode(html_entity_decode($post->title))))->words(8, ' ...') }}
                                        </a>
                                    </h2>
                                    <div class="text">
                                        {{ Str::of(strip_tags(html_entity_decode(html_entity_decode($post->body))))->words(30, ' [...]') }}
                                    </div>
                                    <div class="meta-bot lh-1 mt-40">
                                        <ul class="d-flex">
                                            <li class="date me-5">
                                                <a href="#"><i class="la la-calendar me-2"></i> {!! $post->published_at->diffForHumans() !!}</a>
                                            </li>
                                            <li class="author me-5">
                                                <a href="#"><i class="la la-user me-2"></i> Par {{ ucfirst($post->user->username) }}</a>
                                            </li>
                                            <li class="comment">
                                                <a href="#"><i class="la la-eye me-2"></i> {{ $post->all_time_stats ? number_format($post->all_time_stats) : "0" }} {{ trans('updates.views') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!-- ====== end features posts ====== -->

        <!-- ====== start popular posts ====== -->
        @if($posts->count() > 0)
        <section class="tc-popular-posts-blog">
            <div class="container">
                <div class="content-widgets pt-50 pb-50">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="tc-post-list-style3">
                                <div class="items">
                                    @foreach($posts as $post)
                                    <div class="item {{ $posts->total() == $loop->index + 1 ? 'border-0 border-end' : '' }}">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="img th-230 img-cover overflow-hidden">
                                                    <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}" class="">
                                                        <img src="{{ makepreview($post->thumb, 's', 'posts') }}" alt="{{ html_entity_decode($post->title) }}">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="content mt-20 mt-lg-0">
                                                    @if(get_sub_category($category->id, $post->categories))
                                                    <a href="{{ route('frontend.categories', ['categ' => Str::slug(get_sub_category($category->id, $post->categories), '-')]) }}" class="color-999 fsz-13px text-uppercase mb-10">{{ get_sub_category($category->id, $post->categories) }}</a>
                                                    @endif
                                                    <h4 class="title mb-15">
                                                        <a href="{{ route('post.show', ['catname' => Str::slug(get_category_title($post->categories()->latest()->first()->id), '-'), 'slug' => $post->slug]) }}">
                                                            {{ Str::of(strip_tags(html_entity_decode(html_entity_decode($post->title))))->words(10, ' ...') }}
                                                        </a>
                                                    </h4>
                                                    <div class="text color-666">
                                                        {{ Str::of(strip_tags(html_entity_decode(html_entity_decode($post->body))))->words(35, ' [...]') }}
                                                    </div>
                                                    <div class="meta-bot fsz-13px color-666">
                                                        <ul class="d-flex">
                                                            <li class="date me-5">
                                                                <a href="#"><i class="la la-calendar me-2"></i>
                                                                    {!! $post->published_at->diffForHumans() !!}
                                                                </a>
                                                            </li>
                                                            <li class="author me-5">
                                                                <a href="#"><i class="la la-user me-2"></i>
                                                                    Par {{ ucfirst($post->user->username) }}
                                                                </a>
                                                            </li>
                                                            <li class="comment">
                                                                <a href="#"><i class="la la-eye me-2"></i>
                                                                    {{ $post->all_time_stats ? number_format($post->all_time_stats) : "0" }} {{ trans('updates.views') }}
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @include('frontend.paginator', ['paginator' => $posts])
                        </div>
                        <div class="col-lg-3">
                            <div class="widgets-sticky mt-5 mt-lg-0">

                                <!-- widget-trends -->
                                @include('frontend.categories.popular_section')
                                <!-- widget-sponsored -->
                                @include('frontend.categories.pub')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end popular posts ====== -->
        @else
            <section class="tc-popular-posts-blog">
                <div class="container">
                    <div class="content-widgets pt-50 pb-50">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tc-post-list-style3">
                                    <div class="items">
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="content mt-20 mt-lg-0">
                                                        <h4 class="title mb-15 text-center">
                                                            Aucune information disponible pour l'instant
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </main>
    <!--End-Contents-->
@endsection
