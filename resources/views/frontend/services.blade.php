@extends('layouts.master')

@php
$meta_title = "Eshan Buildwell – Expert Construction Services";
$meta_description = "Eshan Buildwell offers expert construction services for residential, commercial, and industrial projects. With 15+ years of experience, we deliver quality workmanship, accurate BOQ preparation, and on-time project completion. Get your free estimate now!";
$keywords = "Eshan Buildwell, construction services, residential construction, commercial construction, industrial construction, project management consultancy, turnkey construction, accurate BOQ preparation, quality workmanship, construction company Delhi NCR";
@endphp
@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop
@section('meta_keywords'){{ $keywords }}@stop

@section('content')
<section class="hero-banner">
  <div class="container"><div class="hero-content"><h1>Expert Construction Services</h1><div class="hero-divider"></div><p>For <strong style="color:var(--orange)">Residential, Commercial</strong> &amp; <strong style="color:var(--orange)">Industrial</strong> Projects</p></div></div>
</section>

<div class="trust-bar"><div class="container"><div class="d-flex align-items-center justify-content-between flex-wrap gap-2"><div class="trust-item"><i class="bi bi-clipboard-check"></i> Accurate BOQ Preparation</div><div class="trust-sep d-none d-md-block"></div><div class="trust-item"><i class="bi bi-currency-rupee"></i> Transparent Pricing</div><div class="trust-sep d-none d-md-block"></div><div class="trust-item"><i class="bi bi-clock"></i> On-Time Delivery</div><div class="trust-sep d-none d-md-block"></div><div class="trust-item"><i class="bi bi-star"></i> Quality Workmanship</div><div class="trust-sep d-none d-md-block"></div><div class="trust-item"><i class="bi bi-trophy"></i> Proven Results</div></div></div></div>

<div class="breadcrumb-bar"><div class="container"><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.html">Home</a></li><li class="breadcrumb-item active">Services</li></ol></nav></div></div>

<!-- INTRO -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-12 col-lg-6">
        <p class="sec-eyebrow">What We Offer</p>
        <h2 class="sec-title mb-2">Our Services</h2>
        <div class="sec-line mb-3"></div>
        <p class="sec-sub mb-3">We provide end-to-end construction solutions with precision &amp; quality. From initial planning to final handover, our expert team handles every aspect of your project.</p>
        <p class="sec-sub">With decades of experience across residential, commercial, and industrial projects, we bring unmatched expertise to every build.</p>
      </div>
      <div class="col-12 col-lg-6">
        <div class="row g-3">
          <div class="col-6"><div class="p-3 rounded-3 text-center" style="background:var(--orange-lt);border:1px solid rgba(232,119,34,.15)"><i class="bi bi-house-fill fs-2 mb-2 d-block" style="color:var(--orange)"></i><div style="font-family:'Barlow Condensed',sans-serif;font-weight:700;color:var(--navy)">Residential</div><div class="small text-muted">Homes &amp; Villas</div></div></div>
          <div class="col-6"><div class="p-3 rounded-3 text-center" style="background:rgba(26,42,74,.05);border:1px solid rgba(26,42,74,.1)"><i class="bi bi-building-fill fs-2 mb-2 d-block" style="color:var(--navy)"></i><div style="font-family:'Barlow Condensed',sans-serif;font-weight:700;color:var(--navy)">Commercial</div><div class="small text-muted">Offices &amp; Retail</div></div></div>
          <div class="col-6"><div class="p-3 rounded-3 text-center" style="background:rgba(26,42,74,.05);border:1px solid rgba(26,42,74,.1)"><i class="bi bi-gear-fill fs-2 mb-2 d-block" style="color:var(--navy)"></i><div style="font-family:'Barlow Condensed',sans-serif;font-weight:700;color:var(--navy)">Industrial</div><div class="small text-muted">Factories &amp; Plants</div></div></div>
          <div class="col-6"><div class="p-3 rounded-3 text-center" style="background:var(--orange-lt);border:1px solid rgba(232,119,34,.15)"><i class="bi bi-tools fs-2 mb-2 d-block" style="color:var(--orange)"></i><div style="font-family:'Barlow Condensed',sans-serif;font-weight:700;color:var(--navy)">Renovation</div><div class="small text-muted">Rebuild &amp; Upgrade</div></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CORE SERVICES -->
