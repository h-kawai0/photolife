@extends('layouts.common')

@section('title', 'PHOTO_EDIT')

@include('parts.header')

@section('content')

<div id="app">

    <article class="p-photoEdit">

        <form method="POST" class="p-photoEdit">

            <div class="p-photoEdit__pic">
            <img src="{{ asset('images/anthony.jpg')}}" alt="">
            </div>

            <label>タイトル
            <input type="text" class="p-photoEdit__input" value="{{ old('title') }}" name="title" placeholder="タイトル" autofocus required>
            </label>

            <label>本文
            <textarea class="p-photoEdit__txt" value="{{ old('detail')}}" name="detail"></textarea>
            </label>

            @for($i = 1; $i <= 10; $i++)
            <label>
                タグ{{$i}}
            <input type="text" name="tag{{$i}}" class="p-photoEdit__input" value="{{ old('tag'.$i)}}">
            </label>
            @endfor

            <input type="submit" class="p-photoEdit__btn" value="保存">
        </form>
    </article>
</div>
    
@endsection

@component('parts.footer', ['msgFlg' => false])
    
@endcomponent