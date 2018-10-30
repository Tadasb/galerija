@extends('layouts.main')
@section('title', 'Registracija')
@section('content')
<section>
    <div class="container">
        <div class="columns">
            <div class="column is-6 is-offset-1">
                <form method="POST" action="{{ route('register') }}">
                @csrf
                    <div class="field">
                        <label class="label">Vardas</label>
                        <div class="control">
                            <input class="input {{ $errors->has('name') ? ' is-danger' : '' }}" type="text" name="name" value="{{ old('name') }}" autofocus>
                        </div>
                        @if ($errors->has('name'))
                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label class="label">El. paštas</label>
                        <div class="control">
                            <input class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="email" name="email" value="{{ old('email') }}">
                        </div>
                        @if ($errors->has('email'))
                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label class="label">Slaptažodis</label>
                        <div class="control">
                            <input class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" name="password">
                        </div>
                        @if ($errors->has('password'))
                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label class="label">Slaptažodis dar kartą</label>
                        <div class="control">
                            <input class="input" type="password" name="password_confirmation">
                        </div>
                        @if ($errors->has('password_confirmation'))
                        <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>

                    <button type="submit" class="button">
                        Registruotis
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection