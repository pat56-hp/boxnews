@extends('auth.layout.template')
@section('content')
    <div class="text-center">
        <h4>Inscription</h4>
        <p class="mb-10">Renseignez tous les champs pour votre inscription.</p>
    </div>
    {!! Form::open(array('action' => array('Auth\RegisterController@register', 'redirectTo' =>
            Request::query('redirectTo') ), 'method' => 'POST', 'onsubmit' => 'return true')) !!}
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24">
                <g transform="translate(-61.127)">
                <g transform="translate(61.127)">
                <path d="M75.6,15.584A3.128,3.128,0,0,1,72.452,12.7a5.374,5.374,0,0,0,1.229-1.234,7.564,7.564,0,0,0,1.331-3.524.537.537,0,0,0,.134-.191,5.891,5.891,0,0,0,.445-2.264A5.275,5.275,0,0,0,70.574,0a4.6,4.6,0,0,0-2.088.5,3.62,3.62,0,0,0-.738.134,4.171,4.171,0,0,0-2.6,2.407,6.062,6.062,0,0,0-.292,3.924,6.386,6.386,0,0,0,.27.831.537.537,0,0,0,.125.185A6.772,6.772,0,0,0,67.8,12.7a3.129,3.129,0,0,1-3.146,2.885,3.689,3.689,0,0,0-3.53,3.706V23.46a.536.536,0,0,0,.532.54H78.595a.536.536,0,0,0,.532-.54V19.291A3.688,3.688,0,0,0,75.6,15.584ZM68.044,1.676a2.588,2.588,0,0,1,.61-.1.526.526,0,0,0,.224-.061,3.576,3.576,0,0,1,1.7-.433,4.2,4.2,0,0,1,3.951,4.41c0,.073,0,.146-.005.218A2.3,2.3,0,0,0,72.862,5H69.234a.974.974,0,0,1-.593-.2,1.006,1.006,0,0,1-.328-.432.649.649,0,0,0-.645-.413.656.656,0,0,0-.592.5,5.033,5.033,0,0,1-1.2,2.188C65.336,4.406,66.3,2.187,68.044,1.676Zm-.463,9.346a6.408,6.408,0,0,1-1.29-3.289,6.123,6.123,0,0,0,1.549-2.2A2.083,2.083,0,0,0,68,5.669a2.021,2.021,0,0,0,1.23.414h3.629a1.264,1.264,0,0,1,1.153.76s0,.008,0,.011c0,3.051-1.744,5.532-3.887,5.532A3.315,3.315,0,0,1,67.581,11.022ZM68.8,13.23a3.821,3.821,0,0,0,2.647,0A4.241,4.241,0,0,0,73,15.78l-2.8,4.041a.091.091,0,0,1-.151,0l-2.8-4.042A4.242,4.242,0,0,0,68.8,13.23Zm9.258,9.69H62.192V19.29a2.612,2.612,0,0,1,2.59-2.629,4.5,4.5,0,0,0,1.553-.333l2.846,4.114a1.153,1.153,0,0,0,.947.5h0a1.153,1.153,0,0,0,.947-.5l2.846-4.113a4.326,4.326,0,0,0,1.552.333,2.612,2.612,0,0,1,2.59,2.629Z" transform="translate(-61.127)"></path>
                </g>
                </g>
                </svg>
                </span>
            </div>
            <input required="" class="form-control" name="user_username" type="text" placeholder="{{ trans('index.username') }}" value="{{ Session::get('user_username')}}">
        </div>
    </div>
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

    @if(get_buzzy_config('BuzzyLoginCaptcha')=="on" && get_buzzy_config('reCaptchaKey') !== '')
        <div class="under-email-signin clearfix">
            <label>{{ trans('buzzycontact.areyouhuman') }}</label>
            <script src='https://www.google.com/recaptcha/api.js' async defer></script>
            <div class="g-recaptcha clearfix" data-sitekey="{{  get_buzzy_config('reCaptchaKey') }}"></div>
        </div>
    @endif
    <div>
        <button class="btn btn-primary btn-block">{{ trans('index.register') }}</button>
    </div>
    <div class="mt-10 mb-6 text-center">
        <span>Ou par</span>
    </div>
    @include('auth.layout.auth_button')
    <div class="text-center mt-10">
        {{ trans('index.Doyouhaveanaccount') }} <a href="{{ route('login') }}">{{ trans('index.login') }}</a>
    </div>
    {!! Form::close() !!}
@endsection
