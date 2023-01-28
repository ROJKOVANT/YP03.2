@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/news.css') }}">
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
        {{--Профиль--}}
        <div class="upProfile">
            <div class="container">
                <div style="width: 200px; margin-left:5vw; ">
                    <h4>Добавление категории</h4>
                    <hr style="margin-top: 1vw;">
                    <div>
                        <form method="POST" action="{{route('category.index')}}">
                            <div class="card-header" style="margin-bottom: 1vw;">{{ __('Создать категорию') }}</div>
                            @csrf
                            <div class="teg">
                                <input type="text" name="category" placeholder="Введите категорию" style="margin-top: 1vw;">
                            </div>
                            <div class="btn_category">
                                <button type="submit" class="btn" >
                                    {{ __('Создане категории') }}
                                </button>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <hr style="margin-top: 1vw;">
                                    @if(!$categoryes->count())
                                        <p>Пока нет категорий !</p>
                                    @else
                                        @foreach($categoryes as $category)
                                            <div>
                                                <p class="qw" style="margin-top: 1vw;">{{$category->body}}</p>
                                                <hr>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
