@extends('frontend.layout')

@if ($extraData)
    @section('meta_keywords', $extraData->meta_keywords)
    @section('meta_description', $extraData->meta_description)
    @if ($extraData->title)
        @section('title', $extraData->title)
    @endif
@else
    @section('title', __('website.blood_donors_club'))
@endif
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/toastr.min.css') }}">
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

        span.select2 {
            width: 100% !important;
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

    @php

        $currRoute = request()
            ->route()
            ->getName();
    @endphp

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
                                <h4>{{ __('website.blood_group') }}</h4>
                                @php
                                    $bloodGroups = ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'];
                                @endphp
                                <div style="height:200px; overflow-y: scroll;">
                                    @foreach ($bloodGroups as $data)
                                        <div class="py-2 cursor-pointer blood_group" style="cursor:pointer"
                                            data-group='{{ $data }}'>
                                            <span class="checkmark"></span>
                                            <span class="filter-text">
                                                {{ $data }}
                                                @php
                                                    $count = $donars
                                                        ->where('blood_group', $data)
                                                        ->where('status', 'approved')
                                                        ->count();
                                                @endphp
                                                {{ str_contains($data, '+') ? 'Positive' : 'Negative' }}
                                                <span class="badge bg-info">{{ $count }}</span>
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card search-filter">
                        <div class="card-header">
                            <h4 class="card-title mb-0 bg-info text-white px-4 py-3">{{ __('website.filter') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="filter-widget">
                                <h4>{{ __('website.area') }}</h4>
                                <div class="areas">
                                    <input type="text" class='form-control' style="border-color: #009EFB"
                                        onkeyup="getCity()" name="city_name">
                                    <div style="height:200px; overflow-y: scroll;" class="blood_content">
                                        @foreach ($areas as $data)
                                            <div class="py-2 cursor-pointer" style="cursor:pointer"
                                                data-id="{{ $data->id }}">
                                                <span class="checkmark"></span>
                                                <span class="filter-text">
                                                    {{ $data->name }}
                                                    @php
                                                        $count = $data->donars->where('status', 'approved')->count();
                                                    @endphp
                                                    <span class="badge bg-info">{{ $count }}</span>
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Search Filter -->
                </div>
                <div class="col-md-12 col-lg-8 col-xl-8 mx-auto donars-list">
                    <div class="breadcrumb-bar-two">
                        <div class="container">
                            <div class="row">
                                <div class="col-sx-12 ">
                                    <div class="bg-white py-3 px-3 mx-2 doctor-list" style="color:#0E82FD">
                                        <div class="d-flex justify-content-between">
                                            <p>{{ __('website.all') }} {{ __('website.donars') }}</p>
                                            <button class="btn" data-bs-toggle="modal"
                                                data-bs-target="#donateModal">Donate Blood</button>
                                        </div>
                                        <p>
                                            <hr>
                                        </p>
                                        @if ($extraData)
                                            <p>{{ $loc == 'en' ? $extraData?->title : (isset($extraData?->bn_title) ? $extraData?->bn_title : $extraData?->title) }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                @foreach ($donars as $donar)
                                    <div class="col-xs-12">
                                        <div class="why-us-content">
                                            <div class="us-faq aos" data-aos="fade-up" data-aos-delay="200">
                                                <div style="margin:5px 0px 15px 0px;border:0px solid rgba(0, 0, 0, 0.125);">
                                                    <div class="accordion-collapse shade collapse show bg-white"
                                                        style="box-shadow:-8px 13px 80px rgba(27, 41, 80, 0.1); border-radius:20px">
                                                        <div class="d-flex">
                                                            <img class="img-fluid w-25 doctor-image"
                                                                src="{{ asset('images/' . $donar->gender . '_avatar.jpg') }}"
                                                                alt="{{ $donar->name }}">
                                                            <div class="px-3 pt-2">
                                                                <h4 class="text-info">
                                                                    {{ $loc == 'en' ? $donar->name : (isset($donar->bn_name) ? $donar->bn_name : $donar->name) }}
                                                                </h4>
                                                                <p>
                                                                    {{ $donar->address }},
                                                                    {{ $loc == 'en' ? $donar->area?->name : (isset($donar->area?->bn_name) ? $donar->area?->bn_name : $donar->area?->name) }},
                                                                    {{ $loc == 'en' ? $donar->area?->district?->name : (isset($donar->area?->district?->bn_name) ? $donar->area?->district?->bn_name : $donar->area?->district?->name) }}
                                                                </p>
                                                                <hr style="color:gray" />
                                                                <p>
                                                                    <span class="text-info">
                                                                        {{ __('website.blood_group') }}:
                                                                    </span>
                                                                    {{ $donar->blood_group }}
                                                                </p>
                                                                <p>
                                                                    @php
                                                                        $phone = preg_replace('/[^0-9]/', '', $donar->phone);
                                                                        $phone = str_split($phone, 5)[0];

                                                                    @endphp
                                                                    <i class="fas fa-phone"></i> {{ $phone }}######
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                                @if ($donars->count() > 0 && $extraData)
                                    <div class="col-sx-12 mb-4">
                                        <div class="bg-white py-3 px-3 mx-2 doctor-list" style="color:#0E82FD">
                                            {!! $loc == 'en'
                                                ? $extraData?->description
                                                : (isset($extraData?->bn_description)
                                                    ? $extraData?->bn_description
                                                    : $extraData?->description) !!}
                                        </div>
                                    </div>
                                @endif
                                @if ($donars->count() == 0)
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
                        {!! $donars->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}

    <div class="modal fade" style="margin-top: 80px " id="donateModal" aria-labelledby="donateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="donateModalLabel">Register For Blood</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="height: 60vh; overflow-y:auto">
                        <form method="post" action="{{ route('blood.club.post') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="last_donation_date" class="form-label">Last Donation Date</label>
                                <input type="text" class="form-control" id="last_donation_date"
                                    name="last_donation_date">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address<span
                                        class="text-danger">*</span></label>
                                <textarea name="address" id="address" cols="30" rows="2" height="20" class="form-control"
                                    required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="area" class="form-label">Area<span class="text-danger">*</span></label>
                                <select id="area" name="area_id" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender<span class="text-danger">*</span></label>
                                <select id="gender" name="gender" class="form-control">
                                    <option value="" selected disabled> Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                @php
                                    $blood_group = ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'];
                                @endphp
                                <label for="blood_group" class="form-label">Blood Group<span
                                        class="text-danger">*</span></label>
                                <select id="blood_group" name="blood_group" class="form-control">
                                    <option value="" selected disabled> Select</option>
                                    @foreach ($blood_group as $data)
                                        <option value="{{ $data }}">{{ $data }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('website.save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('frontend/assets/js/toastr.min.js') }}"></script>
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
            $('[name="area_id"]').select2({
                dropdownParent: $('#donateModal')
            })
        });
    </script>
    <script>
        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif


        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    <script>
        function getCity() {
            var search = $('[name="city_name"]').val();
            $.ajax({
                url: "{{ route('get.city') }}",
                type: "GET",
                data: {
                    search: search
                },
                success: function(data) {
                    const area = $('.blood_content')
                    area.empty()
                    let areaList = ''
                    $.each(data, function(key, value) {
                        areaList += `
                            <div class="py-2 cursor-pointer" style="cursor:pointer" data-id="${value.id}">
                                <span class="checkmark"></span>
                                    <span class="filter-text">
                                        ${value.name}
                                        <span class="badge bg-info">${value.donars.length}</span>
                                    </span>
                            </div>
                        `
                    });

                    area.html(areaList)

                }
            });
        }
    </script>
    <script>
        $('.blood_group').click(function() {
            const group = $(this).data('group')
            $.ajax({
                method: "POST",
                url: "{{ route('get.blood.donars') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    group: group
                },
                success: function(res) {
                    $('.donars-list').html(res.donarHtml)
                    $('.areas').html(res.areaHtml)
                }
            })
        })
        $('.blood_content').click(function() {
            const city = $(this).data('id')
            $.ajax({
                method: "GET",
                url: "{{ route('get.blood.donars.by.city') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    city: city
                },
                success: function(res) {
                    $('.donars-list').html(res.donarHtml)
                }
            })
        })
    </script>
@endpush
