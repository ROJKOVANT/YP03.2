
@extends('layouts.app')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>KapChat</title>
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
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
                <img class="header_icon" style="border-radius: 50px;" src="{{Auth::user()->avatar}}" alt="">
            </div>
            <!-- Вверхушка профиля -->
            <div class="header_profile">
                <img class="header_profile_img1" src="{{$user->avatar}}" alt="">
                <div class="info_profile">
                    <img class="icon_profile" style="border-radius: 50px;" src="{{$user->avatar}}" alt="">
                    <h1 class="name_profile">{{$user->name}}</h1>
                    <h1 class="year_profile">{{ $user->age }} лет</h1>
                    <p class="status_profile">город: {{ $user->city }}</p>
                    <a href=""><img class="info_icon_profile" src="/img/иконка информации.png" alt=""></a>
                    <a class="a_none" href="">
                        <a class="a_none" href="{{route('profile.edit')}}"><h1 class="h1_info_profile">Подробная информация</h1></a>
                    </a>
                    <h1 class="h1_options_profile" href="">
                        @if ( Auth::user()->hasFriendRequestsPending($user) )
                            <p>подтверждение запроса в друзья!</p>
                        @elseif (Auth::user()->hasFriendRequestsReceived($user) )
                            <a href="{{ route('friend.accept', ['name' => $user->name]) }}" class="btn-accept">Принять в друзья</a>

                        @elseif ( Auth::user()->isFriendWith($user) )
                            <p>у вас в друзьях</p>
                            <form action="{{ route('friend.delete', ['name' => $user->name]) }}" method="POST">
                                @csrf
                                <input type="submit" class="btn-delete" value="Удалить из друзей">
                            </form>

                        @elseif( Auth::user()->id !== $user->id)
                            <a href="{{ route('friend.add', ['name' => $user->name]) }}" class="btn-add">Добавить в друзья</a>
                        @endif
                    </h1>
                    <a class="a_none" href="">
                        <h1 class="h1_zamena_photo">...</h1>
                    </a>
                </div>
            </div>
            <!-- Правый блок с друзьями -->
            <div class="right_block_friendly">
                <h1 class="spisok_friendly">Список друзей</h1>
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
        <div class="button_friendly">
            <a class="button" href="">Друзья</a>
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
        @if(!$tidings->count())
            <p>Пока еще ничего не опубликовано!</p>
        @else
            @foreach($tidings as $tiding)
                <div class="post">
                    <img class="post_icon" style="border-radius: 50px;" src="{{Auth::user()->avatar}}">
                    <h1 class="post_h1" href="{{ route('profile.index', ['name'=> $tiding->user->name]) }}">{{ $tiding->user->name }}</h1>
                    <p class="post_p">{{ $tiding->created_at->diffForHumans()}}</p>
                    <hr class="post_hr">
                    <p class="title_p">{{$tiding->title}}</p>
                    <p class="title_p">{{$tiding->content}}</p>
                    <img class="post_img" src="/{{$tiding->picture}}" alt="{{$tiding->title}}">
                    <div class="links">
                        <li>
                            <a href="{{route('tiding.edit', ['id'=> $tiding->id])}}" style="color: white">Изменить пост</a>
                        </li>
                        <li>
                            <a href="{{route('tiding.delete', ['id'=> $tiding->id])}}" style="color: white">Удалить пост</a>
                        </li>
                    </div>

                </div>
            @endforeach
        @endif
    </div>
            <div class="otstuppp"></div>
    </body>
@endsection
