@extends('layouts.master')

@php
$meta_title = "Eshan Buildwell – Expert Construction Services";
$meta_description = "Eshan Buildwell offers expert construction services for residential, commercial, and industrial
projects. With 15+ years of experience, we deliver quality workmanship, accurate BOQ preparation, and on-time project
completion. Get your free estimate now!";
$keywords = "Eshan Buildwell, construction services, residential construction, commercial construction, industrial
construction, project management consultancy, turnkey construction, accurate BOQ preparation, quality workmanship,
construction company Delhi NCR";
@endphp
@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop
@section('meta_keywords'){{ $keywords }}@stop

@section('content')
<!-- HERO -->
<section class="hero-section">
  <div class="container">
    <div class="hero-content">
      <h1>Expert Construction Services<br>For <span>Residential, Commercial</span><br>&amp;
        <span>Industrial</span> Projects
      </h1>
      <p class="mt-2 mb-4">We provide end-to-end construction solutions with precision &amp; quality</p>
      <a href="calculator.html" class="btn-est">Get Your Free Estimate <i class="bi bi-chevron-right"></i></a>
    </div>
  </div>
</section>

<!-- TRUST BAR -->
<div class="trust-bar">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
      <div class="trust-item"><i class="bi bi-clipboard-check"></i> Accurate BOQ Preparation</div>
      <div class="trust-sep d-none d-md-block"></div>
      <div class="trust-item"><i class="bi bi-currency-rupee"></i> Transparent Pricing</div>
      <div class="trust-sep d-none d-md-block"></div>
      <div class="trust-item"><i class="bi bi-clock"></i> On-Time Delivery</div>
      <div class="trust-sep d-none d-md-block"></div>
      <div class="trust-item"><i class="bi bi-star"></i> Quality Workmanship</div>
      <div class="trust-sep d-none d-md-block"></div>
      <div class="trust-item"><i class="bi bi-trophy"></i> Proven Results</div>
    </div>
  </div>
</div>

<!-- SERVICES -->
<section class="py-5" style="background:var(--gray-bg)">
  <div class="container">
    <p class="sec-title text-center">Our Services</p>
    <div class="sec-line center mb-4"><span class="sec-sub">We Build with Precision</span></div>
    <div class="row g-4">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="svc-card">
          <div class="svc-img-wrap"><img
              src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=700&q=80"
              alt="Building Construction" /><span class="svc-badge">Residential &amp; Commercial</span>
          </div>
          <div class="svc-body">
            <h4>Building Construction</h4>
            <p>Complete construction for residential, commercial &amp; industrial projects with quality
              workmanship and attention to detail.</p>
            <ul class="feat-list">
              <li><i class="bi bi-check-circle-fill"></i>Site supervision &amp; execution control</li>
              <li><i class="bi bi-check-circle-fill"></i>Quality material sourcing</li>
            </ul><a href="services.html" class="btn-read">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="svc-card">
          <div class="svc-img-wrap"><img
              src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=700&q=80"
              alt="Turnkey Construction" /><span class="svc-badge">End-to-End</span></div>
          <div class="svc-body">
            <h4>Turnkey Construction</h4>
            <p>End-to-end service (Design → Planning → Construction → Handover). One contract, zero hassle.
            </p>
            <ul class="feat-list">
              <li><i class="bi bi-check-circle-fill"></i>Covering all aspects in a single contract</li>
              <li><i class="bi bi-check-circle-fill"></i>Ready-to-occupy handover</li>
            </ul><a href="services.html" class="btn-read">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="svc-card">
          <div class="svc-img-wrap"><img
              src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=700&q=80"
              alt="PMC" /><span class="svc-badge">PMC</span></div>
          <div class="svc-body">
            <h4>Project Management Consultancy (PMC)</h4>
            <p>Contractor selection guidance, site monitoring &amp; risk reduction.</p>
            <ul class="feat-list">
              <li><i class="bi bi-check-circle-fill"></i>Timeline management &amp; complete oversight</li>
            </ul><a href="services.html" class="btn-read">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- WHY CHOOSE -->
