@extends('layouts.common')

@section('title', 'PROFILE_EDIT')

@include('parts.header')

@section('content')

<div id="app">

    <?php echo phpinfo(); ?>
    <article class="p-profEdit">

    <form method="POST" enctype="multipart/form-data" class="p-profEdit__form" action="{{ route('profUpdate') }}">
            @csrf
            @method('put')

            <div class="p-profEdit__avator">
                <input type="file" name="pic">
                <img class="u-avator--radius" src="{{ asset('images/alex.jpg')}}" alt="">
            </div>

            <label>名前
                <input type="text" class="p-profEdit__input"
                    value="{{ $errors->has('*') ? old('name'): ($user->name) ?? '' }}" name="name" placeholder="名前"
                    autofocus required>
            </label>

            <label>Email
                <input type="email" class="p-profEdit__input"
                    value="{{ $errors->has('*') ? old('email'): ($user->email) ?? '' }}" name="email"
                    placeholder="Email" required>
            </label>

            <label>自己紹介
                <textarea class="p-profEdit__txt" name="profile">{{ $errors->has('*') ? old('profile'): ($user->profile) ?? '' }}</textarea>
            </label>

            <input type="submit" class="p-profEdit__btn" value="保存">

        </form>

    </article>
</div>




@endsection

@component('parts.footer', ['msgFlg' => false])

@endcomponent