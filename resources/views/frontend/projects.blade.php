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
<section class="hero-banner"><div class="container"><div class="hero-content"><h1>Our Featured Projects</h1><div class="hero-divider"></div><p>A Showcase of Our Expertise and Quality Work</p></div></div></section>
<div class="breadcrumb-bar"><div class="container"><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li><li class="breadcrumb-item active">Projects</li></ol></nav></div></div>

<!-- FEATURED -->
<section class="py-5 bg-white">
  <div class="container">
    <p class="sec-title text-center">🏗️ Our Featured Projects</p>
    <div class="sec-line center mb-4"><span class="sec-sub">A Showcase of Our Expertise and Quality Work</span></div>
    <div class="row g-4 justify-content-center">
      <div class="col-12 col-md-6">
        <div class="h-100 border rounded-3 overflow-hidden shadow-sm d-flex flex-column">
          <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=600&q=80" alt="Residential Project" class="w-100" style="height: 250px; object-fit: cover;"/>
          <div class="p-4 bg-light flex-grow-1">
            <h5 class="fw-bold mb-3" style="color:var(--navy)">Residential Project<br><small class="text-secondary fs-6 fw-normal">A32, P-04, Greater Noida</small></h5>
            <p class="text-muted mb-0">Successfully completed within 15 months, this residential project reflects our commitment to structured planning, quality construction, and timely delivery.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="h-100 border rounded-3 overflow-hidden shadow-sm d-flex flex-column">
          <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80" alt="Commercial Project" class="w-100" style="height: 250px; object-fit: cover;"/>
          <div class="p-4 bg-light flex-grow-1">
            <h5 class="fw-bold mb-3" style="color:var(--navy)">Commercial Project<br><small class="text-secondary fs-6 fw-normal">G202, Sector 63, Noida</small></h5>
            <p class="text-muted mb-0">A commercial development project completed in 24 months, showcasing efficient execution, coordination, and adherence to timelines.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center mt-5"><a href="#gallery" class="btn-navy">View All Projects <i class="bi bi-chevron-down ms-1"></i></a></div>
  </div>
</section>

