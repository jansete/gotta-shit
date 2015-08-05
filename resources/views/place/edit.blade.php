@extends('layout.layout')

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
        <form method="POST" action="/place/{{ $place->id }}">
            {!! csrf_field() !!}
            <input name="_method" type="hidden" value="PUT">
            @include('place.partials.form_place')
            <div>
                <button class="button" type="submit">{{ ucfirst(Lang::get('gottashit.place.edit_place')) }}</button>
            </div>
        </form>
    </div>
@endsection


@section('javascript')
    @include('js.place_field')
@endsection