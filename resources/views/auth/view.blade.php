@extends('layout.layout_without_call_to_action')

@section('content')

    <div class="user-profile">

        <p class="user-label">{{ trans('pokemonbuddy.user.username') }}: <span class="user-data">{{ $user->username }}</span></p>

        @if($is_user)
            @if($user->modified)
                <p class="user-label">{{ trans('pokemonbuddy.user.no_notifications_warning') }}</p>
            @endif

            <p class="user-label">{{ trans('pokemonbuddy.user.full_name')}}: <span class="user-data">{{ $user->full_name }}</span></p>
            <p class="user-label">{{ trans('pokemonbuddy.user.email')}}: <span class="user-data">{{ $user->email }}</span></p>
            <a class="button edit-user" href="{{ route('user.edit', ['language' => App::getLocale(), 'user' => $user->id]) }}">{{ trans('pokemonbuddy.user.edit_user') }}</a>
        @endif

        <p class="user-label">{{ trans('pokemonbuddy.user.number_of_places') }}: <span class="user-data">{{ $user->numberOfPlaces }}</span></p>

        @if($is_user)
            <div class="user-label">
                @foreach($user->places as $place)
                    <a class="user-link" href="{{ route('place.show', ['language' => App::getLocale(), 'place' => $place->id]) }}">{{ $place->name }}</a>
                @endforeach
            </div>
        @endif

        <p class="user-label">{{ trans('pokemonbuddy.user.number_of_places_deleted') }}: <span class="user-data">{{ $user->numberOfPlacesTrashed }}</span></p>

        @if($is_user)
            <div class="user-label">
                @foreach($user->placesTrashed as $place)
                    <a class="user-link" href="{{ route('place.show', ['language' => App::getLocale(), 'place' => $place->id]) }}">{{ $place->name }}</a>
                @endforeach
            </div>
        @endif


        <p class="user-label">{{ trans('pokemonbuddy.user.number_of_places_rated') }}: <span class="user-data">{{ $user->numberOfPlacesRated }}</span></p>

        @if($is_user)
            <div class="user-label">
                @foreach($user->stars as $star)
                    <a class="user-link" href="{{ route('place.show', ['language' => App::getLocale(), 'place' => $star->place->id]) }}">{{ $star->place->name }}</a>
                @endforeach
            </div>
        @endif

    </div>

@endsection