@extends('frontend.layout')
@section('title', $hospital->name)

@push("style")
    <style>
        .bg_image{
            background-image:url("{{ url('uploads/hospitals', $hospital->background_image) }}"), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
            background-blend-mode: overlay;
            background-size: cover;
            background-repeat:no-repeat;
        }
    </style>
@endpush
@section('content')
{{-- @dd($hospital) --}}
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <div class="row">
                        <div class="md-container">
                            <div class="bg-white" style="box-shadow:0px 0px 10px 1px rgba(0, 0, 0, 0.1)">
                                <div class="col-md-12">
                                    <div class="tab-content profile-tab-cont bg_image">
                                        <div class="profile-header">
                                            <div class="">
                                                <div class="col-auto profile-image">
                                                    <div class="w-25 mx-auto mt-2">
                                                        <a href="#" style="display:inline-block; border: 10px solid white; border-radius:50%">
                                                        <img class="img-fluid mt-4 px-4" style="clip-path:circle()"
                                                            alt="{{ $hospital->name }}"
                                                            @if ($hospital->image) src="{{ asset('public/uploads/hospitals/' . $hospital->image) }}"
                                                            @else
                                                            src="{{ asset('images/hospital.svg') }}" @endif>
                                                    </a>
                                                    </div>
                                                </div>
                                                <div class="ml-md-n2 profile-user-info">
                                                    <h4 class="user-name mb-0 text-white">{{ $hospital->name }}</h4>
                                                    <div class="user-Location"></div>
                                                    <div class="about-text text-white">
                                                        {{ $hospital->description }}
                                                    </div>
                                                    <p class="px-4">
                                                        <hr>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="per_details_tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card" style="box-shadow:0px 0px 10px 1px rgba(0, 0, 0, 0.1)">
                                        <div class="card-body">
                                            <h5
                                                class="card-title d-flex justify-content-center bg-info text-white py-3 fw-bold">
                                                <span>{{ __('website.about_us') }}</span>
                                            </h5>
                                            <div class="row">

                                                <p class="co-12 text-muted">
                                                    {{ $hospital->description }}
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="per_details_tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5
                                                class="card-title d-flex justify-content-center bg-info text-white py-3 fw-bold">
                                                <span>{{ __('website.address') }}</span>
                                            </h5>
                                        </div>
                                        <div class="border mx-4 mb-2 p-3">
                                            <div>
                                                <b><i class="fa fa-location-arrow"></i> </b>{{ $hospital->address }},
                                                {{ $hospital->area?->name }},
                                                {{ $hospital->area?->district?->name }},
                                                {{ $hospital->area?->district?->division?->name }}.
                                            </div>
                                            <div class="pt-3">
                                                <b>{{ __('website.schedule') }}: </b>
                                                <div class="row">
                                                        <div class="col-5">
                                                            <i class="far fa-calendar-check"></i>
                                                            @if ($hospital->schedules == 'all_day')
                                                                All Days
                                                            @endif

                                                        </div>
                                                        <div class="col-7">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="pt-3">
                                                <b>{{ __('website.contact') }}: </b>
                                                <p class="text-center fs-4">
                                                    <a href="tel:{{ $hospital->phone }}"><i class="fa fa-mobile text-danger"></i>
                                                    {{ $hospital->phone }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script></script>
@endpush
