@extends('frontend.layout')
@section('title', $doctor->name)

@push("style")
    <style>
        .bg_image{
            background-image:url("{{ url('uploads/doctors', $doctor->background_image) }}"), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
            background-blend-mode: overlay;
            background-size: cover;
            background-repeat:no-repeat;
        }
    </style>
@endpush
@section('content')
    @php
        $loc = session('loc');
        $treatmentsList = $loc == 'en' ? $doctor->treatments : ($doctor->bn_treatments != ""?$doctor->bn_treatments: $doctor->treatments );
        $treatments = explode(',', $treatmentsList);
        $treatments = array_map('trim', $treatments);
    @endphp

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
                                                        <a href="#"
                                                            style="display:inline-block; border: 10px solid white; border-radius:50%">
                                                            <img class="img-fluid mt-4 px-4" alt="{{ $loc == 'en'? $doctor->name : (isset($doctor->bn_name)?$doctor->bn_name: $doctor->name )}}"
                                                                @if ($doctor->image) src="{{ asset('public/uploads/doctors/' . $doctor->image) }}"
                                                            @else
                                                            src="{{ asset('images/' . $doctor->gender . '_avatar.jpg') }}" @endif
                                                                style="clip-path:circle()">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="ml-md-n2 profile-user-info pt-2">
                                                    <h4 class="user-name mb-0 text-white">{{ $loc == 'en'? $doctor->name : (isset($doctor->bn_name)?$doctor->bn_name: $doctor->name )}}</h4>
                                                    <div class="user-Location"></div>
                                                    <div class="about-text text-white">
                                                        {{ $loc == 'en'? $doctor->bio : (isset($doctor->bn_bio)?$doctor->bn_bio: $doctor->bio ) }}
                                                    </div>
                                                    <p class="px-4">
                                                        <hr>
                                                    </p>

                                                </div>
                                                <div class="col-auto profile-btn pb-3 text-white">
                                                    @foreach ($doctor->departments as $department)
                                                        <span class="me-4"><i class="fa fa-medkit"></i>
                                                        {{ $loc == 'en'? $department->name : (isset($department->bn_name)?$department->bn_name: $department->name )}}
                                                        </span>
                                                    @endforeach
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
                                                <span>{{ __('website.treated_conditions_include') }}</span>
                                            </h5>
                                            <div class="row">
                                                @foreach ($treatments as $treatment)
                                                    <p class="co-12 col-md-6 text-muted"><i
                                                            class="fas fa-angle-double-right"></i>
                                                        {{ preg_replace('/\s+/', ' ', $treatment) }}
                                                    </p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="box-shadow:0px 0px 10px 1px rgba(0, 0, 0, 0.1)">
                                        <div class="card-body">
                                            <h5
                                                class="card-title d-flex justify-content-center bg-info text-white py-3 fw-bold">
                                                <span>{{ __('website.doctor_fee') }}</span>
                                            </h5>

                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <p>{{ __('website.new_patient') }} <span class="badge bg-info"
                                                            style="font-size:14px">৳
                                                            {{ $doctor->new_patient_fee }}</span>
                                                    </p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <p>{{ __('website.old_patient') }} <span class="badge bg-info"
                                                            style="font-size:14px">৳
                                                            {{ $doctor->old_patient_fee }}</span>
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

                <div class="col-md-4">
                    <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="per_details_tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5
                                                class="card-title d-flex justify-content-center bg-info text-white py-3 fw-bold">
                                                <span>{{ __('website.chamber_address_schedule') }}</span>
                                            </h5>
                                        </div>
                                        <div class="border mx-4 mb-2 p-3">
                                            <div>

                                                <b>{{ __('website.address') }}: </b>{{$loc == 'en'? $doctor->address : (isset($doctor->bn_address)?$doctor->bn_address: $doctor->address )}},
                                                {{$loc == 'en'? $doctor->area?->name : (isset($doctor->area?->bn_name)?$doctor->area?->bn_name: $doctor->area?->name )}},
                                                {{ $loc == 'en'? $doctor->area?->district?->name : (isset($doctor->area?->district?->bn_name)?$doctor->area?->district?->bn_name: $doctor->area?->district?->name )}},

                                                 {{ $loc == 'en'? $doctor->area?->district?->division?->name : (isset($doctor->area?->district?->division?->bn_name)?$doctor->area?->district?->division?->bn_name: $doctor->area?->district?->division?->name )}}.


                                            </div>
                                            <div class="pt-3">
                                                <b>{{ __('website.schedule') }}: </b>
                                                @php
                                                    $days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
                                                @endphp
                                                @foreach ($doctor->schedules as $key => $schedule)
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <i class="far fa-calendar-check"></i> {{ ucfirst($key) }}
                                                        </div>
                                                        <div class="col-7">
                                                            {{ \Carbon\Carbon::parse($schedule['start_time'])->format('g:i A') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($schedule['end_time'])->format('g:i A') }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="per_details_tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5
                                                class="card-title d-flex justify-content-center bg-info text-white py-3 fw-bold">
                                                <span>{{ __('website.book_appointment') }}</span>
                                            </h5>
                                        </div>
                                        <div class="border mx-4 mb-2 p-3">
                                            <div style="text-align:center">
                                                <p>
                                                    {{ __('website.call_for_appointment') }}
                                                </p>
                                                <a href="tel:{{ $doctor->phone }}"><i class="fa fa-mobile text-danger"></i>
                                                    {{ $doctor->phone }}</a>
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
