@extends('frontend.layout')
@section('title', $doctor->name)

@section('content')
    @php
        $treatments = explode(',', $doctor->treatments);
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
                                    <div class="tab-content profile-tab-cont">
                                        <div class="profile-header">
                                            <div class="">
                                                <div class="col-auto profile-image">
                                                    <a href="#">
                                                        <img class="img-fluid w-25" alt="{{ $doctor->name }}"
                                                            @if ($doctor->image) src="{{ asset('public/uploads/doctors/' . $doctor->image) }}"
                                                            @else
                                                            src="{{ asset('images/' . $doctor->gender . '_avatar.jpg') }}" @endif
                                                            style="clip-path:circle()">
                                                    </a>
                                                </div>
                                                <div class="ml-md-n2 profile-user-info">
                                                    <h4 class="user-name mb-0">{{ $doctor->name }}</h4>
                                                    <div class="user-Location"></div>
                                                    <div class="about-text">
                                                        {{ $doctor->bio }}
                                                    </div>
                                                    <p class="px-4">
                                                        <hr>
                                                    </p>

                                                </div>
                                                <div class="col-auto profile-btn pb-3">
                                                    @foreach ($doctor->departments as $department)
                                                        <span class="me-4"><i class="fa fa-medkit"></i>
                                                            {{ $department->name }}</span>
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
                                                class="card-title d-flex justify-content-center bg-success text-secodary py-3 fw-bold">
                                                <span>Treated conditions include</span>
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
                                                class="card-title d-flex justify-content-center bg-success text-secodary py-3 fw-bold">
                                                <span>Doctor Fee</span>
                                            </h5>

                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <p>New patient <span class="badge bg-success" style="font-size:14px">৳
                                                            {{ $doctor->new_patient_fee }}</span>
                                                    </p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <p>Old patient <span class="badge bg-success" style="font-size:14px">৳
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
                                                class="card-title d-flex justify-content-center bg-success text-secodary py-3 fw-bold">
                                                <span>Chamber Address & Schedule</span>
                                            </h5>
                                        </div>
                                        <div class="border mx-4 mb-2 p-3">
                                            <div>
                                                <b>Address: </b>{{ $doctor->address }},
                                                {{ $doctor->area->name }},
                                                {{ $doctor->area->district->name }},
                                                {{ $doctor->area->district->division->name }}.
                                            </div>
                                            <div class="pt-3">
                                                <b>Schedule: </b>
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
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script></script>
@endpush
