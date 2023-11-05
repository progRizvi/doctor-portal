<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
    <meta name="keywords"
        content="practo clone, doccure, doctor appointment, Practo clone html template, doctor booking template">
    <meta name="author" content="Practo Clone HTML Template - Doctor Booking Template">
    <meta property="og:url" content="https://doccure.dreamguystech.com/html/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Doctors Appointment HTML Website Templates | Doccure">
    <meta property="og:description"
        content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
    <meta property="og:image" content="assets/img/preview-banner.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://doccure.dreamguystech.com/html/">
    <meta property="twitter:url" content="https://doccure.dreamguystech.com/html/">
    <meta name="twitter:title" content="Doctors Appointment HTML Website Templates | Doccure">
    <meta name="twitter:description"
        content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
    <meta name="twitter:image" content="assets/img/preview-banner.jpg">
    <title>Doccure</title>

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

            $divisions = Division::all();
            $districts = District::all();
            $areas = App\Models\Area::with('district')->get();

        @endphp
        <div class="modal fade custom-modal" id="searchLocation">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Choose from the option below.</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
                            <ul class="list-unstyled ps-0">
                                @foreach (Division::all() as $div)
                                    <li class="mb-1">
                                        <button class="btn btn-toggle align-items-center rounded collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#{{ $div->name }}"
                                            aria-expanded="false">
                                            {{ $div->name }}
                                        </button>
                                        <div class="collapse" id="{{ $div->name }}">
                                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small bg-secondary">
                                                <li class="px-3 py-2"><a href="#"
                                                        class="link-dark rounded text-white">New</a>
                                                </li>
                                                <li class="px-3 py-2"><a href="#"
                                                        class="link-dark rounded text-white">Processed</a></li>
                                                <li class="px-3 py-2"><a href="#"
                                                        class="link-dark rounded text-white">Shipped</a></li>
                                                <li class="px-3 py-2"><a href="#"
                                                        class="link-dark rounded text-white">Returned</a></li>
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
