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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== end nav search ====== -->

    <!--Contents-->
    <main>

        <!-- ====== start features posts ====== -->
        <section class="tc-main-post-style2 pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pe-0 pe-lg-5">
                        <div class="main-content-side">
                            <!-- ====== start audio ====== -->
                            {!! $page->text !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end features posts ====== -->
    </main>
    <!--End-Contents-->
@endsection
