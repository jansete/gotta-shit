@extends('layout.layout')

@section('content')
    @include('place.places_show')
@endsection

@section('javascript')
    @foreach($places as $place)
        @include('js.place')
    @endforeach
    @include('js.nearest')
    @include('js.hover')
@endsection