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
        <!-- ====== start about-about ====== -->
        <section class="tc-about-about">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="img img-cover">
                            <img src="{{ asset('v2/img/about_page/about.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="info mt-4 mt-lg-0">
                            <h2 class="fsz-30px mb-40"> Bienvenue sur BoxNews, votre source d'informations fiable et complète sur l'actualité.</h2>
                            <div class="text fsz-14px color-666 mb-60">
                                Notre plateforme en ligne est conçue pour vous tenir informé(e) des derniers développements, des événements marquants et des sujets d'intérêt tant au niveau local qu'international.
                            </div>
                            <a href="{{ route('contact') }}" class="butn bg-main text-white hover-shadow">
                                <span><i class="la la-phone fs-5 me-1"></i> Contactez-nous </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end about-about ====== -->


        <!-- ====== start about-vision ====== -->
        <section class="tc-about-vision">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-5">
                        <div class="info mt-4 mt-lg-0">
                            <p class="fsz-13px color-999 text-uppercase mb-10"> mission & vision </p>
                            <h2 class="fsz-30px mb-40"> Fournir à nos lecteurs un accès facile et rapide aux actualités. </h2>
                            <div class="text fsz-14px color-666 mb-20">
                                Nous nous efforçons de devenir la référence incontournable pour ceux qui cherchent des informations crédibles et équilibrées sur des sujets variés, allant de la politique à l'économie, en passant par la culture, le sport, la technologie et bien d'autres domaines.
                            </div>
                            <div class="text fsz-14px color-666 mb-40">
                                Notre équipe de rédacteurs chevronnés travaille sans relâche pour sélectionner, rédiger et présenter des articles pertinents, en utilisant des sources variées, telles que des feeds RSS, des contenus originaux et des contributions de nos abonnés. Nous nous efforçons de garder une approche impartiale et équilibrée dans la présentation des actualités, tout en respectant les normes éthiques du journalisme.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="numbers-circles">
                            <div class="circle-item">
                                <div class="cont">
                                    <p> mission & vision </p>
                                    <strong class="number"> <span class="counter"> 77 </span>%</strong>
                                </div>
                            </div>
                            <div class="circle-item">
                                <div class="cont">
                                    <p> Crafted by </p>
                                    <strong class="number"> <span class="counter"> 49 </span>%</strong>
                                </div>
                            </div>
                            <div class="circle-item">
                                <div class="cont">
                                    <p> crafted by </p>
                                    <strong class="number"> <span class="counter"> 10 </span>k</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{ asset('v2/img/about_page/pattern_1.png') }}" alt="" class="pattern">
        </section>
        <!-- ====== end about-vision ====== -->


        <!-- ====== start about-team ====== -->
        <section class="tc-about-team">
            <div class="container">
                <div class="title text-center mb-30">
                    <h2 class="fsz-30px"> Contactez-Nous </h2>
                </div>
                <div class="contant fsz-18px">
                    <div class="row">
                        <div class="col-lg-12 w-70">
                            <p class="text-center">
                                Nous aimerions entendre votre voix ! Si vous avez des questions, des commentaires ou si vous souhaitez en savoir plus sur BoxNews, n'hésitez pas à nous contacter à l'adresse suivante : [contact@boxnews.ci](mailto:contact@boxnews.ci). Votre opinion compte, et nous nous efforçons constamment de faire évoluer notre plateforme pour mieux répondre à vos besoins.
                            </p>
                            <p class="text-center mt-3">
                                Merci de faire partie de la communauté BoxNews, et nous espérons que notre site vous apportera une expérience informative et enrichissante à chaque visite.
                            </p>
                            <div class="info mt-4 text-center">
                                <a href="{{ route('contact') }}" class="butn bg-main text-white hover-shadow">
                                    <span><i class="la la-phone fs-5 me-1"></i> Contactez-nous </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end about-team ====== -->
    </main>
    <!--End-Contents-->
@endsection
