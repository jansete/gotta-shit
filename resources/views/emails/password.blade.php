@extends('layout.layout_email')

@section('email_title')
    {{ trans('pokemonbuddy.email.reset_password_subject') }}
@endsection

@section('email_content')

    <h1>{{ trans('pokemonbuddy.email.reset_password_thanks') }}</h1>

    <p>
        {!! trans('pokemonbuddy.email.reset_password_action', ['path' => url(App::getLocale() . '/password/reset/'.$token)]) !!}
    </p>

@endsection
