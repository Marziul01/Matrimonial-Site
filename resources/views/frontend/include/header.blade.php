@if (!Auth::check())
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
        <div class="w-50 d-flex justify-content-center align-items-center">
            <a href="{{ route('home') }}" class="menu_item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"> Home </a>
            <a href="" class="menu_item"> About Us </a>
            {{-- <a href="{{ route('price') }}" class="menu_item {{ Route::currentRouteName() == 'price' ? 'active' : '' }}"> Price </a> --}}
            <a href="{{ route('faq') }}" class="menu_item {{ Route::currentRouteName() == 'faq' ? 'active' : '' }}"> FAQ </a>
            <a href="{{ route('contact') }}" class="menu_item {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}"> Contact Us </a>
        </div>
        <div class="w-30 d-flex justify-content-end align-items-center column-gap-2">
            <a href="{{ route('login') }}" class="btn loginBtn">Sign In</a>
            <a class="btn registerbtn" data-bs-toggle="modal" data-bs-target="#registerModal">Join Now</a>
        </div>
        <div class="w-50 d-md-none pr-1">
            <div class="menu d-flex justify-content-end align-items-center column-gap-4">
                <a href="{{ route('login') }}" class="btn loginBtn" >Login</a>
                <a class="btn loginBtn" data-bs-toggle="modal" data-bs-target="#registerModal">SignUp</a>
                <a class="mobileNavtoggle" id="homeMenuNavToogle"> <i class="fa-solid fa-bars"></i> </a>
            </div>
        </div>
        <div class="homeMObileMenu d-md-none" id="homeMobileNav">
            <div class="menu d-flex flex-column justify-content-center align-items-start row-gap-2">
                <a href="{{ route('home') }}" class="menu_item"> Home </a>
                <a href="{{ route('price') }}" class="menu_item"> Price </a>
                <a href="{{ route('faq') }}" class="menu_item"> Faq </a>
                <a href="{{ route('contact') }}" class="menu_item border-0"> Contact </a>
            </div>
        </div>
    </div>
</header>
@else
<header class="section border-bottom-1" style="border: 1px solid rgb(0 0 0 / 18%)">
    <div class=" headerMain d-flex justify-content-between align-items-center w-100">
        <div class="w-30">
            <div class="logo d-flex align-items-center column-gap-2">
                <a id="menuToggle" class="d-md-none mobileNavtoggle"><i class="fa-solid fa-bars"></i></a>
                <a href="{{ route('user.dashboard') }}" class="d-flex align-items-center column-gap-2">
                    <img class="icon" src="{{ asset('frontend-assets/imgs/favicon2.png') }}" width="10%">
                    <img class="logopic" src="{{ asset('frontend-assets/imgs/logo.png') }}" width="50%" height="50px">
                </a>
            </div>
        </div>
        <div class="w-70 d-none d-md-block">
            <div class="menu d-flex justify-content-end align-items-center column-gap-2">
                <div class="dropdown" style="display: flex; align-items-center">
                    <button class="profileImg" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <span>Welcome {{ isset(Auth::user()->profile->first_name ) ? Auth::user()->profile->first_name : '' }} ,</span>  <img src="@if(isset(Auth::user()->profile->first_name )) {{ asset(Auth::user()->profile->image) }} @else  {{ asset('frontend-assets') }}/imgs/man.png @endif ">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <button type="button" class="dropdown-item" id="externalButton">View Profile</button>
                        </li>
                    </ul>
                    <a href="{{ route(config('chatify.routes.prefix')) }}" class="messageCount"><i class="fa-regular fa-message messageCountIcon"></i> <span class="messageCounter"> {{ DB::table('ch_messages')->where('to_id', Auth::user()->id)->where('seen', 0)->count() }} </span> </a>
                </div>
            </div>
        </div>
        <div class="w-50 d-md-none pr-1">
            <div class="dropdown d-flex justify-content-end align-item-center">
                <button class="profileImg" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="@if(isset(Auth::user()->profile->first_name )) {{ asset(Auth::user()->profile->image) }} @else  {{ asset('frontend-assets') }}/imgs/man.png @endif ">
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="dropdownMenuButton1">
                      <li>
                          <button type="button" class="dropdown-item" id="opensMessagesTab">View Profile</button>
                      </li>
                  </ul>
                  <a href="{{ route(config('chatify.routes.prefix')) }}" class="messageCount"><i class="fa-regular fa-message messageCountIcon"></i> <span class="messageCounter"> {{ DB::table('ch_messages')->where('to_id', Auth::user()->id)->where('seen', 0)->count() }} </span> </a>
            </div>
        </div>
    </div>
</header>
@endif


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

