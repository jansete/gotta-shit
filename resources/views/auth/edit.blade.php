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
        <form method="POST" action="{{ route('user.update', ['language' => App::getLocale(), 'user' => $user->id]) }}">
            {!! csrf_field() !!}
            <input name="_method" type="hidden" value="PUT">

            @include('auth.partials.user_form')

            <div>
                <button class="button" type="submit">{{ ucfirst(trans('pokemonbuddy.user.update_user')) }}</button>
            </div>
        </form>
    </div>

@endsection