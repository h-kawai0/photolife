@extends('layouts.common')

@section('title', 'PhotoEdit')

@include('parts.header')

@section('content')
    

@component('parts.photoForm', ['picture' => $picture, 'tags' => $tags])




@endcomponent

@endsection