<!-- GALLERY -->
<section class="py-5" style="background:var(--gray-bg)" id="gallery">
  <div class="container">
    <p class="sec-title text-center">Project Gallery</p>
    <div class="sec-line center mb-4"></div>
    <div class="filter-btns d-flex flex-wrap gap-2 justify-content-center mb-5">
      <button class="btn-filter active" data-filter="all">All Projects</button>
      <button class="btn-filter" data-filter="residential">Residential</button>
      <button class="btn-filter" data-filter="commercial">Commercial</button>
      <button class="btn-filter" data-filter="industrial">Industrial</button>
    </div>

    <!-- Commercial Projects Disclaimer -->
    <div class="alert bg-white border border-info shadow-sm mb-4" id="commercialDesc">
      <strong class="text-info-emphasis"><i class="bi bi-info-circle-fill me-2"></i>Commercial Projects (Experience Portfolio):</strong> The following projects are part of professional experience and involvement in individual capacity during previous associations. Eshan Buildwell India does not claim ownership of these projects.
    </div>

    <div class="gallery-grid" id="galleryGrid">
      
      <!-- Residential -->
      <div class="gallery-item" data-cat="residential" onclick="openLightbox(this)" style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.05); display:flex; flex-direction:column; position:relative;">
        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=600&q=80" alt="Residential Project" style="height:220px; width:100%; object-fit:cover; display:block;" />
        <div style="padding:20px; flex-grow:1;">
          <span class="badge bg-primary mb-2">Residential</span>
          <h6 style="color:var(--navy); font-weight:700; margin-bottom:5px; font-size:16px; line-height:1.4;">A32, P-04, Greater Noida</h6>
          <p class="text-success fw-bold m-0" style="font-size:14px;"><i class="bi bi-check-circle-fill me-1"></i> Completed</p>
        </div>
        <div class="overlay"><i class="bi bi-zoom-in"></i></div>
      </div>

      <div class="gallery-item" data-cat="residential" onclick="openLightbox(this)" style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.05); display:flex; flex-direction:column; position:relative;">
        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=600&q=80" alt="Residential Project" style="height:220px; width:100%; object-fit:cover; display:block;" />
        <div style="padding:20px; flex-grow:1;">
          <span class="badge bg-primary mb-2">Residential</span>
          <h6 style="color:var(--navy); font-weight:700; margin-bottom:5px; font-size:16px; line-height:1.4;">Plot No. 195, Sector 27, Gurugram</h6>
          <p class="text-warning fw-bold m-0" style="font-size:14px;"><i class="bi bi-hourglass-split me-1"></i> In Progress</p>
        </div>
        <div class="overlay"><i class="bi bi-zoom-in"></i></div>
      </div>

      <div class="gallery-item" data-cat="residential" onclick="openLightbox(this)" style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.05); display:flex; flex-direction:column; position:relative;">
        <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=600&q=80" alt="Residential Project" style="height:220px; width:100%; object-fit:cover; display:block;" />
        <div style="padding:20px; flex-grow:1;">
          <span class="badge bg-primary mb-2">Residential</span>
          <h6 style="color:var(--navy); font-weight:700; margin-bottom:5px; font-size:16px; line-height:1.4;">Plot No. 35, Sector 18, Yamuna Exp.</h6>
          <p class="text-warning fw-bold m-0" style="font-size:14px;"><i class="bi bi-hourglass-split me-1"></i> In Progress</p>
        </div>
        <div class="overlay"><i class="bi bi-zoom-in"></i></div>
      </div>

      <!-- Commercial (Experience Portfolio) -->
      <div class="gallery-item" data-cat="commercial" onclick="openLightbox(this)" style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.05); display:flex; flex-direction:column; position:relative;">
        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=600&q=80" alt="Commercial Project" style="height:220px; width:100%; object-fit:cover; display:block;" />
        <div style="padding:20px; flex-grow:1;">
          <span class="badge bg-secondary mb-2">Commercial</span>
          <h6 style="color:var(--navy); font-weight:700; margin-bottom:5px; font-size:16px; line-height:1.4;">G202, Sector 63, Noida</h6>
          <p class="text-success fw-bold m-0" style="font-size:14px;"><i class="bi bi-check-circle-fill me-1"></i> Completed</p>
        </div>
        <div class="overlay"><i class="bi bi-zoom-in"></i></div>
      </div>

      <div class="gallery-item" data-cat="commercial" onclick="openLightbox(this)" style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.05); display:flex; flex-direction:column; position:relative;">
        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80" alt="Commercial Project" style="height:220px; width:100%; object-fit:cover; display:block;" />
        <div style="padding:20px; flex-grow:1;">
          <span class="badge bg-secondary mb-2">Commercial</span>
          <h6 style="color:var(--navy); font-weight:700; margin-bottom:5px; font-size:16px; line-height:1.4;">Gallexie 91 Mall, Gurugram</h6>
          <p class="text-success fw-bold mb-1" style="font-size:14px;"><i class="bi bi-check-circle-fill me-1"></i> Structure Completed</p>
          <p class="text-muted small m-0 lh-sm" style="font-size:12px;">With MBPL / Axon Developers.</p>
        </div>
        <div class="overlay"><i class="bi bi-zoom-in"></i></div>
      </div>

      <div class="gallery-item" data-cat="commercial" onclick="openLightbox(this)" style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.05); display:flex; flex-direction:column; position:relative;">
        <img src="https://images.unsplash.com/photo-1554469384-e58fac16e23a?w=600&q=80" alt="Commercial Project" style="height:220px; width:100%; object-fit:cover; display:block;" />
        <div style="padding:20px; flex-grow:1;">
          <span class="badge bg-secondary mb-2">Commercial</span>
          <h6 style="color:var(--navy); font-weight:700; margin-bottom:5px; font-size:16px; line-height:1.4;">Dept of Science & Technology</h6>
          <p class="text-success fw-bold mb-1" style="font-size:14px;"><i class="bi bi-check-circle-fill me-1"></i> Completed</p>
          <p class="text-muted small m-0 lh-sm" style="font-size:12px;">Phase-1 approx. ₹100 Cr (PCEPL).</p>
        </div>
        <div class="overlay"><i class="bi bi-zoom-in"></i></div>
      </div>

      <div class="gallery-item" data-cat="commercial" onclick="openLightbox(this)" style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.05); display:flex; flex-direction:column; position:relative;">
        <img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=600&q=80" alt="Commercial Project" style="height:220px; width:100%; object-fit:cover; display:block;" />
        <div style="padding:20px; flex-grow:1;">
          <span class="badge bg-secondary mb-2">Commercial</span>
          <h6 style="color:var(--navy); font-weight:700; margin-bottom:5px; font-size:16px; line-height:1.4;">Ocus 24K Mall, Gurugram</h6>
          <p class="text-success fw-bold mb-1" style="font-size:14px;"><i class="bi bi-check-circle-fill me-1"></i> Completed</p>
          <p class="text-muted small m-0 lh-sm" style="font-size:12px;">With Ocus Skyscrapers Realty Ltd.</p>
        </div>
        <div class="overlay"><i class="bi bi-zoom-in"></i></div>
      </div>

      <!-- Industrial Projects -->
      <div class="gallery-item" data-cat="industrial" onclick="openLightbox(this)" style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.05); display:flex; flex-direction:column; position:relative;">
        <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=600&q=80" alt="Industrial Project" style="height:220px; width:100%; object-fit:cover; display:block;" />
        <div style="padding:20px; flex-grow:1;">
          <span class="badge bg-dark mb-2">Industrial</span>
          <h6 style="color:var(--navy); font-weight:700; margin-bottom:5px; font-size:16px; line-height:1.4;">Plot No. A246, Sec 33, Yamuna Exp</h6>
          <p class="text-warning fw-bold m-0" style="font-size:14px;"><i class="bi bi-hourglass-split me-1"></i> In Progress</p>
        </div>
        <div class="overlay"><i class="bi bi-zoom-in"></i></div>
      </div>

      <div class="gallery-item" data-cat="industrial" onclick="openLightbox(this)" style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.05); display:flex; flex-direction:column; position:relative;">
        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80" alt="Industrial Project" style="height:220px; width:100%; object-fit:cover; display:block;" />
        <div style="padding:20px; flex-grow:1;">
          <span class="badge bg-dark mb-2">Industrial</span>
          <h6 style="color:var(--navy); font-weight:700; margin-bottom:5px; font-size:16px; line-height:1.4;">Plot No. A220, Sec 33, Yamuna Exp</h6>
          <p class="text-warning fw-bold m-0" style="font-size:14px;"><i class="bi bi-hourglass-split me-1"></i> In Progress</p>
        </div>
        <div class="overlay"><i class="bi bi-zoom-in"></i></div>
      </div>

    </div>
  </div>
