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
        a:hover{
            color:#0E82FD;
        }
        a.active {
            color: #0E82FD;
        }
    </style>
    @stack('style')
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
                                        $url = $currRoute == 'service.hospitals' ? 'service.location.hospitals' : 'service.location.doctors';
                                        $count = $currRoute == 'service.hospitals' ? $hospitals->count() : $doctors->count();
                                        $loc = session('loc');
                                    @endphp
                                    <li class="mb-1">
                                        <button class="btn btn-toggle align-items-center rounded collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#{{ $div->name }}"
                                            aria-expanded="false">
                                            {{$loc== 'en' ? $div->name : $div->bn_name }} <span
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
                                                                aria-expanded="false">
                                                                {{ $loc== 'en' ? $dis->name : $dis->bn_name }}
                                                                <div class="collapse" id="{{ $dis->name . $dis->id }}">
                                                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small"
                                                                        style="background: #F2F6F6;">
                                                                        @foreach ($dis->areas as $area)
                                                                            <li class="px-3 py-2">
                                                                                <a href="{{ route($url,$area->slug) }}"
                                                                                    class="link-dark rounded text-black">{{ $loc== 'en' ? $area->name : (isset($area->bn_name)? $area->bn_name : $area->name) }}
                                                                                    <span
                                                                                        class="badge bg-info">{{ $currRoute == 'service.hospitals'? $area->hospitals->count() : $area->doctors->count() }}</span></a>
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

    @stack('script')
</body>

</html>
