@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/post.css') }}">
    </head>
    {{--Бокавая панель навигации--}}
    <div class="navigation">
        <div class="logo">
            <a href="{{ route('profile.index', [Auth::user()->name]) }}"><img class="logo_img"  src="/img/капибара 1.png" alt=""></a>
            <h1 class="logo_h1">KapChat</h1>
        </div>

        <div class="navigation-f2">
            <li><a id="navbarDropdown" class="nav-link dropdown-toggle" href="/home" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}</a>
            </li>
            <li><a href="/post"><img src="{{ asset("img/settings.svg") }}" alt="">Лента</a></li>
            <li><a href="#"><img src="{{ asset("img/settings.svg") }}" alt="">Сообщения</a></li>
            <li><a href="{{route('friend.index')}}"><img src="{{ asset("img/settings.svg") }}" alt="">Друзья</a></li>
            <li><a href="/news"><img src="{{ asset("img/settings.svg") }}" alt="">Новости</a></li>
        </div>

        <div class="navigation-f4">
            <li><a href="/help"><img src="{{ asset("img/settings.svg") }}" alt="">Тех.поддержка</a></li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <img src="{{ asset("img/settings.svg") }}" alt="">
                    {{ __('Выход') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </div>
    </div>
    {{--Вторая часть страницы--}}
    <div class="d-f">
        {{--Верхняя панель--}}
        <div class="upPanel">
            {{--поиск по пользователям--}}
            <div class="search">
                <form method="GET" action="{{route('search.results')}}" class="form_search">
                    <input name="query" class="input_search" type="search"
                           placeholder="Что ищем?" aria-label="Search">
                    <button class="btn_search" type="submit">Найти</button>
                </form>
            </div>
            {{--оповещение--}}
            <div class="notifications">
                <img src="{{ asset("img/notifications.svg") }}" alt="">
            </div>
            {{--вывод аватарки и логина--}}
            <div class="avatar">
                <div class="name">
                    <li><a id="navbarDropdown" class="nav-link dropdown-toggle" href="/home" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}</a>
                    </li>
                </div>
                <div class="circle"></div>
            </div>
        </div>
        <div class="upProfile">
            <div>Редактирование категории {{$paragraphs->name}}</div>
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
                <button type="submit">Update</button>
            </form>
        </div>
        {{--Профиль--}}
        {{--        <div class="upProfile">--}}
        {{--            <li>--}}
        {{--                <a href="{{ route('profile.news') }}">Добавить статью</a>--}}
        {{--            </li>--}}
        {{--        </div>--}}
    </div>
@endsection

