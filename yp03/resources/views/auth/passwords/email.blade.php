@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
</head>
<div class="container">
                <div class="card-header">{{ __('Сброс пароля') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="teg">
                            <label for="email" class="label_email">{{ __('Введите адрес почты') }}</label>

                            <div class="input_email">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Введте адрес почты">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="btn_reset">
                            <button type="submit" class="btn btn-primary">
                                {{ __('отправить ссылку для сброса пароля') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
