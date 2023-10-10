@extends("frontend.layouts.template")
@section('content')
    <main>


        <!-- ====== start about-team ====== -->
        <section class="tc-404-info text-center">
            <div class="container">
                <h1> 404 </h1>
                <h3> Oops! Page introuvable. </h3>
                <p class="color-777"> Désolé, la page que vous éssayez d'atteindre est introuvable. </p>
                <a href="{{ route('home') }}" class="butn bg-main text-white hover-shadow mt-50">
                    <span> Retour à l'accueil </span>
                </a>
            </div>
        </section>
        <!-- ====== end about-team ====== -->
    </main>
@endsection
