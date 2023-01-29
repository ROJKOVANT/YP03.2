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
        <h2  style="color: white;">Удаление новостей</h2>
    </div>
    <br>
    <div class="upProfile">
        <table>
            <thead>
            <tr>
                <th scope="col"> Картинка </th>
                <br>
                <th scope="col"> Заголовок </th>
                <br>
                <th scope="col">Востановить</th>
                <br>
                <br>
                <th scope="col">Удалить</th>
                <br>
            </tr>
            </thead>
            <tbody>
            @foreach($tidings as $tiding)
                <tr>
                    <th scope="row">
                        <img style="width: 125px;height: 75px;" src="/{{$tiding->picture}}" alt="{{$tiding->title}}">
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
    <div class="otstuppp"></div>
    </body>
@endsection

