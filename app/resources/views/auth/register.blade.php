@extends('layouts.common')

@section('title', '新規登録')
@section('content')
<main class="l-main p-auth">

    <article>
        <section class="c-auth">

        <a href="{{ route('top')}}">
        <h1 class="c-auth__title">ふぉとらいふ</h1>
        </a>

    <form method="POST" action="{{ route('register') }}" class="c-auth__form">
    @csrf

    <input type="text" class="c-auth__input @error('name') c-auth--err @enderror" name="name" placeholder="お名前" value="{{ old('name') }}" required autofocus>

    @error('name')
    <span class="c-auth--alert" role="alert">{{ $message }}</span>
    @enderror

    <input type="text" name="email" class="c-auth__input @error('email') c-auth--err @enderror" value="{{ old('email')}}" required placeholder="Email">

    @error('email')
    <span class="c-auth--alert" role="alert">
        {{ $message }}
    </span>
    @enderror

<input type="password" name="password" class="c-auth__input @error('password') c-auth--err @enderror" required autocomplete="new-password" placeholder="パスワード">

@error('password')
<span class="c-auth--alert" role="alert">
    {{ $message }}
</span>
@enderror

<input type="password" name="password_confirmation" class="c-auth__input" required autocomplete="new-password" placeholder="パスワード（確認用）">

<input type="submit" value="登録" class="c-auth__btn">

    </form>
        </section>
    </article>
</main>
@endsection

@component('parts.footer', ['msgFlg' => 1])

@slot('authPage')
{{ 'l-footer__auth'}}
    
@endslot
    
@endcomponent