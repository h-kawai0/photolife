@extends('layouts.common')

@section('title', 'MYPAGE')


@include('parts.header')

@section('content')

<main class="l-main">

    <div id="app">

        <div class="p-mypage">

            <div class="p-mypage__info">
                <div class="p-mypage__avator">
                    <img class="u-avator--radius" src="{{ asset('images/alex.jpg')}}" alt="">
                </div>
                <div class="p-mypage__description">
                    <div class="p-mypage__name">たくや</div>
                    <div class="p-mypage__comment">諦めません、するまでは!!</div>
                </div>
            </div>
            <button class="p-mypage__btn">プロフィールを編集する</button>
        </div>


            <div class="c-panels">


                <article class="c-panels__item">
                    <a href="" class="">
                        <div class="c-panels__head">
                            <img src="{{ asset("images/slava.jpg")}}" alt="">
                        </div>
                    </a>
                    <div class="c-panels__body">
                        <h2 class="c-panels__title">夕陽</h2>
                        <div class="c-panels__favorite-wrapper">
                            <i class="fa fa-star c-panels__favorite-icon"></i>
                        </div>
                    </div>
                    <div class="c-panels__footer">
                        <div class="c-panels__info">
                            <a class="c-panels__avator">
                                <div class="c-panels__avator-pic">
                                    <img src="{{ asset("images/alex.jpg")}}" alt="" class="u-avator--radius">
                                </div>
                                <span class="c-panels__author">YUTO</span>
                            </a>
                        </div>
                        <div class="c-panels__date">
                            2020年2月24日
                        </div>
                    </div>
                </article>

                <article class="c-panels__item">
                    <a href="" class="">
                        <div class="c-panels__head">
                            <img src="{{ asset("images/slava.jpg")}}" alt="">
                        </div>
                    </a>
                    <div class="c-panels__body">
                        <h2 class="c-panels__title">夕陽</h2>
                        <div class="c-panels__favorite-wrapper">
                            <i class="fa fa-star c-panels__favorite-icon"></i>
                        </div>
                    </div>
                    <div class="c-panels__footer">
                        <div class="c-panels__info">
                            <a class="c-panels__avator">
                                <div class="c-panels__avator-pic">
                                    <img src="{{ asset("images/alex.jpg")}}" alt="" class="u-avator--radius">
                                </div>
                                <span class="c-panels__author">YUTO</span>
                            </a>
                        </div>
                        <div class="c-panels__date">
                            2020年2月24日
                        </div>
                    </div>
                </article>

                <article class="c-panels__item">
                    <a href="" class="">
                        <div class="c-panels__head">
                            <img src="{{ asset("images/slava.jpg")}}" alt="">
                        </div>
                    </a>
                    <div class="c-panels__body">
                        <h2 class="c-panels__title">夕陽</h2>
                        <div class="c-panels__favorite-wrapper">
                            <i class="fa fa-star c-panels__favorite-icon"></i>
                        </div>
                    </div>
                    <div class="c-panels__footer">
                        <div class="c-panels__info">
                            <a class="c-panels__avator">
                                <div class="c-panels__avator-pic">
                                    <img src="{{ asset("images/alex.jpg")}}" alt="" class="u-avator--radius">
                                </div>
                                <span class="c-panels__author">YUTO</span>
                            </a>
                        </div>
                        <div class="c-panels__date">
                            2020年2月24日
                        </div>
                    </div>
                </article>

                <article class="c-panels__item">
                    <a href="" class="">
                        <div class="c-panels__head">
                            <img src="{{ asset("images/slava.jpg")}}" alt="">
                        </div>
                    </a>
                    <div class="c-panels__body">
                        <h2 class="c-panels__title">夕陽</h2>
                        <div class="c-panels__favorite-wrapper">
                            <i class="fa fa-star c-panels__favorite-icon"></i>
                        </div>
                    </div>
                    <div class="c-panels__footer">
                        <div class="c-panels__info">
                            <a class="c-panels__avator">
                                <div class="c-panels__avator-pic">
                                    <img src="{{ asset("images/alex.jpg")}}" alt="" class="u-avator--radius">
                                </div>
                                <span class="c-panels__author">YUTO</span>
                            </a>
                        </div>
                        <div class="c-panels__date">
                            2020年2月24日
                        </div>
                    </div>
                </article>



            </div>

    </div>
</main>


@endsection

@component('parts.footer', ['msgFlg' => false])

@endcomponent