@extends('layout.layout')

@section('content')
    @include('place.place')
@endsection

@section('javascript')
    <script src="{{ asset('/js/pokemonbuddy_place.js') }}"></script>
@endsection