<!-- <header class="header-area sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="{{url('/')}}" class="navbar-brand">
                <img src="{{ url('storage/'. $genSetting['logo']) }}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto" style="column-gap: 10px;">
                    <li class="nav-item">
                        <a class="nav-link" id="Home-nav" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Home-nav" href="{{ url('about-us') }}">About</a>
                    </li>
                    <li class="nav-item ">
                        @foreach (\App\Models\Category::where('status', '1')->where('top', '1')->get() as $category)
                        <a class="nav-link" id="Home-nav" href="{{ url($category->slug) }}">{{ $category->name }}</a>
                        @endforeach
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Home-nav" href="{{ config('app.book_now_url') }}" target="_blank">Book Now</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="Home-nav" href="{{ url('blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Home-nav" href="{{ url('contact-us') }}">Contact Us</a>
                    </li>


                </ul>
            </div>
        </nav>
    </div>
</header> -->

<nav class="navbar navbar-expand-lg sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('storage/' . $genSetting['logo']) }}"
                alt="Eshan Buildwell Logo" style="max-height: 60px;">
            <div class="brand-name"><strong style="color: orange;">ESHAN</strong> <strong>BUILDWELL</strong>
                <strong>INDIA</strong>
            </div>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#nav"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                        href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('about-us') ? 'active' : '' }}"
                        href="{{ url('about-us') }}">About Us</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('services') ? 'active' : '' }}"
                        href="{{ url('services') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('bim-training') ? 'active' : '' }}"
                        href="{{ url('bim-training') }}">BIM Training</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('calculator') ? 'active' : '' }}"
                        href="{{ url('calculator') }}">Cost Estimator</a></li>
                <!-- <li class="nav-item"><a class="nav-link {{ request()->is('calculator') ? 'active' : '' }}" href="{{ url('calculator') }}">Accurate Estimator</a></li> -->
                <li class="nav-item"><a class="nav-link {{ request()->is('projects') ? 'active' : '' }}"
                        href="{{ url('projects') }}">Projects</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}"
                        href="{{ url('contact-us') }}">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('blog') ? 'active' : '' }}"
                        href="{{ url('blog') }}">Blog</a></li>
            </ul>
            <a href="tel:+919876543210" class="btn-call ms-lg-3 mt-2 mt-lg-0"><i class="bi bi-telephone-fill"></i>
                {{ $genSetting['phone'] }}</a>
        </div>
    </div>
</nav>