<section class="py-5" style="background:var(--gray-bg)">
  <div class="container">
    <div class="text-center mb-5">
      <p class="sec-eyebrow">We Build with Precision</p>
      <h2 class="sec-title">Our Core Services</h2>
      <div class="sec-line center"><span class="sec-sub">Comprehensive construction solutions tailored to your needs</span></div>
    </div>
    <div class="row g-4">
      <div class="col-12 col-md-6 col-lg-4"><div class="svc-card"><div class="svc-img-wrap"><img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=700&q=80" alt="Building Construction"/><span class="svc-badge">Residential &amp; Commercial</span></div><div class="svc-body"><h4>Building Construction</h4><p>Complete construction for residential, commercial &amp; industrial projects with quality workmanship and end-to-end execution control.</p><ul class="feat-list"><li><i class="bi bi-check-circle-fill"></i>Site supervision &amp; execution control</li><li><i class="bi bi-check-circle-fill"></i>Quality material sourcing &amp; procurement</li><li><i class="bi bi-check-circle-fill"></i>Structural &amp; civil engineering works</li><li><i class="bi bi-check-circle-fill"></i>MEP (Mechanical, Electrical &amp; Plumbing)</li></ul><a href="contact.html" class="btn-read">Read More <i class="bi bi-arrow-right"></i></a></div></div></div>
      <div class="col-12 col-md-6 col-lg-4"><div class="svc-card"><div class="svc-img-wrap"><img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=700&q=80" alt="Turnkey Construction"/><span class="svc-badge">End-to-End</span></div><div class="svc-body"><h4>Turnkey Construction</h4><p>End-to-end service (Design → Planning → Construction → Handover). One contract, one team, zero hassle.</p><ul class="feat-list"><li><i class="bi bi-check-circle-fill"></i>All aspects in a single contract</li><li><i class="bi bi-check-circle-fill"></i>Architectural design &amp; layout planning</li><li><i class="bi bi-check-circle-fill"></i>Interior fit-out &amp; finishing works</li><li><i class="bi bi-check-circle-fill"></i>Ready-to-occupy handover</li></ul><a href="contact.html" class="btn-read">Read More <i class="bi bi-arrow-right"></i></a></div></div></div>
      <div class="col-12 col-md-6 col-lg-4"><div class="svc-card"><div class="svc-img-wrap"><img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=700&q=80" alt="PMC"/><span class="svc-badge">PMC</span></div><div class="svc-body"><h4>Project Management Consultancy (PMC)</h4><p>Expert consultancy for project oversight, contractor coordination, and risk management.</p><ul class="feat-list"><li><i class="bi bi-check-circle-fill"></i>Contractor selection guidance</li><li><i class="bi bi-check-circle-fill"></i>Site monitoring &amp; risk reduction</li><li><i class="bi bi-check-circle-fill"></i>Timeline management &amp; reporting</li><li><i class="bi bi-check-circle-fill"></i>Budget tracking &amp; cost control</li></ul><a href="contact.html" class="btn-read">Read More <i class="bi bi-arrow-right"></i></a></div></div></div>
      <div class="col-12 col-md-6 col-lg-4"><div class="svc-card"><div class="svc-img-wrap"><img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=700&q=80" alt="Renovation"/><span class="svc-badge">Renovation</span></div><div class="svc-body"><h4>Home Renovation &amp; Remodelling</h4><p>Transform your existing space with our expert renovation services — from room makeovers to complete overhauls.</p><ul class="feat-list"><li><i class="bi bi-check-circle-fill"></i>Kitchen &amp; bathroom upgrades</li><li><i class="bi bi-check-circle-fill"></i>Flooring, painting &amp; false ceiling</li><li><i class="bi bi-check-circle-fill"></i>Structural repair &amp; waterproofing</li></ul><a href="contact.html" class="btn-read">Read More <i class="bi bi-arrow-right"></i></a></div></div></div>
      <div class="col-12 col-md-6 col-lg-4"><div class="svc-card"><div class="svc-img-wrap"><img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=700&q=80" alt="Interior Design"/><span class="svc-badge">Interiors</span></div><div class="svc-body"><h4>Interior Design &amp; Fit-Out</h4><p>Professional interior design that combines aesthetics with functionality for beautiful, practical spaces.</p><ul class="feat-list"><li><i class="bi bi-check-circle-fill"></i>3D design visualisation</li><li><i class="bi bi-check-circle-fill"></i>Custom furniture &amp; joinery</li><li><i class="bi bi-check-circle-fill"></i>Commercial office fit-outs</li></ul><a href="contact.html" class="btn-read">Read More <i class="bi bi-arrow-right"></i></a></div></div></div>
      <div class="col-12 col-md-6 col-lg-4"><div class="svc-card"><div class="svc-img-wrap"><img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=700&q=80" alt="BOQ"/><span class="svc-badge">Estimation</span></div><div class="svc-body"><h4>BOQ Preparation &amp; Cost Estimation</h4><p>Accurate Bill of Quantities and detailed cost estimation to help you budget effectively.</p><ul class="feat-list"><li><i class="bi bi-check-circle-fill"></i>Detailed item-wise cost breakdown</li><li><i class="bi bi-check-circle-fill"></i>Market-rate material pricing</li><li><i class="bi bi-check-circle-fill"></i>Tender document preparation</li></ul><a href="calculator.html" class="btn-read">Get Estimate <i class="bi bi-arrow-right"></i></a></div></div></div>
    </div>
  </div>
