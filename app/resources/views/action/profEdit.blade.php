@extends('layouts.common')

@section('title', 'PROFILE_EDIT')

@include('parts.header')

@section('content')

<div id="app">

    <article class="p-profEdit">
        
        <form class="p-profEdit__form">

            <div class="p-profEdit__avator">
                <img class="u-avator--radius" src="{{ asset('images/alex.jpg')}}" alt="">
            </div>

                <label>名前
                    <input type="text" class="p-profEdit__input" value="{{ old('name')}}" name="name" placeholder="名前" autofocus required>
                </label>
                
                <label>Email
                    <input type="email" class="p-profEdit__input" value="{{ old('email') }}" name="email" placeholder="Email" required>
                </label>

                <label>自己紹介
                    <textarea class="p-profEdit__txt" value="{{ old('profile')}}" name="profile"></textarea>
                </label>
                
                <input type="submit" class="p-profEdit__btn" value="保存">
            
        </form>

    </article>
</div>



    
@endsection

@component('parts.footer', ['msgFlg' => false])
    
@endcomponent