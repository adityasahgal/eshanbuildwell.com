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

<div class="breadcrumb-bar"><div class="container"><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li><li class="breadcrumb-item active">Services</li></ol></nav></div></div>

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
      <h2 class="sec-title">Our Premium Services</h2>
      <div class="sec-line center"><span class="sec-sub">Comprehensive construction solutions tailored to your needs</span></div>
    </div>
    <div class="row g-4">
      <div class="col-12 col-md-6 col-lg-4"><div class="svc-card"><div class="svc-img-wrap"><img src="https://images.unsplash.com/photo-1541888081-0113f8d29864?w=700&q=80" alt="Building Construction"/><span class="svc-badge">Construction</span></div><div class="svc-body"><h4>Building Construction</h4><p>Complete construction services for residential, commercial, and industrial projects with proper planning, discipline, and cost control.</p><ul class="feat-list"><li><i class="bi bi-check-circle-fill"></i>Residential, Commercial &amp; Industrial</li><li><i class="bi bi-check-circle-fill"></i>Turnkey Construction Solutions</li><li><i class="bi bi-check-circle-fill"></i>Strong Quality Control</li><li><i class="bi bi-check-circle-fill"></i>Experienced Site Supervision</li></ul><a href="{{ url('contact-us') }}" class="btn-read">Get in touch <i class="bi bi-arrow-right"></i></a></div></div></div>
      <div class="col-12 col-md-6 col-lg-4"><div class="svc-card"><div class="svc-img-wrap"><img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=700&q=80" alt="PMC"/><span class="svc-badge">PMC</span></div><div class="svc-body"><h4>Project Management Consultancy</h4><p>Ensure your project is executed professionally with proper coordination, monitoring, and cost control at every stage.</p><ul class="feat-list"><li><i class="bi bi-check-circle-fill"></i>Project Planning &amp; Scheduling</li><li><i class="bi bi-check-circle-fill"></i>Contractor &amp; Vendor Coordination</li><li><i class="bi bi-check-circle-fill"></i>Quality Assurance &amp; Inspection</li><li><i class="bi bi-check-circle-fill"></i>Cost Monitoring &amp; Budget Control</li></ul><a href="{{ url('contact-us') }}" class="btn-read">Get in touch <i class="bi bi-arrow-right"></i></a></div></div></div>
      <div class="col-12 col-md-6 col-lg-4"><div class="svc-card"><div class="svc-img-wrap"><img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=700&q=80" alt="Turnkey"/><span class="svc-badge">Turnkey</span></div><div class="svc-body"><h4>Turnkey Construction</h4><p>A complete solution from design to final handover under one contract, ensuring hassle-free project execution.</p><ul class="feat-list"><li><i class="bi bi-check-circle-fill"></i>Design + Planning + Execution</li><li><i class="bi bi-check-circle-fill"></i>Material &amp; Labour Management</li><li><i class="bi bi-check-circle-fill"></i>Complete Construction Responsibility</li><li><i class="bi bi-check-circle-fill"></i>Final Ready-to-Use Delivery</li></ul><a href="{{ url('contact-us') }}" class="btn-read">Get in touch <i class="bi bi-arrow-right"></i></a></div></div></div>
      <div class="col-12 col-md-6 col-lg-4"><div class="svc-card"><div class="svc-img-wrap"><img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=700&q=80" alt="Estimation"/><span class="svc-badge">Estimation</span></div><div class="svc-body"><h4>Estimation &amp; Costing</h4><p>Accurate estimation is the foundation of success. We provide detailed BOQ and cost planning to ensure financial clarity.</p><ul class="feat-list"><li><i class="bi bi-check-circle-fill"></i>BOQ Preparation</li><li><i class="bi bi-check-circle-fill"></i>Material Rate Analysis</li><li><i class="bi bi-check-circle-fill"></i>Labour Cost Estimation</li><li><i class="bi bi-check-circle-fill"></i>Better Budget Planning</li></ul><a href="{{ url('calculator') }}" class="btn-read">Get in touch <i class="bi bi-arrow-right"></i></a></div></div></div>
      <div class="col-12 col-md-6 col-lg-4"><div class="svc-card"><div class="svc-img-wrap"><img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=700&q=80" alt="Architecture"/><span class="svc-badge">Architecture</span></div><div class="svc-body"><h4>Architecture &amp; Structural Design</h4><p>Smart and practical design solutions combining beautiful aesthetics with structural safety and functionality.</p><ul class="feat-list"><li><i class="bi bi-check-circle-fill"></i>Architectural Layout Planning</li><li><i class="bi bi-check-circle-fill"></i>2D &amp; 3D Design</li><li><i class="bi bi-check-circle-fill"></i>Structural Design &amp; Analysis</li><li><i class="bi bi-check-circle-fill"></i>Working Drawings</li></ul><a href="{{ url('contact-us') }}" class="btn-read">Get in touch <i class="bi bi-arrow-right"></i></a></div></div></div>
      <div class="col-12 col-md-6 col-lg-4"><div class="svc-card"><div class="svc-img-wrap"><img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=700&q=80" alt="Landowner Collaboration"/><span class="svc-badge">Collaboration</span></div><div class="svc-body"><h4>Landowner Collaboration Service</h4><p>We partner with landowners to develop projects through transparent agreements and professional execution.</p><ul class="feat-list"><li><i class="bi bi-check-circle-fill"></i>Joint Development Projects</li><li><i class="bi bi-check-circle-fill"></i>Profit Sharing Models</li><li><i class="bi bi-check-circle-fill"></i>Project Planning &amp; Execution</li><li><i class="bi bi-check-circle-fill"></i>Legal &amp; Liaison Support</li></ul><a href="{{ url('contact-us') }}" class="btn-read">Get in touch <i class="bi bi-arrow-right"></i></a></div></div></div>
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
    <div class="row g-4 align-items-stretch">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="step-card h-100">
          <div class="step-num">01</div>
          <h5>Consultation</h5>
          <p>We begin with understanding your requirements, vision, and budget. This stage helps us align expectations and define the project scope clearly.</p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="step-card h-100">
          <div class="step-num">02</div>
          <h5>Approx Estimate</h5>
          <p>Based on initial inputs, we provide a rough cost estimate to give you a clear idea of project feasibility and budget planning.</p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="step-card h-100">
          <div class="step-num">03</div>
          <h5>Design &amp; Planning</h5>
          <p>Our team develops architectural designs and detailed planning, ensuring proper space utilization, functionality, and execution strategy.</p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="step-card h-100">
          <div class="step-num">04</div>
          <h5>Accurate Costing</h5>
          <p>We prepare a detailed BOQ and cost analysis with material specifications, ensuring transparency and eliminating hidden costs.</p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="step-card h-100">
          <div class="step-num">05</div>
          <h5>Construction</h5>
          <p>Execution begins with strict quality control, site supervision, and regular coordination to ensure timely and disciplined project delivery.</p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="step-card h-100">
          <div class="step-num">06</div>
          <h5>Handover</h5>
          <p>After completion, we deliver the project with proper finishing, quality checks, and final approvals—ready for use.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- WHY CHOOSE - SERVICES PAGE (Unique content) -->
