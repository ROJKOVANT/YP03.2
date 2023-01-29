@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/createTiding.css') }}">
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
    <div class="div_lenta">
        <h1>Редактирование поста {{$tidings->title}}</h1>
        <div class="create">
                <form action="{{route('tiding.update', ['id'=> $tidings->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="paragraph_id">Измените категорию</label><br>
                        <select name="paragraph_id" id="paragraph">
                            @foreach($paragraphs as $paragraph)
                                <option value="{{$paragraph->id}}">{{$paragraph->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div>
                        <label for="title">Измените заголовок</label>
                        <br>
                        <input type="text" name="title" value="{{$tidings->title}}">
                    </div>
                    <br>
                    <div>
                        <label for="content">Измените текст</label>
                        <br>
                        <textarea name="content" placeholder="Введите content" cols="50" rows="10">
                        {{$tidings->content}}
                    </textarea>
                    </div>
                    <div>
                        <label for="picture">Измените картинку</label>
                        <br>
                        <input type="file" name="picture">
                    </div>
                    <br>
                    <button type="submit" style="margin-bottom: 2vw;">Обновить новость</button>
                </form>
        </div>
    </div>
    <div class="otstuppp"></div>
    </body>
@endsection
{{--    <div class="upProfile">--}}
{{--        <div>Редактирование поста {{$tidings->title}}</div>--}}
{{--    </div>--}}
{{--    <br>--}}
{{--    <div class="upProfile">--}}


{{--        <form action="{{route('tiding.update', ['id'=> $tidings->id])}}" method="POST" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <div>--}}
{{--                <label for="paragraph_id">Категории</label><br>--}}
{{--                <select name="paragraph_id" id="paragraph">--}}
{{--                    @foreach($paragraphs as $paragraph)--}}
{{--                        <option value="{{$paragraph->id}}">{{$paragraph->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <br>--}}
{{--            <div>--}}
{{--                <label for="title">Введите title</label>--}}
{{--                <br>--}}
{{--                <input type="text" name="title" value="{{$tidings->title}}">--}}
{{--            </div>--}}
{{--            <br>--}}
{{--            <div>--}}
{{--                <label for="content">Введите content</label>--}}
{{--                <br>--}}
{{--                <textarea name="content" placeholder="Введите content" cols="30" rows="10">--}}
{{--                        {{$tidings->content}}--}}
{{--                    </textarea>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <label for="picture">Введите picture</label>--}}
{{--                <br>--}}
{{--                <input type="file" name="picture">--}}
{{--            </div>--}}
{{--            <br>--}}
{{--            <button type="submit">Update</button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--    --}}{{--Профиль--}}
{{--    --}}{{--        <div class="upProfile">--}}
{{--    --}}{{--            <li>--}}
{{--    --}}{{--                <a href="{{ route('profile.news') }}">Добавить статью</a>--}}
{{--    --}}{{--            </li>--}}
{{--    --}}{{--        </div>--}}
{{--</div>--}}
