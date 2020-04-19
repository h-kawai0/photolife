@extends('layouts.common')

@section('title', 'PROFILE_EDIT')

@include('parts.header')

@section('content')

<main class="l-main">


    <article class="p-profEdit">

    <form method="POST" enctype="multipart/form-data" class="p-profEdit__form" action="{{route('profUpdate')}}">
            @csrf

            {{-- <div class="p-profEdit__avator">
                <input type="file" name="pic">
                <img class="u-avator--radius" src="{{ asset('images/alex.jpg')}}" alt="">
            </div> --}}

        <edit-avatar :user="{{ $user }}"></edit-avatar>


                @error('pic')
                <span class="p-profEdit--alert">
                    {{ $message }}
                </span>
                @enderror

            <label>名前
                <input type="text" class="p-profEdit__input @error('name') p-profEdit--err @enderror"
                    value="{{ $errors->has('*') ? old('name'): ($user->name) ?? '' }}" name="name" placeholder="名前"
                    autofocus>
            </label>
            @error('name')
            <span class="p-profEdit--alert" role="alert">
                {{ $message}}
            </span>
            @enderror

            <label>Email
                <input type="email" class="p-profEdit__input @error('email') p-profEdit--err @enderror"
                    value="{{ $errors->has('*') ? old('email'): ($user->email) ?? '' }}" name="email"
                    placeholder="Email">
            </label>
            @error('email')
            <span class="p-profEdit--alert" role="alert">
                {{ $message }}
            </span>
            @enderror

            <label>自己紹介
                <textarea class="p-profEdit__txt @error('profile') p-profEdit--err @enderror" name="profile">{{ $errors->has('*') ? old('profile'): ($user->profile) ?? '' }}</textarea>
            </label>
            @error('profile')
            <span class="p-profEdit--alert">
                {{ $message }}
            </span>
            @enderror

            <input type="submit" class="p-profEdit__btn" value="保存">

        </form>

    </article>

</main>


@endsection

@component('parts.footer', ['msgFlg' => false])

@endcomponent