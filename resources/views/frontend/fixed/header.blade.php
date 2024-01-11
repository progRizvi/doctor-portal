<!-- Header -->
<header class="header header-custom header-fixed header-one">
    <div class="container">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="{{ route('home') }}" class="navbar-brand logo">
                    {{--  d-sm-none d-md-block --}}
                    <img src="{{ url('images/logo.png') }}" class="img-fluid" alt="Logo" style="max-width: 200px;">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{ route('home') }}" class="menu-logo">
                        <img src="{{ url('images/logo.png') }}" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li class="megamenu @if (request()->route()->getName() == 'service.doctors') active @endif">
                        <a href="{{ route('service.doctors') }}">{{ __('website.doctors') }}</a>
                    </li>
                    <li class="megamenu">
                        <a href="{{ route('surgery.support') }}">{{ __('website.surgery_support') }}</a>
                    </li>
                    <li class="megamenu">
                        <a href="{{ route('service.hospitals') }}">{{ __('website.hospital_diagnostic') }}</a>
                    </li>
                    <li class="megamenu">
                        <a href="{{ route('blood.club') }}">{{ __('website.blood_donors_club') }}</a>
                    </li>
                    <li class="megamenu">
                        <a href="{{route('home.services')}}">{{ __('website.home_medical_service') }}</a>
                    </li>
                    <li class=" @if (request()->route()->getName() == 'blogs') active @endif">
                        <a href="{{ route('blogs') }}">{{ __('website.blog') }}</a>
                    </li>
                    <li class="megamenu">
                        @if (session()->get('loc') == 'en')
                        <a href="{{ route('switch.lang', 'bn') }}">{{ __('website.bn') }}</a>
                        @else
                        <a href="{{ route('switch.lang', 'en') }}">{{ __('website.en') }}</a>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- /Header -->

<style>
    @media (max-width: 991.98px){
        .header-one .main-menu-wrapper .main-nav > li > a {
            font-size: 17px;
        }
    }
</style>
