<header class="header">
    <div class="header__searchbar">
        <div class="header__searchbar__container">
            <form action="{{ route('search') }}" method="get">
                <input class="header__searchbar__container__input" id="search" type="search" required="" name="q"
                    placeholder="{{ trans('index.search') }}" autocomplete="off">
                <label class="header__searchbar__container__close material-button material-button--icon ripple"
                    for="search"><i class="material-icons">&#xE5CD;</i></label>
            </form>
        </div>
    </div>
    @if(Auth::check())
    <div class="header__appbar">
        <div class="container">
            <div class="header__appbar--left">
                <div class="header__appbar--left__nav visible-mobile">
                    <i class="material-icons">menu</i>
                </div>
                <div class="header__appbar--left__logo">
                    @include('_particles.header.logo')
                </div>

                    @php($message_count = auth()->user()->newThreadsCount())
                <div class="header__appbar--left__menu hide-mobile">
{{--                    @include('_particles.header.menu')--}}
                    <ul class="level_root header__appbar--left__menu__list">
                        <li data-id="" class="menu_item header__appbar--left__menu__list__item ">
                            <a href="{{ auth()->user()->profile_link }}">{{ trans('index.myprofile') }}</a>
                        </li>
                        <li data-id="" class="menu_item header__appbar--left__menu__list__item ">
                            <a href="{{ route('user.messages', [ 'user' => Auth::user()->username_slug ]) }}">{{ trans('v4.messages') }}</a>
                            @if($message_count)
                                <span class="badge-count">{{$message_count}}</span>
                            @endif
                        </li>
                        <li data-id="" class="menu_item header__appbar--left__menu__list__item ">
                            <a href="{{ route('user.settings', ['user' => Auth::user()->username_slug ]) }}">{{ trans('index.settings') }}</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="header__appbar--right">
{{--                @include('_particles.header.search')--}}
                <div class="header__appbar--right__notice">
                    @include('_particles.header.create_button')
                </div>

                @include('_particles.header.user')
            </div>
        </div>
    </div>
    @endif


</header>

@include('layout.header_mobile')
