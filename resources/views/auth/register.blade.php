@extends('layout.layout')

@section('content')
    <div class="forms">
        <form method="POST" action="/register">
            {!! csrf_field() !!}

            <div>
                <label for="full_name">
                    {{ ucfirst(Lang::get('gottatoshit.form.full_name')) }}
                </label>
                <input type="text" name="full_name" value="{{ old('full_name') }}" id="full_name">
            </div>
            <div>
                <label for="username">
                    {{ ucfirst(Lang::get('gottatoshit.form.username')) }}
                </label>
                <input type="text" name="username" value="{{ old('username') }}" id="username">
            </div>

            <div>
                <label for="email">
                    {{ ucfirst(Lang::get('gottatoshit.form.email')) }}
                </label>
                <input type="email" name="email" value="{{ old('email') }}" id="email">
            </div>

            <div>
                <label for="password">
                    {{ ucfirst(Lang::get('gottatoshit.form.password')) }}
                </label>
                <input type="password" name="password" id="password">
            </div>

            <div>
                <label for="password_confirmation">
                    {{ ucfirst(Lang::get('gottatoshit.form.confirm_password')) }}
                </label>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </div>

            <div>
                <button type="submit" class="button">{{ ucfirst(Lang::get('gottatoshit.form.register')) }}</button>
            </div>
        </form>
    </div>
@endsection