</section>

<!-- PROCESS -->
<section style="background:var(--navy);padding:60px 0">
  <div class="container">
    <div class="text-center mb-5">
      <p class="sec-eyebrow" style="color:rgba(255,255,255,.6)">How We Work</p>
      <h2 class="sec-title" style="color:#fff">Our Construction Process</h2>
      <p class="sec-sub mx-auto mt-2" style="color:rgba(255,255,255,.6)">A streamlined, transparent approach that keeps you informed at every stage</p>
    </div>
    <div class="row g-3 align-items-center">
      <div class="col-6 col-md-4 col-lg"><div class="step-card"><div class="step-num">01</div><h5>Consultation</h5><p>Free initial meeting to understand your requirements</p></div></div>
      <div class="col-auto step-arrow d-none d-lg-flex"><i class="bi bi-chevron-right"></i></div>
      <div class="col-6 col-md-4 col-lg"><div class="step-card"><div class="step-num">02</div><h5>Planning &amp; Design</h5><p>Detailed architectural drawings, BOQ &amp; cost estimation</p></div></div>
      <div class="col-auto step-arrow d-none d-lg-flex"><i class="bi bi-chevron-right"></i></div>
      <div class="col-6 col-md-4 col-lg"><div class="step-card"><div class="step-num">03</div><h5>Approvals</h5><p>Permit applications and regulatory compliance handled</p></div></div>
      <div class="col-auto step-arrow d-none d-lg-flex"><i class="bi bi-chevron-right"></i></div>
      <div class="col-6 col-md-4 col-lg"><div class="step-card"><div class="step-num">04</div><h5>Construction</h5><p>Execution with daily supervision and quality checks</p></div></div>
      <div class="col-auto step-arrow d-none d-lg-flex"><i class="bi bi-chevron-right"></i></div>
      <div class="col-6 col-md-4 col-lg"><div class="step-card"><div class="step-num">05</div><h5>Handover</h5><p>Final inspection, snag list clearance and key handover</p></div></div>
    </div>
  </div>
</section>

<!-- WHY CHOOSE -->
<section class="why-sec">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-12 col-lg-5"><img class="why-img" src="https://images.unsplash.com/photo-1521791136064-7986c2920216?w=800&q=80" alt="Why Choose Us"/></div>
      <div class="col-12 col-lg-7">
        <p class="sec-eyebrow">Why Us</p>
        <h2 class="sec-title mb-1">Why Choose Eshan Buildwell?</h2>
        <div class="sec-line mb-4"></div>
        <div class="why-point"><div class="why-icon"><i class="bi bi-people-fill"></i></div><div><h5>Experienced Team</h5><p>Skilled engineers, architects &amp; project managers ensuring quality execution.</p></div></div>
        <div class="why-point"><div class="why-icon"><i class="bi bi-patch-check-fill"></i></div><div><h5>Customized Solutions</h5><p>Every project is unique — we tailor our approach to meet your specific requirements.</p></div></div>
        <div class="why-point"><div class="why-icon"><i class="bi bi-currency-rupee"></i></div><div><h5>Competitive Pricing</h5><p>Transparent costing with no hidden charges and value-engineered solutions.</p></div></div>
        <div class="why-point"><div class="why-icon"><i class="bi bi-star-fill"></i></div><div><h5>Client Satisfaction</h5><p>Proven track record across 200+ completed projects. Your satisfaction is our benchmark.</p></div></div>
        <a href="about.html" class="btn-read mt-2">Learn More About Us <i class="bi bi-chevron-right"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<section class="stats-bar">
  <div class="container"><div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div class="stat-item"><div class="stat-num">200+</div><div class="stat-label">Projects Completed</div></div>
    <div class="stat-sep d-none d-md-block"></div>
    <div class="stat-item"><div class="stat-num">15+</div><div class="stat-label">Years Experience</div></div>
    <div class="stat-sep d-none d-md-block"></div>
    <div class="stat-item"><div class="stat-num">500+</div><div class="stat-label">Happy Clients</div></div>
    <div class="stat-sep d-none d-md-block"></div>
    <div class="stat-item"><div class="stat-num">50+</div><div class="stat-label">Expert Team Members</div></div>
    <div class="stat-sep d-none d-md-block"></div>
    <div class="stat-item"><div class="stat-num">100%</div><div class="stat-label">On-Time Delivery</div></div>
  </div></div>
