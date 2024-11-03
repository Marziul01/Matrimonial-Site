<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion new-color-sidebar" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('frontend-assets') }}/imgs/favicon2.png" width="50%">
        </div>
        <div class="sidebar-brand-text mx-3">
            <img src="{{ asset('frontend-assets/assets/images/logo/logo.png') }}" width="100%" style="margin-left: -50px">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @if (Auth::user()->access->users == '1' || Auth::user()->role_name == 'Super Admin' )
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users') }}">
            <i class="fa-solid fa-user"></i>
            <span>Users</span>
        </a>
    </li>
    @endif

    @if (Auth::user()->access->orders == '1' || Auth::user()->role_name == 'Super Admin' )
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.plans') }}">
            <i class="fa-solid fa-user"></i>
            <span>Credit Plans</span>
        </a>
    </li>
    @endif

    @if (Auth::user()->access->courses == '1' || Auth::user()->role_name == 'Super Admin' )
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.chat.adminindex') }}">
            <i class="fa-solid fa-user"></i>
            <span>Support Center</span>
        </a>
    </li>
    @endif

    @if ( Auth::user()->role_name == 'Super Admin' )
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.manager') }}">
            <i class="fa-solid fa-user"></i>
            <span>Admins Managment</span>
        </a>
    </li>
    @endif

    @if (Auth::user()->access->home_settings == '1' || Auth::user()->role_name == 'Super Admin' )
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Page Settings</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('testimonialsedit') }}">Testimonials</a>
                <a class="collapse-item" href="{{ route('admin.about.manage') }}">About Page</a>
                <a class="collapse-item" href="{{ route('admin.faq.manage') }}">Faq Page</a>
            </div>
        </div>
    </li>
    @endif

    @if (Auth::user()->access->site_settings == '1' || Auth::user()->role_name == 'Super Admin' )
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.siteSetting') }}">
            <i class="fa-solid fa-user"></i>
            <span>Site Settings</span>
        </a>
    </li>
    @endif

    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Admins Managment</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.manager') }}">Add New Admin</a>
                <a class="collapse-item" href="{{ route('admin.access.manage') }}">Admin Access</a>
            </div>
        </div>
    </li> --}}


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
