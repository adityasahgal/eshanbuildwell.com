<?php
$genSetting = \App\Models\Setting::first();
?>
@extends('layouts.master')
@php
$meta_title = "Contact Us - Eshan Buildwell";
$meta_description = "Get in touch with Eshan Buildwell for all your construction needs. Contact us for inquiries, quotes, and expert assistance with your building projects.";
$keywords = "Contact Eshan Buildwell, construction services, building projects, quotes, expert assistance, Eshan Buildwell contact details";
@endphp
@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop
@section('meta_keywords'){{ $keywords }}@stop
@section('content')
<section class="hero-banner" style="{{ isset($banner) ? 'background-image:linear-gradient(rgba(15,25,50,0.2), rgba(15,25,50,0.2)), url('.url('storage/'.$banner->banner).');' : '' }}">
  <div class="container">
    <div class="hero-content">
      <h1>{{ isset($banner) ? $banner->name : 'Contact Us' }}</h1>
      <div class="hero-divider"></div>
      <p>{{ isset($banner) ? $banner->tag_line : 'Get in Touch with Us Today!' }}</p>
    </div>
  </div>
</section>
<div class="breadcrumb-bar"><div class="container"><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li><li class="breadcrumb-item active">Contact Us</li></ol></nav></div></div>

<section class="py-5 bg-white">
  <div class="container">
    <h2 class="sec-title mb-4">Get In Touch</h2>
    <div class="row g-3 mb-5">
      <div class="col-6 col-md-3"><div class="info-card"><div class="ic-icon"><i class="bi bi-geo-alt-fill"></i></div><h6>Our Office Address</h6><p>123, Main Street, Business Park, New Delhi, India</p></div></div>
      <div class="col-6 col-md-3"><div class="info-card"><div class="ic-icon"><i class="bi bi-telephone-fill"></i></div><h6>Call Us</h6><p><a href="tel:+919876543210">+91 9876543210</a></p></div></div>
      <div class="col-6 col-md-3"><div class="info-card"><div class="ic-icon"><i class="bi bi-envelope-fill"></i></div><h6>Email Us</h6><p><a href="mailto:info@eshanbuildwell.com">info@eshanbuildwell.com</a></p></div></div>
      <div class="col-6 col-md-3"><div class="info-card"><div class="ic-icon"><i class="bi bi-clock-fill"></i></div><h6>Working Hours</h6><p>Mon–Sat: 9:00 AM – 6:00 PM<br><span class="working-closed">Sunday: Closed</span></p></div></div>
    </div>
    <div class="row g-4 align-items-stretch">
      <div class="col-12 col-lg-5">
        <div class="contact-form-box h-100">
          <h4>Contact Us</h4>
          <p class="sub">Have questions or want to discuss your project? Fill out the form and we'll get back to you shortly!</p>
          
          @if(session('status'))
            <div class="alert alert-{{ session('status') == 'success' ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <form action="/enquiry" method="POST" id="contactForm">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{ old('name') }}" required/>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Your Email" value="{{ old('email') }}" required/>
            </div>
            <div class="mb-3">
                <input type="tel" name="phone" class="form-control" placeholder="Your Phone" value="{{ old('phone') }}" required/>
            </div>
            <div class="mb-3">
                <textarea name="message" class="form-control" rows="4" placeholder="Your Message" required>{{ old('message') }}</textarea>
            </div>
            
            <div class="mb-3">
                <div class="g-recaptcha" data-sitekey="{{ config('captcha.site_key') ?: env('GOOGLE_CAPTCHA_SITE_KEY') }}"></div>
            </div>

            <button type="submit" class="btn-send">Send Message</button>
          </form>
        </div>
      </div>
      <div class="col-12 col-lg-7">
        <div class="map-box">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224346.5440378578!2d77.04417439999999!3d28.527554999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5b347eb62d%3A0x52c2b7494e204dce!2sNew%20Delhi%2C%20Delhi!5e0!3m2!1sen!2sin!4v1712000000000!5m2!1sen!2sin" allowfullscreen="" loading="lazy" title="Eshan Buildwell Location"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="cta-strip"><div class="container"><h2>Ready to Build Your Dream Project?</h2><p>Contact Us for a Free Consultation!</p><a href="tel:+919876543210" class="btn-cta-lg"><i class="bi bi-telephone-fill"></i> Call Us: +91 9876543210</a></div></section>


@endsection

@push('scripts')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush