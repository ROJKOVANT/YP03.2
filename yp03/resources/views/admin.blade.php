@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    </head>
    <body>
    <div class="left_block">
        <div class="logo">
            <img class="logo_img" src="/img/капибара 1.png" alt="">
            <h1 class="logo_h1">KapChat</h1>
        </div>
        <nav class="navigation">
            <div class="navigation1">
                <img class="nav_img1" src="/img/icons8-home-96 (1) 1.png" alt="">
                <a class="nav_h1" href="">Посты</a>
            </div>
            <div class="navigation5">
                <img class="nav_img5" src="/img/группы.png" alt="">
                <a class="nav_h5" href="">Категории</a>
            </div>
            <div class="navigation4">
                <img class="nav_img4" src="/img/icons8-знак-выхода-50 1.png" alt="">
                <a class="nav_h4" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Выйти</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </nav>
    </div>
    <!-- Тут настройки, уведомления и Иконка профиля -->
    <div class="header">
        <img class="header_options" src="/img/icons8-настройки-96 1.png" alt="">
        <img class="header_notifications" src="/img/icons8-notifications-64 1.png" alt="">
        <img class="header_icon" src="/img/Иконка.png" alt="">
        <input class="input_poisk" placeholder="Админ панель" maxlength="76" type="text">
    </div>
    <div class="div_lenta2" style="display: flex; justify-content: center; padding-top: 1vw; padding-bottom: 1vw;">
        <li>
            <a href="{{ route('paragraphs') }}" style="color: white; font-size: 1.2vw;">Категории Paragraph</a>
        </li>
    </div>
    </body>
@endsection
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Админ-панель') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('category'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('category') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('Админ, вы успешно зашли!') }}--}}
{{--                </div>--}}

{{--                <ul>--}}
{{--                    <li><a href="{{route('category.index')}}">Создать категорию</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
