@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/friends.css') }}">
    </head>
    {{--Бокавая панель навигации--}}
    <div class="left_block">
        <div class="logo">
            <a href="{{ route('profile.index', [Auth::user()->name]) }}"><img class="logo_img" src="/img/капибара 1.png" alt=""></a>
            <h1 class="logo_h1">KapChat</h1>
        </div>
        <nav class="navigation">
            <div class="navigation1">
                <img class="nav_img1" src="/img/icons8-home-96 (1) 1.png" alt="">
                <a class="nav_h1" href="">Лента</a>
            </div>
            <div class="navigation2">
                <img class="nav_img2" src="/img/icons8-messages-64 (1) 1.png" alt="">
                <a class="nav_h2" href="">Сообщения</a>
            </div>
            <div class="navigation3">
                <img class="nav_img3" src="/img/icons8-группа-пользователей,-мужчины-64 (1) 1.png" alt="">
                <a class="nav_h3" href="{{route('friend.index')}}">Друзья</a>
            </div>
            <div class="navigation4">
                <img class="nav_img4" src="/img/icons8-знак-выхода-50 1.png" alt="">
                <a class="nav_h4" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Выход') }}
                </a>
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
        <a href="/home"><img class="header_icon" style="border-radius: 50px;" src="{{Auth::user()->avatar}}" alt=""></a>
        <div>
            <form method="GET" action="{{route('search.results')}}" class="form_search">
                <input class="input_poisk" name="query" type="search" placeholder="Кого хотите найти ?" maxlength="76" aria-label="Search">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="row1">
            <div class="col-1">
                <h3>Ваши друзья</h3>
                @if(!$friends->count())
                    <p>У вас нет друзей!</p>
                @else
                    @foreach($friends as $user)
                        @include('user.partials.userblock')
                    @endforeach
                @endif
            </div>
        </div>

        <div class="row2">
            <div class="col-2">
                <h3>Запросы в друзья</h3>

                @if(!$requests->count())
                    <p>У вас нет запросов в друзья!</p>
                @else

                    @foreach($requests as $user)
                        @include('user.partials.userblock') <p>ожидает подтверждения в друзья</p>
                    @endforeach

                @endif
            </div>
        </div>
    </div>
@endsection
{{--<div class="row">--}}
{{--    <div class="col-lg-6">--}}
{{--        <h3>Ваши друзья</h3>--}}

{{--        @if(!$friends->count())--}}
{{--            <p>У вас нет друзей!</p>--}}
{{--        @else--}}
{{--            @foreach($friends as $user)--}}
{{--                @include('user.partials.userblock')--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--    </div>--}}

{{--    <div class="col-lg-6">--}}
{{--        <h3>Запросы в друзья</h3>--}}

{{--        @if(!$requests->count())--}}
{{--            <p>У вас нет запросов в друзья!</p>--}}
{{--        @else--}}
{{--            @foreach($requests as $user)--}}
{{--                @include('user.partials.userblock')--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--    </div>--}}

{{--</div>--}}
