@extends('layouts.common')

@section('title', 'TOP')

@include('parts.header')

@section('content')

<main class="l-main">


    <index></index>

    
    {{-- <index-panel :pictures="{{ $pictures }}" 
    ></index-panel> --}}


    
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