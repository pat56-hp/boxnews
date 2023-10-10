@extends('auth.layout.template')
@section('content')
    <div class="text-center">
        <h4>Connexion</h4>
        <p class="mb-10">Utilisez vos identifiants pour vous connecter.</p>
    </div>
    {!! Form::open(array('action' => array('Auth\LoginController@login', 'redirectTo' =>
            Request::query('redirectTo') ), 'method' => 'POST', 'onsubmit' => 'return true')) !!}
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewbox="0 0 24 16">
                            <g transform="translate(0)">
                                <path d="M23.983,101.792a1.3,1.3,0,0,0-1.229-1.347h0l-21.525.032a1.169,1.169,0,0,0-.869.4,1.41,1.41,0,0,0-.359.954L.017,115.1a1.408,1.408,0,0,0,.361.953,1.169,1.169,0,0,0,.868.394h0l21.525-.032A1.3,1.3,0,0,0,24,115.062Zm-2.58,0L12,108.967,2.58,101.824Zm-5.427,8.525,5.577,4.745-19.124.029,5.611-4.774a.719.719,0,0,0,.109-.946.579.579,0,0,0-.862-.12L1.245,114.4,1.23,102.44l10.422,7.9a.57.57,0,0,0,.7,0l10.4-7.934.016,11.986-6.04-5.139a.579.579,0,0,0-.862.12A.719.719,0,0,0,15.977,110.321Z" transform="translate(0 -100.445)" />
                            </g>
                        </svg>
                    </span>
                </div>
                <input required class="form-control" name="user_email" type="email" value="" placeholder="{{ trans('index.email') }}">
            </div>
        </div>
        <div class="form-group password-field">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewbox="0 0 16 24">
                            <g transform="translate(0)">
                                <g transform="translate(5.457 12.224)">
                                    <path d="M207.734,276.673a2.543,2.543,0,0,0-1.749,4.389v2.3a1.749,1.749,0,1,0,3.5,0v-2.3a2.543,2.543,0,0,0-1.749-4.389Zm.9,3.5a1.212,1.212,0,0,0-.382.877v2.31a.518.518,0,1,1-1.035,0v-2.31a1.212,1.212,0,0,0-.382-.877,1.3,1.3,0,0,1-.412-.955,1.311,1.311,0,1,1,2.622,0A1.3,1.3,0,0,1,208.633,280.17Z" transform="translate(-205.191 -276.673)" />
                                </g>
                                <path d="M84.521,9.838H82.933V5.253a4.841,4.841,0,1,0-9.646,0V9.838H71.7a1.666,1.666,0,0,0-1.589,1.73v10.7A1.666,1.666,0,0,0,71.7,24H84.521a1.666,1.666,0,0,0,1.589-1.73v-10.7A1.666,1.666,0,0,0,84.521,9.838ZM74.346,5.253a3.778,3.778,0,1,1,7.528,0V9.838H74.346ZM85.051,22.27h0a.555.555,0,0,1-.53.577H71.7a.555.555,0,0,1-.53-.577v-10.7a.555.555,0,0,1,.53-.577H84.521a.555.555,0,0,1,.53.577Z" transform="translate(-70.11)" />
                            </g>
                        </svg>
                    </span>
                </div>
                <input required class="form-control" name="user_password" type="password" value="" placeholder="{{ trans('index.password') }}">
            </div>
        </div>
        <div class="row mt-6 mb-6">
            <div class="col-6 d-flex align-items-center">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="cb1" name="remember" value="true" checked>
                    <label class="custom-control-label" for="cb1">Se souvenir
                    </label>
                </div>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('password.request') }}">{{ trans('passwords.forgotpassword') }}</a>
            </div>
        </div>
        @if(get_buzzy_config('BuzzyLoginCaptcha')=="on" && get_buzzy_config('reCaptchaKey') !== '')
            <div class="under-email-signin clearfix">
                <label>{{ trans('buzzycontact.areyouhuman') }}</label>
                <script src='https://www.google.com/recaptcha/api.js' async defer></script>
                <div class="g-recaptcha clearfix" data-sitekey="{{  get_buzzy_config('reCaptchaKey') }}"></div>
            </div>
        @endif
        <div>
            <button class="btn btn-primary btn-block">{{ trans('index.login') }}</button>
        </div>
        <div class="mt-10 mb-6 text-center">
            <span>Ou par</span>
        </div>
        @include('auth.layout.auth_button')
        <div class="text-center mt-10">
            Pas encore de compte ? <a href="{{ route('register') }}">S'inscrire</a>
        </div>
    {!! Form::close() !!}
@endsection
