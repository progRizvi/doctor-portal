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
                                                        <img class="img-fluid w-25 rounded-circle" alt="User Image"
                                                            src="{{ asset('images/' . $doctor->gender . '_avatar.jpg') }}">
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
                                    <div class="card">
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
                                    <!-- Edit Details Modal -->
                                    <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Personal Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">First Name</label>
                                                                    <input type="text" class="form-control"
                                                                        value="John">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">Last Name</label>
                                                                    <input type="text" class="form-control"
                                                                        value="Doe">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">Date of Birth</label>
                                                                    <div class="cal-icon">
                                                                        <input type="text"
                                                                            class="form-control datetimepicker"
                                                                            value="24-07-1983">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">Email ID</label>
                                                                    <input type="email" class="form-control"
                                                                        value="johndoe@example.com">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">Mobile</label>
                                                                    <input type="text" value="+1 202-555-0125"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <h5 class="form-title"><span>Address</span></h5>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">Address</label>
                                                                    <input type="text" class="form-control"
                                                                        value="4663 Agriculture Lane">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">City</label>
                                                                    <input type="text" class="form-control"
                                                                        value="Miami">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">State</label>
                                                                    <input type="text" class="form-control"
                                                                        value="Florida">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">Zip Code</label>
                                                                    <input type="text" class="form-control"
                                                                        value="22434">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">Country</label>
                                                                    <input type="text" class="form-control"
                                                                        value="United States">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary w-100">Save</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Edit Details Modal -->

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
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Chamber Schedule</span>
                                            </h5>
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
