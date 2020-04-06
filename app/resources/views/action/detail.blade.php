@extends('layouts.common')

@section('title', 'DETAIL')

@include('parts.header')

@section('content')

<main class="l-main">

    <div class="p-detail">

        <article class="p-detail__item">
            <div class="p-detail__head">
                <img src="/storage/images/photo/{{ $picture->pic }}" alt="{{ $picture->title }}">
            </div>

            <div class="p-detail__body">
                <h2 class="p-detail__title">{{ $picture->title }}</h2>
                <div class="c-detail__favorite--wrapper">
                    <i class="fa fa-star p-details__favorite-icon"></i>
                </div>
            </div>

            <div class="p-detail__info">
                <a class="p-detail__avator">
                    <div class="p-detail__avator-pic">
                        <img src="/storage/images/profile/{{ $picture->user->pic }}" alt="{{ $picture->user->name }}"
                            class="u-avator--radius">
                    </div>
                    <span class="p-detail__author">{{ $picture->user->name }}</span>
                </a>

                <div class="p-detail__date">
                    {{ $picture->created_at->format('Y年n月j日') }}
                </div>
            </div>
            <div class="p-detail__txt">
                <p>{{ $picture->detail }}</p>
            </div>
        </article>

        <div class="p-detail__tag-area">

            @foreach ($tags as $tag)

            <a href="" class="p-detail__tag">
                <p>{{ $tag->name }}</p>
            </a>

            @endforeach


        </div>

        <ajax-msg :picture-id="{{ $picture->id }}" @isset($user->id) :user-id="{{ $user->id }}" @endisset></ajax-msg>

    </div>


</main>


@endsection

@component('parts.footer', ['msgFlg' => false])

@endcomponent