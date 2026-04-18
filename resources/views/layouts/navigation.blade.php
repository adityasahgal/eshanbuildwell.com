<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        @canany(['banner-create','banner-edit','banner-delete','banner-publish'])
        <li class="nav-item">
            <a href="{{ route('banner.index') }}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Banners</p>
            </a>
        </li>
        @endcanany
        @canany(['project-slider-create','project-slider-edit','project-slider-delete','project-slider-publish'])
        <li class="nav-item">
            <a href="{{ route('project-slider.index') }}" class="nav-link">
                <i class="nav-icon fas fa-images"></i>
                <p>Project Slider</p>
            </a>
        </li>
        @endcanany
        @canany(['team-create','team-edit','team-delete','team-publish'])
        <li class="nav-item">
            <a href="{{ route('team-member.index') }}" class="nav-link {{ Route::is('team-member.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>Team Members</p>
            </a>
        </li>
        @endcanany
        @canany(['testimonial-create','testimonial-edit','testimonial-delete','testimonial-publish'])
        <li class="nav-item">
            <a href="{{ route('testimonial.index') }}" class="nav-link {{ Route::is('testimonial.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-comment-dots"></i>
                <p>Testimonials</p>
            </a>
        </li>
        @endcanany
        <!-- @canany(['category-create','category-edit','category-delete','category-publish'])
        <li class="nav-item">
            <a href="{{ route('category.index') }}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Category</p>
            </a>
        </li>
        @endcanany

        @canany(['subcategory-create','subcategory-edit','subcategory-delete','subcategory-publish'])
        <li class="nav-item">
            <a href="{{ route('subcategory.index') }}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Sub Category</p>
            </a>
        </li>
        @endcanany -->

        @canany(['service-create','service-edit','service-delete','service-publish'])
        <li class="nav-item">
            <a href="{{ route('service.index') }}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Services</p>
            </a>
        </li>
        @endcanany 

        @canany(['blog-create','blog-edit','blog-delete','blog-publish'])
        <li class="nav-item">
            <a href="{{ route('blog.index') }}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Blogs</p>
            </a>
        </li>
        @endcanany

        @canany(['calculator-pricing-create','calculator-pricing-edit','calculator-pricing-delete','calculator-pricing-publish'])
        <li class="nav-item">
            <a href="{{ route('calculator-pricing.index') }}" class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>Calculator Pricing</p>
            </a>
        </li>
        @endcanany

        @can('enquiry-read')
        <li class="nav-item">
            <a href="{{ route('enquiry.index') }}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Enquiry</p>
            </a>
        </li>
        @endcan

        @can('calculator-enquiry-read')
        <li class="nav-item">
            <a href="{{ route('calculator-enquiry.index') }}" class="nav-link {{ Route::is('calculator-enquiry.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-calculator"></i>
                <p>Calculator Enquiry</p>
            </a>
        </li>
        @endcan

        <li class="nav-item">
            <a href="{{ route('setting.index') }}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Settings
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                @can('general-setting')
                <li class="nav-item">
                    <a href="{{ route('setting.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>General Setting</p>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Administrators
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                @canany(['role-create','role-edit','role-delete','role-publish'])
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Roles</p>
                    </a>
                </li>
                @endcanany
                @canany(['permission-create','permission-edit','permission-delete','permission-publish'])
                <li class="nav-item">
                    <a href="{{ route('permission.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Permission</p>
                    </a>
                </li>
                @endcanany
                @canany(['user-create','user-edit','user-delete','user-publish'])
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li>
                @endcanany
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Logout') }}</p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>
