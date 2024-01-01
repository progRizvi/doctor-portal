@extends('frontend.layout')
@section('title', 'Doctorinfobd')

@push("style")
    
@endpush
@section('content')
    <!-- Home Banner -->
    <section class="banner-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content aos" data-aos="fade-up">
                        @if (session('loc') == 'bn')
                            <h1>আপনার নিকটবর্তী অবস্থানের <span>ডাক্তারদের</span> সন্ধান করুন।</h1>
                        @else
                            <h1>Find <span>Best Doctors</span> Your Nearby Location.</h1>
                        @endif

                        <img src="{{ asset('frontend') }}/assets/img/icons/header-icon.svg" class="header-icon"
                            alt="header-icon">
                        <p>
                            {{ __('website.find_healthcare_provider') }}
                        </p>
                        <a href="{{ route('service.doctors') }}" class="btn">{{ __('website.start_finding') }}</a>
                        <div class="banner-arrow-img">
                            <img src="{{ asset('frontend') }}/assets/img/down-arrow-img.png" class="img-fluid"
                                alt="down-arrow">
                        </div>
                    </div>
                    <div class="search-box-one aos" data-aos="fade-up">
                        @include('frontend.pages.search')
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-img aos" data-aos="fade-up">
                        <img src="{{ asset('frontend') }}/assets/img/banner-img.png" class="img-fluid" alt="patient-image">
                        <div class="banner-img1">
                            <img src="{{ asset('frontend') }}/assets/img/banner-img1.png" class="img-fluid"
                                alt="checkup-image">
                        </div>
                        <div class="banner-img2">
                            <img src="{{ asset('frontend') }}/assets/img/banner-img2.png" class="img-fluid"
                                alt="doctor-slide">
                        </div>
                        <div class="banner-img3">
                            <img src="{{ asset('frontend') }}/assets/img/banner-img3.png" class="img-fluid"
                                alt="doctors-list">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Home Banner -->

    <!-- Services Section -->
    <section class="specialities-section-one">
        <div class="container">
            <div class="row">
                <div class="col-md-6 aos" data-aos="fade-up">
                    <div class="section-header-one section-header-slider">
                        <h2 class="section-title">{{ __('website.services') }}</h2>
                    </div>
                </div>
                <div class="col-md-6 aos" data-aos="fade-up">
                    <div class="owl-nav slide-nav-1 text-end nav-control"></div>
                </div>
            </div>
            <div class="owl-carousel specialities-slider-one owl-theme aos" data-aos="fade-up">
                <div class="item">
                    <div class="specialities-item">
                        <div class="specialities-img">
                            <a href="{{ route('service.doctors') }}">
                                <span><img src="{{ asset('frontend') }}/assets/img/services/doctor.svg"
                                        alt="Doctors"></span>
                            </a>
                        </div>
                        <p>{{ __('website.doctors') }}</p>
                    </div>
                </div>
                <div class="item">
                    <div class="specialities-item">
                        <div class="specialities-img">
                            <span><img src="{{ asset('frontend') }}/assets/img/services/surgery.svg"
                                    alt="Surgery Support"></span>
                        </div>
                        <p>{{ __('website.surgery_support') }}</p>
                    </div>
                </div>
                <div class="item">
                    <div class="specialities-item">
                        <div class="specialities-img">
                            <span><img src="{{ asset('frontend') }}/assets/img/services/hospital.svg"
                                    alt="Hospital & Diagnostic"></span>
                        </div>
                        <p>{{ __('website.hospital_diagnostic') }}</p>
                    </div>
                </div>
                <div class="item">
                    <div class="specialities-item">
                        <div class="specialities-img">
                            <span><img src="{{ asset('frontend') }}/assets/img/services/blood.svg"
                                    alt="Blood Donors Club"></span>
                        </div>
                        <p>{{ __('website.blood_donors_club') }}</p>
                    </div>
                </div>
                <div class="item">
                    <div class="specialities-item">
                        <div class="specialities-img">
                            <span><img src="{{ asset('frontend') }}/assets/img/services/home_clinic.svg"
                                    alt="Home Medical Service"></span>
                        </div>
                        <p>{{ __('website.home_medical_service') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Specialities Section -->


    <!-- Doctors Section -->
    <section class="doctors-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center aos" data-aos="fade-up">
                    <div class="section-header-one" style="margin-bottom:30px">
                        <h2 class="section-title">{{ __('website.comprehensive_healthcare') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-sm-10 mx-auto aos" data-aos="fade-up">
                    <p class="comprehensive_details">
                        {{__("website.comprehensive_healthcare_details")}}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- /Doctors Section -->

@endsection