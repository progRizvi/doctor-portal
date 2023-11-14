@extends('frontend.layout')
@section('title', 'About Us')
@section('content')
<div class="breadcrumb-bar-two">
			<div class="container">
				<div class="row align-items-center inner-banner">
					<div class="col-md-12 col-12 text-center">
						<h2 class="breadcrumb-title">{{ __("website.about_us") }}</h2>
						<nav aria-label="breadcrumb" class="page-breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route("home") }}">{{ __("website.home") }}</a></li>
								<li class="breadcrumb-item" aria-current="page">{{ __("website.about_us") }}</li>
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
                                        <h4>{{ __("website.experienced_doctors") }}</h4>
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
                        <h6>{{ __("website.about_our_company") }}</h6>
                    </div>
                    <div class="about-content">
                        <div class="about-content-details">
                            <p>{{ __("website.doctorinfobd_is_an_online_based_health_services") }}</p>
                            <p>
                                {{ __("website.have_very_easily_the_process_of_specialized_doctors") }}
                            </p>
                            <p>
                                {{ __("website.huge_medical_nformation") }}
                            </p>
                            <p>{{ __("website.user_friendly_medical_content") }}</p>
                            <p>{{ __("website.vast_network") }}</p>
                            <p>
                                {{ __("website.health_related_consultation") }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /About Us -->
@endsection
