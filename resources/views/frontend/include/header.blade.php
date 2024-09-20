<header class="section headerContainer">
    <div class=" headerMain d-flex justify-content-center align-items-center w-100 notSignupHead">
        <div class="w-30">
            <div class="logo d-flex align-items-center column-gap-2">
                <a href="{{ route('home') }}" class="d-flex align-items-center column-gap-2">
                    <img class="icon" src="{{ asset('frontend-assets/imgs/favicon2.png') }}" width="10%">
                    <img class="logopic" src="{{ asset('frontend-assets/imgs/logo.png') }}" width="50%" height="100%">
                </a>
            </div>
        </div>
        <div class="w-50 d-flex justify-content-center align-items-center Pc-Menus">
            <a href="{{ route('home') }}" class="menu_item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"> Home </a>
            <a href="{{ route('about') }}" class="menu_item {{ Route::currentRouteName() == 'about' ? 'active' : '' }}"> About Us </a>
            <a href="{{ route('price') }}" class="menu_item {{ Route::currentRouteName() == 'price' ? 'active' : '' }}"> Pricing  </a>
            <a href="{{ route('faq') }}" class="menu_item {{ Route::currentRouteName() == 'faq' ? 'active' : '' }}"> FAQ </a>
            <a href="{{ route('contact') }}" class="menu_item {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}"> Contact Us </a>
        </div>
        <div class="w-30 d-flex justify-content-end align-items-center column-gap-2 Pc-Menus">
            <a href="{{ route('login') }}" class="btn loginBtn">Sign In</a>
            <a class="btn registerbtn" data-bs-toggle="modal" data-bs-target="#registerModal">Join Now</a>
        </div>
        <div class="w-50 d-md-none pr-1">
            <div class="menu d-flex justify-content-end align-items-center column-gap-2">
                <a href="{{ route('login') }}" class="btn loginBtn">Sign In</a>
                <a class="btn registerbtn" data-bs-toggle="modal" data-bs-target="#registerModal">Join Now</a>
                <a class="mobileNavtoggle" id="homeMenuNavToogle"> <i class="fa-solid fa-bars"></i> </a>
            </div>
        </div>
        <div class="homeMObileMenu d-md-none" id="homeMobileNav">
            <div class="menu d-flex flex-column justify-content-center align-items-start row-gap-2">
                <a href="{{ route('home') }}" class="menu_item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"> Home </a>
                <a href="{{ route('about') }}" class="menu_item {{ Route::currentRouteName() == 'about' ? 'active' : '' }}"> About Us </a>
                <a href="{{ route('price') }}" class="menu_item {{ Route::currentRouteName() == 'price' ? 'active' : '' }}"> Pricing  </a>
                <a href="{{ route('faq') }}" class="menu_item {{ Route::currentRouteName() == 'faq' ? 'active' : '' }}"> FAQ </a>
                <a href="{{ route('contact') }}" class="menu_item {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}"> Contact Us </a>
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

