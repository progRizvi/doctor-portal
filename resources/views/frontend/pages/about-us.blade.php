@extends('frontend.layout')
@section('title', 'About Us')
@section('content')
<div class="breadcrumb-bar-two">
			<div class="container">
				<div class="row align-items-center inner-banner">
					<div class="col-md-12 col-12 text-center">
						<h2 class="breadcrumb-title">About Us</h2>
						<nav aria-label="breadcrumb" class="page-breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
								<li class="breadcrumb-item" aria-current="page">About Us</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
    <!-- About Us -->
    <section class="about-section">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 col-md-12">
                    <div class="about-img-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="about-inner-img">
                                    <div class="about-img">
                                        <img src="{{ asset('frontend/assets/img/about-img1.jpg') }}" class="img-fluid" alt="about-image">
                                    </div>
                                    <div class="about-img">
                                        <img src="{{ asset('frontend/assets/img/about-img2.jpg') }}" class="img-fluid" alt="about-image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="about-inner-img">
                                    <div class="about-box">
                                        <h4>Experienced Doctors</h4>
                                    </div>
                                    <div class="about-img">
                                        <img src="{{ asset('frontend/assets/img/about-img3.jpg') }}" class="img-fluid" alt="about-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="section-inner-header about-inner-header">
                        <h6>About Our Company</h6>
                    </div>
                    <div class="about-content">
                        <div class="about-content-details">
                            <p>Doctorinfobd.com is an online based health services provider's info-sharing platform. We try to provide an easy and good connection for patients to consult specialist doctors for any health issue.</p>
                            <p>
                                Easy Appointments: We've very easily the process of specialized doctors' Appointments. With Doctorinfobd.com, you can confirm a free schedule of appointments with a specialist doctor in just a few minutes. No more waiting, no more hassle - just efficient healthcare access at your fingertips.
                            </p>
                            <p>
                                Huge Medical Information: Need information on blood groups, hospitals, clinics, diagnostic centers, or ambulance services. Doctorinfobd.com is your comprehensive guide. Find contact details and phone numbers very easily.
                            </p>
                            <p>User-Friendly Medical Content: We believe that medical information should be accessible to everyone. That's why we've designed Doctorinfobd.com to present complex medical content in a simple, user-friendly manner.</p>
                            <p>Vast Network: With Doctorinfobd.com, you can easily book appointments with experienced doctors in specialized categories. Your health needs are our priority.</p>
                            <p>
                                Also, you can contact our call center for any health-related consultation and receive your required services very easily.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /About Us -->
@endsection
