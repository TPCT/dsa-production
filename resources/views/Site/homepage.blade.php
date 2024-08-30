@extends('layouts.main')

@section('title', 'Homepage')

@section('id', 'Homepage')

@push('style')
    <link rel="stylesheet" href="{{asset('/css/swiper.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/main.css')}}"/>
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

    @if($welcome_section)
        <div class="welcome-section">
            <div class="image-container">
                <x-curator-glider
                    :media="$welcome_section->image_id"
                />
            </div>
            <div class="text-container">
                <h1>{{$welcome_section->title}}</h1>
                <h2>{{$welcome_section->second_title}}</h2>
                {!! $welcome_section->description !!}
                <div><br></div>
            </div>
        </div>
    @endif

    <div class="explore-more">
        @if ($second_section)
            <div class="background-right">
                <div class="gear spinner">
                    <img src="{{asset('/assets/img/Gear.png')}}"/>
                </div>
                <div class="more-content">
                    <h2>{{$second_section->title}}</h2>
                    <h3>{{$second_section->second_title}}</h3>
                    <picture>
                    <div class="pic d-flex align-items-center justify-content-center">
                    <x-curator-glider
                            :media="$second_section->image_id"
                    />
                    </div>
                    </picture>
                </div>

                @if ($second_section->description)
                    <div class="other-content" id="toggleContent">
                        <div class="mt-5">
                            {!! $second_section->description !!}
                        </div>
                    </div>

                    <div class="explore-more-button-container">
                        <button class="explore-more-button" id="toggleButton">
                            @lang('site.Explore More')
                        </button>
                    </div>
                @endif
            </div>
        @endif
    </div>

    @if ($blogs && $blogs->count())
        <div class="blogs">
            <div class="icontent text-center m-auto mb-5">
                <h1>@lang('site.EXPLORE TODAY BLOGS')</h1>
            </div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach($blogs as $blog)
                        <div class="swiper-slide d-flex gap-2">
                            <picture>
                                <x-curator-glider
                                        :media="$blog->image_id"
                                        class="mw-100">

                                </x-curator-glider>
                            </picture>
                            <div class="icontent mb-3">
                                <h2>{{ $blog->title }}</h2>
                                {!! $blog->description !!}
                                <a href="{{route('news.show', ['news' => $blog])}}" class="fw-bold">@lang('site.Read More')</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    @endif

    @if ($characters_slider && $characters_slider->slides->count())
        <div class="Character mt-5">
            <div class="icontent text-center m-auto">
                <h1>{{$characters_slider->title}}</h1>
                <span>{{$characters_slider->description}}</span>
                <div class="d-flex justify-content-center">
                    <div class="splitter"></div>
                </div>
            </div>

            <div class="swiper mySwiperTwo mt-5">
                <div class="swiper-wrapper">
                    @foreach($characters_slider->slides as $slide)
                        <div class="swiper-slide d-flex align-items-center flex-column gap-2">
                            <h6>{{$slide->title}}</h6>
                            <picture>
                                <x-curator-glider
                                        :media="$slide->image_id" class="mw-100">

                                </x-curator-glider>
                            </picture>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    @endif

    @if ($news && $news->count())
        <div class="news">
            <div class="icontent text-center m-auto">
                <h1>@lang('site.News')</h1>
            </div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach($news as $news_piece)
                        <div class="swiper-slide d-flex align-items-center flex-column gap-2">
                            <picture>
                                <x-curator-glider
                                    :media="$news_piece->image_id"
                                    class="mw-100"
                                />
                            </picture>
                            <div class="icontent">
                                <h1>@lang('site.EXPLORE TODAY NEWS')</h1>
                                <h2>{{ $news_piece->title }}</h2>
                                {!! $news_piece->description !!}
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    @endif

    <div class="news-letter mt-5 pt-5 position-relative pb-5">
        <div class="gear position-absolute spinner">
            <picture>
                <img src="{{asset('/assets/img/Gear.png')}}" alt="" class="mw-100" />
            </picture>
        </div>
        <div class="dot position-absolute">
            <picture>
                <img src="{{asset('/assets/img/Dot.png')}}" alt="" class="mw-100" />
            </picture>
        </div>
        <div class="newsletter-container">
            <div class="newsletter-content">
                <h2>@lang('site.SUBSCRIBE_TO_NEWSLETTER_TITLE')</h2>
                <p>@lang('site.SUBSCRIBE_TO_NEWSLETTER_DESCRIPTION')</p>
            </div>
            <form
                    class="greennn"
                    action="https://formspree.io/f/xrbzjvze"
                    method="POST"
            >
                <div class="newsletter-form">
                    <div class="back-only">
                        <input
                                type="email"
                                name="email"
                                placeholder="@lang('site.site.Enter your email address')"
                                required=""
                        />
                        <input type="submit" value="@lang('site.Subscribe')" />
                    </div>
                </div>
            </form>
        </div>
    </div>

{{--    <div class="newsletter-container">--}}
{{--        <div class="newsletter-content">--}}
{{--            <h2>@lang('site.SUBSCRIBE_TO_NEWSLETTER_TITLE')</h2>--}}
{{--            <p>@lang('site.SUBSCRIBE_TO_NEWSLETTER_DESCRIPTION')</p>--}}
{{--        </div>--}}
{{--        <form class="greennn" action="https://formspree.io/f/mvgppkdd" method="POST">--}}
{{--            <div class="newsletter-form">--}}
{{--                <div class="back-only">--}}
{{--                    <input type="email" name="email" placeholder="@lang('site.Enter your email address..')" required="">--}}
{{--                    <input type="submit" value="@lang('site.Subscribe')">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
@endsection

@push('script')
    <script>
        $("#toggleButton").on('click', function(){
            const height =  $("#toggleContent").height();

            $(this).text(height ? '@lang('site.Explore More')' : '@lang('site.Explore Less')');

            $("#toggleContent").css({
                'height': height ? 0 : 'fit-content'
            });

        })
    </script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 25,
            loop: true,
            centerSlide: "true",
            fade: "true",
            // autoplay: {
            //     delay: 5000, // set the delay in milliseconds
            // },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                520: {
                    slidesPerView: 1,
                },
                950: {
                    slidesPerView: 1,
                },
            },
        });
    </script>

    <script>
        var swiper = new Swiper(".mySwiperTwo", {
            slidesPerView: 3,
            spaceBetween: 25,
            loop: true,
            centerSlide: true,
            infinite: true,
            fade: true,
            autoplay: {
                delay: 5000, // set the delay in milliseconds
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                520: {
                    slidesPerView: 1,
                },
                991: {
                    slidesPerView: 2,
                },
                1023: {
                    slidesPerView: 3,
                },
            },
        });
    </script>
@endpush