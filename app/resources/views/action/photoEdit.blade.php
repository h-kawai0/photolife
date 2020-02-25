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
            <input type="text" class="p-profEdit__input" value="{{ old('title') }}" name="title" placeholder="タイトル" autofocus required>
            </label>

            <label>本文</label>
        </form>
    </article>
</div>
    
@endsection

@component('parts.footer', ['msgFlg' => false])
    
@endcomponent