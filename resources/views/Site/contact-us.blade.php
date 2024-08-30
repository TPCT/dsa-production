@extends('layouts.main')

@section('title', __('site.Contact Us'))
@section('id', 'Contact-us')

@push('style')
    <link rel="stylesheet" href="{{asset('/css/style.css')}}"/>
@endpush

@section('content')
    <div class="welcome">
        <center class="inners">
            <div class="text-content">
                <h1>{{$header->title}}</h1>
                {!! $header->description !!}
            </div>
            <div class="mac">
                <x-curator-glider
                    :media="$header->image_id"
                >
                </x-curator-glider>
            </div>
        </center>
    </div>

    <div class="icontact">
        <div class="iphone">
            <x-curator-glider
                :media="$contact_us_form->image_id"
            ></x-curator-glider>
        </div>
        <div class="icontent">
            <h1>{{$contact_us_form->title}}</h1>
            <h2>{{$contact_us_form->second_title}}</h2>
            {!! $contact_us_form->description !!}
            <form class="formm" action="https://formspree.io/f/mzzpronj" method="POST">
                <div class="inputs">
                    <label for="name">@lang('site.Name') &nbsp;<i class="fa-solid fa-user"></i></label>
                    <input type="name" placeholder="@lang('site.Enter Your Name')">
                </div>
                <div class="inputs">
                    <label for="email">@lang('site.Email') &nbsp;<i class="fa-solid fa-envelope"></i></label>
                    <input type="name" placeholder="@lang('site.Enter Your Email')">
                </div>
                <div class="inputs">
                    <label for="phone">@lang('site.Phone') &nbsp;<i class="fa-solid fa-phone"></i></label>
                    <input type="phone" placeholder="@lang('site.Enter Your Phone')">
                </div>
                <div class="inputs">
                    <label for="message">@lang('site.Messages') &nbsp;<i class="fa-brands fa-telegram"></i></label>
                    <textarea type="message" placeholder="@lang('site.Enter Your Message')"></textarea>
                </div>
                <input class="submitt" type="submit" name="Submit" value="@lang('site.Submit')&nbsp;" id="">
            </form>
        </div>
    </div>

    <div class="icontact forcetwo mb-5">
        <div class="icontent">
            <h1>{{$contact_us_footer->title}}</h1>
            <h2>{{$contact_us_footer->second_title}}</h2>
            {!! $contact_us_footer->description !!}
        </div>
        <div class="grid-container flex-row">
            <x-curator-glider
                    :media="$contact_us_footer->image_id"
                    class="journey-image"
            ></x-curator-glider>
        </div>
    </div>
@endsection