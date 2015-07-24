@extends('layout.layout')

@section('content')
    <div class="container">
        <p>{{ Lang::get('shitguide.welcome') }}</p>
    </div>

    @include('blocks.places_home')
@endsection

@section('javascript')
    <script>
        @foreach($places as $place)
            @include('js/place')
        @endforeach
    </script>
@endsection