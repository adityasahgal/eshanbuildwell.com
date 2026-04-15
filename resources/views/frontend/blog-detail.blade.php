<?php
$genSetting = \App\Models\Setting::first();
?>
@extends('layouts.master')

@section('meta_title'){{ $blogDetail->meta_title }}@stop

@section('meta_description'){{ $blogDetail->meta_description }}@stop

@section('meta_keywords'){{ $blogDetail->keywords }}@stop

@section('content')
<section class="hero-banner" style="background-image:url('{{ url('storage/'.$blogDetail->banner) }}')">
  <div class="container"><div class="hero-content">
    <span class="cat-badge">Blog</span>
    <h1>{{ $blogDetail->name }}</h1>
    <div class="hero-meta"><span><i class="bi bi-calendar3"></i>{{ date('d F Y', strtotime($blogDetail->created_at)) }}</span><span><i class="bi bi-person-fill"></i>Admin</span></div>
  </div></div>
</section>
<div class="breadcrumb-bar"><div class="container"><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li><li class="breadcrumb-item"><a href="{{ url('blogs') }}">Blog</a></li><li class="breadcrumb-item active">{{ $blogDetail->name }}</li></ol></nav></div></div>

<!-- LAYOUT -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="row g-5">
      <!-- ARTICLE -->
      <div class="col-12 col-lg-8">
        <article class="article-body">
          <img class="feat-img" src="{{ url('storage/'.$blogDetail->banner) }}" alt="{{ $blogDetail->image_alt ?? $blogDetail->name }}"/>
          
          <div class="my-4">
              {!! $blogDetail->description !!}
          </div>

          <div class="mt-3 mb-2"><strong style="font-size:.85rem;color:var(--navy)" class="me-2">Tags:</strong><a href="#" class="tag">Construction</a></div>
          <div class="share-bar"><span class="label"><i class="bi bi-share-fill me-1" style="color:var(--orange)"></i> Share This Article:</span><a href="#" class="share-btn"><i class="bi bi-facebook"></i> Facebook</a><a href="#" class="share-btn"><i class="bi bi-twitter-x"></i> Twitter</a><a href="#" class="share-btn"><i class="bi bi-whatsapp"></i> WhatsApp</a><a href="#" class="share-btn"><i class="bi bi-linkedin"></i> LinkedIn</a><a href="#" class="share-btn" id="copyBtn"><i class="bi bi-link-45deg"></i> Copy Link</a></div>
          <div class="author-box"><div class="author-init">EB</div><div><h5>Eshan Buildwell Team</h5><div class="role">Construction &amp; Renovation Experts</div><p>Our team of certified engineers, architects, and project managers has over 15 years of experience delivering quality construction across residential, commercial, and industrial sectors in Delhi NCR.</p></div></div>
          <div class="post-nav">
          </div>
        </article>

        <!-- COMMENTS -->
        <div class="pt-4 mt-2 border-top">
          <h3 class="mb-4" style="font-size:1.4rem;font-weight:800;color:var(--navy)"><i class="bi bi-chat-square-text-fill me-2" style="color:var(--orange)"></i>Comments</h3>
          
          <div class="mt-4 pt-3 border-top">
            <h4 class="mb-3" style="font-size:1.2rem;font-weight:800;color:var(--navy)">Leave a Comment</h4>
            <div class="comment-form">
              <div class="row g-3 mb-3"><div class="col-12 col-sm-6"><input type="text" class="form-control" placeholder="Your Name *"/></div><div class="col-12 col-sm-6"><input type="email" class="form-control" placeholder="Your Email *"/></div></div>
              <div class="mb-3"><textarea class="form-control" rows="5" placeholder="Your Comment *"></textarea></div>
              <button class="btn-submit" onclick="postComment(this)"><i class="bi bi-send-fill me-1"></i> Post Comment</button>
              <div id="commentSuccess" style="display:none;margin-top:.8rem;padding:.8rem 1rem;background:#e8f5e9;border:1px solid #a5d6a7;color:#2e7d32;border-radius:6px;font-size:.88rem"><i class="bi bi-check-circle-fill me-2"></i>Thank you! Your comment has been submitted for review.</div>
            </div>
          </div>
        </div>
      </div>

      <!-- SIDEBAR -->
      <div class="col-12 col-lg-4">
        <div class="sidebar-widget"><div class="widget-title">Search</div><div class="sidebar-search"><input type="text" placeholder="Search blog posts..."/><button type="button"><i class="bi bi-search"></i></button></div></div>
        <div class="cta-widget"><h4>Get a Free Estimate</h4><p>Planning a renovation or new build? Get an instant cost estimate from our experts — free of charge.</p><a href="{{ url('calculator') }}" class="btn-cta-sm"><i class="bi bi-calculator me-1"></i>Calculate Now</a></div>
        <div class="sidebar-widget"><div class="widget-title">Recent Posts</div>
          @foreach (\App\Models\Blog::orderBy('id','DESC')->where('status', 1)->limit(4)->get() as $blog)
          <div class="recent-post">
            <img src="{{ url('storage/'.$blog->banner) }}" alt="" style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;"/>
            <div class="recent-post-info">
              <a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->name }}</a>
              <span><i class="bi bi-calendar3"></i>{{ date('d F Y', strtotime($blog->created_at)) }}</span>
            </div>
          </div>
          @endforeach
        </div>
        <div class="sidebar-widget"><div class="widget-title">Categories</div><ul class="cat-list">
            @foreach(\App\Models\Category::where('status',1)->get() as $category)
            <li><a href="{{ url($category->slug) }}"><i class="bi bi-caret-right-fill"></i>{{ $category->name }}</a><span class="cat-count"></span></li>
            @endforeach
        </ul></div>
        
        <div class="sidebar-widget" style="background:var(--navy);border-color:var(--navy)"><h5 style="color:#fff;font-size:1.1rem;font-weight:800;margin-bottom:.4rem">Have a Project in Mind?</h5><p style="font-size:.84rem;color:rgba(255,255,255,.65);margin-bottom:1rem;line-height:1.6">Our experts are available Mon–Sat, 9 AM – 6 PM. Let's discuss your requirements today.</p><a href="tel:{{ $genSetting['phone'] ?? '+919876543210' }}" class="btn-cta-sm w-100 justify-content-center mb-2"><i class="bi bi-telephone-fill"></i> {{ $genSetting['phone'] ?? '+91 9876543210' }}</a><a href="{{ url('contact') }}" class="btn-cta-sm w-100 justify-content-center" style="background:transparent;border:1px solid rgba(255,255,255,.3);color:#fff"><i class="bi bi-envelope-fill"></i> Send a Message</a></div>
      </div>
    </div>
  </div>
