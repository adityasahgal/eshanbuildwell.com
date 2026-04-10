<section class="footer">
    <div class="container-fluid footer py-4">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Logo and Contact Info -->
                <div class="col-md-6 col-lg-6">
                    <div class="footer-item">
                        <p class="text-white-50 mb-3">{{ $genSetting['footer_text'] }}</p>
                        <div class="d-flex align-items-start text-white-50 mb-2">
                            <i class="fas fa-map-marker-alt footer-icons me-3"></i>
                            <p class="mb-0">{{ $genSetting['address'] }}</p>
                        </div>
                        <div class="d-flex align-items-start text-white-50 mb-2">
                            <i class="fas fa-envelope footer-icons me-3"></i>
                            <p class="mb-0" href="mailto:{{ $genSetting['email'] }}">{{ $genSetting['email'] }}</p>
                        </div>
                        <div class="d-flex align-items-start text-white-50 mb-2">
                            <i class="fa fa-phone-alt footer-icons me-3"></i>
                            <p class="mb-0" href="tel:{{ $genSetting['phone'] }}">
                                {{ $genSetting['phone'] }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-md-6 col-lg-3">
                    <div class="footer-item">
                        <h4 class="text-white mb-4">Quick Links</h4>
                        <a href="{{ url('about-us') }}" class="text-white-50 d-block mb-2"><i class="fas fa-angle-right me-2"></i>
                            About Us</a>
                        <a href="{{ url('gallery') }}" class="text-white-50 d-block mb-2"><i class="fas fa-angle-right me-2"></i>
                            Gallery</a>
                        <a href="{{ url('blog') }}" class="text-white-50 d-block mb-2"><i class="fas fa-angle-right me-2"></i>
                            Blog</a>
                        <a href="{{ url('contact-us') }}" class="text-white-50 d-block mb-2"><i class="fas fa-angle-right me-2"></i>
                            Contact Us</a>
                    </div>
                </div>

                <!-- Support -->
                <div class="col-md-6 col-lg-3">
                    <div class="footer-item">
                        <h4 class="text-white mb-4">Support</h4>
                        <a href="{{ url('privacy-policy') }}" class="text-white-50 d-block mb-2"><i
                                class="fas fa-angle-right me-2"></i> Privacy
                            Policy</a>
                        <a href="{{ url('terms-condition') }}" class="text-white-50 d-block mb-2"><i class="fas fa-angle-right me-2"></i>
                            Terms &amp; Conditions</a>
                        <a href="{{ url('faq') }}" class="text-white-50 d-block mb-2"><i class="fas fa-angle-right me-2"></i>
                            FAQ</a>
                        <a href="{{ url('help') }}" class="text-white-50 d-block mb-2"><i class="fas fa-angle-right me-2"></i>
                            Help</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>