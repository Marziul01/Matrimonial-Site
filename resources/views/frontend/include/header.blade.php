@if (!Auth::check())
<header class="container">
    <div class=" headerMain d-flex justify-content-between align-items-center w-100">
        <div class="w-30">
            <div class="logo d-flex align-items-center column-gap-2">
                <a href="{{ route('home') }}">
                    <img class="icon" src="{{ asset('frontend-assets/imgs/favicon2.png') }}" width="10%">
                    <img class="logopic" src="{{ asset('frontend-assets/imgs/logo.png') }}" width="50%" height="50px">
                </a>
            </div>
        </div>
        <div class="w-70 d-none d-md-block">
            <div class="menu d-flex justify-content-end align-items-center column-gap-2">
                <a href="" class="menu_item"> Home </a>
                <a href="" class="menu_item"> Price </a>
                <a href="" class="menu_item"> Faq </a>
                <a href="" class="menu_item"> Contact </a>
                <a href="{{ route('login') }}" class="btn loginBtn">Login</a>
            </div>
        </div>
        <div class="w-50 d-md-none pr-1">
            <div class="menu d-flex justify-content-end align-items-center column-gap-4">
                <a href="{{ route('login') }}" class="btn loginBtn" >Login</a>
                <a> <i class="fa-solid fa-bars"></i> </a>
            </div>

        </div>
    </div>
</header>
@else
<header class="section border-bottom-1" style="border: 1px solid rgb(0 0 0 / 18%)">
    <div class=" headerMain d-flex justify-content-between align-items-center w-100">
        <div class="w-30">
            <div class="logo d-flex align-items-center column-gap-2">
                <a href="{{ route('user.dashboard') }}">
                    <img class="icon" src="{{ asset('frontend-assets/imgs/favicon2.png') }}" width="10%">
                    <img class="logopic" src="{{ asset('frontend-assets/imgs/logo.png') }}" width="50%" height="50px">
                </a>
            </div>
        </div>
        <div class="w-70 d-none d-md-block">
            <div class="menu d-flex justify-content-end align-items-center column-gap-2">
                <div class="dropdown">
                    <button class="profileImg" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <span>Welcome {{ Auth::user()->name }} ,</span>  <img src="{{ asset('frontend-assets') }}/imgs/man.png">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href=""> View Profile</a></li>
                        <li><a class="dropdown-item" href=""> Change Password</a></li>
                      <li><a class="dropdown-item" href="{{ route('user.logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
@endif


@include('frontend.include.mobilenav')