</section>

<!-- RELATED POSTS -->
<section class="py-5" style="background:var(--gray-bg)">
  <div class="container">
    <div class="text-center mb-4"><p class="sec-eyebrow">Keep Reading</p><h2 class="sec-title">Related Articles</h2><div class="sec-line center"></div></div>
    <div class="row g-4">
        @foreach (\App\Models\Blog::orderBy('id','DESC')->where('status', 1)->limit(3)->get() as $related_blog)
        <div class="col-12 col-md-4">
          <div class="blog-card">
            <img class="blog-card-img" src="{{ url('storage/'.$related_blog->banner) }}" alt="" style="object-fit: cover; height: 250px; width: 100%; border-top-left-radius: inherit; border-top-right-radius: inherit;"/>
            <div class="blog-card-body">
              <h5><a href="{{ url('blog/'.$related_blog->slug) }}">{{ $related_blog->name }}</a></h5>
              <div class="blog-meta"><span><i class="bi bi-calendar3"></i>{{ date('d F Y', strtotime($related_blog->created_at)) }}</span><span><i class="bi bi-person"></i>Admin</span></div>
              <p>{{ $related_blog->short_description ?? Str::limit(strip_tags($related_blog->description), 80) }}</p>
              <a href="{{ url('blog/'.$related_blog->slug) }}" class="btn-read">Get in touch</a>
            </div>
          </div>
        </div>
        @endforeach
    </div>
  </div>
</section>
<section class="cta-strip"><div class="container"><h2>Ready to Build Your Dream Project?</h2><p>Contact us for a free consultation and get an accurate estimate.</p><a href="tel:{{ $genSetting['phone'] ?? '+919876543210' }}" class="btn-cta-lg"><i class="bi bi-telephone-fill"></i> Call Us: {{ $genSetting['phone'] ?? '+91 9876543210' }}</a></div></section>
<script>
function postComment(btn){btn.innerHTML='<span class="spinner-border spinner-border-sm me-2"></span>Posting...';btn.disabled=true;setTimeout(()=>{document.getElementById('commentSuccess').style.display='block';btn.innerHTML='<i class="bi bi-check-fill me-1"></i> Comment Posted';btn.style.background='#2e7d32';},1200);}
document.getElementById('copyBtn').addEventListener('click',function(e){e.preventDefault();navigator.clipboard.writeText(window.location.href).then(()=>{this.innerHTML='<i class="bi bi-check-lg"></i> Copied!';this.style.background='var(--orange)';this.style.color='#fff';setTimeout(()=>{this.innerHTML='<i class="bi bi-link-45deg"></i> Copy Link';this.style.background='';this.style.color='';},2000);});});
</script>




@endsection