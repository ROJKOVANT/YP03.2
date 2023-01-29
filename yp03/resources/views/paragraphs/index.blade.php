@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/paragraphIndex.css') }}">
    </head>
    <body>
    <div class="left_block">
        <div class="logo">
            <a href="/admin"><img class="logo_img"  src="/img/капибара 1.png" alt=""></a>
            <h1 class="logo_h1">KapChat</h1>
        </div>
        <nav class="navigation">
            <div class="navigation1">
                <img class="nav_img1" src="/img/icons8-home-96 (1) 1.png" alt="">
                <a class="nav_h1" href="{{route('tiding.trashed')}}">Посты</a>
            </div>
            <div class="navigation2">
                <img class="nav_img2" src="/img/icons8-messages-64 (1) 1.png" alt="">
                <a class="nav_h2" href="{{route('paragraphs')}}">Категории</a>
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
        <div class="upProfile">
            <h2  style="color: white;">Добро пожаловать в Категории</h2>
        </div>
        <br>
        <div class="upProfile">

            <table>
                <thead>
                <tr>
                    <th scope="col"><a href="#" class="sort-by"><h3>Категория</h3></a></th>
                    <th scope="col"><a href="#" class="sort-by"><h3>Изменить</h3></a></th>
                    <th scope="col"><a href="#" class="sort-by"><h3>Удалить</h3></a></th>
                </tr>
                </thead>
                <tbody>
                @foreach($paragraphs as $paragraph)
                    <tr>
                        <th scope="row" style="color: white;">{{$paragraph->name}}</th>
                        <br>
                        <td>
                            <a href="{{route('paragraph.edit', ['id'=> $paragraph->id])}}" style="color: white;">Изменить категорию</a>
                        </td>
                        <br>
                        <td>
                            <a href="{{route('paragraph.delete', ['id'=> $paragraph->id])}}" style="color: white;">Удалить категорию</a>
                        </td>
                        <br>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="upProfile">
            <li>
                <a href="{{ route('paragraph.create') }}" style="color: white; font-size: 1vw;">Добавить категорию</a>
            </li>
        </div>
    <div class="otstuppp"></div>
    </body>
@endsection

