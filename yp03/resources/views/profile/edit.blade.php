@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
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

    <div class="div_lenta2" style="display: flex; align-items: center; justify-content: center;">
    <form method="POST" action="{{ route('profile.edit') }}" enctype="multipart/form-data">
        @csrf
        <div class="teg">
            <label for="name" class="label_name">{{ __('Ваше имя и фамилия') }}</label>

            <div class="input-name">
                <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ Request::old('name') ?: Auth::user()->name }}">

                @error('name')
                <span class="help-block text-danger">
                                        {{ $errors->first('name') }}
                                    </span>
                @enderror
            </div>
        </div>

        <div class="teg">
            <label for="name" class="label_name">{{ __('Ваш город') }}</label>
            <div class="input-name">
                <input id="city" type="text" name="city" class="form-control @error('city') is-invalid @enderror"  value="{{ Request::old('city') ?: Auth::user()->city }}">

                @error('city')
                <span class="help-block text-danger">
                                        {{ $errors->first('city') }}
                                    </span>
                @enderror
            </div>
        </div>

        <div class="teg">
            <label for="name" class="label_name">{{ __('Ваш пол') }}</label>
            <div class="input-name">
                <input id="floor" type="text" name="floor" class="form-control @error('floor') is-invalid @enderror"  value="{{ Request::old('floor') ?: Auth::user()->floor }}">

                @error('floor')
                <span class="help-block text-danger">
                                        {{ $errors->first('floor') }}
                                    </span>
                @enderror
            </div>
        </div>

        <div class="teg">
            <label for="name" class="label_name">{{ __('Ваше ФИО') }}</label>
            <div class="input-name">
                <input id="fio" type="text" name="fio" class="form-control @error('fio') is-invalid @enderror"  value="{{ Request::old('fio') ?: Auth::user()->fio }}">

                @error('fio')
                <span class="help-block text-danger">
                    {{ $errors->first('fio') }}
                </span>
                @enderror
            </div>
        </div>

        <div class="teg">
            <label for="name" class="label_name">{{ __('Ваш возраст') }}</label>
            <div class="input-name">
                <input id="age" type="text" name="age" class="form-control @error('age') is-invalid @enderror"  value="{{ Request::old('age') ?: Auth::user()->age }}">

                @error('age')
                <span class="help-block text-danger">
                                        {{ $errors->first('age') }}
                                    </span>
                @enderror
            </div>
        </div>

        <div class="teg">
            <label for="name" class="label_name">{{ __('Ваш день рождение') }}</label>
            <div class="input-name">
                <input id="birthday" type="text" name="birthday" class="form-control @error('birthday') is-invalid @enderror"  value="{{ Request::old('birthday') ?: Auth::user()->birthday }}">

                @error('birthday')
                <span class="help-block text-danger">
                                        {{ $errors->first('birthday') }}
                                    </span>
                @enderror
            </div>

            <div class="teg">
                <input class="input_icon" type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" placeholder="Добавьте Аватарку">
                @error('avatar')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
        </div>

        <div class="btn_edit">
            <button type="submit" class="btn btn-primary" >
                {{ __('Обновить профиль') }}
            </button>
        </div>
    </form>
    </div>
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
{{--    Редактирование профиля--}}
{{--    <div class="edit">--}}
{{--        <div class="container">--}}
{{--            <div class="card-header">{{ __('Редактирование профиля') }}</div>--}}

{{--            <div class="card-body">--}}
{{--                --}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
