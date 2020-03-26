@extends('layouts.common')

@section('title', 'TOP')

@include('parts.header')

@section('content')

<main class="l-main">

    <div class="p-search">
        <form method="GET" action="{{ route('top')}}">

            <h1 class="p-search__title">表示順</h1>

            <div class="p-search__selectBox p-search__sl">

                <select name="sort" class="p-search__select">
                    <option value="0" {{ $sortBy === 0 ? 'selected' : '' }}>選択してください</option>
                    <option value="1" {{ $sortBy === 1 ? 'selected' : '' }}>投稿日が新しい順</option>
                    <option value="2" {{ $sortBy === 2 ? 'selected' : '' }}>投稿日が古い順</option>
                </select>

            </div>
            <input type="submit" class="p-search__btn" value="検索する">


        </form>
    </div>

    <h1 class="p-index__title">写真一覧</h1>

    
    {{-- <index-panel :pictures="{{ $pictures }}" 
    ></index-panel> --}}

    <index-panel></index-panel>

    
    {{-- @foreach ($pictures as $picture)
    @endforeach --}}
        

    {{-- @if ($sortBy === 0)
    {{ $pictures->links('pagination::default') }}

    @else

    {{ $pictures->appends(['sort' => $sortBy])->links('pagination::default') }}
    @endif --}}

</main>

@endsection

@component('parts.footer', ['msgFlg' => false])

@endcomponent