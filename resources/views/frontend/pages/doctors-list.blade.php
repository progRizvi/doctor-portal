@extends('frontend.layout')
@section('title', __('website.doctors'))
@section('content')

    <style>
        a.active {
            color: #0E82FD;
        }

        .doctor-image {
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            /* margin: auto; */
        }

        @media (max-width: 767px) {
            .doctor-image {
                width: 100px;
                height: 100px;
                border-top-left-radius: 0px;
                border-bottom-left-radius: 0px;
                margin: auto 0;
            }
        }
    </style>

    @php
        $loc = session('loc');
    @endphp
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-10 col-10 text-center mx-auto">
                    <div class="search-box-one aos" data-aos="fade-up">
                        @include('frontend.pages.search')
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
                            <h4 class="card-title mb-0 bg-info text-white px-4 py-3">{{ __('website.filter') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="filter-widget">
                                <h4>{{ __('website.departments') }}</h4>
                                @foreach ($departments as $data)
                                    <div class="py-2 cursor-pointer department" style="cursor:pointer">
                                        <a class="{{ isset($department) && $department->slug == $data->slug ? 'active' : '' }}"
                                            href="{{ route('doctors.by.department', $data->slug) }}">
                                            <span class="checkmark"></span>
                                            {{ $loc == 'en' ? $data->name : (isset($data->bn_name) ? $data->bn_name : $data->name) }}
                                            <span class="badge bg-info">{{ $data->doctors->count() }}</span>
                                            </span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /Search Filter -->
                </div>
                <div class="col-md-12 col-lg-8 col-xl-8 mx-auto doctors">
                    <div class="breadcrumb-bar-two">
                        <div class="container">
                            <div class="row">

                                <div class="col-sx-12 ">
                                    <div class="bg-white py-3 px-3 mx-2 doctor-list" style="color:#0E82FD">
                                        <p>{{ isset($department) ? ($loc == 'en' ? $department->name : $department->bn_name) : __('website.all') }}
                                            {{ __('website.specialized_doctors') }}</p>
                                        <p>
                                            <hr>
                                        </p>
                                        @php
                                            $data = isset($department) ? $department : (isset($area) ? $area : '');
                                            $dataCount = gettype($data) != 'string' ? count($data?->extraInfo) : 0;
                                            $data = $dataCount ? $data->extraInfo[0] : '';
                                        @endphp
                                        @if ($dataCount)
                                            <p>{{ $loc == 'en' ? $data->title : (isset($data->bn_title) ? $data->bn_title : $data->title) }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                                @foreach ($doctors as $doctor)
                                    <div class="col-xs-12">
                                        <a href="{{ route('service.doctor.details', $doctor->slug) }}">
                                            <div class="why-us-content">
                                                <div class="us-faq aos" data-aos="fade-up" data-aos-delay="200">
                                                    <div
                                                        style="margin:5px 0px 15px 0px;border:0px solid rgba(0, 0, 0, 0.125);">
                                                        <div class="accordion-collapse shade collapse show bg-white"
                                                            style="box-shadow:-8px 13px 80px rgba(27, 41, 80, 0.1); border-radius:20px">
                                                            <div class="d-flex">
                                                                <img class="img-fluid w-25 doctor-image"
                                                                    @if ($doctor->image) src="{{ asset('public/uploads/doctors/' . $doctor->image) }}"
                                                            @else
                                                            src="{{ asset('images/' . $doctor->gender . '_avatar.jpg') }}" @endif
                                                                    alt="{{ $doctor->name }}">
                                                                <div class="px-3 pt-2">
                                                                    <h4 class="text-info">
                                                                        {{ $loc == 'en' ? $doctor->name : (isset($doctor->bn_name) ? $doctor->bn_name : $doctor->name) }}
                                                                    </h4>
                                                                    <p>
                                                                        @foreach ($doctor->departments as $dpt)
                                                                            @if ($loop->last)
                                                                                {{ $loc == 'en' ? $dpt->name : (isset($dpt->bn_name) ? $dpt->bn_name : $dpt->name) }}
                                                                            @else
                                                                                {{ $loc == 'en' ? $dpt->name : (isset($dpt->bn_name) ? $dpt->bn_name : $dpt->name) }}
                                                                                ,
                                                                            @endif
                                                                        @endforeach ,
                                                                        {{ $loc == 'en' ? $doctor->area?->name : (isset($doctor->area?->bn_name) ? $doctor->area?->bn_name : $doctor->area?->name) }},
                                                                        {{ $loc == 'en' ? $doctor->area?->district?->name : (isset($doctor->area?->district?->bn_name) ? $doctor->area?->district?->bn_name : $doctor->area?->district?->name) }}
                                                                    </p>
                                                                    <hr style="color:gray" />
                                                                    <p>
                                                                        {{ $loc == 'en' ? $doctor->bio : (isset($doctor->bn_bio) ? $doctor->bn_bio : $doctor->bio) }}
                                                                    </p>
                                                                </div>

                                                            </div>
                                                            <div class="d-flex justify-content-center pb-3">
                                                                <div class="form-search-btn">
                                                                    <a class="btn"
                                                                        href="tel:{{ $doctor->phone }}">{{ __('website.appointment_now') }}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                                @if ($dataCount)
                                    <div class="col-sx-12 mb-4">
                                        <div class="bg-white py-3 px-3 mx-2 doctor-list" style="color:#0E82FD">

                                            {!! $loc == 'en'
                                                ? $data->description
                                                : (isset($data->bn_description)
                                                    ? $data->bn_description
                                                    : $data->description) !!}

                                        </div>
                                    </div>
                                @endif
                                @if ($doctors->count() == 0)
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
                        {!! $doctors->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('script')
    {{-- <script>
        $(document).ready(function() {
            $(".department").click(function() {
                var department = $(this).data("id");
                const departmentName = $(this).text().trim().replace(/[0-9]/g, '');
                console.log(departmentName);
                $.ajax({
                    url: "{{ route('get.doctors.by.department', '') }}/" + department,
                    type: "GET",
                    data: {
                        department: department,
                        departmentName
                    },
                    success: function(data) {
                        $(".doctors").html(data);
                    }
                });

            });
        });
    </script> --}}
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
                    success: function(data) {
                        $(".doctors").html(data);
                    }
                });

            });
        });
    </script>
@endpush
