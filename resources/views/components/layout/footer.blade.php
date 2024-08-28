<footer>
    <div class="bg-gear">
        <picture>
            <img src="{{asset('/assets/img/Gear.png')}}" alt="" class="mw-100 spinner" />
        </picture>
    </div>

    <div class="foot">
        <div class="foot1 d-flex flex-column">
            <x-curator-glider
                    :media="app(\App\Settings\Site::class)->logo[$language]"
            ></x-curator-glider>
            <x-curator-glider
                    :media="app(\App\Settings\Site::class)->logo_2[$language]"
            ></x-curator-glider>
        </div>
        @foreach($menu->links as $link)
            <div class="foot2">
                <h3>{{$link->title}}</h3>
                <ul>
                    @foreach($link->children as $child)
                        <li><a href="{{$child->link}}">{{$child->title}}</a></li>
                    @endforeach
                </ul>
            </div>
        @endforeach
        @if ($admin_mail = app(\App\Settings\Site::class)->email || $phone = app(\App\Settings\Site::class)->phone)
            <div class="foot2">
                <h3>@lang('site.CONTACT')</h3>
                <ul>
                    @if($phone = app(\App\Settings\Site::class)->phone)
                        <li>
                            <a href="tel:{{$phone}}">{{$phone}}</a>
                        </li>
                    @endif

                    @if($admin_mail = app(\App\Settings\Site::class)->email)
                            <li>
                                <a href="mailto:{{$admin_mail}}">{{$admin_mail}}</a>
                            </li>
                    @endif
                </ul>
            </div>
        @endif

        @if(($facebook = app(\App\Settings\Site::class)->facebook_link) || ($twitter = app(\App\Settings\Site::class)->twitter_link) || ($linkedin = app(\App\Settings\Site::class)->linkedin_link) || ($instagram = app(\App\Settings\Site::class)->instagram_link))
            <div class="foot3">
                <h3>@lang('site.SOCIAL MEDIA')</h3>
                <div class="social">
                    @if ($facebook = app(\App\Settings\Site::class)->facebook_link)
                        <a href="{{$facebook}}"> <i class="fa-brands fa-facebook"></i></a>
                    @endif
                    @if ($twitter = app(\App\Settings\Site::class)->twitter_link)
                        <a href="{{$twitter}}"> <i class="fa-brands fa-x-twitter"></i></a>
                    @endif

                    @if($linkedin = app(\App\Settings\Site::class)->linkedin_link)
                        <a href="{{$linkedin}}"> <i class="fa-brands fa-linkedin-in"></i></a>
                    @endif

                    @if($instagram = app(\App\Settings\Site::class)->instagram_link)
                        <a href="{{$instagram}}"> <i class="fa-brands fa-instagram"></i></a>
                    @endif
                </div>
            </div>
        @endif
    </div>
    <div class="cpyrght">@lang('site.all copyright © for DSA Production company 2024')</div>
</footer>