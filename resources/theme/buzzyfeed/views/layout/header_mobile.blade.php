@if(Auth::check())
<div class="drawer">
    <div class="drawer__header clearfix">
        <div class="drawer__header__logo">
        @include('_particles.header.logo')
        </div>
        <span class="drawer__header__close"><i class="material-icons">&#xE408;</i></span>
    </div>
{{--    <ul class="drawer__menu">--}}
{{--        <li class="drawer__menu__item drawer__menu__item--active">--}}
{{--            <a class="drawer__menu__item__link" href="{{route('home')}}">--}}
{{--                <span class="drawer__menu__item__icon"><i class="material-icons">&#xE88A;</i></span>--}}
{{--                <span class="drawer__menu__item__title">{{ trans('updates.home') }}</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        {{ menu('mobile-menu', array(--}}
{{--            'ul' => false,--}}
{{--            'li_class' => 'drawer__menu__item clearfix',--}}
{{--            'a_class' => 'drawer__menu__item__link',--}}
{{--            'icon_class' => 'drawer__menu__item__icon',--}}
{{--            'title_class' => 'drawer__menu__item__title'--}}
{{--        )) }}--}}

{{--        <li class=" drawer__menu__item--border">--}}
{{--           @include('_particles.header.reaction_icons')--}}
{{--        </li>--}}

{{--    </ul>--}}
    <ul class="drawer__menu">
        <li class="drawer__menu__item drawer__menu__item--active">
            <a class="drawer__menu__item__link" href="{{ auth()->user()->profile_link }}">
                <span class="drawer__menu__item__title">{{ trans('index.myprofile') }}</span>
            </a>
        </li>
        <li class="drawer__menu__item drawer__menu__item--active">
            <a class="drawer__menu__item__link" href="{{ route('user.messages', [ 'user' => Auth::user()->username_slug ]) }}">
                <span class="drawer__menu__item__title">{{ trans('v4.messages') }}</span>
            </a>
        </li>

        <li class="drawer__menu__item drawer__menu__item--active">
            <a class="drawer__menu__item__link" href="{{ route('user.settings', ['user' => Auth::user()->username_slug ]) }}">
                <span class="drawer__menu__item__title">{{ trans('index.settings') }}</span>
            </a>
        </li>
    </ul>

</div>
@endif
