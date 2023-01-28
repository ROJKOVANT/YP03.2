@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<form method="POST" action="{{ route('login') }}">
    @csrf
        <img class="logo_img" src="/img/капибара 1.png" alt="">
        <h1 class="logo_h1">KapChat</h1>
        <div class="block_registr">
            <a href="{{ route('login') }}"><h1 class="block_registr_reg">Вход</h1></a>
            <a href="{{ route('register') }}"><h1 class="block_registr_log">Регистрация</h1></a>
            <input class="input_name" id="email" type="email" maxlength="60" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Введите почту">
            @error('email')
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
            @enderror
            <input class="input_parol" id="password" type="password" maxlength="60" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Введите пароль">
            @error('password')
            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                   </span>
            @enderror

            <div class="btn_auth">
                <button type="submit">
                    {{ __('Войти') }}
                </button>
                @if (Route::has('password.request'))
                    <a class="link-remove" href="{{ route('password.request') }}">
                        {{ __('Востановить свой пароль?') }}
                    </a>
                @endif
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('У вас есть аккаунт?') }}</a>
                    </li>
                @endif
            </div>
        </div>
</form>
</body>
@endsection
