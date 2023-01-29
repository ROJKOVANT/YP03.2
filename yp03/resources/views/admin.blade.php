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
                <a class="nav_h1" href="{{route('tiding.trashed')}}">Посты</a>
            </div>
            <div class="navigation5">
                <img class="nav_img5" src="/img/группы.png" alt="">
                <a class="nav_h5" href="{{ route('paragraphs') }}">Категории</a>
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
        <img class="header_icon" style="border-radius: 50px;" src="{{Auth::user()->avatar}}" alt="">
        <input class="input_poisk" placeholder="Админ панель" maxlength="76" type="text">
    </div>
    <div class="row">
        <div class="div_1">
            <li>
                <a href="{{ route('paragraphs') }}" style="color: white; font-size: 1.2vw;">Категории</a>
            </li>
        </div>
        <div class="div_2">
            <li>
                <a href="{{ route('tiding.trashed') }}" style="color: white; font-size: 1.2vw;">Новости</a>
            </li>
        </div>
    </div>
    </body>
@endsection

