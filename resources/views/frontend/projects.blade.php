@extends('layouts.master')

@php
$meta_title = "Eshan Buildwell – Expert Construction Services";
$meta_description = "Eshan Buildwell offers expert construction services for residential, commercial, and industrial projects. With 15+ years of experience, we deliver quality workmanship, accurate BOQ preparation, and on-time project completion. Get your free estimate now!";
$keywords = "Eshan Buildwell, construction services, residential construction, commercial construction, industrial construction, project management consultancy, turnkey construction, accurate BOQ preparation, quality workmanship, construction company Delhi NCR";
@endphp
@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop
@section('meta_keywords'){{ $keywords }}@stop

@push('style')
<style>
    .gallery-item {
        transition: all 0.3s ease;
        animation: fadeIn 0.4s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endpush


@section('content')

<section class="hero-banner" style="{{ isset($banner) ? 'background-image:linear-gradient(rgba(15,25,50,0.2), rgba(15,25,50,0.2)), url('.url('storage/'.$banner->banner).');' : '' }}">
    <div class="container">
        <div class="hero-content">
            <h1>{!! isset($banner) ? nl2br(e($banner->name)) : 'Our Featured Projects' !!}</h1>
            <div class="hero-divider"></div>
            <p>{{ isset($banner) ? $banner->tag_line : 'A Showcase of Our Expertise and Quality Work' }}</p>
        </div>
    </div>
</section>
<div class="breadcrumb-bar"><div class="container"><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li><li class="breadcrumb-item active">Projects</li></ol></nav></div></div>

<!-- FEATURED -->
<section class="py-5 bg-white">
  <div class="container">
    <p class="sec-title text-center">🏗️ Our Featured Projects</p>
    <div class="sec-line center mb-4"><span class="sec-sub">A Showcase of Our Expertise and Quality Work</span></div>
    <div class="row g-4 justify-content-center">
      @forelse($featuredProjects as $project)
      <div class="col-12 col-md-6">
        <div class="h-100 border rounded-3 overflow-hidden shadow-sm d-flex flex-column">
          <img src="{{ $project->resolved_image_url }}" alt="{{ $project->image_alt }}" class="w-100" style="height: 250px; object-fit: cover;"/>
          <div class="p-4 bg-light flex-grow-1">
            <h5 class="fw-bold mb-3" style="color:var(--navy)">{{ $project->project_type }}<br><small class="text-secondary fs-6 fw-normal">{{ $project->title }}</small></h5>
            <p class="text-muted mb-0">{{ $project->short_description }}</p>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12 text-center text-muted">
        <p>Stay tuned! Featured projects will be showcased here soon.</p>
      </div>
      @endforelse
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
      @forelse($allProjects as $project)
      @php
        $rawCat = strtolower(trim($project->category));
        // Normalize categories to match the buttons
        $catSlug = match($rawCat) {
            'government', 'mall' => 'commercial',
            default => str_replace(' ', '', $rawCat)
        };
        
        $badgeClass = match($catSlug) {
            'residential' => 'bg-primary',
            'commercial'  => 'bg-secondary',
            'industrial'  => 'bg-dark',
            default       => 'bg-info'
        };
        $statusIcon = str_contains(strtolower($project->status_label), 'progress') ? 'bi-hourglass-split text-warning' : 'bi-check-circle-fill text-success';
      @endphp
      <!-- {{ $project->category }} -->
      <div class="gallery-item" data-cat="{{ $catSlug }}" onclick="openLightbox(this)" style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.05); display:flex; flex-direction:column; position:relative;">
        <img src="{{ $project->resolved_image_url }}" alt="{{ $project->image_alt }}" style="height:220px; width:100%; object-fit:cover; display:block;" />
        <div style="padding:20px; flex-grow:1;">
          <span class="badge {{ $badgeClass }} mb-2">{{ $project->category }}</span>
          <h6 style="color:var(--navy); font-weight:700; margin-bottom:5px; font-size:16px; line-height:1.4;">{{ $project->title }}</h6>
          <p class="fw-bold m-0" style="font-size:14px;"><i class="bi {{ $statusIcon }} me-1"></i> {{ $project->status_label }}</p>
          @if($project->short_description && $catSlug === 'commercial')
            <p class="text-muted small mt-2 mb-0 lh-sm" style="font-size:12px;">{{ $project->short_description }}</p>
          @endif
        </div>
        <div class="overlay"><i class="bi bi-zoom-in"></i></div>
      </div>
      @empty
      <div class="col-12 text-center py-5">
          <p class="text-muted">No projects found in this category.</p>
      </div>
      @endforelse
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  const buttons = document.querySelectorAll('.btn-filter');
  const items = document.querySelectorAll('.gallery-item');
  const commDesc = document.getElementById('commercialDesc');

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      // Active button toggle
      buttons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filterValue = btn.dataset.filter;

      items.forEach(item => {
        const itemCat = item.dataset.cat;
        if (filterValue === 'all' || itemCat === filterValue) {
          item.style.display = 'flex';
        } else {
          item.style.display = 'none';
        }
      });

      // Commercial description toggle
      if (commDesc) {
        if (filterValue === 'commercial' || filterValue === 'all') {
          commDesc.style.display = 'block';
        } else {
          commDesc.style.display = 'none';
        }
      }
    });
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
@endpush



@endsection