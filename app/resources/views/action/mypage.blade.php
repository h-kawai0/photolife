@extends('layouts.common')

@section('title', 'MYPAGE')


@include('parts.header')

@section('content')

<main class="l-main">

    <div class="p-mypage">

        <div class="p-mypage__info">
            <div class="p-mypage__avator">
                <img class="u-avator--radius"
                    src="@if($is_pic)/app/storage/images/profile/{{$user->pic}} @else {{asset('images/profile/person.jpeg') }} @endif"
                    alt="">
            </div>
            <div class="p-mypage__description">
                <div class="p-mypage__name">{{ $user->name }}</div>
                <div class="p-mypage__comment">{{ $user->profile }}</div>
            </div>
        </div>

        <div class="p-mypage__btn-list">

            <a href="{{ route('photoEdit')}}" class="p-mypage__link">
                <button class="p-mypage__btn">写真を投稿する</button>
            </a>

            <a href="{{ route('profEdit')}}" class="p-mypage__link">
                <button class="p-mypage__btn">プロフィールを編集する</button>
            </a>

            <a href=" {{ route('passEdit')}}" class="p-mypage__link">
                <button class="p-mypage__btn">パスワードを変更する</button>
            </a>
            <form action="{{ route('userDelete') }}" method="POST" class="p-mypage__link">
                @csrf
                <button class="p-mypage__btn u-btn--alert"
                    onclick='return confirm("一度実行するとこの操作は取り消せません。本当にアカウントを削除しますか?");'>退会する</button>
            </form>

        </div>


        <h1>投稿済みの写真</h1>

        @if($pictures->isEmpty())

        <p>投稿した写真はありません。</p>

        @else


        <div class="c-panels">

            @foreach ($pictures as $picture)

            <article class="c-panels__item">
                <a href="{{ route('detail', $picture->id)}}" class="">
                    <div class="c-panels__head">
                        <img src="/app/storage/images/photo/{{$picture->pic }}" alt="{{ $picture->title }}">
                    </div>
                </a>
                <div class="c-panels__body">
                    <h2 class="c-panels__title">{{ $picture->title }}</h2>
                </div>
                <div class="c-panels__footer">
                    <div class="c-panels__info">
                        <a class="c-panels__avator">
                            <div class="c-panels__avator-pic">
                                <img src="/app/storage/images/profile/{{$picture->user->pic }}" alt=""
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
                    <button class="c-panels__btn ">編集</button>
                </a>

                <form method="POST" action="{{ route('deletePhoto', $picture->id )}}" class="u-inlineBlock">
                    @csrf
                    <button class="c-panels__btn c-panels__btn--alert"
                        onclick='return confirm("一度削除するとこの操作は取り消せません。本当に削除しますか?"); '>削除</button>
                </form>

            </article>

            @endforeach


        </div>



        @endif


        {{ $pictures->links('pagination::default') }}

    </div>


</main>


@endsection

@component('parts.footer', ['msgFlg' => false])

@endcomponent