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
                    <img src="{{ url('images/logo.png') }}" class="img-fluid d-sm-none d-md-block" alt="Logo">
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
                    <li class="has-submenu megamenu @if (request()->route()->getName() == 'service.doctors') active @endif">
                        <a href="{{ route('service.doctors') }}">{{ __('website.doctors') }}</a>
                    </li>
                    <li class="has-submenu">
                        <a href="javascript:void(0);">{{ __('website.surgery_support') }}</a>
                    </li>
                    <li class="has-submenu">
                        <a href="{{ route('service.hospitals') }}">{{ __('website.hospital_diagnostic') }}</a>
                    </li>
                    <li class="has-submenu">
                        <a href="javascript:void(0);">{{ __('website.blood_donors_club') }}</a>
                    </li>
                    <li class="has-submenu">
                        <a href="javascript:void(0);">{{ __('website.home_medical_service') }}</a>
                    </li>
                    <li class="has-submenu @if (request()->route()->getName() == 'blogs') active @endif">
                        <a href="{{ route('blogs') }}">{{ __('website.blog') }}</a>
                    </li>
                    <li class="has-submenu d-flex justify-content-center align-items-center">
                        <select name="language" id="" onchange="location = this.value;" class="form-control">
                            <option @if (session()->get('loc') == 'en') selected @endif
                                value="{{ route('switch.lang', 'en') }}">{{ __('website.en') }}</option>
                            <option @if (session()->get('loc') == 'bn') selected @endif
                                value="{{ route('switch.lang', 'bn') }}">{{ __('website.bn') }}</option>
                        </select>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- /Header -->
