@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/paragraphIndex.css') }}">
    </head>
    <body>
    <div class="left_block">
        <div class="logo">
            <a href="{{ route('profile.index', [Auth::user()->name]) }}"><img class="logo_img"  src="/img/капибара 1.png" alt=""></a>
            <h1 class="logo_h1">KapChat</h1>
        </div>
        <nav class="navigation">
            <div class="navigation1">
                <img class="nav_img1" src="/img/icons8-home-96 (1) 1.png" alt="">
                <a class="nav_h1" href="{{route('tidings')}}">Лента</a>
            </div>
            <div class="navigation2">
                <img class="nav_img2" src="/img/icons8-messages-64 (1) 1.png" alt="">
                <a class="nav_h2" href="">Сообщения</a>
            </div>
            <div class="navigation3">
                <img class="nav_img3" src="/img/icons8-группа-пользователей,-мужчины-64 (1) 1.png" alt="">
                <a class="nav_h3" href="{{route('friend.index')}}">Друзья</a>
            </div>
            <div class="navigation5">
                <img class="nav_img5" src="/img/группы.png" alt="">
                <a class="nav_h5" href="">Группы</a>
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
        <input class="input_poisk" placeholder="Что хотите посмотреть ?" maxlength="76" type="text">
    </div>
    <div class="button_novosti">
        <a class="novostii" href="">Новости</a>
    </div>
    <div class="button_categoria">
        <a class="categoria" href="{{ route('paragraphs') }}">Категории</a>
    </div>
        <div class="upProfile">
            <h2  style="margin-top: 10vw; color: white;">Добро пожаловать в Paragraph</h2>
        </div>
        <br>
        <div class="upProfile">

            <table>
                <thead>
                <tr>
                    <th scope="col" style="color: white;"> № </th>
                    <br>
                    <th scope="col" style="color: white;">...</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paragraphs as $paragraph)
                    <tr>
                        <th scope="row" style="color: white;">{{$paragraph->name}}</th>
                        <br>
                        <td>
                            <a href="{{route('paragraph.edit', ['id'=> $paragraph->id])}}" style="color: white;">Изменить категорию</a>
                        </td>
                        <br>
                        <td>
                            <a href="{{route('paragraph.delete', ['id'=> $paragraph->id])}}" style="color: white;">Удалить категорию</a>
                        </td>
                        <br>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="upProfile">
            <li>
                <a href="{{ route('paragraph.create') }}" style="color: white;">Добавить категории Paragraph</a>
            </li>
        </div>
    <div class="right_block">
        <a href="https://www.youtube.com/?hl=RU"><img class="img_piar" src="/img/реклама_ютуб.png" alt=""></a>
    </div>
    <div class="right_block2">
        <a href="https://vk.com/ck4fandr"><img class="img_piar" src="/img/реклама_вк.png" alt=""></a>
    </div>
    <div class="otstuppp"></div>
    </body>
@endsection

{{--Бокавая панель навигации--}}
{{--<div class="navigation">--}}
{{--    <div class="navigation-f1">--}}
{{--        <li class="log"><a href="/">logo</a></li>--}}
{{--    </div>--}}

{{--    <div class="navigation-f2">--}}
{{--        <li><a id="navbarDropdown" class="nav-link dropdown-toggle" href="/home" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                {{ Auth::user()->name }}</a>--}}
{{--        </li>--}}
{{--        <li><a href="/post"><img src="{{ asset("img/settings.svg") }}" alt="">Лента</a></li>--}}
{{--        <li><a href="#"><img src="{{ asset("img/settings.svg") }}" alt="">Сообщения</a></li>--}}
{{--        <li><a href="{{route('friend.index')}}"><img src="{{ asset("img/settings.svg") }}" alt="">Друзья</a></li>--}}
{{--        <li><a href="/news"><img src="{{ asset("img/settings.svg") }}" alt="">Новости</a></li>--}}
{{--    </div>--}}

{{--    <div class="navigation-f4">--}}
{{--        <li><a href="/help"><img src="{{ asset("img/settings.svg") }}" alt="">Тех.поддержка</a></li>--}}
{{--        <li>--}}
{{--            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();--}}
{{--                    document.getElementById('logout-form').submit();">--}}
{{--                <img src="{{ asset("img/settings.svg") }}" alt="">--}}
{{--                {{ __('Выход') }}--}}
{{--            </a>--}}
{{--            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                @csrf--}}
{{--            </form>--}}
{{--        </li>--}}
{{--    </div>--}}
{{--</div>--}}
{{--Вторая часть страницы--}}
{{--<div class="d-f">--}}
{{--    --}}{{--Верхняя панель--}}
{{--    <div class="upPanel">--}}
{{--        --}}{{--поиск по пользователям--}}
{{--        <div class="search">--}}
{{--            <form method="GET" action="{{route('search.results')}}" class="form_search">--}}
{{--                <input name="query" class="input_search" type="search"--}}
{{--                       placeholder="Что ищем?" aria-label="Search">--}}
{{--                <button class="btn_search" type="submit">Найти</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--        --}}{{--оповещение--}}
{{--        <div class="notifications">--}}
{{--            <img src="{{ asset("img/notifications.svg") }}" alt="">--}}
{{--        </div>--}}
{{--        --}}{{--вывод аватарки и логина--}}
{{--        <div class="avatar">--}}
{{--            <div class="name">--}}
{{--                <li><a id="navbarDropdown" class="nav-link dropdown-toggle" href="/home" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                        {{ Auth::user()->name }}</a>--}}
{{--                </li>--}}
{{--            </div>--}}
{{--            <div class="circle"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="upProfile">--}}
{{--        <h2>Добро пожаловать в Paragraph</h2>--}}
{{--    </div>--}}
{{--    <br>--}}
{{--    <div class="upProfile">--}}

{{--        <table>--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th scope="col"> № </th>--}}
{{--                <br>--}}
{{--                <th scope="col">...</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($paragraphs as $paragraph)--}}
{{--                <tr>--}}
{{--                    <th scope="row">{{$paragraph->name}}</th>--}}
{{--                    <br>--}}
{{--                    <td>--}}
{{--                        <a href="{{route('paragraph.edit', ['id'=> $paragraph->id])}}">Изменить категорию</a>--}}
{{--                    </td>--}}
{{--                    <br>--}}
{{--                    <td>--}}
{{--                        <a href="{{route('paragraph.delete', ['id'=> $paragraph->id])}}">Удалить категорию</a>--}}
{{--                    </td>--}}
{{--                    <br>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
{{--    <div class="upProfile">--}}
{{--        <li>--}}
{{--            <a href="{{ route('paragraph.create') }}">Добавить категории Paragraph</a>--}}
{{--        </li>--}}
{{--    </div>--}}
{{--    --}}{{--Профиль--}}
{{--    --}}{{--        <div class="upProfile">--}}
{{--    --}}{{--            <li>--}}
{{--    --}}{{--                <a href="{{ route('profile.news') }}">Добавить статью</a>--}}
{{--    --}}{{--            </li>--}}
{{--    --}}{{--        </div>--}}
{{--</div>--}}
