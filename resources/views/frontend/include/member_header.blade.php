<header class="section headerContainer" style="box-shadow: 0 0 130px #f43662;">
    <div class=" headerMain d-flex justify-content-center align-items-center w-100 notSignupHead">
        <div class="w-30">
            <div class="logo d-flex align-items-center column-gap-2">
                <a href="{{ route('user.dashboard') }}" class="d-flex align-items-center column-gap-2">
                    <img class="icon" src="{{ asset('frontend-assets/imgs/favicon2.png') }}" width="10%">
                    <img class="logopic" src="{{ asset('frontend-assets/imgs/logo.png') }}" width="50%" height="100%">
                </a>
            </div>
        </div>
        <div class="w-50 d-flex justify-content-center align-items-center Pc-Menus">
            <a href="{{ route('user.dashboard') }}" class="menu_item {{ Route::currentRouteName() == 'user.dashboard' ? 'active' : '' }}"> Dashboard </a>
            <a href="{{ route('user.matches') }}" class="menu_item {{ Route::currentRouteName() == 'user.matches' ? 'active' : '' }}"> My Matches </a>
            <a href="{{ url('/message') }}" class="menu_item {{ Request::is('message') ? 'active' : '' }}"> Messages <span class="message-unseen-count">{{ $unseenMessageCount }}</span> </a>
            <a href="{{ route('user.buy.credit') }}" class="menu_item {{ Route::currentRouteName() == 'user.buy.credit' ? 'active' : '' }}"> Buy Credit </a>
            <a href="{{ route('user.notifications') }}" class="menu_item {{ Route::currentRouteName() == 'user.notifications' ? 'active' : '' }}"> Notifications </a>
        </div>
        <div class="w-30 d-flex justify-content-end align-items-center column-gap-2 Pc-Menus">
            {{-- <div class="headerSearch">
                <input type="text" class="form-control dashboard-header-search" name="search-dashboard" placeholder="Search here">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div> --}}
            <div>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary userImageProfileTog" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (isset(Auth::user()->profile->image))
                            <img src="{{  asset(Auth::user()->profile->image) }}" alt="" class="w-100 h-100 object-fit-cover">
                        @else
                            <i class="fa-regular fa-user"></i>
                        @endif

                    </button>
                    <ul class="dropdown-menu dropdown-menu-end userImageProfileDrop">
                      <li><a href="{{ route('user.profile') }}" class="dropdown-item" type="button">My Profile </a></li>
                      <li><a href="{{ route('user.profile.partner') }}" class="dropdown-item" type="button">Partner Preferences </a></li>
                      <li><a href="{{ route('user.profile.contact') }}" class="dropdown-item" type="button">Contact Informations </a></li>
                      <li><a href="{{ route('user.profile.settings') }}" class="dropdown-item" type="button">Settings </a></li>
                      <li><a href="{{ route('user.logout') }}" class="dropdown-item" type="button">Logout </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-50 d-md-none pr-1">
            <div class="menu d-flex justify-content-end align-items-center column-gap-2">
                <a href="{{ url('/message') }}" class="btn loginBtn"><i class="fa-brands fa-facebook-messenger"></i> <span class="message-unseen-count mobile-msg">{{ $unseenMessageCount }}</span></a>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary userImageProfileTog" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (isset(Auth::user()->profile->image))
                            <img src="{{  asset(Auth::user()->profile->image) }}" alt="" class="w-100">
                        @else
                            <i class="fa-regular fa-user"></i>
                        @endif

                    </button>
                    <ul class="dropdown-menu dropdown-menu-end userImageProfileDrop">
                      <li><a href="{{ route('user.profile') }}" class="dropdown-item" type="button">My Profile </a></li>
                      <li><a href="{{ route('user.profile.partner') }}" class="dropdown-item" type="button">Partner Preferences </a></li>
                      <li><a class="dropdown-item" href="{{ route('user.profile.contact') }}"> Contact Informations</a></li>
                      <li><a href="{{ route('user.profile.settings') }}" class="dropdown-item" type="button">Settings </a></li>
                      <li><a href="{{ route('user.logout') }}" class="dropdown-item" type="button">Logout </a></li>
                    </ul>
                </div>
                <a class="mobileNavtoggle" id="homeMenuNavToogle"> <i class="fa-solid fa-bars"></i> </a>
            </div>
        </div>
        <div class="homeMObileMenu d-md-none" id="homeMobileNav">
            <div class="menu d-flex flex-column justify-content-center align-items-start row-gap-2">
                <a href="{{ route('user.dashboard') }}" class="menu_item {{ Route::currentRouteName() == 'user.dashboard' ? 'active' : '' }}"> Dashboard </a>
                <a href="{{ route('user.matches') }}" class="menu_item {{ Route::currentRouteName() == 'user.matches' ? 'active' : '' }}"> My Matches </a>
                <a href="{{ route('user.buy.credit') }}" class="menu_item {{ Route::currentRouteName() == 'user.buy.credit' ? 'active' : '' }}"> Buy Credit </a>
                <a href="{{ route('user.notifications') }}" class="menu_item {{ Route::currentRouteName() == 'user.notifications' ? 'active' : '' }}"> Notifications </a>
            </div>
        </div>
    </div>
</header>

@include('frontend.include.mobilenav')


<script>
    document.getElementById('menuToggle').addEventListener('click', function() {
    const navbar = document.getElementById('mobileNavbar');
    navbar.classList.toggle('active');

    // Check if the navbar is now active
    if (navbar.classList.contains('active')) {
        // Add event listener to close the navbar when clicking outside
        document.addEventListener('click', closeNavbarOnClickOutside);
    } else {
        // Remove the event listener if navbar is not active
        document.removeEventListener('click', closeNavbarOnClickOutside);
    }
});

function closeNavbarOnClickOutside(event) {
    const navbar = document.getElementById('mobileNavbar');
    const menuToggle = document.getElementById('menuToggle');

    // Check if the clicked element is outside the navbar and not the menu toggle button
    if (!navbar.contains(event.target) && !menuToggle.contains(event.target)) {
        navbar.classList.remove('active');
        // Remove the event listener after closing the navbar
        document.removeEventListener('click', closeNavbarOnClickOutside);
    }
}

</script>

