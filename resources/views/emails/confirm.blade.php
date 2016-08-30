@extends('layout.layout_email')

@section('email_title')
    {{ trans('pokemonbuddy.email.confirm_email_subject') }}
@endsection

@section('email_content')

    <h1>{{ trans('pokemonbuddy.email.confirm_email_thanks') }}</h1>

    <p>
        {!! trans('pokemonbuddy.email.confirm_email_action', ['path' => url("$path")]) !!}
    </p>

@endsection