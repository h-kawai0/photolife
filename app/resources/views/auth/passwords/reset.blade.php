@extends('layouts.common')

@section('title', 'passRemindRecieve')

@section('content')

<main class="l-main p-auth">

    <article>
        <section class="c-auth">

            <a href="{{ route('top') }}">
                <h1 class="c-auth__title">ふぉとらいふ</h1>
            </a>

            <form method="POST" class="c-auth__form" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

            <label>Email
                <input type="email" name="email" class="c-auth__input @error ('email') c-auth--err @enderror" value="{{ old('email') }}" required autofocus autocomplete="email" autofocus placeholder="email">
            </label>

            @error('email')
            <span class="c-auth--alert" role="alert">
                {{ $message }}
            </span>
            @enderror

            <label>新しいパスワード
                <input type="password" name="password" class="c-auth__input @error('password') c-auth--err @enderror" required autocomplete="new-password" placeholder="新しいパスワード">
            </label>

            @error('password')
            <span class="c-auth--alert" role="alert">
               {{ $message }}
            </span>
            @enderror

            <label>パスワード(再確認用)
                <input type="password" name="password_confirmation" class="c-auth__input" required autocomplete="new-password" placeholder="パスワード(再確認用)">
            </label>

            <input type="submit" value="パスワードをリセットする" class="c-auth__btn">
            </form>
        </section>
    </article>
</main>
@endsection

@component('parts.footer', ['msgFlg' => 2])
@slot('authPage')
    {{ 'l-footer__auth' }}
@endslot
    
@endcomponent