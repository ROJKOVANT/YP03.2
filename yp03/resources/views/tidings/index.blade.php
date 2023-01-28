@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/lenta.css') }}">
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
                <a class="nav_h4" href="">Выйти</a>
            </div>
        </nav>
    </div>
    <!-- Тут настройки, уведомления и Иконка профиля -->
    <div class="header">
        <img class="header_options" src="/img/icons8-настройки-96 1.png" alt="">
        <img class="header_notifications" src="/img/icons8-notifications-64 1.png" alt="">
        <img class="header_icon" style="border-radius: 50px;" src="{{Auth::user()->avatar}}" alt="">
        <div>
            <form method="GET" action="{{route('searchTiding.results')}}" class="form_search">
                <input class="input_poisk" name="query" type="search" placeholder="Что хотите найти ?" maxlength="76" aria-label="Search">
            </form>
        </div>
    </div>
    <div class="button_novosti">
        <a class="novostii" href="">Новости</a>
    </div>
    <div class="button_categoria">
        <a class="categoria" href="{{ route('paragraphs') }}">Категории</a>
    </div>
    @foreach($tidings as $tiding)
    <div class="div_lenta2">
        <img class="icon_lenta" style="border-radius: 50px;" src="{{Auth::user()->avatar}}" alt="">
        <h1 class="h1_lenta" href="{{ route('profile.index', ['name'=> $tiding->user->name]) }}">{{ $tiding->user->name }}</h1>
        <p class="p_lenta">{{ $tiding->created_at->diffForHumans()}}</p>
        <hr class="hr_lenta">
            <p class="text_lenta">{{$tiding->title}}</p>
            <p class="text_lenta">{{$tiding->content}}</p>
        <img class="post_lenta" style="height: 475px; border-radius: 25px;" src="{{$tiding->picture}}" alt="{{$tiding->title}}">
    </div>
    @endforeach
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
{{--        --}}{{--поиск по постам--}}
{{--        <div class="search">--}}
{{--            <form method="GET" action="{{route('searchTiding.results')}}" class="form_search">--}}
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
{{--        <h2>Добро пожаловать в Tidings</h2>--}}
{{--    </div>--}}
{{--    <br>--}}
{{--    <div class="upProfile">--}}

{{--        <table>--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th scope="col"> picture </th>--}}
{{--                <br>--}}
{{--                <th scope="col"> title </th>--}}
{{--                <br>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($tidings as $tiding)--}}
{{--                <tr>--}}
{{--                    <th scope="row">--}}
{{--                        <img style="width: 125px;height: 75px;" src="{{$tiding->picture}}" alt="{{$tiding->title}}">--}}
{{--                    </th>--}}
{{--                    <br>--}}
{{--                    <th scope="row">{{$tiding->title}}</th>--}}
{{--                    <br>--}}
{{--                    --}}{{--                        @can('update', $tiding)--}}
{{--                    <td>--}}
{{--                        <a href="{{route('tiding.edit', ['id'=> $tiding->id])}}">Изменить пост</a>--}}
{{--                    </td>--}}
{{--                    --}}{{--                        @endcan--}}
{{--                    <br>--}}
{{--                    <td>--}}
{{--                        <a href="{{route('tiding.delete', ['id'=> $tiding->id])}}">Удалить пост</a>--}}
{{--                    </td>--}}
{{--                    <br>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
{{--    <div class="upProfile">--}}
{{--        <li>--}}
{{--            <a href="{{ route('tiding.create') }}">Добавить пост Tidings</a>--}}
{{--        </li>--}}
{{--    </div>--}}
{{--    <div class="upProfile">--}}
{{--        <li>--}}
{{--            <a href="{{ route('tiding.trashed') }}">softdeleted пост Tidings</a>--}}
{{--        </li>--}}
{{--    </div>--}}
{{--    <div class="upProfile">--}}
{{--        <li>--}}
{{--            <a href="{{ route('profile.edit') }}">Редактировать профиль</a>--}}
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

{{--    <div class="upProfile" style="display: flex; flex-direction: column;">--}}
{{--        @foreach($tidings as $tiding)--}}
{{--            <div>--}}
{{--                <h2 style="margin-top: 1vw;margin-bottom: 1vw;"><a href="{{ route('profile.index', ['name'=> $tiding->user->name]) }}">{{ $tiding->user->name }}</a></h2>--}}
{{--                <ul style="margin-bottom: 1vw;">--}}
{{--                    <li>{{ $tiding->created_at->diffForHumans()}}</li>--}}
{{--                </ul>--}}
{{--                <h4>{{$tiding->title}}</h4>--}}
{{--                <p>{{$tiding->content}}</p>--}}
{{--                <img style="width: 125px;height: 75px;" src="{{$tiding->picture}}" alt="{{$tiding->title}}">--}}
{{--            </div>--}}
{{--                            <div>--}}
{{--                                <li>--}}
{{--                                    <a href="{{ route('profile.comment', ['id' => $tiding->id]) }}">Коментарии</a>--}}
{{--                                </li>--}}
{{--                            </div>--}}
{{--                            <div class="upProfile">--}}
{{--                                <form action="{{route('comment.store')}}" method="POST">--}}
{{--                                    @csrf--}}
{{--                                    <div>--}}
{{--                                        <label for="title">Оставьте коментарий</label>--}}
{{--                                        <br>--}}
{{--                                        <input type="text" name="title" placeholder="Напишите коментарий">--}}
{{--                                    </div>--}}
{{--                                    <br>--}}
{{--                                    <button type="submit">Save</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <hr>--}}
{{--            <div class="comments">--}}
{{--                <br>--}}
{{--                <hr>--}}
{{--                <br>--}}
{{--                <p>Коментарии</p>--}}
{{--                @foreach($tiding->comments as $comment)--}}
{{--                    <br>--}}
{{--                    <h4 style="margin-top: 1vw;margin-bottom: 1vw;"><a href="{{ route('profile.index', ['name'=> $comment->user_id]) }}">{{$comment->user_id}}</a></h4>--}}
{{--                    <ul style="margin-bottom: 1vw;">--}}
{{--                        <li>{{ $comment->created_at->diffForHumans()}}</li>--}}
{{--                    </ul>--}}
{{--                    <br>--}}
{{--                    <p>{{$comment->body}}</p>--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--            <form method="POST" action="/tiding/{id}/stores">--}}
{{--                @csrf--}}
{{--                <br>--}}
{{--                <input type="hidden" name="tiding_slug" value="{{ $tiding->slug }}">--}}
{{--                <br>--}}
{{--                <div style="display: flex; flex-direction: column;">--}}
{{--                    <label for="">Оставьте коментарий</label>--}}
{{--                    <br>--}}
{{--                    <textarea name="body" id="body" rows="2"></textarea>--}}
{{--                </div>--}}
{{--                <br>--}}
{{--                <div>--}}
{{--                    <button type="submit">Отправить коментарий</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</div>--}}
