@extends('layout.layout_without_call_to_action')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="forms">
        <div>
            <a class="button" href="{{ route('social_login', ['provider' => 'facebook']) }}">{{ trans('pokemonbuddy.user.login_facebook') }}</a>
        </div>

        <div>
            <a class="button" href="{{ route('social_login', ['provider' => 'twitter']) }}">{{ trans('pokemonbuddy.user.login_twitter') }}</a>
        </div>

        <div>
            <a class="button" href="{{ route('social_login', ['provider' => 'github']) }}">{{ trans('pokemonbuddy.user.login_github') }}</a>
        </div>

        <form method="POST" action="{{ route('user_login', ['language' => App::getLocale()]) }}">
            {!! csrf_field() !!}

            <div>
                <label class="input-label" for="email">
                    {{ ucfirst(trans('pokemonbuddy.user.email')) }}
                </label>
                <input class="input" type="email" name="email" value="{{ old('email') }}" id="email">
            </div>

            <div>
                <label class="input-label" for="password">
                    {{ ucfirst(trans('pokemonbuddy.user.password')) }}
                </label>
                <input class="input" type="password" name="password" id="password">
            </div>

            <div class="checkbox-margin-top">
                <input class="input checkbox" type="checkbox" name="remember" id="remember"> <label class="checkbox-label" for="remember">{{ ucfirst(trans('pokemonbuddy.user.remember_me')) }}</label>
            </div>

            <div>
                <button class="button" type="submit">{{ ucfirst(trans('pokemonbuddy.user.login')) }}</button>
            </div>

            <div>
                <a class="forgot-password" href="{{ route('user_password_email', ['language' => App::getLocale()]) }}">{{ ucfirst(trans('pokemonbuddy.user.forgot_password')) }}</a>
            </div>
        </form>
    </div>
@endsection

