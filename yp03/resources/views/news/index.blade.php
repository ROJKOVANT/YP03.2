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
                <form method="POST" action="{{route('news.index')}}">
                    <div class="card-header" style="margin-bottom: 1vw;">{{ __('Опубликовать статью') }}</div>
                    @csrf
                    <div class="teg">
                        <textarea class="form-control" name="news"
                                  placeholder="Что нового {{Auth::user()->name}}?" cols="30" rows="10"></textarea>
                    </div>
                    <div class="btn_news">
                        <button type="submit" class="btn" >
                            {{ __('Опубликовать новость') }}
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <hr style="margin-top: 1vw;">
                            @if(!$statuses->count())
                                <p>Пока нет записей !</p>
                            @else
                                @foreach($statuses as $news)
                                    <div>
                                        <h2 style="margin-top: 1vw;margin-bottom: 1vw;"><a href="{{ route('profile.index', ['name'=> $news->user->name]) }}">{{ $news->user->name }}</a></h2>
                                        <ul style="margin-bottom: 1vw;">
                                            <li>{{ $news->created_at->diffForHumans()}}</li>
                                        </ul>
                                        <p>{{$news->body}}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
