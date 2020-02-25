@extends('layouts.common')

@section('title', 'DETAIL')

@include('parts.header')

@section('content')

<main class="l-main">

    <div id="app">

        <div class="p-detail">

            <article class="p-detail__item">
                <div class="p-detail__head">
                    <img src="{{ asset("images/slava.jpg") }}" alt="">
                </div>

                <div class="p-detail__body">
                    <h2 class="p-detail__title">夕陽</h2>
                    <div class="c-detail__favorite--wrapper">
                        <i class="fa fa-star p-details__favorite-icon"></i>
                    </div>
                </div>

                <div class="p-detail__info">
                    <a class="p-detail__avator">
                        <div class="p-detail__avator-pic">
                            <img src="{{ asset("images/alex.jpg")}}" alt="" class="u-avator--radius">
                        </div>
                        <span class="p-detail__author">YUTO</span>
                    </a>

                    <div class="p-detail__date">
                        2020年2月24日
                    </div>
                </div>
                <div class="p-detail__txt">
                    <p>とてつもなく暑かったけど、夕陽がとてもきれいだった!!</p>
                </div>
            </article>

            <div class="p-detail__tag-area">

                <a href="" class="p-detail__tag">
                    <p>#インスタ蠅</p>
                </a>

                <a href="" class="p-detail__tag">
                    <p>#夕陽</p>
                </a>

                <a href="" class="p-detail__tag">
                    <p>#はつとうこうです</p>
                </a>

                <a href="" class="p-detail__tag">
                    <p>#あきらめません、するまでは。</p>
                </a>

            </div>

            <div class="p-detail__chat">

                <div class="p-detail__chat-l">

                    <a class="p-detail__chat-img">
                        <img class="u-avator--radius" src="{{ asset("images/alex.jpg") }}" alt="">
                        <p class="p-detail__chat-user">MASA</p>
                    </a>

                    <div class="p-detail__chat-txt">
                        <p>うまそう(棒)</p>
                    </div>

                </div>

                <div class="p-detail__chat-l">

                    <a class="p-detail__chat-img">
                        <img class="u-avator--radius" src="{{ asset("images/alex.jpg") }}" alt="">
                        <p class="p-detail__chat-user">MASA</p>
                    </a>

                    <div class="p-detail__chat-txt">
                        <p>くいてえええええええ</p>
                    </div>

                </div>


            </div>

            <div class="p-detail__msg">
                <form method="POST" action="" class="p-detail__form">
                    <textarea class="p-detail__input"></textarea>
                    <input type="submit" class="p-detail__btn" value="コメントする">
                </form>
            </div>
        </div>

    </div>
</main>


@endsection

@component('parts.footer', ['msgFlg' => false])

@endcomponent