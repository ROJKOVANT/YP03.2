@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
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
    </div>
    <!-- Вверхушка профиля -->
    <div class="header_profile">
        <img class="header_profile_img1" src="{{Auth::user()->avatar}}" alt="">
        <div class="info_profile">
            <img class="icon_profile" style="border-radius: 50px;" src="{{Auth::user()->avatar}}" alt="">
            <h1 class="name_profile">{{ Auth::user()->name }}</h1>
            <h1 class="year_profile">{{ Auth::user()->age }} лет</h1>
            <p class="status_profile">город: {{ Auth::user()->city }}</p>
            <a href=""><img class="info_icon_profile" src="/img/иконка информации.png" alt=""></a>
            <a class="a_none" href="{{route('profile.edit')}}"><h1 class="h1_info_profile">Подробная информация</h1></a>
        </div>
    </div>
    <!-- Правый блок с друзьями -->
    <div class="right_block_friendly">
        <h1 class="spisok_friendly">Список друзей</h1>
        <h1 class="right_block_year">16</h1>
        <div class="flex_friendly">
            <img class="friendly_icon" src="/img/Иконка.png" alt="">
            <img class="friendly_icon" src="/img/Иконка.png" alt="">
            <img class="friendly_icon" src="/img/Иконка.png" alt="">
            <img class="friendly_icon" src="/img/Иконка.png" alt="">
            <img class="friendly_icon" src="/img/Иконка.png" alt="">
            <img class="friendly_icon" src="/img/Иконка.png" alt="">
        </div>
        <div class="name_friendly">
            <h1 class="name_h1">Артем</h1>
            <h1 class="name_h1">Артем</h1>
            <h1 class="name_h1">Артем</h1>
            <h1 class="name_h1">Артем</h1>
            <h1 class="name_h1">Артем</h1>
            <h1 class="name_h1">Артем</h1>
        </div>
        <div class="flex_friendly">
            <img class="friendly_icon" src="/img/Иконка.png" alt="">
        </div>
        <div class="button_friendly">
            <a class="button" href="{{route('friend.index')}}">Друзья</a>
        </div>
    </div>
    <!-- Кнопки "Создать пост" и "Создать группу" -->
    <div class="add_post">
        <a class="button_post" href="{{ route('tiding.create') }}">Пост</a>
    </div>
    <div class="add_group">
        <a class="button_group" href="">Группа</a>
    </div>
    <!-- Правый блок с группами -->
    <div class="right_block_group">
        <h1 class="spisok_friendly">Список групп</h1>
        <h1 class="right_block_year2">13</h1>
        <div class="flex_friendly">
            <img class="group_icon" src="/img/Иконка.png" alt="">
            <img class="group_icon" src="/img/Иконка.png" alt="">
            <img class="group_icon" src="/img/Иконка.png" alt="">
            <img class="group_icon" src="/img/Иконка.png" alt="">
            <img class="group_icon" src="/img/Иконка.png" alt="">
            <img class="group_icon" src="/img/Иконка.png" alt="">
        </div>
        <div class="name_friendly">
            <h1 class="name_group">Группа</h1>
            <h1 class="name_group">Группа</h1>
            <h1 class="name_group">Группа</h1>
            <h1 class="name_group">Группа</h1>
            <h1 class="name_group">Группа</h1>
            <h1 class="name_group">Группа</h1>
        </div>
        <div class="flex_friendly">
            <img class="group_icon" src="/img/Иконка.png" alt="">
            <img class="group_icon" src="/img/Иконка.png" alt="">
            <img class="group_icon" src="/img/Иконка.png" alt="">
            <img class="group_icon" src="/img/Иконка.png" alt="">
            <img class="group_icon" src="/img/Иконка.png" alt="">
            <img class="group_icon" src="/img/Иконка.png" alt="">
        </div>
        <div class="name_friendly">
            <h1 class="name_group">Группа</h1>
            <h1 class="name_group">Группа</h1>
            <h1 class="name_group">Группа</h1>
            <h1 class="name_group">Группа</h1>
            <h1 class="name_group">Группа</h1>
            <h1 class="name_group">Группа</h1>
        </div>
        <div class="button_friendly">
            <a class="button" href="">Группы</a>
        </div>
    </div>
    <!-- Галерея -->
    <div class="galereia">
        <h1 class="galeria_h1">Галерея</h1>
        <div class="flex_galereia">
            <img class="icon_galereia" src="/img/иконак профиля.png" alt="">
            <img class="icon_galereia" src="/img/иконак профиля.png" alt="">
            <img class="icon_galereia" src="/img/иконак профиля.png" alt="">
            <img class="icon_galereia" src="/img/иконак профиля.png" alt="">
        </div>
        <div class="add_photo_button">
            <a class="button_photo" href="">Добавить</a>
        </div>
        <div class="pokaz_vsex_button">
            <a class="button_pokaz" href="">Показать</a>
        </div>
    </div>
    <!-- Пост -->
    <div class="otstup">
        <div class="post">
            <img class="post_icon" src="/img/Иконка.png" alt="">
            <h1 class="post_h1">Руслан Кормеев</h1>
            <p class="post_p">10 января 2023</p>
            <hr class="post_hr">
            <img class="post_img" src="/img/каприбара_красотка.png" alt="">
            <a class="a_none" href=""><h1 class="delete_post">...</h1></a>
        </div>
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
{{--    Верхняя панель--}}
{{--    <div class="upPanel">--}}
{{--        поиск по пользователям--}}
{{--        <div class="search">--}}
{{--            <form method="GET" action="{{route('search.results')}}" class="form_search">--}}
{{--                <input name="query" class="input_search" type="search"--}}
{{--                       placeholder="Что ищем?" aria-label="Search">--}}
{{--                <button class="btn_search" type="submit">Найти</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--        оповещение--}}
{{--        <div class="notifications">--}}
{{--            <img src="{{ asset("img/notifications.svg") }}" alt="">--}}
{{--        </div>--}}
{{--        вывод аватарки и логина--}}
{{--        <div class="avatar">--}}
{{--            <div class="name">--}}
{{--                <li><a id="navbarDropdown" class="nav-link dropdown-toggle" href="/home" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                        {{ Auth::user()->name }}</a>--}}
{{--                </li>--}}
{{--            </div>--}}
{{--            <img class="circle" src="{{Auth::user()->avatar}}">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    Профиль--}}
{{--    <div class="upProfile">--}}
{{--        <li>--}}
{{--            <a href="{{ route('profile.news') }}">Добавить статью</a>--}}
{{--        </li>--}}
{{--    </div>--}}
{{--    <div class="upProfile">--}}
{{--        <li>--}}
{{--            <a href="{{ route('profile.edit') }}">Редактировать профиль</a>--}}
{{--        </li>--}}
{{--    </div>--}}
{{--    <div class="upProfile">--}}
{{--        <li>--}}
{{--            <a href="{{ route('profile.post') }}">Добавить новость</a>--}}
{{--        </li>--}}
{{--    </div>--}}
{{--    <div class="upProfile">--}}
{{--        <li>--}}
{{--            <a href="{{ route('tidings') }}">пост Tiding</a>--}}
{{--        </li>--}}
{{--    </div>--}}
{{--    <div class="upProfile">--}}
{{--        <li>--}}
{{--            <a href="{{ route('paragraphs') }}">категории Paragraph</a>--}}
{{--        </li>--}}
{{--    </div>--}}
{{--</div>--}}
