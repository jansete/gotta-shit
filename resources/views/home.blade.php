@extends('layout.layout')

@section('content')
    <div class="home">
        <div class="home-help">
            {!! trans('pokemonbuddy.home') !!}
        </div>
        <div class='home-places'>
            @include('place.places_show')
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('/js/pokemonbuddy_place.js') }}"></script>
@endsection