@extends('layouts.common')

@section('title', 'MYPAGE')


@include('parts.header')

@section('content')

<main class="l-main">

    <div id="app">

        <div class="p-mypage">

            <div class="p-mypage__info">
                <div class="p-mypage__avator">
                    <img class="u-avator--radius"
                        src="@if($is_pic)/storage/images/profile/{{$user->pic}} @else {{asset('images/profile/person.jpeg') }} @endif"
                        alt="">
                </div>
                <div class="p-mypage__description">
                    <div class="p-mypage__name">{{ $user->name }}</div>
                    <div class="p-mypage__comment">{{ $user->profile }}</div>
                </div>
            </div>

            <a href="{{ route('photoEdit')}}">
                <button class="p-mypage__btn">写真を投稿する</button>
            </a>

            <a href="{{ route('profEdit')}}">
                <button class="p-mypage__btn">プロフィールを編集する</button>
            </a>

            <a href=" {{ route('passEdit')}}">
                <button class="p-mypage__btn">パスワードを変更する</button>
            </a>
            <form action="{{ route('userDelete') }}" method="POST">
                @csrf
                <button class="p-mypage__btn u-btn--alert"
                    onclick='return confirm("一度実行するとこの操作は取り消せません。本当にアカウントを削除しますか?");'>退会する</button>
            </form>
        </div>


        <div class="c-panels">

            @foreach ($pictures as $picture)

            <article class="c-panels__item">
                <a href="" class="">
                    <div class="c-panels__head">
                        <img src="/storage/images/photo/{{$picture->pic }}" alt="{{ $picture->title }}">
                    </div>
                </a>
                <div class="c-panels__body">
                    <h2 class="c-panels__title">{{ $picture->title }}</h2>
                    <div class="c-panels__favorite-wrapper">
                        <i class="fa fa-star c-panels__favorite-icon"></i>
                    </div>
                </div>
                <div class="c-panels__footer">
                    <div class="c-panels__info">
                        <a class="c-panels__avator">
                            <div class="c-panels__avator-pic">
                                <img src="/storage/images/profile/{{$picture->user->pic }}" alt=""
                                    class="u-avator--radius">
                            </div>
                            <span class="c-panels__author">{{ $picture->user->name }}</span>
                        </a>
                    </div>
                    <div class="c-panels__date">
                        {{ $picture->created_at->format('Y年m月d日')}}
                    </div>
                </div>

                <a href="{{ route('editPhotoEdit', $picture->id )}}">
                    <button class="c-panels__btn">編集</button>
                </a>

            </article>

            @endforeach


        </div>

    </div>
</main>


@endsection

@component('parts.footer', ['msgFlg' => false])

@endcomponent