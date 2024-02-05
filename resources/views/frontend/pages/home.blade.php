@extends('frontend.layout')
@if (isset($homeContent))
    @section('title', $homeContent->meta_title)
    @section('meta_description', $homeContent->meta_description)
    @section('meta_keywords', $homeContent->meta_keywords)
@else
    @section('title', 'Doctor Info BD')
@endif

@push('style')
@endpush
@section('content')
    @php
        $loc = session('loc');
    @endphp
    <!-- Home Banner -->
    <section class="banner-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content aos" data-aos="fade-up">
                        @if (session('loc') == 'bn')
                            <h1>{{ $homeContent->bn_heading }}</h1>
                        @else
                            <h1>{{ $homeContent->heading }}</h1>
                        @endif

                        <img src="{{ asset('frontend') }}/assets/img/icons/header-icon.svg" class="header-icon"
                            alt="header-icon">
                        <p>
                            @if (session('loc') == 'bn')
                                {{ $homeContent->bn_sub_heading }}
                            @else
                                {{ $homeContent->sub_heading }}
                            @endif
                            {{-- {{ __('website.find_healthcare_provider') }} --}}
                        </p>
                        <a href="{{ $homeContent->cta_url }}"
                            class="btn">{{ session('loc') == 'bn' ? $homeContent->bn_cta_text : $homeContent->cta_text }}</a>
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
                <div class="col-md-6 aos" data-aos="fade-up">
                    <div class="section-header-one section-header-slider">
                        <h2 class="section-title">{{ __('website.top_doctors') }}</h2>
                    </div>
                </div>
                <div class="col-md-6 aos" data-aos="fade-up">
                    <div class="owl-nav slide-nav-2 text-end nav-control"></div>
                </div>
            </div>
            <div class="owl-carousel doctor-slider-one owl-theme aos" data-aos="fade-up">
                @foreach ($topDoctors as $topDoctor)
                    <div class="item">
                        <div class="doctor-profile-widget">
                            <div class="doc-pro-img">
                                <a href="{{ route('service.doctor.details', $topDoctor->slug) }}">
                                    <div class="doctor-profile-img">
                                        {{-- <img class="img-fluid doctor-image"
                                            @if ($topDoctor->image) src="{{ asset('public/uploads/doctors/' . $topDoctor->image) }}"
                                            @else
                                            src="{{ asset('images/' . $topDoctor->gender . '_avatar.jpg') }}" @endif
                                            alt="{{ $topDoctor->name }}"> --}}
                                        <div
                                            style="background: url({{ asset('public/uploads/doctors/' . $topDoctor->image) }}) center top;height:350px; width:auto;">
                                        </div>
                                    </div>
                                </a>
                                <div></div>
                            </div>
                            <div class="doc-content">
                                <div class="doc-pro-info">
                                    <div class="doc-pro-name">
                                        <a href="{{ route('service.doctor.details', $topDoctor->slug) }}"
                                            title="{{ $topDoctor->name }}">{{ Str::limit($topDoctor->name, 30) }}</a>
                                        <p>
                                            @foreach ($topDoctor->departments as $dpt)
                                                @if ($loop->last)
                                                    {{ $loc == 'en' ? $dpt->name : (isset($dpt->bn_name) ? $dpt->bn_name : $dpt->name) }}
                                                @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <div class="doc-pro-location">
                                    <p><i class="feather-map-pin"></i> {{ $topDoctor->area->name }},
                                        {{ $topDoctor->area->district->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-3 pt-5 mx-auto"><a href="{{ route('service.doctors') }}">{{ __('website.view_all') }}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /Doctors Section -->

    <!-- Articles Section -->
    <section class="articles-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 aos" data-aos="fade-up">
                    <div class="section-header-one text-center">
                        <h2 class="section-title">{{ __('website.latest_blog') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($latestPost as $post)
                    <div class="col-lg-6 col-md-6 d-flex aos" data-aos="fade-up">
                        <div class="articles-grid w-100">
                            <div class="articles-info">
                                <div class="articles-left">
                                    <a href="{{ route('post.details', $post->slug) }}">
                                        <div class="articles-img">
                                            <img class="img-fluid"
                                                src="{{ asset('public/uploads/thumbnail/' . $post->thumbnail) }}"
                                                alt="{{ $post->title }}">
                                    </a>
                                </div>
                                </a>
                            </div>
                            <div class="articles-right">
                                <div class="articles-content">
                                    <ul class="articles-list nav">
                                        <li>
                                            <i class="feather-user"></i> {{ $post->author->name }}
                                        </li>
                                        <li>
                                            <i class="feather-calendar"></i>
                                            {{ \Carbon\Carbon::parse($post->posted_at)->format('d M, Y') }}
                                        </li>
                                    </ul>
                                    <h4>
                                        <a href="{{ route('post.details', $post->slug) }}">{{ $post->title }}</a>
                                    </h4>
                                    <p>{!! Str::limit($post->content, 50) !!}</p>
                                    <a href="{{ route('post.details', $post->slug) }}" class="btn">View Blog</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-2 pt-5 mx-auto"><a href="{{ route('blogs') }}">{{ __('website.view_all') }}</a></div>
        </div>
        </div>
    </section>
    <!-- /Articles Section -->
    <section class="doctors-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center aos" data-aos="fade-up">
                    <div class="section-header-one" style="margin-bottom:30px">
                        <h2 class="section-title">
                            @if (session('loc') == 'bn')
                                {{ $homeContent->bn_summery }}
                            @else
                                {{ $homeContent->summery }}
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-sm-10 mx-auto aos" data-aos="fade-up">
                    <p class="comprehensive_details">
                        @if (session('loc') == 'bn')
                            {!! $homeContent->bn_description !!}
                        @else
                            {!! $homeContent->description !!}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>


@endsection

@push('script')
    <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Doctor Info Bd",
    "alternateName": "Doctor Info",
    "url": "https://www.doctorinfobd.com/",
    "logo": "https://doctorinfobd.com/images/logo.png",
    "sameAs": "https://www.doctorinfobd.com/"
    }
</script>
@endpush
