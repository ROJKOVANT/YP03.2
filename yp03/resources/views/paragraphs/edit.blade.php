@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/paragraphIndex.css') }}">
    </head>
    <body>
    <div class="left_block">
        <div class="logo">
            <a href="/admin"><img class="logo_img"  src="/img/капибара 1.png" alt=""></a>
            <h1 class="logo_h1">KapChat</h1>
        </div>
        <nav class="navigation">
            <div class="navigation1">
                <img class="nav_img1" src="/img/icons8-home-96 (1) 1.png" alt="">
                <a class="nav_h1" href="{{route('tidings')}}">Посты</a>
            </div>
            <div class="navigation2">
                <img class="nav_img2" src="/img/icons8-messages-64 (1) 1.png" alt="">
                <a class="nav_h2" href="">Категории</a>
            </div>
            <div class="navigation4">
                <img class="nav_img4" src="/img/icons8-знак-выхода-50 1.png" alt="">
                <a class="nav_h4" href="">Выйти</a>
            </div>
        </nav>
    </div>
    <!-- Тут настройки, уведомления и Иконка профиля -->
    <div class="header">
        <img class="header_options" src="/img/icons8-настройки-96 1.png" alt="">
        <img class="header_notifications" src="/img/icons8-notifications-64 1.png" alt="">
        <img class="header_icon" style="border-radius: 50px;" src="{{Auth::user()->avatar}}" alt="">
            <form method="GET" action="{{route('searchTiding.results')}}" class="form_search">
                <input class="input_poisk" name="query" type="search" placeholder="Что хотите найти ?" maxlength="76" aria-label="Search">
            </form>
    </div>
    <div class="upProfile">
        <h2  style="color: white;">Редактирование категории {{$paragraphs->name}}</h2>
    </div>
    <br>
    <div class="upProfile">
        <form action="{{route('paragraph.update', ['id' => $paragraphs->id])}}" method="POST">
            @csrf
            <div>
                <label for="name">Введите  название категории</label>
                <br>
                <input type="text" name="name" value="{{$paragraphs->name}}">
            </div>
            <br>
            <button type="submit">Обновить категорию</button>
        </form>
    </div>
    <div class="otstuppp"></div>
    </body>
@endsection
{{--    <div class="upProfile">--}}
{{--        <div>Редактирование категории {{$paragraphs->name}}</div>--}}
{{--    </div>--}}
{{--    <br>--}}
{{--    <div class="upProfile">--}}
{{--        <form action="{{route('paragraph.update', ['id' => $paragraphs->id])}}" method="POST">--}}
{{--            @csrf--}}
{{--            <div>--}}
{{--                <label for="name">Введите  название категории</label>--}}
{{--                <br>--}}
{{--                <input type="text" name="name" value="{{$paragraphs->name}}">--}}
{{--            </div>--}}
{{--            <br>--}}
{{--            <button type="submit">Update</button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--    --}}{{--Профиль--}}
{{--    --}}{{--        <div class="upProfile">--}}
{{--    --}}{{--            <li>--}}
{{--    --}}{{--                <a href="{{ route('profile.news') }}">Добавить статью</a>--}}
{{--    --}}{{--            </li>--}}
{{--    --}}{{--        </div>--}}
{{--</div>--}}
