@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <img class="logo_img" src="/img/капибара 1.png" alt="">
    <h1 class="logo_h1">KapChat</h1>
    <div class="block_registr">
        <a href="{{ route('register') }}"><h1 class="block_registr_reg">Регистрация</h1></a>
        <a href="{{ route('login') }}"><h1 class="block_registr_log">Вход</h1></a>
        <input class="input_name"  maxlength="60" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Введите имя и фамилию">
        @error('name')
        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
        @enderror
        <input class="input_mail"  maxlength="36" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Введите почту">
        @error('email')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
        <input class="input_icon" type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" placeholder="Добавьте Аватарку">
        @error('avatar')
        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
        <input class="input_categoria" id="city" type="city" class="form-control" name="city" placeholder="Введите город">
        <input class="input_parol"  maxlength="60" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Введите пароль">
        @error('password')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
        <input class="input_proverka_parol"  maxlength="60" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Введите пароль еще раз">
        <div class="btn_registr">
            <button type="submit" class="btn btn-primary">
                {{ __('Зарегестрироваться') }}
            </button>
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('У вас уже есть аккаунт!') }}</a>
                </li>
            @endif
        </div>
    </div>
</form>
</body>
@endsection