<section class="py-5" style="background:var(--gray-bg)">
    <div class="container">
        <p class="sec-title text-center">What Makes Our Services Different?</p>
        <div class="sec-line center mb-4"><span class="sec-sub">Built on process, not just promises</span></div>
        <div class="row g-4">
            <div class="col-12 col-md-6">
                <div class="feat-card">
                    <div class="feat-icon"><i class="bi bi-diagram-2-fill"></i></div>
                    <div>
                        <h5>Structured Project Process</h5>
                        <p>From consultation to handover, every project follows a defined 6-stage process — ensuring nothing is missed and every stakeholder is aligned at each milestone.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="feat-card">
                    <div class="feat-icon"><i class="bi bi-file-earmark-ruled-fill"></i></div>
                    <div>
                        <h5>BOQ-Backed Service Delivery</h5>
                        <p>Every service we provide — from construction to PMC — is backed by a detailed Bill of Quantities so clients understand exactly what they are paying for.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="feat-card">
                    <div class="feat-icon"><i class="bi bi-telephone-inbound-fill"></i></div>
                    <div>
                        <h5>Dedicated Service Support</h5>
                        <p>Each client gets a dedicated project contact who is reachable throughout the project lifecycle for queries, updates, and issue resolution.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="feat-card">
                    <div class="feat-icon"><i class="bi bi-arrow-repeat"></i></div>
                    <div>
                        <h5>Post-Completion Follow-Up</h5>
                        <p>Our relationship doesn't end at handover. We conduct post-completion reviews and remain available for any structural or maintenance guidance needed afterwards.</p>
                    </div>
                </div>
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
    <div class="text-center mb-5"><p class="sec-eyebrow">Comprehensive Solutions</p><h2 class="sec-title">Additional Services</h2><div class="sec-line center"><span class="sec-sub">Beyond core construction — value-added services for complete project support</span></div></div>
    <div class="row g-3">
      <div class="col-12 col-sm-6 col-lg-4"><div class="spec-card"><div class="spec-icon"><i class="bi bi-box-fill"></i></div><div><h5>Building Information Modeling (BIM)</h5><p>Advanced BIM services for accurate visualization, coordination, and clash detection, ensuring error-free execution.</p></div></div></div>
      <div class="col-12 col-sm-6 col-lg-4"><div class="spec-card"><div class="spec-icon"><i class="bi bi-receipt"></i></div><div><h5>Construction Bills Audit</h5><p>Verify contractor bills and quantities to ensure accuracy, transparency, and fair cost control throughout the project.</p></div></div></div>
      <div class="col-12 col-sm-6 col-lg-4"><div class="spec-card"><div class="spec-icon"><i class="bi bi-window-fullscreen"></i></div><div><h5>External Facade Services</h5><p>Design and execution of modern building facades to enhance aesthetics, durability, and overall building value.</p></div></div></div>
      <div class="col-12 col-sm-6 col-lg-4"><div class="spec-card"><div class="spec-icon"><i class="bi bi-file-earmark-check-fill"></i></div><div><h5>Building Plan Approval</h5><p>Complete assistance in getting building plans approved from local authorities with proper liaison support.</p></div></div></div>
      <div class="col-12 col-sm-6 col-lg-4"><div class="spec-card"><div class="spec-icon"><i class="bi bi-shield-check"></i></div><div><h5>Quality Audit &amp; Inspection</h5><p>Independent quality checks and inspections to ensure construction work meets required standards and safety norms.</p></div></div></div>
      <div class="col-12 col-sm-6 col-lg-4"><div class="spec-card"><div class="spec-icon"><i class="bi bi-paint-bucket"></i></div><div><h5>External &amp; Internal Finishing</h5><p>End-to-end finishing services including plaster, paint, flooring, and interiors to deliver a complete space.</p></div></div></div>
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
      <a href="{{ url('calculator') }}" class="btn-cta-lg"><i class="bi bi-calculator"></i> Get Your Free Estimate</a>
      <a href="{{ url('contact-us') }}" class="btn-cta-outline"><i class="bi bi-telephone-fill"></i> Contact Us</a>
    </div>
  </div>
</section>

@endsection