</section>

<!-- SPECIALIZED -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="text-center mb-5"><p class="sec-eyebrow">Additional Expertise</p><h2 class="sec-title">Specialized Services</h2><div class="sec-line center"><span class="sec-sub">Beyond core construction — value-added services for complete project support</span></div></div>
    <div class="row g-3">
      <div class="col-12 col-sm-6 col-lg-4"><div class="spec-card"><div class="spec-icon"><i class="bi bi-geo-alt-fill"></i></div><div><h5>Site Survey &amp; Soil Testing</h5><p>Comprehensive site analysis including soil bearing capacity and topography assessment before breaking ground.</p></div></div></div>
      <div class="col-12 col-sm-6 col-lg-4"><div class="spec-card"><div class="spec-icon"><i class="bi bi-droplet-fill"></i></div><div><h5>Waterproofing Solutions</h5><p>Advanced waterproofing for roofs, basements, bathrooms, and external facades using premium materials.</p></div></div></div>
      <div class="col-12 col-sm-6 col-lg-4"><div class="spec-card"><div class="spec-icon"><i class="bi bi-lightning-fill"></i></div><div><h5>Electrical &amp; Plumbing Works</h5><p>Complete MEP services including wiring, switchgear, plumbing, and drainage by certified technicians.</p></div></div></div>
      <div class="col-12 col-sm-6 col-lg-4"><div class="spec-card"><div class="spec-icon"><i class="bi bi-paint-bucket"></i></div><div><h5>External &amp; Internal Finishing</h5><p>Premium plastering, tiling, painting, and decorative finishes that elevate your property's appeal.</p></div></div></div>
      <div class="col-12 col-sm-6 col-lg-4"><div class="spec-card"><div class="spec-icon"><i class="bi bi-file-earmark-text-fill"></i></div><div><h5>Building Plan Approval</h5><p>Liaison with local municipal authorities for plan sanction, permits, and completion certificates.</p></div></div></div>
      <div class="col-12 col-sm-6 col-lg-4"><div class="spec-card"><div class="spec-icon"><i class="bi bi-shield-check"></i></div><div><h5>Quality Audit &amp; Inspection</h5><p>Third-party quality audit services to verify workmanship standards at every critical milestone.</p></div></div></div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="py-5" style="background:var(--gray-bg)">
  <div class="container">
    <div class="text-center mb-5"><p class="sec-eyebrow">Client Testimonials</p><h2 class="sec-title">What Our Clients Say</h2><div class="sec-line center"></div></div>
    <div class="row g-4">
      <div class="col-12 col-md-4"><div class="testi-card"><div class="testi-stars">★★★★★</div><blockquote>"Eshan Buildwell delivered our commercial project ahead of schedule. The quality of workmanship is outstanding and pricing was completely transparent."</blockquote><div class="testi-author"><div class="testi-avatar">RS</div><div><strong>Rajesh Sharma</strong><span>Commercial Project, Delhi</span></div></div></div></div>
      <div class="col-12 col-md-4"><div class="testi-card"><div class="testi-stars">★★★★★</div><blockquote>"Their turnkey service was exactly what we needed. One point of contact, zero confusion. The team handled everything seamlessly."</blockquote><div class="testi-author"><div class="testi-avatar">PV</div><div><strong>Priya Verma</strong><span>Luxury Villa, Noida</span></div></div></div></div>
      <div class="col-12 col-md-4"><div class="testi-card"><div class="testi-stars">★★★★★</div><blockquote>"The BOQ preparation saved us lakhs in cost overruns. Their PMC team monitored every rupee and ensured the facility was built to spec."</blockquote><div class="testi-author"><div class="testi-avatar">AG</div><div><strong>Amit Gupta</strong><span>Industrial Facility, Gurugram</span></div></div></div></div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-strip">
  <div class="container">
    <h2>Ready to Build Your Dream Project?</h2>
    <p>Get a free consultation and accurate estimate from our expert team today.</p>
    <div class="d-flex flex-wrap justify-content-center gap-3">
      <a href="calculator.html" class="btn-cta-lg"><i class="bi bi-calculator"></i> Get Your Free Estimate</a>
      <a href="contact.html" class="btn-cta-outline"><i class="bi bi-telephone-fill"></i> Contact Us</a>
    </div>
  </div>
</section>

@endsection