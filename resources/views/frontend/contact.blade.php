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

    <main>

        <!-- ====== start features posts ====== -->
        <section class="tc-contact-info pt-50 pb-50">
            <div class="container">
                <div class="content">
                    <div class="row justify-content-between">
                        <div class="col-lg-5">
                            <h2> Nos réseaux sociaux </h2>
                            <div class="social-icons mt-60">
                                <a href="#"> <i class="la la-twitter"></i> </a>
                                <a href="#"> <i class="la la-facebook-f"></i> </a>
                                <a href="#"> <i class="la la-instagram"></i> </a>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-30 mt-lg-0">
                            <h5 class="sub-title fsz-24px mb-20 fw-bold"> Contacts </h5>
                            <ul>
                                <li class="mb-15"><a href="#">(+051) 3235 68 69</a></li>
                                <li class="mb-15"><a href="#">hello@newzin.com</a></li>
                                <li class="mb-15"><a href="#">support@newzin.com</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 mt-30 mt-lg-0">
                            <h5 class="sub-title fsz-24px mb-20 fw-bold"> Adresse </h5>
                            <ul>
                                <li class="mb-15"><a href="#">925 Bald Hill St, Asheville, NC 28803</a></li>
                                <li class="mb-15"><a href="#">(+005) 800 500 1234</a></li>
                                <li class="mb-15"><a href="#">contact@newzin.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end features posts ====== -->

        <!-- ====== start contact form ====== -->
        <section class="tc-contact-form pt-80 container pb-80 border-1 border-top brd-gray">
            <div class="">
                <div class="row gx-5">
                    <div class="col-lg-12">
                        <div class="contact-form-card">
                            <h4 class="fsz-24px text-capitalize mb-10">Envoyez nous un message</h4>
                            <p class="fsz-13px mb-30">(<span class="text-danger">*</span>) Tous les champs sont obligatoires </p>
                            <form class="form" action="{{ route('contact') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-15">
                                            <input type="text" name="subject" value="{{ old('subject') }}" class="form-control" placeholder="Objet ">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-15">
                                            <textarea rows="6" name="message" class="form-control" placeholder="Entrez votre message ici ">{{ old('message') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-15">
                                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Votre nom complet ">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-15">
                                            <input type="text" name="email" class="form-control" placeholder="Votre Email " value="{{ old('email') }}">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn bg-main text-white rounded-0 mt-30">
                                    <span class="fsz-11px">Envoyer le message </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end contact form ====== -->

    </main>
@endsection
