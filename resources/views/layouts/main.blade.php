<html lang="{{app()->getLocale()}}">
<head>
    <title>
        @if (app(\App\Settings\General::class)->site_title)
            @hasSection('title')
                @yield('title') -
            @endif
            {{app(\App\Settings\General::class)->site_title[app()->getLocale()] ?? config('app.name')}}
        @endif
    </title>

    <link rel="icon" type="image/x-icon" href="{{asset('/storage/' . \Awcodes\Curator\Models\Media::find(app(\App\Settings\Site::class)->fav_icon)?->path)}}"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <x-layout.seo></x-layout.seo>
    <link rel="stylesheet" href="{{asset('/css/fontawsome.all.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/style-arabic.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/master.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/footerback.css')}}" />

    @stack('style')

    <link rel="stylesheet" href="{{asset('/css/custom.css')}}"/>
</head>

<body id="@yield('id')-body" class="{{app()->getLocale() == "ar" ? "arabic-version" : ""}}">
    <x-layout.header></x-layout.header>

    <main id="@yield('id')" class="@yield('class')">
            @yield('content')
    </main>
    <x-layout.footer></x-layout.footer>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.getElementById('mainNavbar');
        const toggler = document.querySelector('.navbar-toggler');
        toggler.addEventListener('click', function () {
            navbar.classList.toggle('toggled');
        });
    });
</script>

<script src="{{asset('/js/jquery-3.7.1.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/swiper.js')}}"></script>
<script src="{{asset('/js/main.js')}}"></script>

{!! NoCaptcha::renderJs() !!}
@stack('script')
</html>
