@extends('frontend.layouts.template')
@section('content')
    <main>
    <!-- ====== Dernieres nouvelles ====== -->
    @include('frontend.parts.latest_news')
    <!-- ====== Dernieres nouvelles ====== -->

    <!-- ====== A la une ====== -->
    @include('frontend.parts.la_une')
    <!-- ====== A la une ====== -->

    <!-- ====== start banner4 ====== -->
    <section class="banner4 pt-0 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <a href="#" class="d-block img-cover">
                        <img src="{{asset("v2/img/banner4.png")}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== end banner4 ====== -->


    <!-- ====== Actualites de la semaine ====== -->
    @include('frontend.parts.actu_of_week')
    <!-- ====== Actualites de la semaine -->


    <!-- ====== Annonces ====== -->
    @include('frontend.parts.annonce')
    <!-- ====== Annonces ====== -->


    <!-- ====== Economine ====== -->
    @include('frontend.parts.economie')
    <!-- ====== Economine ====== -->

    <section class="pt-70 pb-70">
        <div class="container">
            <div class="row">
                <!-- ====== Sport ====== -->
                @include('frontend.parts.sport')
                <!-- ====== Video ====== -->
                @include('frontend.parts.video')
                <!-- ====== Popular ====== -->
                @include('frontend.parts.popular')
            </div>
        </div>
    </section>

    <!-- ====== Culture ====== -->
    @include('frontend.parts.culture')
    <!-- ====== Culture ====== -->

    <!-- ====== Sante ====== -->
    @include('frontend.parts.sante')
    <!-- ====== Sante ====== -->

    <!-- ====== start banner5 ====== -->
    <section class="banner5 pt-70 pb-70 bg-gray1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <a href="#" class="img img-cover">
                        <img src="{{asset("v2/img/banner5.png")}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== end banner5 ====== -->

    </main>
@endsection
