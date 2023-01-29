<head>
    <link rel="stylesheet" href="{{ asset('css/userblock.css') }}">
</head>
<body>
    <div class="div_friends2">
        <div class="d-f1" >
            <img src="{{$user->avatar}}" alt="">
        </div>
        <div class="d-f2">
            <a href="{{route('profile.index', ['name' => $user->name]) }}">{{$user->name}}</a>
            <p>{{$user->age}} лет</p>
            <p>Город:{{$user->city}}</p>
        </div>
    </div>
</body>
