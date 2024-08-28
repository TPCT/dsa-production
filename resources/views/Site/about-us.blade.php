@extends('layouts.main')

@section('title', __("site.About Us"))
@section('id', 'About')

@push('style')
    <link rel="stylesheet" href="{{asset('/css/About.css')}}">
@endpush
@section('content')
    @if ($header)
        <div class="welcome">
            <div class="inners only-content">
                <div class="text-content">
                    <h1>{{$header->title}}</h1>
                    {!! $header->description !!}
                    {!! $header->content !!}
                    @if ($header->buttons && count($header->buttons))
                        <a href="{{$header->buttons[0]['url'][$language]}}" class="contact-button">{{$header->buttons[0]['text'][$language]}}</a>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <div class="section-header">
        <h2>@lang('site.ABOUT_US_TITLE')</h2>
        <h4>@lang('site.ABOUT_US_BRIEF')</h4>
    </div>

    @if($journey)
        <div class="content-wrapper mb-3 journey-content-wrapper">
            <div class="bigrid-container">
                <x-curator-glider
                        :media="$journey->image_id"
                        class="journey-image"
                ></x-curator-glider>
            </div>
            <div class="timeline">
                <div class="upper-content">
                    <h2>{{$journey->title}}</h2>
                    {!! $journey->description !!}
                </div>
                @foreach($journey->features()->limit(6)->get() as $feature)
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        @if (!$loop->last)
                            <div class="timeline-line"></div>
                        @endif
                        <div class="timeline-content">
                            <h3>{{$feature->title}}</h3>
                            {!! $feature->description !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if($mission)
        <div class="mission-timeline-content-wrapper mb-5">
            <div class="timeline">
                <div class="upper-content">
                    <h2>{{$mission->title}}</h2>
                    {!! $mission->description !!}
                </div>
            </div>
            <div class="bigrid-container">
                <x-curator-glider
                        :media="$mission->image_id"
                        class="mission-timeline-image"
                ></x-curator-glider>
            </div>
        </div>
    @endif

    @if ($vision)
        <div class="vision content-wrapper mb-5 pb-5">
            <div class="bigrid-container">
                <x-curator-glider
                        :media="$vision->image_id"
                ></x-curator-glider>
            </div>
            <div class="timeline">
                <div class="upper-content">
                    <h2>{{$vision->title}}</h2>
                    {!! $vision->description !!}
                </div>
            </div>
        </div>
    @endif
@endsection
