@extends('layouts.common')

@section('title', 'PHOTO_EDIT')

@include('parts.header')

@section('content')

<div id="app">

    <article class="p-photoEdit">

    <form method="POST" action="{{ route('createPhotoEdit') }}" class="p-photoEdit" enctype="multipart/form-data">
            @csrf
            <input type="file" name="pic">
            
            @error('pic')
            <span class="p-photoEdit--alert">
                {{ $message }}
            </span>
            @enderror

            <div class="p-photoEdit__pic">
            <img src="{{ asset('images/anthony.jpg')}}" alt="">
            </div>

            <label>タイトル
            <input type="text" class="p-photoEdit__input @error('title') p-photoEdit--err @enderror" value="{{ $errors->has('*') ? old('title'): ($picture->title) ?? '' }}" name="title" placeholder="タイトル" autofocus required>
            </label>

            @error('title')
            <span class="p-photoEdit--alert">
                {{ $message }}
            </span>
            @enderror

            <label>本文
            <textarea class="p-photoEdit__txt @error('detail') p-photoEdit--err @enderror" value="{{ $errors->has('*') ? old('detail'): ($picture->detail) ?? '' }}" name="detail"></textarea>
            </label>

            @error('detail')
            <span class="p-photoEdit--alert">
                {{ $message }}
            </span>
            @enderror

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