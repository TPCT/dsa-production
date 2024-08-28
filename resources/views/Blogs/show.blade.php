@extends('layouts.main')

@section('title', __("site.About Us"))
@section('id', 'About')

@push('style')
    <style>
        .navbar{
            position: static !important;
        }
    </style>
    <link rel="stylesheet" href="{{asset('/css/About.css')}}">
@endpush
@section('content')
    <div class="container">
        <div class="w-100 mb-5">
            <h1 class="text-center">{{$news->title}}</h1>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <x-curator-glider
                    :media="$news->image_id"
            />
        </div>


        {!! $news->description !!}
        {!! $news->content !!}
    </div>
@endsection