<section class="why-sec">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-12 col-lg-6">
        <h2 class="sec-title">Why Choose Eshan Buildwell?</h2>
        <div class="sec-line mb-3"><span class="text-muted small">Our Successful Constructions</span></div>
        <div class="why-point">
          <div class="why-icon"><i class="bi bi-people-fill"></i></div>
          <div>
            <h5>Experienced Team</h5>
            <p>Skilled professionals ensuring quality execution at every stage.</p>
          </div>
        </div>
        <div class="why-point">
          <div class="why-icon"><i class="bi bi-patch-check-fill"></i></div>
          <div>
            <h5>Customized Solutions</h5>
            <p>Tailored to meet your specific project needs and budget.</p>
          </div>
        </div>
        <div class="why-point">
          <div class="why-icon"><i class="bi bi-currency-rupee"></i></div>
          <div>
            <h5>Competitive Pricing</h5>
            <p>Transparent and cost-effective pricing with no hidden charges.</p>
          </div>
        </div>
        <div class="why-point">
          <div class="why-icon"><i class="bi bi-star-fill"></i></div>
          <div>
            <h5>Client Satisfaction</h5>
            <p>Proven track record of happy clients across 200+ projects.</p>
          </div>
        </div>
        <a href="about.html" class="btn-est mt-2">Learn More About Us <i class="bi bi-chevron-right"></i></a>
      </div>
      <div class="col-12 col-lg-6">
        <img class="why-img" src="https://images.unsplash.com/photo-1521791136064-7986c2920216?w=800&q=80"
          alt="Why Eshan Buildwell" />
      </div>
    </div>
  </div>
</section>

<!-- STATS BAR -->
<section class="stats-bar">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
      <div class="stat-item">
        <div class="stat-num">200+</div>
        <div class="stat-label">Projects Completed</div>
      </div>
      <div class="stat-sep d-none d-md-block"></div>
      <div class="stat-item">
        <div class="stat-num">15+</div>
        <div class="stat-label">Years Experience</div>
      </div>
      <div class="stat-sep d-none d-md-block"></div>
      <div class="stat-item">
        <div class="stat-num">500+</div>
        <div class="stat-label">Happy Clients</div>
      </div>
      <div class="stat-sep d-none d-md-block"></div>
      <div class="stat-item">
        <div class="stat-num">100%</div>
        <div class="stat-label">On-Time Delivery</div>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="py-5 bg-white">
  <div class="container">
    <p class="sec-title text-center">Client Testimonials</p>
    <div class="sec-line center mb-4"><span class="sec-sub">What Our Clients Say</span></div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="testi-card">
          <div class="testi-stars">★★★★★</div>
          <blockquote>"Eshan Buildwell delivered our commercial project ahead of schedule with impeccable
            quality. Highly recommended!"</blockquote>
          <div class="testi-author">
            <div class="testi-avatar">RS</div>
            <div><strong>Rajesh Sharma</strong><span>Commercial Project, Delhi</span></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testi-card">
          <div class="testi-stars">★★★★★</div>
          <blockquote>"Transparent pricing with zero hidden costs. The team was professional throughout our
            home renovation."</blockquote>
          <div class="testi-author">
            <div class="testi-avatar">PV</div>
            <div><strong>Priya Verma</strong><span>Luxury Villa, Noida</span></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testi-card">
          <div class="testi-stars">★★★★★</div>
          <blockquote>"Outstanding project management for our industrial facility. Every milestone was met on
            time."</blockquote>
          <div class="testi-author">
            <div class="testi-avatar">AG</div>
            <div><strong>Amit Gupta</strong><span>Industrial Facility, Gurugram</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-strip">
  <div class="container">
    <h2>Get Your Free Construction Estimate Now!</h2>
    <br>
    <a href="calculator.html" class="btn-cta-lg">Get Estimate</a>
  </div>
</section>
@endsection