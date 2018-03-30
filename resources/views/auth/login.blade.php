@extends('layouts.main')

@section('content')
<section>
    <div class="container">
        <div class="columns">
            <div class="column is-6 is-offset-1">
                <form method="POST" action="{{ route('login') }}">
                @csrf

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

                    <label class="checkbox">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                        Prisiminti?
                    </label><br>
                    <div class="menu-divider"></div>
                    <button type="submit" class="button"> Prisijungti </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

