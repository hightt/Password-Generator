@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8 user-form">
            <div class="card mt-5 user-div">
                <div class="card-body text-center card-up display-6">Zaloguj się
                    <hr>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Adres e-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="user@gmail.com" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Hasło</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" value="useruser">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Zapamiętaj mnie
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success user-btn">
                                    Zaloguj się
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Przypomnij hasło
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-secondary float-right ml-3" href="/" role="button">Wróć</a>
                    <a class="btn btn-primary float-right user-btn" href="/register" role="button">Zarejestruj się</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
