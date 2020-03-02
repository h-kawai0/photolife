@extends('layouts.common')

@section('title', 'PROFILE_EDIT')

@include('parts.header')

@section('content')

<div id="app">

    <article class="p-profEdit">

    <form method="POST" enctype="multipart/form-data" class="p-profEdit__form" action="{{ route('profUpdate') }}">
            @csrf
            @method('put')

            <div class="p-profEdit__avator">
                <input type="file" name="pic">
                @error('pic')
                <span class="p-profEdit--err">
                    {{ $message }}
                </span>
                @enderror
                <img class="u-avator--radius" src="{{ asset('images/alex.jpg')}}" alt="">
            </div>

            <label>名前
                <input type="text" class="p-profEdit__input"
                    value="{{ $errors->has('*') ? old('name'): ($user->name) ?? '' }}" name="name" placeholder="名前"
                    autofocus required>
            </label>
            @error('name')
            <span class="p-profEdit--err" role="alert">
                {{ $message}}
            </span>
            @enderror

            <label>Email
                <input type="email" class="p-profEdit__input"
                    value="{{ $errors->has('*') ? old('email'): ($user->email) ?? '' }}" name="email"
                    placeholder="Email" required>
            </label>
            @error('email')
            <span class="p-profEdit--err" role="alert">
                {{ $message }}
            </span>
            @enderror

            <label>自己紹介
                <textarea class="p-profEdit__txt" name="profile">{{ $errors->has('*') ? old('profile'): ($user->profile) ?? '' }}</textarea>
            </label>
            @error('profile')
            {{ $message }}
            @enderror

            <input type="submit" class="p-profEdit__btn" value="保存">

        </form>

    </article>
</div>




@endsection

@component('parts.footer', ['msgFlg' => false])

@endcomponent