</section>

<div class="lightbox" id="lightbox" onclick="closeLightbox(event)">
  <button class="lightbox-close" onclick="closeLightbox()"><i class="bi bi-x-lg"></i></button>
  <img id="lightboxImg" src="" alt=""/>
</div>
<section class="cta-strip">
  <div class="container">
    <h2>Ready to Build Your Dream Project?</h2><br>
    <a href="{{ url('calculator') }}" class="btn-cta-lg">Get Your Free Estimate</a>
  </div>
</section>

<script>
document.querySelectorAll('.btn-filter').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.btn-filter').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const f = btn.dataset.filter;
    
    // Toggle gallery items
    document.querySelectorAll('.gallery-item').forEach(item => {
      item.classList.toggle('hidden', f !== 'all' && item.dataset.cat !== f);
    });
    
    // Toggle the commercial description alert specially
    const commDesc = document.getElementById('commercialDesc');
    if(f === 'commercial' || f === 'all') {
       commDesc.style.display = 'block';
    } else {
       commDesc.style.display = 'none';
    }
  });
});

function openLightbox(el) {
  const imgElement = el.querySelector('img');
  if (imgElement && imgElement.src) {
    document.getElementById('lightboxImg').src = imgElement.src;
    document.getElementById('lightbox').classList.add('show');
  }
}
function closeLightbox(e) {
  if (!e || e.target !== document.getElementById('lightboxImg')) {
    document.getElementById('lightbox').classList.remove('show');
  }
}
document.querySelector('.lightbox-close').addEventListener('click', () => document.getElementById('lightbox').classList.remove('show'));
</script>

@endsection