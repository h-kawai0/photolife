@extends('layouts.common')

@section('title', 'PasswordEdit')

@include('parts.header')

@section('content')
    
<main class="l-main p-passEdit">
    <div id="app">

        <article>

            <div class="c-auth">

                <h1 class="c-auth__title p-passEdit__title">パスワード変更</h1>
            <form method="POST" class="c-auth__form" action="{{ route('passUpdate')}}">
                    @csrf
                    @method('put')
                    
                    <label>現在のパスワード
                        <input type="password" class="c-auth__input @error('pass_old') c-auth--err @enderror" name="pass_old" placeholder="現在のパスワード" autofocus>
                    </label>
                    
                    @error('pass_old')
                <span class="c-auth--alert">
                    {{ $message }}
                </span>
                @enderror
                
                <label>新しいパスワード
                    <input type="password" class="c-auth__input @error('pass_new') c-auth--err @enderror" name="pass_new" placeholder="新しいパスワード">
                </label>
                
                @error('pass_new')
                <span class="c-auth--alert">
                    {{ $message }}
                </span>
                @enderror
                
                <label>新しいパスワード(確認用)
                    <input type="password" class="c-auth__input @error('pass_new_confirmation') c-auth--err @enderror" name="pass_new_confirmation" placeholder="新しいパスワード(確認用)">

                    @error('pass_new_confirmation')
                    <span class="c-auth--alert">
                        {{ $message }}
                    </span>
                    @enderror
                    
                    <input type="submit" class="c-auth__btn" value="パスワードを変更する">
                </label>
                
            </form>
        </div>
      </article>
    </div>
</main>
@endsection
    
@component('parts.footer', ['msgFlg' => false])
    
@endcomponent