<footer class="footer footer-one">
    <div class="footer-top aos" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="footer-widget footer-about">
                        <div class="footer-logo">
                            <a href="{{ route('home') }}"><img class="img-fluid w-50 h-auto"
                                    src="{{ url('images/logo.png') }}" alt="Doctorinfobd" style="height: 60px;"></a>
                        </div>
                        <div class="footer-about-content">
                            <p>{{ __('website.find_healthcare_provider') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-4">
                            <div class="footer-widget footer-menu">
                                <ul>
                                    <li><a
                                            href="{{ route('service.doctors') }}">{{ __('website.search_for_doctors') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('service.hospitals') }}">{{ __('website.search_for_hospitals') }}</a>
                                    </li>
                                    <li><a href="{{ route('about_us') }}">{{ __('website.about_us') }}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4">
                            <div class="footer-widget footer-contact">
                                <h2 class="footer-title">{{ __('website.contact_us') }}</h2>
                                <div class="footer-contact-info">
                                    <div class="footer-address">
                                        <p><i class="feather-map-pin"></i> Mirpur, Dhaka, Bangladesh</p>
                                    </div>
                                    <div class="footer-address">
                                        <p><i class="feather-phone-call"></i> <a href="tel:+880 1902991500">+880
                                                1902991500</a></p>
                                    </div>
                                    <div class="footer-address mb-0">
                                        <p><i class="feather-mail"></i> clinicsheba@yahoo.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-7">
                    <div class="footer-widget">
                        <h2 class="footer-title">{{ __('website.join_our_newsletter') }}</h2>
                        <div class="subscribe-form">
                            <form action="#">
                                <input type="email" class="form-control" placeholder="Enter Email">
                                <button type="submit" class="btn">{{ __('website.submit') }}</button>
                            </form>
                        </div>
                        <div class="social-icon">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/doctorinfobd1" target="_blank"><i
                                            class="fab fa-facebook"></i> </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                </li>
                                {{-- <li>
                                    <a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <!-- Copyright -->
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="copyright-text">
                            <p class="mb-0"> Copyright © 2023 <a href="https://www.doctorinfobd.com/"
                                    target="_blank">Doctorinfobd.</a> All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">

                        <!-- Copyright Menu -->
                        <div class="copyright-menu">
                            <ul class="policy-menu">
                                <li><a href="#">{{ __('website.privacy_policy') }}</a></li>
                                <li><a href="#">{{ __('website.terms_and_conditions') }}</a></li>
                            </ul>
                        </div>
                        <!-- /Copyright Menu -->

                    </div>
                </div>
            </div>
            <!-- /Copyright -->
        </div>
    </div>
</footer>
