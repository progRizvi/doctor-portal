@extends('frontend.layout')
@section('title', $hospital->name)

@section('content')
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <div class="row">
                        <div class="md-container">
                            <div class="bg-white" style="box-shadow:0px 0px 10px 1px rgba(0, 0, 0, 0.1)">
                                <div class="col-md-12">
                                    <div class="tab-content profile-tab-cont">
                                        <div class="profile-header">
                                            <div class="">
                                                <div class="col-auto profile-image">
                                                    <a href="#">
                                                        <img class="img-fluid w-25" style="clip-path:circle()"
                                                            alt="{{ $hospital->name }}"
                                                            @if ($hospital->image) src="{{ asset('public/uploads/hospitals/' . $hospital->image) }}"
                                                            @else
                                                            src="{{ asset('images/hospital.svg') }}" @endif>
                                                    </a>
                                                </div>
                                                <div class="ml-md-n2 profile-user-info">
                                                    <h4 class="user-name mb-0">{{ $hospital->name }}</h4>
                                                    <div class="user-Location"></div>
                                                    <div class="about-text">
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
                                                class="card-title d-flex justify-content-center bg-success text-secodary py-3 fw-bold">
                                                <span>{{ __('website.about_us') }}</span>
                                            </h5>
                                            <div class="row">

                                                <p class="co-12 col-md-6 text-muted">
                                                    {{ $hospital->description }}
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="box-shadow:0px 0px 10px 1px rgba(0, 0, 0, 0.1)">
                                        <div class="card-body">
                                            <h5
                                                class="card-title d-flex justify-content-center bg-success text-secodary py-3 fw-bold">
                                                <span><i class="fa fa-medkit"></i> {{ __('website.our_services') }}</span>
                                            </h5>
                                            <div class="row">
                                                @foreach ($hospital->departments as $department)
                                                    <div class="col-12 col-md-6">
                                                        <p
                                                            class="d-flex justify-content-center align-items-center bg-info text-secodary py-2 fw-bold gap-1">
                                                            <i class="fa fa-medkit "></i>
                                                            {{ $department->name }}
                                                        </p>
                                                    </div>
                                                @endforeach
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
                                                class="card-title d-flex justify-content-center bg-success text-secodary py-3 fw-bold">
                                                <span>{{ __('website.address') }}</span>
                                            </h5>
                                        </div>
                                        <div class="border mx-4 mb-2 p-3">
                                            <div>
                                                <b><i class="fa fa-location-arrow"></i> </b>{{ $hospital->address }},
                                                {{ $hospital->area->name }},
                                                {{ $hospital->area->district->name }},
                                                {{ $hospital->area->district->division->name }}.
                                            </div>
                                            <div class="pt-3">
                                                <b>{{ __('website.schedule') }}: </b>
                                                @php
                                                    $days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'all_days'];
                                                @endphp
                                                @foreach ($hospital->schedules as $key => $schedule)
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <i class="far fa-calendar-check"></i>
                                                            @if ($key == 'all_day')
                                                                All Days
                                                            @else
                                                                {{ ucfirst($key) }}
                                                            @endif

                                                        </div>
                                                        <div class="col-7">
                                                            {{ \Carbon\Carbon::parse($schedule['start_time'])->format('g:i A') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($schedule['end_time'])->format('g:i A') }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="pt-3">
                                                <b>{{ __('website.contact') }}: </b>
                                                <p class="text-center fs-4">
                                                    <i class="fa fa-mobile text-danger"></i>
                                                    {{ $hospital->phone }}
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
