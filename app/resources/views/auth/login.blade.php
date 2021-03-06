@extends('layouts.common')

@section('title', 'LOGIN')

@section('content')

<main class="l-main p-auth">

    <article>
        <section class="c-auth">

        <a href="{{ route('top') }}">
            <h1 class="c-auth__title">ふぉとらいふ</h1>
        </a>
            
            <form method="POST" action="{{ route('login') }}" class="c-auth__form">
                @csrf

                <label>
                    Email
                    <input type="text" name="email" class="c-auth__input @error('email') c-auth--err @enderror"
                    value="{{ old('email') }}" autofocus placeholder="Email">
                </label>
                    
                @error('email')
                <span class="c-auth--alert" role="alert">
                    {{ $message }}
                </span>
                @enderror

                <label>
                    パスワード
                    <input type="password" name="password" class="c-auth__input @error ('password') c-auth--err @enderror" placeholder="パスワード">
                </label>

                @error('password')
                <span class="c-auth--alert" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <label>
                    <input type="checkbox" name="remember" class="c-auth__check"
                        {{ old('remember') ? 'checked' : '' }}>ログインしたままにする
                </label>

                @if (Route::has('password.request'))
                <span class="c-auth__txt">
                    パスワードを忘れた方は<a href="{{ route('password.request') }}" class="c-auth__link">コチラ
                    </a>
                </span>
                @endif

                <input type="submit" value="ログイン" class="c-auth__btn">

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