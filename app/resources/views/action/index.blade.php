@extends('layouts.common')

@section('title', 'TOP')

@include('parts.header')

@section('content')

<main class="l-main">


    <div id="app">

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

            {{ $pictures->links('pagination::default') }}

        </div>

    </div>
</main>

@endsection

@component('parts.footer', ['msgFlg' => false])
    
@endcomponent