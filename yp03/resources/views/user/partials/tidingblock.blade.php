<head>
    <link rel="stylesheet" href="{{ asset('css/tidingblock.css') }}">
</head>
<body>
<div class="media">
    <div class="div_lenta2">
        <img class="icon_lenta" style="border-radius: 50px;" src="{{Auth::user()->avatar}}" alt="">
        <h1 class="h1_lenta" href="{{ route('profile.index', ['name'=> $tiding->user->name]) }}">{{ $tiding->user->name }}</h1>
        <p class="p_lenta">{{ $tiding->created_at->diffForHumans()}}</p>
        <hr class="hr_lenta">
        <p class="text_lenta">{{$tiding->title}}</p>
        <p class="text_lenta">{{$tiding->content}}</p>
        <img class="post_lenta" style="height: 475px; border-radius: 25px;" src="{{$tiding->picture}}" alt="{{$tiding->title}}">
    </div>
</div>
</body>

