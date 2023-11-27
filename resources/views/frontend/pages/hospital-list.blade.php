@extends('frontend.layout')
@section('title', 'Hospitals')
@section('content')
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-10 col-10 text-center mx-auto">
                    <div class="search-box-one aos" data-aos="fade-up">
                        @include('frontend.pages.search', ['url' => route('service.hospitals')])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class=" col-md-5 col-lg-4 col-xl-4">
                    <!-- Search Filter -->
                    <div class="card search-filter">
                        <div class="card-header">
                            <h4 class="card-title mb-0 bg-info px-4 py-3 text-white">{{ __('website.filter') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="filter-widget">
                                <h4 class="bg-info px-3 py-2 text-white">{{ __('website.category') }}</h4>
                                @php
                                    $hosCat = App\Models\Hospital::where('type', 'hospital')->count();
                                    $clinicCat = App\Models\Hospital::where('type', 'clinic')->count();
                                    $diagnosticCat = App\Models\Hospital::where('type', 'diagnostic')->count();
                                @endphp
                                <div class="py-2 cursor-pointer type" style="cursor:pointer" data-type="hospital">
                                    <a href="{{ route('hospitals.by.type', 'hospital') }}">
                                        <span class="checkmark"></span> {{ __('website.hospital') }} <span
                                            class="badge bg-info">{{ $hosCat }}</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="py-2 cursor-pointer type" style="cursor:pointer" data-type="clinic">
                                    <a href="{{ route('hospitals.by.type', 'clinic') }}">
                                        <span class="checkmark"></span> {{ __('website.clinic') }} <span
                                            class="badge bg-info">{{ $clinicCat }}</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="py-2 cursor-pointer type" style="cursor:pointer" data-type="clinic">
                                    <a href="{{ route('hospitals.by.type', 'diagnostic') }}">
                                        <span class="checkmark"></span> {{ __('website.diagnostic') }} <span
                                            class="badge bg-info">{{ $diagnosticCat }}</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="filter-widget" style="height:200px;overflow-y: scroll;">
                                <h4 class="bg-info px-3 py-2 text-white">{{ __('website.location') }}</h4>
                                @foreach ($districts as $dis)
                                    @if ($dis->areas->count() > 0)
                                        @php
                                            $hospitalsCount = App\Models\Hospital::whereIn('area_id', $dis->areas->pluck('id'))->get();
                                        @endphp
                                        <div class="py-2 cursor-pointer district" style="cursor:pointer"
                                            data-id="{{ $dis->id }}">
                                            <span class="checkmark"></span> {{ $dis->name }} <span
                                                class="badge bg-info">{{ $hospitalsCount->count() }}</span>
                                            </span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /Search Filter -->
                </div>
                <div class="col-md-12 col-lg-8 col-xl-8 mx-auto hospitals">
                    <div class="breadcrumb-bar-two">
                        <div class="container">
                            <div class="row">
                                <div class="col-sx-12">
                                    <div class="bg-white py-3 px-3 mx-2 doctor-list" style="color:#0E82FD">
                                        <p>{{ isset($type) ? ucwords($type) : 'Hospitals, Clinics & Diagnostic Centers' }}
                                        </p>
                                        <p>
                                            <hr>
                                        </p>
                                    </div>
                                </div>
                                @foreach ($hospitals as $hospital)
                                    <div class="col-xs-12">
                                        <a href="{{ route('service.hospital.details', $hospital->slug) }}">
                                            <div class="why-us-content">
                                                <div class="us-faq aos" data-aos="fade-up" data-aos-delay="200">
                                                    <div
                                                        style="margin:5px 0px 15px 0px;border:0px solid rgba(0, 0, 0, 0.125);">
                                                        <div class="accordion-collapse shade collapse show bg-white"
                                                            style="box-shadow:-8px 13px 80px rgba(27, 41, 80, 0.1); border-radius:20px">
                                                            <div class="d-flex">
                                                                <img style="border-top-left-radius:20px;border-bottom-left-radius:20px;"
                                                                    class="img-fluid w-25"
                                                                    @if ($hospital->image) src="{{ asset('public/uploads/hospitals/' . $hospital->image) }}"
                                                            @else
                                                            src="{{ asset('images/hospital.svg') }}" @endif
                                                                    alt="{{ $hospital->name }}">
                                                                <div class="px-3 pt-2">
                                                                    <h4 style="color:#0E82FD">{{ $hospital->name }}</h4>
                                                                    <p>
                                                                        Address: {{ $hospital->address }},
                                                                        {{ $hospital->area?->name }},
                                                                        {{ $hospital->area?->district?->name }},
                                                                        {{ $hospital->area?->district?->division?->name }}
                                                                    </p>
                                                                    <hr style="color:gray" />
                                                                    <p>
                                                                        {{ $hospital->bio }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                                @if ($hospitals->count() == 0)
                                    <div class="col-12">
                                        <div class="mx-2 mt-2">
                                            @include('frontend.pages.no-data-found')
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center mt-3">
                        {!! $hospitals->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        $(document).ready(function() {
            $(".type, .district").click(function() {
                var type = $(this).data("type");
                var id = $(this).data("id");
                const data = {}
                if (type == null) {
                    data.district = id;
                } else {
                    data.type = type;
                }
                $.ajax({
                    url: "{{ route('get.hospitals.by.type') }}",
                    type: "GET",
                    data: {
                        type: type
                    },
                    info: function(data) {
                        $(".hospitals").html(data);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                var myurl = $(this).attr('href');

                $.ajax({
                    url: myurl,
                    type: "GET",
                    info: function(data) {
                        $(".hospitals").html(data);
                    }
                });

            });
        });
    </script>
@endpush
