@extends('layouts.common')

@section('title', 'passRemindSend')

@section('content')

<main class="l-main p-auth">

    <article>

        <section class="c-auth">

            <a href="{{ route('top') }}">
                <h1 class="c-auth__title">ふぉとらいふ</h1>
            </a>

            @if (session('status'))
            <div class="c-auth--alert" role="alert">
                {{ session('status') }}
            </div>
                
            @endif

            
            <form method="POST" class="c-auth__form" action="{{ route('password.email') }}">
                @csrf
                
                <p class="c-auth__desc">入力されたEmailへパスワードリセット用のURLを送信します。</p>
                <label>
                    Email
                    <input type="email" name="email" class="c-auth__input @error('email') c-auth--err @enderror" value="{{ old('email') }}" autofocus placeholder="Email">
                </label>

            @error('email')
            <span class="c-auth--alert" role="alert">
                {{ $message }}
            </span>
            @enderror

            <input type="submit" value="送信する" class="c-auth__btn">

            </form>
        </section>
    </article>
</main>

@endsection

@component('parts.footer', ['msgFlg' => 2])

@slot('authPage')
{{ 'l-footer__auth'}}
@endslot

@endcomponent