<nav>

    <ul class="navigation">
        <li><a href="#" class="menu-button">{{ trans('pokemonbuddy.nav.menu') }}</a></li>

        <li><a href="{{ route('nearest_places', ['language' => App::getLocale(), 'lat' => 40.5, 'lng' => -3.7, 'distance' => 1000]) }}" id="nearest-place" style="display:none">{{ trans('pokemonbuddy.nav.nearest') }}</a></li>

        <li><a href="{{ route('place.index', ['language' => App::getLocale()]) }}">{{ trans('pokemonbuddy.nav.all') }}</a></li>
        <li><a href="{{ route('best_places', ['language' => App::getLocale()]) }}">{{ trans('pokemonbuddy.nav.best_places') }}</a></li>


        @if(! Auth::check())
            <li><a href="{{ route('user_login', ['language' => App::getLocale()]) }}">{{ trans('pokemonbuddy.nav.login') }}</a></li>
            <li><a href="{{ route('user_register', ['language' => App::getLocale()]) }}">{{ trans('pokemonbuddy.nav.register') }}</a></li>
        @endif

        <li><a href="{{ route('language', ['language' => 'en']) }}">{{ trans('pokemonbuddy.nav.en') }}</a></li>
        <li><a href="{{ route('language', ['language' => 'es']) }}">{{trans('pokemonbuddy.nav.es') }}</a></li>
    </ul>

</nav>
