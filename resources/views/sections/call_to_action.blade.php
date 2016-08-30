<div class="footer">
    @if( ! Auth::check())
        <p class="footer-p">
            {!! trans('pokemonbuddy.welcome', ['path' => route('user_register', ['language' => App::getLocale()])]) !!}
        </p>
    @endif
</div>