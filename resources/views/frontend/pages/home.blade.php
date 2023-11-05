@extends('frontend.layout')
@section('title', 'Home')

@section('content')
    <!-- Home Banner -->
    <section class="banner-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content aos" data-aos="fade-up">
                        <h1>Consult <span>Best Doctors</span> Your Nearby Location.</h1>
                        <img src="{{ asset('frontend') }}/assets/img/icons/header-icon.svg" class="header-icon"
                            alt="header-icon">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                        <a href="booking.html" class="btn">Start a Consult</a>
                        <div class="banner-arrow-img">
                            <img src="{{ asset('frontend') }}/assets/img/down-arrow-img.png" class="img-fluid"
                                alt="down-arrow">
                        </div>
                    </div>
                    <div class="search-box-one aos" data-aos="fade-up">
                        @include('frontend.pages.doctor-search')
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
                        <h2 class="section-title">Services</h2>
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
                        <p>Doctors</p>
                    </div>
                </div>
                <div class="item">
                    <div class="specialities-item">
                        <div class="specialities-img">
                            <span><img src="{{ asset('frontend') }}/assets/img/services/surgery.svg"
                                    alt="Surgery Support"></span>
                        </div>
                        <p>Surgery Support</p>
                    </div>
                </div>
                <div class="item">
                    <div class="specialities-item">
                        <div class="specialities-img">
                            <span><img src="{{ asset('frontend') }}/assets/img/services/hospital.svg"
                                    alt="Hospital & Diagnostic"></span>
                        </div>
                        <p>Hospital & Diagnostic</p>
                    </div>
                </div>
                <div class="item">
                    <div class="specialities-item">
                        <div class="specialities-img">
                            <span><img src="{{ asset('frontend') }}/assets/img/services/blood.svg"
                                    alt="Blood Donors Club"></span>
                        </div>
                        <p>Blood Donors Club</p>
                    </div>
                </div>
                <div class="item">
                    <div class="specialities-item">
                        <div class="specialities-img">
                            <span><img src="{{ asset('frontend') }}/assets/img/services/home_clinic.svg"
                                    alt="Home Medical Service"></span>
                        </div>
                        <p>Home Medical Service</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Specialities Section -->

    {{--
        <!-- Doctors Section -->
        <section class="doctors-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 aos" data-aos="fade-up">
                        <div class="section-header-one section-header-slider">
                            <h2 class="section-title">Best Doctors</h2>
                        </div>
                    </div>
                    <div class="col-md-6 aos" data-aos="fade-up">
                        <div class="owl-nav slide-nav-2 text-end nav-control"></div>
                    </div>
                </div>
                <div class="owl-carousel doctor-slider-one owl-theme aos" data-aos="fade-up">

                    <!-- Doctor Item -->
                    <div class="item">
                        <div class="doctor-profile-widget">
                            <div class="doc-pro-img">
                                <a href="doctor-profile.html">
                                    <div class="doctor-profile-img">
                                        <img src="{{asset("frontend")}}/assets/img/doctors/doctor-03.jpg" class="img-fluid"
                                            alt="Ruby Perrin">
                                    </div>
                                </a>
                                <div class="doctor-amount">
                                    <span>$ 200</span>
                                </div>
                            </div>
                            <div class="doc-content">
                                <div class="doc-pro-info">
                                    <div class="doc-pro-name">
                                        <a href="doctor-profile.html">Dr. Ruby Perrin</a>
                                        <p>Cardiology</p>
                                    </div>
                                    <div class="reviews-ratings">
                                        <p>
                                            <span><i class="fas fa-star"></i> 4.5</span> (35)
                                        </p>
                                    </div>
                                </div>
                                <div class="doc-pro-location">
                                    <p><i class="feather-map-pin"></i> Newyork, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Doctor Item -->

                    <!-- Doctor Item -->
                    <div class="item">
                        <div class="doctor-profile-widget">
                            <div class="doc-pro-img">
                                <a href="doctor-profile.html">
                                    <div class="doctor-profile-img">
                                        <img src="{{asset("frontend")}}/assets/img/doctors/doctor-04.jpg" class="img-fluid"
                                            alt="Darren Elder">
                                    </div>
                                </a>
                                <div class="doctor-amount">
                                    <span>$ 360</span>
                                </div>
                            </div>
                            <div class="doc-content">
                                <div class="doc-pro-info">
                                    <div class="doc-pro-name">
                                        <a href="doctor-profile.html">Dr. Darren Elder</a>
                                        <p>Neurology</p>
                                    </div>
                                    <div class="reviews-ratings">
                                        <p>
                                            <span><i class="fas fa-star"></i> 4.0</span> (20)
                                        </p>
                                    </div>
                                </div>
                                <div class="doc-pro-location">
                                    <p><i class="feather-map-pin"></i> Florida, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Doctor Item -->

                    <!-- Doctor Item -->
                    <div class="item">
                        <div class="doctor-profile-widget">
                            <div class="doc-pro-img">
                                <a href="doctor-profile.html">
                                    <div class="doctor-profile-img">
                                        <img src="{{asset("frontend")}}/assets/img/doctors/doctor-05.jpg" class="img-fluid"
                                            alt="Sofia Brient">
                                    </div>
                                </a>
                                <div class="doctor-amount">
                                    <span>$ 450</span>
                                </div>
                            </div>
                            <div class="doc-content">
                                <div class="doc-pro-info">
                                    <div class="doc-pro-name">
                                        <a href="doctor-profile.html">Dr. Sofia Brient</a>
                                        <p>Urology</p>
                                    </div>
                                    <div class="reviews-ratings">
                                        <p>
                                            <span><i class="fas fa-star"></i> 4.5</span> (30)
                                        </p>
                                    </div>
                                </div>
                                <div class="doc-pro-location">
                                    <p><i class="feather-map-pin"></i> Georgia, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Doctor Item -->

                    <!-- Doctor Item -->
                    <div class="item">
                        <div class="doctor-profile-widget">
                            <div class="doc-pro-img">
                                <a href="doctor-profile.html">
                                    <div class="doctor-profile-img">
                                        <img src="{{asset("frontend")}}/assets/img/doctors/doctor-02.jpg" class="img-fluid"
                                            alt="Paul Richard">
                                    </div>
                                </a>
                                <div class="doctor-amount">
                                    <span>$ 570</span>
                                </div>
                            </div>
                            <div class="doc-content">
                                <div class="doc-pro-info">
                                    <div class="doc-pro-name">
                                        <a href="doctor-profile.html">Dr. Paul Richard</a>
                                        <p>Orthopedic</p>
                                    </div>
                                    <div class="reviews-ratings">
                                        <p>
                                            <span><i class="fas fa-star"></i> 4.3</span> (45)
                                        </p>
                                    </div>
                                </div>
                                <div class="doc-pro-location">
                                    <p><i class="feather-map-pin"></i> Michigan, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Doctor Item -->

                    <!-- Doctor Item -->
                    <div class="item">
                        <div class="doctor-profile-widget">
                            <div class="doc-pro-img">
                                <a href="doctor-profile.html">
                                    <div class="doctor-profile-img">
                                        <img src="{{asset("frontend")}}/assets/img/doctors/doctor-01.jpg" class="img-fluid" alt="John Doe">
                                    </div>
                                </a>
                                <div class="doctor-amount">
                                    <span>$ 880</span>
                                </div>
                            </div>
                            <div class="doc-content">
                                <div class="doc-pro-info">
                                    <div class="doc-pro-name">
                                        <a href="doctor-profile.html">Dr. John Doe</a>
                                        <p>Dentist</p>
                                    </div>
                                    <div class="reviews-ratings">
                                        <p>
                                            <span><i class="fas fa-star"></i> 4.4</span> (50)
                                        </p>
                                    </div>
                                </div>
                                <div class="doc-pro-location">
                                    <p><i class="feather-map-pin"></i> California, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Doctor Item -->

                </div>
            </div>
        </section>
        <!-- /Doctors Section -->
         --}}
@endsection
