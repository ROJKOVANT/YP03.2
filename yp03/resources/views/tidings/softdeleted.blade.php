@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/post.css') }}">
    </head>
    {{--Бокавая панель навигации--}}
    <div class="navigation">
        <div class="navigation-f1">
            <li class="log"><a href="/">logo</a></li>
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
            <h2>Удаление поста в Tidings</h2>
        </div>
        <br>
        <div class="upProfile">

            <table>
                <thead>
                <tr>
                    <th scope="col"> picture </th>
                    <br>
                    <th scope="col"> title </th>
                    <br>
                    <th scope="col"> Restore </th>
                    <br>
                </tr>
                </thead>
                <tbody>
                @foreach($tidings as $tiding)
                    <tr>
                        <th scope="row">
                            <img style="width: 125px;height: 75px;" src="{{$tiding->picture}}" alt="{{$tiding->title}}">
                        </th>
                        <br>
                        <th scope="row">{{$tiding->title}}</th>
                        <br>
                        <td>
                            <a href="{{route('tiding.restore', ['id'=> $tiding->id])}}">Востановить пост</a>
                        </td>
                        <br>
                        <td>
                            <a href="{{route('tiding.hdelete', ['id'=> $tiding->id])}}">Удалить пост</a>
                        </td>
                        <br>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
{{--        <div class="upProfile">--}}
{{--            <li>--}}
{{--                <a href="{{ route('tiding.create') }}">Добавить пост Tidings</a>--}}
{{--            </li>--}}
{{--        </div>--}}
        {{--Профиль--}}
        {{--        <div class="upProfile">--}}
        {{--            <li>--}}
        {{--                <a href="{{ route('profile.news') }}">Добавить статью</a>--}}
        {{--            </li>--}}
        {{--        </div>--}}
    </div>
@endsection
