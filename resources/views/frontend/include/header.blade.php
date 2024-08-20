<header class="container">
    <div class=" headerMain d-flex justify-content-between align-items-center w-100">
        <div class="w-30">
            <div class="logo d-flex align-items-center column-gap-2">
                <img class="icon" src="{{ asset('frontend-assets/imgs/favicon2.png') }}" width="10%">
                <img class="logopic" src="{{ asset('frontend-assets/imgs/logo.png') }}" width="50%" height="50px">
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

@include('frontend.include.mobilenav')
