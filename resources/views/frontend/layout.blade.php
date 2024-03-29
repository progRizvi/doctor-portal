<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title')">

    <title>@yield('title')</title>

    <meta name="keywords" content="@yield('meta_keywords')" />

    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="description" content="@yield('meta_description')" />
    <meta name="author" content="@yield('author')" />

    <meta name="google-site-verification" content="nhMk9Wt2wKbVTN3m5Dc9ZVVsbpopqNmU08v5n7GKSb4" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.png') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/fontawesome/css/all.min.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/feather.css') }}">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">

    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">
    <style>
        a:hover {
            color: #0E82FD;
        }

        a.active {
            color: #0E82FD;
        }
    </style>
    <style>
        @media (max-width: 992px) {
            .comprehensive_details {
                font-size: 16px;
            }

            .header-one .logo.navbar-brand {
                /* width: 0px !important; */
            }

            .header .header-nav .logo img {
                height: 40px !important;
            }
        }
    </style>
    @stack('style')

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K92KKD46');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K92KKD46" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        @include('frontend.fixed.header')

        @yield('content')

        @include('frontend.fixed.footer')
        <!-- Cursor -->
        <div class="mouse-cursor cursor-outer"></div>
        <div class="mouse-cursor cursor-inner"></div>
        <!-- /Cursor -->
        @php
            use Devfaysal\BangladeshGeocode\Models\Division;
            use Devfaysal\BangladeshGeocode\Models\District;
            use App\Models\Area;
            $locations = Division::with(['districts.areas'])->get();
        @endphp

        <div class="modal fade custom-modal mt-5" id="searchLocation">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('website.choose_from_below') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">

                            <ul class="list-unstyled ps-0">
                                @foreach ($locations as $div)
                                    @php
                                        $currRoute = request()->route()->getName();

                                        $districts = $div->districts;
                                        $districtsId = $districts->pluck('id');
                                        $areasId = Area::whereIn('district_id', $districtsId)->pluck('id');
                                        $doctors = App\Models\Doctor::whereIn('area_id', $areasId)->get();
                                        $hospitals = App\Models\Hospital::whereIn('area_id', $areasId)->get();
                                        $url = $currRoute == str_contains($currRoute, 'hospitals') ? 'service.location.hospitals' : 'service.location.doctors';
                                        $count = $currRoute == str_contains($currRoute, 'hospitals') ? $hospitals->count() : $doctors->count();
                                        $loc = session('loc');
                                    @endphp
                                    <li class="mb-1">
                                        <button class="btn btn-toggle align-items-center rounded collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#{{ $div->name }}"
                                            aria-expanded="false" style="font-size: 17px">
                                            {{ $loc == 'en' ? $div->name : $div->bn_name }} <span
                                                class="badge bg-info rounded-pill">{{ $count }}</span>
                                        </button>
                                        <div class="collapse" id="{{ $div->name }}">
                                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small"
                                                style="background: #F2F6F6;">
                                                @foreach ($div->districts as $dis)
                                                    @if ($dis->areas->count() > 0)
                                                        <li class="px-3 py-2">
                                                            <a href="#"
                                                                class="link-dark btn-toggle rounded text-black collapsed"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#{{ $dis->name . $dis->id }}"
                                                                aria-expanded="false" style="font-size: 15px">
                                                                {{ $loc == 'en' ? $dis->name : $dis->bn_name }}
                                                                <div class="collapse" id="{{ $dis->name . $dis->id }}">
                                                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small"
                                                                        style="background: #F2F6F6;">
                                                                        @foreach ($dis->areas as $area)
                                                                            <li class="px-3 py-2">
                                                                                <a href="{{ route($url, $area->slug) }}"
                                                                                    class="link-dark rounded text-black"
                                                                                    style="font-size: 13px">{{ $loc == 'en' ? $area->name : (isset($area->bn_name) ? $area->bn_name : $area->name) }}
                                                                                    <span
                                                                                        class="badge bg-info">{{ $currRoute == 'service.hospitals' ? $area->hospitals->count() : $area->doctors->count() }}</span></a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
    <!-- ScrollToTop -->
    <div class="progress-wrap active-progress">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;">
            </path>
        </svg>
    </div>
    <!-- /ScrollToTop -->

    {{-- facebook chat plugin --}}
    <div id="fb-root"></div>

    <div id="fb-customer-chat" class="fb-customerchat"></div>

    <!-- jQuery -->
    <script src="{{ asset('frontend/') }}/assets/js/jquery-3.7.0.min.js"></script>

    <!-- Bootstrap Bundle JS -->
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('frontend') }}/assets/js/feather.min.js"></script>

    <!-- Datepicker JS -->
    <script src="{{ asset('frontend') }}/assets/js/moment.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="{{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script>

    <!-- Slick JS -->
    <script src="{{ asset('frontend') }}/assets/js/slick.js"></script>

    <!-- Animation JS -->
    <script src="{{ asset('frontend') }}/assets/js/aos.js"></script>

    <!-- Counter JS -->
    {{-- <script src="{{ asset("frontend") }}/assets/js/counter.js"></script> --}}

    <!-- BacktoTop JS -->
    <script src="{{ asset('frontend') }}/assets/js/backToTop.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('frontend') }}/assets/js/script.js"></script>


    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "105713008644193");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v17.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    @stack('script')
</body>

</html>
