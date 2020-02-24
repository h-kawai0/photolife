@extends('layouts.common')

@section('title', 'LOGIN')

@section('content')

<main class="l-main p-auth">

    <article>
        <section class="c-auth">

        <a href="{{ route('top') }}">
            <h1 class="c-auth__title">ふぉとらいふ</h1>
        </a>
            
            <form method="post" action="{{ route('login') }}" class="c-auth__form">
                @csrf
                <input type="text" name="email" class="c-auth__input @error('email') c-auth--error @enderror"
                    value="{{ old('email') }}" required autofocus placeholder="Email">

                @error('email')
                <span class="c-auth--alert" role="alert">
                    {{ $message }}
                </span>
                @enderror


                <input type="password" name="password" class="c-auth__input @error ('password') c-auth--error @enderror"
                    value="" placeholder="パスワード" required>

                @error('password')
                <span class="c-auth--alerrt" role="alert">
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