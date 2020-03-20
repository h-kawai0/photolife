@extends('layouts.common')

@section('title', 'TOP')

@include('parts.header')

@section('content')

<main class="l-main">


    <div id="app">

        <div class="p-search">
        <form method="GET" action="{{ route('top')}}">

                <h1 class="p-search__title">表示順</h1>

                <div class="p-search__selectBox p-search__sl">

                    <select name="sort" class="p-search__select">
                        <option value="0" {{ $sortBy === 0 ? 'selected' : '' }}>選択してください</option>
                        <option value="1" {{ $sortBy === 1 ? 'selected' : '' }}>投稿日が新しい順</option>
                        <option value="2" {{ $sortBy === 2 ? 'selected' : '' }}>投稿日が古い順</option>
                    </select>

                </div>
                <input type="submit" class="p-search__btn" value="検索する">


            </form>
        </div>

        <h1 class="p-index__title">写真一覧</h1>


        <div class="c-panels">
            
            @foreach ($pictures as $picture)
                
            <article class="c-panels__item">
            <a href="{{ route('detail', $picture->id)}}" class="">
                    <div class="c-panels__head">
                    <img src="/storage/images/photo/{{$picture->pic}}" alt="{{ $picture->title }}">
                    </div>
                </a>
                <div class="c-panels__body">
                    <h2 class="c-panels__title">
                        {{ $picture->title }}
                    </h2>
                    <div class="c-panels__favorite--wrapper">
                        <i class="fa fa-star c-panels__favorite-icon"></i>
                    </div>
                </div>
                <div class="c-panels__footer">
                    <div class="c-panels__info">
                        <a class="c-panels__avator">
                            <div class="c-panels__avator-pic">
                            <img src="/storage/images/profile/{{ $picture->user->pic }}" alt="{{ $picture->user->name }}" class="u-avator--radius">
                            </div>
                        <span class="c-panels__author">{{ $picture->user->name }}</span>
                        </a>
                    </div>

                    <div class="c-panels__date">
                        {{ $picture->created_at->format('Y年n月j日') }}
                    </div>
                </div>
            </article>
            @endforeach

            @if ($sortBy === 0)
                {{ $pictures->links('pagination::default') }}
            
            @else

            {{ $pictures->appends(['sort' => $sortBy])->links('pagination::default') }}
            @endif

        </div>

    </div>
</main>

@endsection

@component('parts.footer', ['msgFlg' => false])
    
@endcomponent