@extends('layout.layout')

@section('content')
    @include('place.places_show')
    <div class="pagination-nav">
        {!! $places->render() !!}
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('/js/pokemonbuddy_place.js') }}"></script>
@endsection