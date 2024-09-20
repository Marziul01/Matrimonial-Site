@extends('frontend.master')

@section('title')
   | User Dashboard
@endsection

@section('modals')

@endsection

@section('content')


    <div class="section">
        <div class="dashDetailsDiv">
            <div class="imageBox">
                <div class="image">
                    @if (isset(Auth::user()->profile->image))
                        <img src="{{ asset(Auth::user()->profile->image) }}" class="img" alt="">
                    @else
                        <i class="fa-regular fa-user icon"></i>
                    @endif
                    <p class="UserName"> {{ Auth::user()->name }} </p>
                    <p class="userEmail">{{ Auth::user()->email }}</p>
                </div>
                <div class="memplanDiv">
                    <div>
                        <p class="memPlan"> <a href="">{{ Auth::user()->plans->plan_id == 1 ? 'Buy Membership' : Auth::user()->plans->plan->name }} </a> </p>
                        <p class="memplanname">{{ Auth::user()->plans->plan_id == 1 ? Auth::user()->plans->plan->name : 'Validity till '.' '. \Carbon\Carbon::parse(Auth::user()->plans->end_date)->format('j F') }}</p>
                    </div>
                    <i class="fa-solid fa-crown"></i>
                </div>
            </div>
            <div class="detailsBox">
                <div class="statsBox">
                    <div class="statsBoxDiv">
                        <h5>My Statistics</h5>
                        <div class="stats">
                            <a href="" class="statsInfos"> <h2>01</h2> <p>Pending Invitations</p> </a>
                            <a href="" class="statsInfos"> <h2>01</h2> <p>Pending Invitations</p> </a>
                            <a href="" class="statsInfos"> <h2>01</h2> <p>Pending Invitations</p> </a>
                            <a href="" class="statsInfos"> <h2>01</h2> <p>Pending Invitations</p> </a>
                            <a href="" class="statsInfos"> <h2>01</h2> <p>Pending Invitations</p> </a>
                            <a href="" class="statsInfos"> <h2>01</h2> <p>Pending Invitations</p> </a>
                        </div>
                    </div>
                </div>
                <div class="findBox">
                    <div class="bgSectionColor adSection m-0">
                        <div class="w-50">
                            <h1 class="title">Let’s not Wait <br> To Meet</h1>
                            <a class="btn joinBtn" href="">Join Now</a>
                        </div>
                        <img class="img" src="{{ asset('frontend-assets/imgs/Home-Couple-Optimized-1.png') }}">
                    </div>
                </div>
            </div>
        </div>
        {{-- {{ is_null($profileComplete) ? 'blur' : '' }} --}}
        <div class="recentVisitor matchScrooler">
            <h1>Recent Visitors</h1>
            <div class="Testimonialwrapper" id="Testimonialwrapper1">
                <i id="testimonialleft" class="fa-solid fa-circle-chevron-left"></i>
                <ul class="Testimonialcarousel" id="Testimonialcarousel1">
                    @foreach ($profiles as  $profile)
                        <li class="Testimonialcard p-2 h-100">
                            <div class="TestimonialcardInner h-100">
                                <div class="testimonial-item w-100">
                                    <div class="img">
                                        <img src="{{ asset($profile->image) }}" class="d-block" alt="Testimonial Image">
                                        <h2>{{ $profile->first_name . ' ' . $profile->last_name }}</h2>
                                    </div>
                                    <div class="w-100 text-left mainTestiText">
                                        <p class="mb-0">{{ $profile->age . 'yr ,' . $profile->height . 'ft ,' . $profile->location }}</p>
                                        <a href="">View Profile</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <i id="testimonialright" class="fa-solid fa-circle-chevron-right"></i>
            </div>

        </div>

        <div class="recentVisitor matchScrooler">
            <h1>My Matches</h1>
            <div class="Testimonialwrapper" id="Testimonialwrapper2">
                <i id="testimonialleft2" class="fa-solid fa-circle-chevron-left"></i>
                <ul class="Testimonialcarousel" id="Testimonialcarousel2">
                    @foreach ($profiles as  $profile)
                        <li class="Testimonialcard p-2 h-100">
                            <div class="TestimonialcardInner h-100">
                                <div class="testimonial-item w-100">
                                    <div class="img">
                                        <img src="{{ asset($profile->image) }}" class="d-block" alt="Testimonial Image">
                                        <h2>{{ $profile->first_name . ' ' . $profile->last_name }}</h2>
                                    </div>
                                    <div class="w-100 text-left mainTestiText">
                                        <p class="mb-0">{{ $profile->age . 'yr ,' . $profile->height . 'ft ,' . $profile->location }}</p>
                                        <a href="">View Profile</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <i id="testimonialright2" class="fa-solid fa-circle-chevron-right"></i>
            </div>


        </div>

    </div>


{{-- <div class="section d-flex align-items-center position-fixed dashboardMain">
    <div class="card w-100 border-0">
        <div class="card-body w-100  pb-0 pt-0">
            <div class="d-flex align-items-start column-gap-3">

                    <div class="nav flex-column justify-content-between nav-pills me-3 dashboardNav mobile-navbar d-md-none " id="mobileNavbar">
                        <div class="">
                            <button class="nav-link dashboardButton active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
                            <div id="accordionExample1">
                            <a class="nav-link dropdown-toggle text-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Profile
                            </a>
                            <div class="collapse mb-3" id="collapseExample" data-bs-parent="#accordionExample1">
                                <div class="card card-body">
                                    <button class="nav-link" id="v-pills-your-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-your-profile" type="button" role="tab" aria-controls="v-pills-your-profile" aria-selected="true">Create Your Profile</button>
                                    <button class="nav-link mb-0" id="v-pills-your-partner-tab" data-bs-toggle="pill" data-bs-target="#v-pills-your-partner-profile" type="button" role="tab" aria-controls="v-pills-your-partner-profile" aria-selected="true">Create Your Partner Profile</button>
                                </div>
                            </div>
                            <a class="nav-link dropdown-toggle text-center" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                                Settings
                            </a>
                            <div class="collapse mb-3" id="collapseExample1" data-bs-parent="#accordionExample1">
                                <div class="card card-body">
                                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Change Password</button>
                                    <button class="nav-link" id="v-pills-editProfile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-editProfile" type="button" role="tab" aria-controls="v-pills-editProfile" aria-selected="false">Edit Profile</button>
                                </div>
                            </div>
                            </div>
                            <button class="nav-link" id="v-pills-buymessages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Buy Credit</button>
                            <button class="nav-link d-none" id="v-pills-messages1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages1" type="button" role="tab" aria-controls="v-pills-messages1" aria-selected="false"></button>
                        </div>
                        <a class="nav-link text-center dashboardLogOut" href="{{ route('user.logout') }}">Logout</a>
                    </div>

                <div class="nav flex-column justify-content-between nav-pills me-3 dashboardNav d-none d-md-block" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div class="">
                        <button class="nav-link dashboardButton active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
                        <div id="accordionExample">
                        <a class="nav-link dropdown-toggle text-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Profile
                        </a>
                        <div class="collapse mb-3" id="collapseExample" data-bs-parent="#accordionExample">
                            <div class="card card-body">
                                <button class="nav-link" id="v-pills-your-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-your-profile" type="button" role="tab" aria-controls="v-pills-your-profile" aria-selected="true">Create Your Profile</button>
                                <button class="nav-link mb-0" id="v-pills-your-partner-tab" data-bs-toggle="pill" data-bs-target="#v-pills-your-partner-profile" type="button" role="tab" aria-controls="v-pills-your-partner-profile" aria-selected="true">Create Your Partner Profile</button>
                            </div>
                        </div>
                        <a class="nav-link dropdown-toggle text-center" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                            Settings
                        </a>
                        <div class="collapse mb-3" id="collapseExample1" data-bs-parent="#accordionExample">
                            <div class="card card-body">
                                <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Change Password</button>
                                <button class="nav-link" id="v-pills-editProfile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-editProfile" type="button" role="tab" aria-controls="v-pills-editProfile" aria-selected="false">Edit Profile</button>
                            </div>
                        </div>
                        </div>
                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Buy Credit</button>
                        <button class="nav-link d-none" id="v-pills-messages2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages1" type="button" role="tab" aria-controls="v-pills-messages1" aria-selected="false"></button>
                    </div>
                    <a class="nav-link text-center dashboardLogOut" href="{{ route('user.logout') }}">Logout</a>
                </div>
                <div class="tab-content w-100" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <h2 class="text-center p-2 mt-3 mb-0 bestMatch">For Your Best Match</h2>
                    <div class="row sticky-div pb-5">
                        @if (is_null($profiles))
                                <h4 class="text-center">Sorry ! No Profiles to show !</h4>
                            @else
                            <div class="profileGrid mt-3 pb-4">
                                @foreach ($profiles as $profile)

                                        <div class="profileCard @if(!$profileComplete) blur @endif">
                                            <img src="{{ asset($profile->image) }}" width="100%">
                                            <div class="profileCardDiv">
                                                <div>
                                                    <p>Name : <span> {{ $profile->first_name}} {{  $profile->last_name }} </span></p>
                                                    <p>Address : <span> {{ $profile->present_address ?? 'N/A' }} </span></p>
                                                    @php $age = \Carbon\Carbon::parse($profile->date_of_birth)->age; @endphp
                                                    <p>Age : <span> {{ $age ?? 'N/A' }} yr</span></p>
                                                    @if ( !($UserPlanActive) )
                                                    <p>Contact : <a href="" class="profileDetailsBtn2"><span style="font-style: italic; color: #F43662"> Please Upgrade Plan </span></a></p>
                                                    @else
                                                    <p>Contact : <a href=""><span style="font-style: italic; color: #F43662"> {{ $profile->contact_number }} </span></a></p>
                                                    @endif

                                                </div>
                                                @if ( is_null($UserPlanActive) )
                                                    <a class="profileDetailsBtn text-center mt-4" href="">View Details</a>
                                                @else
                                                <a class="profileDetails text-center mt-4" href="{{ route('profiles', $profile->first_name . '-' . $profile->user_id) }}">View Details</a>
                                                @endif

                                            </div>
                                        </div>

                                @endforeach
                            </div>
                                <div class="pagination">
                                    {{ $profiles->links() }}
                                </div>
                            @endif
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-your-profile" role="tabpanel" aria-labelledby="v-pills-your-profile-tab">
                    <h2 class="p-2 mt-3 mb-0 px-4 tabForms" style="font-weight: 800; margin-left: 10px">Hey! Create Your Profile</h2>
                    <div class="row sticky-div p-0">
                        <div class="form-container pb-3">
                            <form id="profileDetailsSubmit">
                                <div class="submitDtsCard" id="card_1">
                                    <div class="w-100 radios">
                                        <p class="text-center">This Profile is for</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="">
                                                <input class="form-check-input" type="radio" value="female" name="gender" id="female">
                                                <label class="form-check-label" for="female">Female <i class="fa-solid fa-person-dress"></i></label>
                                            </div>
                                            <div class="">
                                                <input class="form-check-input" type="radio" value="male" name="gender" id="male">
                                                <label class="form-check-label" for="male">Male <i class="fa-solid fa-person"></i></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100 radios">
                                        <p class="text-center mt-3">You are creating profile for</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="w-30 select-wrapper " style="">
                                                <select name="account_for" class="form-control">
                                                    <option value="self">Self</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-100 radios mb-2">
                                        <p class="text-center">I'm Looking for a</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="">
                                                <input class="form-check-input" type="radio" value="bride" name="looking_for" id="bride">
                                                <label class="form-check-label" for="bride">Bride</label>
                                            </div>
                                            <div class="">
                                                <input class="form-check-input" type="radio" value="groom" name="looking_for" id="groom">
                                                <label class="form-check-label" for="groom">Groom</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-100 radios">
                                        <p class="text-center">Marital Status</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="">
                                                <input class="form-check-input" type="radio" value="Single" name="marital_status" id="single">
                                                <label class="form-check-label" for="single">Single</label>
                                            </div>
                                            <div class="">
                                                <input class="form-check-input" type="radio" value="Divorced" name="marital_status" id="Divorced">
                                                <label class="form-check-label" for="Divorced">Divorced</label>
                                            </div>
                                            <div class="">
                                                <input class="form-check-input" type="radio" value="Widowed" name="marital_status" id="Widowed">
                                                <label class="form-check-label" for="Widowed">Widowed</label>
                                            </div>
                                            <div class="">
                                                <input class="form-check-input" type="radio" value="Awaiting Divorce" name="marital_status" id="Awaiting">
                                                <label class="form-check-label" for="Awaiting">Awaiting Divorce</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-100 radios mt-3">
                                        <p class="text-center">Date of Birth</p>
                                        <div class="fields">
                                            <div class="select-wrapper">
                                                <select name="month" id="" class="form-control">
                                                    <option value="">Month</option>
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                            <div class="select-wrapper">
                                                <select name="day" class="form-control">
                                                    <option value="">Day</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>
                                            </div>
                                            <div class="select-wrapper">
                                                <select name="year" id="" class="form-control">
                                                    <option value="">Year</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2000">2000</option>
                                                    <option value="1999">1999</option>
                                                    <option value="1998">1998</option>
                                                    <option value="1997">1997</option>
                                                    <option value="1996">1996</option>
                                                    <option value="1995">1995</option>
                                                    <option value="1994">1994</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1992">1992</option>
                                                    <option value="1991">1991</option>
                                                    <option value="1990">1990</option>
                                                    <option value="1989">1989</option>
                                                    <option value="1988">1988</option>
                                                    <option value="1987">1987</option>
                                                    <option value="1986">1986</option>
                                                    <option value="1985">1985</option>
                                                    <option value="1984">1984</option>
                                                    <option value="1983">1983</option>
                                                    <option value="1982">1982</option>
                                                    <option value="1981">1981</option>
                                                    <option value="1980">1980</option>
                                                    <option value="1979">1979</option>
                                                    <option value="1978">1978</option>
                                                    <option value="1977">1977</option>
                                                    <option value="1976">1976</option>
                                                    <option value="1975">1975</option>
                                                    <option value="1974">1974</option>
                                                    <option value="1973">1973</option>
                                                    <option value="1972">1972</option>
                                                    <option value="1971">1971</option>
                                                    <option value="1970">1970</option>
                                                    <option value="1969">1969</option>
                                                    <option value="1968">1968</option>
                                                    <option value="1967">1967</option>
                                                    <option value="1966">1966</option>
                                                    <option value="1965">1965</option>
                                                    <option value="1964">1964</option>
                                                    <option value="1963">1963</option>
                                                    <option value="1962">1962</option>
                                                    <option value="1961">1961</option>
                                                    <option value="1960">1960</option>
                                                    <option value="1959">1959</option>
                                                    <option value="1958">1958</option>
                                                    <option value="1957">1957</option>
                                                    <option value="1956">1956</option>
                                                    <option value="1955">1955</option>
                                                    <option value="1954">1954</option>
                                                    <option value="1953">1953</option>
                                                    <option value="1952">1952</option>
                                                    <option value="1951">1951</option>
                                                    <option value="1950">1950</option>
                                                    <option value="1949">1949</option>
                                                    <option value="1948">1948</option>
                                                    <option value="1947">1947</option>
                                                    <option value="1946">1946</option>
                                                    <option value="1945">1945</option>
                                                    <option value="1944">1944</option>
                                                    <option value="1943">1943</option>
                                                    <option value="1942">1942</option>
                                                    <option value="1941">1941</option>
                                                    <option value="1940">1940</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100 radios">
                                        <p class="text-center mt-1">Religion</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="w-30 select-wrapper " style="">
                                                <select name="religion" id="" class="form-control">
                                                    <option value="">Please Select</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Buddhism">Buddhism</option>
                                                    <option value="Christianity">Christianity</option>
                                                    <option value="Atheist">Atheist</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100 radios">
                                        <p class="text-center mt-1">Education</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="w-30 select-wrapper " style="">
                                                <select name="education" id="" class="form-control">
                                                    <option value="">Education</option>
                                                    <option value="Secondary Education">Secondary Education</option>
                                                    <option value="Higher Secondary">Higher Secondary</option>
                                                    <option value="Diploma in Engineering">Diploma in Engineering</option>
                                                    <option value="Fazil">Fazil</option>
                                                    <option value="Bachelor's">Bachelor's</option>
                                                    <option value="Master's">Master's</option>
                                                    <option value="Doctorate">Doctorate</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="contineBtn mt-2" id="cardBtn_1" > Save & Continue</button>
                                    </div>
                                </div>
                                <div class="submitDtsCard" id="card_2">
                                    <div class="w-100 radios">
                                        <p class="text-center">Nationality</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="select-wrapper">
                                                <select name="nationality" id="nationality" class="form-control">
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->nicename }}" {{ $country->nicename == 'Bangladesh' ? 'selected' : '' }}>
                                                            {{ $country->nicename }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-100 radios" id="birthPlaceWrapper">
                                        <p class="text-center mt-2">Place of Birth</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="select-wrapper">
                                                <select name="birth_place" id="birthPlaceSelect" class="form-control">
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->name }}">{{ $district->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Hidden text input for manual birth place entry -->
                                    <div class="w-100 radios mb-3" id="birthPlaceTextWrapper" style="display: none;">
                                        <p class="text-center mt-1">Place of Birth</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <input type="text" name="birth_place_text" id="birthPlaceText" class="form-control" placeholder="Enter your birth place (Ex: New York, USA)">
                                        </div>
                                    </div>

                                    <div class="w-100 radios">
                                        <p class="text-center">Living in Bangladesh since ?</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="select-wrapper " style="">
                                                <select name="in_bangladesh_since" class="form-control">
                                                    <option value="Born">Born</option>
                                                    <option value="Moved here for Job">Moved here for Job</option>
                                                    <option value="Moved here for education">Moved here for education</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="contineBtn mt-3" id="cardBtn_1" > Save & Continue</button>
                                    </div>

                                </div>
                                <div class="submitDtsCard" id="card_3">
                                    <div class="w-100 radios">
                                        <p class="text-center">What is your Religion ?</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="select-wrapper " style="">
                                                <select name="religion" class="form-control">
                                                    <option value="">Please Select</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Buddhism">Buddhism</option>
                                                    <option value="Christianity">Christianity</option>
                                                    <option value="Atheist">Atheist</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100 radios">
                                        <p class="text-center mt-3">Profession</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="select-wrapper " style="">
                                                <select name="profession" class="form-control">
                                                    <option value="">Please Select</option>
                                                    <option value="Private Company">Private Company</option>
                                                    <option value="Govt. Service">Govt. Service</option>
                                                    <option value="Business">Business</option>
                                                    <option value="Not Working">Not Working</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100 radios">
                                        <p class="text-center">Your Income</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="select-wrapper " style="">
                                                <select name="monthly_income" class="form-control">
                                                    <option value="">Please Select</option>
                                                    <option value="10,000 - 20,000">10,000 - 20,000 Bdt</option>
                                                    <option value="20,000 - 30,000">20,000 - 30,000 Bdt</option>
                                                    <option value="30,000 - 40,000">30,000 - 40,000 Bdt</option>
                                                    <option value="40,000 - 50,000">40,000 - 50,000 Bdt</option>
                                                    <option value="50,000 - 60,000">50,000 - 60,000 Bdt</option>
                                                    <option value="60,000 - 70,000">60,000 - 70,000 Bdt</option>
                                                    <option value="70,000 - 80,000">70,000 - 80,000 Bdt</option>
                                                    <option value="80,000 - 90,000">80,000 - 90,000 Bdt</option>
                                                    <option value="90,000 - 1lakh">90,000 - 1Lakh Bdt</option>
                                                    <option value="1 Lakh +">1 Lakh +</option>
                                                    <option value="Do Not Mention">Do Not Mention</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="contineBtn mt-3" id="cardBtn_1" > Save & Continue</button>
                                    </div>
                                </div>
                                <div class="submitDtsCard" id="card_4">
                                    <div class="w-100 radios">
                                        <p class="text-center">Select Your District</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="select-wrapper">
                                                <select name="district" id="districtSelect" class="form-control">
                                                    <option value="">Please Select</option>
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-100 radios">
                                        <p class="text-center mt-3">Select Your City</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="select-wrapper">
                                                <select name="upazila" id="upazilaSelect" class="form-control">
                                                    <option value="">Please Select</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-100 radios">
                                        <p class="text-center">Living With Family ?</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">

                                                <div class="">
                                                    <input class="form-check-input" type="radio" value="Yes" name="living_with_family" id="Yes">
                                                    <label class="form-check-label" for="Yes">Yes</label>
                                                </div>
                                                <div class="">
                                                    <input class="form-check-input" type="radio" value="No" name="living_with_family" id="No">
                                                    <label class="form-check-label" for="No">No </label>
                                                </div>

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="contineBtn mt-3" id="cardBtn_1" > Save & Continue</button>
                                    </div>
                                </div>
                                <div class="submitDtsCard" id="card_5">
                                    <div class="w-100 radios">
                                        <p class="text-center">Height</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="select-wrapper " style="">
                                                <select name="height" class="form-control">
                                                    <option value="">Please Select</option>
                                                    <option value="5'">5'</option>
                                                    <option value="5.1'">5.1'</option>
                                                    <option value="5.2'">5.2'</option>
                                                    <option value="5.3'">5.3'</option>
                                                    <option value="5.4'">5.4'</option>
                                                    <option value="5.5'">5.5'</option>
                                                    <option value="5.6'">5.6'</option>
                                                    <option value="5.7'">5.7'</option>
                                                    <option value="5.8'">5.8'</option>
                                                    <option value="5.9'">5.9'</option>
                                                    <option value="5.10'">5.10'</option>
                                                    <option value="5.11'">5.11'</option>
                                                    <option value="6'">6'</option>
                                                    <option value="6.1'">6.1'</option>
                                                    <option value="6.2'">6.2'</option>
                                                    <option value="6.3'">6.3'</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100 radios">
                                        <p class="text-center mt-3">Weight</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="select-wrapper " style="">
                                                <select name="weight" class="form-control">
                                                    <option value="">Please Select</option>
                                                    <option value="50-60 Kg">50-60 Kg</option>
                                                    <option value="60-70 Kg">60-70 Kg</option>
                                                    <option value="70-80 Kg">70-80 Kg</option>
                                                    <option value="80-90 Kg">80-90 Kg</option>
                                                    <option value="90-100 Kg">90-100 Kg</option>
                                                    <option value="100-110 Kg">100-110 Kg</option>
                                                    <option value="110-120 Kg">110-120 Kg</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100 radios">
                                        <p class="text-center">Body Type</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="select-wrapper " style="">
                                                <select name="body_type" class="form-control">
                                                    <option value="">Please Select</option>
                                                    <option value="Extra Slim">Extra Slim</option>
                                                    <option value="Slim">Slim</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="Healthy">Healthy</option>
                                                    <option value="Over Weight">Over Weight</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100 radios">
                                        <p class="text-center">Blood Group</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="select-wrapper " style="">
                                                <select name="blood_group" class="form-control">
                                                    <option value="">Please Select</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="contineBtn mt-3" id="cardBtn_1" > Save & Continue</button>
                                    </div>
                                </div>
                                <div class="submitDtsCard" id="card_6">
                                    <div class="w-100 radios">
                                        <p class="text-center">Complexion</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="select-wrapper " style="">
                                                <select name="complexion" class="form-control">
                                                    <option value="">Please Select</option>
                                                    <option value="Fair Skin">Fair Skin</option>
                                                    <option value="Medium Skin">Medium Skin</option>
                                                    <option value="Olive or Light Brown Skin">Olive or Light Brown Skin</option>
                                                    <option value="Brown Skin">Brown Skin</option>
                                                    <option value="Black Skin">Black Skin</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100 radios">
                                        <p class="text-center mt-3">Bad Habits</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="select-wrapper " style="">
                                                <select name="bad_habit" class="form-control">
                                                    <option value="">Please Select</option>
                                                    <option value="Smoking">Smoking</option>
                                                    <option value="Drinking">Drinking</option>
                                                    <option value="Smoking & Drinking">Smoking & Drinking</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100 radios">
                                        <p class="text-center">Family Status</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="">
                                                <input class="form-check-input" type="radio" value="Rich" name="family_status" id="Rich">
                                                <label class="form-check-label" for="Rich">Rich </label>
                                            </div>
                                            <div class="">
                                                <input class="form-check-input" type="radio" value="Upper Middle Class" name="family_status" id="Upper_Middle">
                                                <label class="form-check-label" for="Upper_Middle">Upper Middle Class </label>
                                            </div>
                                            <div class="">
                                                <input class="form-check-input" type="radio" value="Middle Class" name="family_status" id="Middle">
                                                <label class="form-check-label" for="Middle">Middle Class </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="contineBtn mt-3" id="cardBtn_1" > Save & Continue</button>
                                    </div>
                                </div>
                                <div class="submitDtsCard" id="card_7">
                                    <div class="w-100 radios">
                                        <div class="termText">
                                            <h3>Welcome to Link My Heart! </h3>
                                            <p>These terms and conditions outline the rules and regulations for using the Link My Heart Matrimony Website, located at [Link My Heart URL]. By accessing this website, we assume you accept these terms and conditions. If you do not agree to take all of the terms and conditions stated on this page, do not continue using Link My Heart. </p>

                                            <h3> 1. Eligibility</h3>
                                            <p> You must be 18 years or older to register and use the services provided by Link My Heart.
                                            You must be legally allowed to marry under the laws applicable to you and must not have any restrictions against entering into matrimonial relationships.</p>
                                            <h3> 2. Account Registration and Security</h3>
                                            <p>You are required to provide accurate, complete, and updated information while creating an account.
                                            You are responsible for maintaining the confidentiality of your account credentials and for any activities under your account.
                                            You agree to immediately notify us of any unauthorized use of your account or any other breach of security.</p>
                                            <h3> 3. Use of Service</h3>
                                            <p> Link My Heart is a platform that connects individuals seeking matrimonial relationships. We are not responsible for the authenticity of the information provided by users.
                                            You agree not to engage in any unlawful, abusive, or objectionable behavior while using the website.
                                            You must not use this website for any purpose other than personal use related to finding matrimonial connections.</p>
                                            <h3> 4. Content Posted by Users</h3>
                                            <p> Users are responsible for the content they upload, including personal information, images, and other details.
                                            You warrant that the information provided is accurate and does not infringe on any third-party rights.
                                            Link My Heart reserves the right to review, modify, or remove content that violates these terms or is deemed inappropriate.</p>
                                            <h3> 5. Subscription Plans and Payments</h3>
                                            <p>Certain features on Link My Heart may require payment. By subscribing to a plan, you agree to our payment terms and conditions.
                                            All payments made are non-refundable unless specified otherwise in our refund policy.</p>
                                            <h3> 6. Privacy</h3>
                                            <p>By using Link My Heart, you agree to our [Privacy Policy] (insert link), which governs how we collect, use, and protect your personal information.
                                            Your information may be shared with other users of the website, but we take measures to protect your data.</p>
                                            <h3> 7. Communication</h3>
                                            <p>Link My Heart may communicate with you via email, SMS, or other electronic forms of communication for account updates, match notifications, and other services.
                                            You consent to receive such communications and can unsubscribe from notifications at any time.</p>
                                            <h3> 8. User Conduct</h3>
                                            <p>You agree to behave respectfully and lawfully while interacting with other users.
                                            Any form of harassment, abuse, fraud, or harm to other users will result in immediate termination of your account.
                                            Link My Heart reserves the right to block, suspend, or delete any user account found in violation of these terms.</p>
                                            <h3> 9. Termination</h3>
                                            <p>Link My Heart may suspend or terminate your account if you violate any of these terms and conditions, or for any reason at our discretion, with or without notice.
                                            Upon termination, your access to the platform will cease, and you will not be entitled to any refunds for payments made.</p>
                                            <h3> 10. Disclaimers</h3>
                                            <p>Link My Heart is not responsible for the outcome of any relationships formed through our platform. We do not guarantee the accuracy of user-provided information or the suitability of matches.
                                            The website is provided "as is," and we disclaim all warranties, express or implied, including any implied warranties of merchantability, fitness for a particular purpose, or non-infringement.</p>
                                            <h3> 11. Limitation of Liability</h3>
                                            <p>Link My Heart will not be liable for any direct, indirect, incidental, consequential, or exemplary damages arising from your use of the platform.
                                            We are not responsible for any disputes, interactions, or communications that occur between users.</p>
                                            <h3> 12. Indemnification</h3>
                                            <p>You agree to indemnify and hold Link My Heart, its employees, affiliates, and partners harmless from any claims, damages, or expenses arising from your use of the website, your violation of these terms, or your violation of any third-party rights.</p>
                                            <h3> 13. Amendments</h3>
                                            <p>Link My Heart reserves the right to amend or update these terms and conditions at any time. The latest version will be posted on the website, and your continued use of the service constitutes acceptance of the updated terms.</p>
                                            <h3> 14. Governing Law</h3>
                                            <p>These terms and conditions are governed by the laws of Bangladesh, and any disputes arising from the use of Link My Heart will be subject to the exclusive jurisdiction of the courts of Bangladesh.</p>
                                            <h3> Contact Us</h3>
                                            <p>If you have any questions or concerns regarding these terms and conditions, please contact us at info@linkmyheart.com.


                                        </div>
                                    </div>
                                    <div class="w-100 mt-3 termscheck">
                                        <div class="d-flex align-items-center justify-content-start column-gap-2">
                                            <i class="fa-regular fa-square-check text-white checkedTermsInputIcon"></i>
                                            <input type="checkbox" name="terms" value="Accepted" id="terms" class="checkedTermsInput">
                                            <label for="terms" class="text-white">I Agree with all Terms & Conditions</label>
                                        </div>
                                    </div>
                                    <div class="w-100 termscheck mt-3">

                                        <div class="d-flex align-items-center justify-content-center column-gap-2 w-100">
                                            <p class="text-center">Enter Your Moblie Number</p>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <div class="bdCode">+880</div>
                                                <input class="form-control verifyPhoneNumber" type="number" name="phone" id="phone" placeholder="Enter Your Moblie Number">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="contineBtn phonVerifyBtn mt-3" id="cardBtn_1" > Verify</button>
                                    </div>
                                </div>
                                <div class="submitDtsCard" id="card_8">

                                    <div class="w-100 termscheck mt-3">
                                        <div class="d-flex align-items-center justify-content-center column-gap-2 w-100">
                                            <p class="text-center">Enter Your Verification Code</p>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <input class="form-control" type="number" name="code" id="phoneCode" placeholder="Enter Verification Code" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="phonVerifyBtn mt-3" id="cardBtn_verify"> Verify</button>
                                    </div>
                                    <button type="button" class="contineBtn mt-3 d-none" id="cardBtn_8"> Continue</button>

                                </div>
                                <div class="submitDtsCard" id="card_9">
                                    <div class="w-100 radios">
                                        <p class="text-center">Upload Your Image</p>
                                        <div class="d-flex align-items-center justify-content-center column-gap-2">
                                            <div class="imageDrop">
                                                <div id="image-display">
                                                    <label for="upload-button" class="imageReUploadInput">Upload Your Photo</label>
                                                </div>
                                                <input type="file" name="image" id="upload-button" accept="image/*" />
                                                <label for="upload-button" id="imageUploadInput" class="imageUploadInput">
                                                    <i class="fa-solid fa-upload" style="font-size: 60px"></i>&nbsp; Upload Your Photo
                                                </label>
                                                <div id="error"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-start mt-3">
                                        <textarea name="desc" id="" class="form-control" placeholder="Enter Your Bio"></textarea>

                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="phonVerifyBtn mt-3" id="cardBtn_1" > Save & Continue</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-your-partner-profile" role="tabpanel" aria-labelledby="v-pills-your-partner-profile-tab">
                    <h2 class="p-2 mt-3 mb-0 px-4 tabForms" style="font-weight: 800; margin-left: 10px">Hey! Create Your Partner Profile</h2>
                    <div class="row sticky-div p-0">
                        <div class="form-container pb-3">
                            <form id="your-partner-Profile" class="px-4 tabForms yourProfileCreate">
                                @csrf
                                <ul class="nav nav-tabs profile-form-steps" id="myTab" role="tablist">
                                    <li class="nav-item border-0" role="presentation">
                                      <button class="nav-link profile-step active" id="home1-tab" data-bs-toggle="tab" data-bs-target="#home1" type="button" role="tab" aria-controls="home1" aria-selected="true">Basic Information</button>
                                    </li>
                                    <li class="nav-item border-0" role="presentation">
                                      <button class="nav-link profile-step" id="profile1-tab" data-bs-toggle="tab" data-bs-target="#profile1" type="button" role="tab" aria-controls="profile1" aria-selected="false">Educational & Career Info.</button>
                                    </li>
                                    <li class="nav-item border-0" role="presentation">
                                      <button class="nav-link profile-step" id="contact1-tab" data-bs-toggle="tab" data-bs-target="#contact1" type="button" role="tab" aria-controls="contact1" aria-selected="false">Family Info.</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home1-tab">
                                        <div class="row p-0">
                                            <div class="col-md-4 mt-0">
                                                <div class="imageDrop">
                                                    <div id="image-display1">
                                                        <label for="upload-button1" class="imageReUploadInput">Upload Your Photo</label>
                                                    </div>
                                                    <input type="file" name="image" id="upload-button1" accept="image/*" />
                                                    <label for="upload-button1" id="imageUploadInput1" class="imageUploadInput">
                                                        <i class="fa-solid fa-upload" style="font-size: 60px"></i>&nbsp; Upload Your Photo
                                                    </label>
                                                    <div id="error1"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea name="desc" class="profileDesc" placeholder="Write something about your partner"></textarea>
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <input type="text" name="relation_with_partner" placeholder="Relation With Your Partner" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <input type="text" name="first_name" placeholder="First Name" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <input type="text" name="last_name" placeholder="Last Name" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <select name="gender" class="profileInput">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>

                                                </select>
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <input type="text" name="religion" placeholder="Religion" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <input type="date" name="date_of_birth" placeholder="Date Of Birth" class="profileInput" id="dateOfBirth2">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <input type="text" name="birth_place" placeholder="Birth Place" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <input type="text" name="nationality" placeholder="Nationality" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <input type="text" name="present_address" placeholder="Present Address" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <input type="email" name="email" placeholder="Mail ID" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <input type="text" name="contact_number" placeholder="Contact Number" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <select name="maritial_status" class="profileInput">
                                                    <option value="">Select Marital Status</option>
                                                    <option value="single">Single</option>
                                                    <option value="divorced">Divorced</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <select name="blood_group" class="profileInput">
                                                    <option value="">Select Blood Group</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <select name="hobby" class="profileInput">
                                                    <option value="">Select Hobby</option>
                                                    <option value="Reading">Reading</option>
                                                    <option value="Writing">Writing</option>
                                                    <option value="Gaming">Gaming</option>
                                                    <option value="Travelling">Travelling</option>
                                                    <option value="Singing">Singing</option>
                                                    <option value="Dancing">Dancing</option>
                                                    <option value="Art">Art</option>
                                                    <option value="Eating">Eating</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <select name="height" class="profileInput">
                                                    <option value="">Select Height</option>
                                                    <option value="5'">5'</option>
                                                    <option value="5.1'">5.1'</option>
                                                    <option value="5.2'">5.2'</option>
                                                    <option value="5.3'">5.3'</option>
                                                    <option value="5.4'">5.4'</option>
                                                    <option value="5.5'">5.5'</option>
                                                    <option value="5.6'">5.6'</option>
                                                    <option value="5.7'">5.7'</option>
                                                    <option value="5.8'">5.8'</option>
                                                    <option value="5.9'">5.9'</option>
                                                    <option value="5.10'">5.10'</option>
                                                    <option value="5.11'">5.11'</option>
                                                    <option value="6'">6'</option>
                                                    <option value="6.1'">6.1'</option>
                                                    <option value="6.2'">6.2'</option>
                                                    <option value="6.3'">6.3'</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <select name="weight" class="profileInput">
                                                    <option value="">Select Weight</option>
                                                    <option value="50-60 Kg">50-60 Kg</option>
                                                    <option value="60-70 Kg">60-70 Kg</option>
                                                    <option value="70-80 Kg">70-80 Kg</option>
                                                    <option value="80-90 Kg">80-90 Kg</option>
                                                    <option value="90-100 Kg">90-100 Kg</option>
                                                    <option value="100-110 Kg">100-110 Kg</option>
                                                    <option value="110-120 Kg">110-120 Kg</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary mt-3 mb-4 profile-next-step" id="nextToProfile1">Next</button>
                                    </div>
                                    <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile1-tab">
                                        <div class="row p-0">
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <input type="text" name="education_level" placeholder="Highest Level of Education" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <input type="text" name="institute_name" placeholder="Institute Name" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <select name="working_with" class="profileInput" id="working_with1">
                                                    <option value="">Select Working With</option>
                                                    <option value="Private Company">Private Company</option>
                                                    <option value="Govt. Service">Govt. Service</option>
                                                    <option value="Business">Business</option>
                                                    <option value="Not Working">Not Working</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0"  id="employer_name1">
                                                <input type="text" name="employer_name" placeholder="Employer Name" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0" id="designation1">
                                                <input type="text" name="designation"  placeholder="Designation" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0" id="duration1">
                                                <input type="text" name="duration"  placeholder="Duration" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0" id="monthly_income1">
                                                <input type="number" name="monthly_income" placeholder="Monthly Income" class="profileInput">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary mt-3 profile-prev-step" id="prevToHome1">Previous</button>
                                        <button type="button" class="btn btn-primary mt-3 profile-next-step" id="openFamilyInfoTab">Next</button>
                                    </div>
                                    <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact1-tab">
                                        <div class="row p-0">
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <select name="father_status" class="profileInput">
                                                    <option value="">Select Father Status</option>
                                                    <option value="Employed">Employed</option>
                                                    <option value="Business">Business</option>
                                                    <option value="Retired">Retired</option>
                                                    <option value="Not Working">Not Working</option>
                                                    <option value="Passedaway">Passedaway</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <select name="mother_status" class="profileInput">
                                                    <option value="">Select Mother Status</option>
                                                    <option value="Home Maker">Home Maker</option>
                                                    <option value="Employed">Employed</option>
                                                    <option value="Business">Business</option>
                                                    <option value="Retired">Retired</option>
                                                    <option value="Passedaway">Passedaway</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <input type="number" name="number_of_sibling" placeholder="Number of Sibling" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <select name="family_type" class="profileInput">
                                                    <option value="">Select Family Type</option>
                                                    <option value="Joint">Joint</option>
                                                    <option value="Nuclear">Nuclear</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary mt-3 profile-prev-step" id="openProfileTab">Previous</button>
                                        <button type="submit" class="btn btn-secondary mt-3 profile-submit-form">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                  </div>
                  <div class="tab-pane sticky-div fade BuyCredit" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="bg-price p-5 my-3">
                        <div>
                            <div>
                                <h1 class="text-center mainHeading">Pay only for what you need</h1>
                                <p class="text-center subHeading">Pricing Plans for every budget</p>
                            </div>
                            <div>
                                <div class="d-flex align-items-start w-100 priceMobileTab">
                                    <div class="nav flex-column nav-pills me-3 w-25 pt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                      <div><h4 class="text-center text-bold mt-5 mb-2">Choose Plan</h4></div>
                                      <div class="priceMobileBtnDiv">
                                        <button class="nav-link " id="v-pills-homePlan-tab" data-bs-toggle="pill" data-bs-target="#v-pills-homePlan" type="button" role="tab" aria-controls="v-pills-homePlan" aria-selected="false"><i class="fa-solid fa-circle-dot"></i> Yearly Billing</button>
                                        <button class="nav-link active" id="v-pills-profilePlan-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profilePlan" type="button" role="tab" aria-controls="v-pills-profilePlan" aria-selected="true"><i class="fa-solid fa-circle-dot"></i> Monthly Billing</button>
                                      </div>
                                    </div>
                                    <div class="tab-content w-75" id="v-pills-tabContent">
                                      <div class="tab-pane fade" id="v-pills-homePlan" role="tabpanel" aria-labelledby="v-pills-homePlan-tab">
                                        <div class="p-4 d-flex justify-content-center align-items-center w-100 mobilePriceTabCard">
                                            <div class="pricePlanCard1">
                                                @php
                                                    $freePlan = $plans->where('id', 1)->first();
                                                @endphp

                                                @if ($plans->isNotEmpty())
                                                    @foreach ($plans as $plan )
                                                        <div class="pricePlanCards" style="background: {{ $plan->background_color }} ;">
                                                            <div class="border-bottom-1 pb-3">
                                                                <div class="d-flex align-items-center justify-content-between column-gap-4">
                                                                    <h2 class="planTitle" style="color: {{ $plan->title_color }} ;">{{ $plan->name }}</h2>
                                                                    {!! isset($plan->badge) ? '<p class="planBadge">'. $plan->badge .'</p>' : '' !!}
                                                                </div>
                                                                <p class="planSubTitle" style="color: {{ $plan->text_color }} ;"> {{ $plan->susTitle }} </p>
                                                                <h1 class="planAmount" style="color: {{ $plan->text_color }} ;">BDT {{ $plan->price }} {!! isset($plan->time) ? '<span style="color:' . $plan->plantimes_color . ';">/ ' . $plan->time . '</span>' : '' !!}
                                                                </h1>
                                                                {!! isset($plan->subdesc) ? '<p class="planAmountText" style="color:' . $plan->plantimes_color . ';">' . $plan->subdesc . '</p>' : '' !!}
                                                            </div>
                                                            @php
                                                                $services = explode(',', $plan->services);
                                                            @endphp
                                                            <div class="py-3">
                                                                @foreach($services as $service)
                                                                    <p class="planServices" style="color: {{ $plan->text_color }} ;"><i class="fa-solid fa-circle-check"></i> {{ $service }}</p>
                                                                @endforeach
                                                            </div>
                                                            <div>
                                                                @if (isset(Auth::user()->plans))
                                                                    @if ( Auth::user()->plans->plan_id == $plan->id )
                                                                        <a class="plansBtn disabled" style="color: {{ $plan->buttons_color }} ; background: {{ $plan->buttons_background }} ; border-color: {{ $plan->buttons_background == $plan->background_color ? '#b9b9b9' : 'transparent' }}"> Current Plan </a>
                                                                    @else
                                                                        <a href="javascript:void(0);" class="price1Btn plansBtn" id="choose-plan-free" data-plan-id="{{ $plan->id }}" style="color: {{ $plan->buttons_color }} ; background: {{ $plan->buttons_background }} ; border-color: {{ $plan->buttons_background == $plan->background_color ? '#b9b9b9' : 'transparent' }}"> Choose Plan </a>
                                                                    @endif
                                                                @else
                                                                    <a href="javascript:void(0);" class="price1Btn plansBtn" id="choose-plan-free" data-plan-id="{{ $plan->id }}" style="color: {{ $plan->buttons_color }} ; background: {{ $plan->buttons_background }} ; border-color: {{ $plan->buttons_background == $plan->background_color ? '#b9b9b9' : 'transparent' }}"> Choose Plans </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                            {{-- <div class="pricePlanCard2">
                                                @php
                                                    $freePlan = $plans->where('id', 2)->first();
                                                @endphp

                                                @if($freePlan)
                                                <div class="border-bottom-1 pb-3">
                                                    <h2 class="priceTitle">Pro</h2>
                                                    <p class="priceSubTitle"> Basic Chat Functionality </p>
                                                    <h1 class="priceAmount">BDT 299 <span>/ mo</span></h1>
                                                    <p class="priceAmountText">Per month renew</p>
                                                </div>
                                                <div class="py-3">
                                                    <p class="planServices"><i class="fa-solid fa-circle-check"></i> 30 days history</p>
                                                    <p class="planServices"><i class="fa-solid fa-circle-check"></i> Up to 1000 messages/mo</p>
                                                    <p class="planServices"><i class="fa-solid fa-circle-check"></i> Unlimited AI Capabilities</p>
                                                </div>
                                                <div>
                                                    @if (isset(Auth::user()->plans))
                                                        @if ( Auth::user()->plans->plan_id == $freePlan->id )
                                                        <a class="price1tn disabled"> Current Plan </a>
                                                        @else
                                                        <a href="javascript:void(0);" class="price1Btn" id="choose-plan-free" data-plan-id="{{ $freePlan->id }}"> Choose Plan </a>
                                                        @endif
                                                    @else
                                                        <a href="javascript:void(0);" class="price1Btn" id="choose-plan-free" data-plan-id="{{ $freePlan->id }}"> Choose Plans </a>
                                                    @endif

                                                </div>
                                                @endif
                                            </div>
                                            <div class="pricePlanCard3">
                                                <div class="border-bottom-1 pb-3">
                                                    <div class="d-flex align-items-center justify-content-between column-gap-4">
                                                        <h2 class="priceTitle">Pro Plus</h2>
                                                        <p class="pricePopularTag">Popular</p>
                                                    </div>
                                                    <p class="priceSubTitle"> Basic Chat Functionality </p>
                                                    <h1 class="priceAmount">BDT 499 <span>/ mo</span></h1>
                                                    <p class="priceAmountText">Per month renew</p>
                                                </div>
                                                <div class="py-3">
                                                    <p class="planServices"><i class="fa-solid fa-circle-check"></i> 30 days history</p>
                                                    <p class="planServices"><i class="fa-solid fa-circle-check"></i> Up to 1000 messages/mo</p>
                                                    <p class="planServices"><i class="fa-solid fa-circle-check"></i> Unlimited AI Capabilities</p>
                                                </div>
                                                <div>
                                                    <a href="javascript:void(0);" class="price1Btn" id="choose-plan-pro-plus" data-plan-id="3"> Choose Plan </a>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="tab-pane fade  show active" id="v-pills-profilePlan" role="tabpanel" aria-labelledby="v-pills-profilePlan-tab">
                                        <div class="p-4 d-flex justify-content-center align-items-center w-100 mobilePriceTabCard">
                                            <div class="pricePlanCard1">
                                                <div class="border-bottom-1 pb-3">
                                                    <h2 class="priceTitle">Free</h2>
                                                    <p class="priceSubTitle"> Basic Chat Functionality </p>
                                                    <h1 class="priceAmount">BDT 0</h1>
                                                    <p class="priceAmountText">Per month renew</p>
                                                </div>
                                                <div class="py-3">
                                                    <p class="planServices"><i class="fa-solid fa-circle-check"></i> 30 days history</p>
                                                    <p class="planServices"><i class="fa-solid fa-circle-check"></i> Up to 1000 messages/mo</p>
                                                    <p class="planServices"><i class="fa-solid fa-circle-check"></i> Unlimited AI Capabilities</p>
                                                </div>
                                                <div>
                                                    <a href="" class="price1Btn"> Choose Plan </a>
                                                </div>
                                            </div>
                                            <div class="pricePlanCard2">
                                                <div class="border-bottom-1 pb-3">
                                                    <h2 class="priceTitle">Pro</h2>
                                                    <p class="priceSubTitle"> Basic Chat Functionality </p>
                                                    <h1 class="priceAmount">BDT 299 <span>/ mo</span></h1>
                                                    <p class="priceAmountText">Per month renew</p>
                                                </div>
                                                <div class="py-3">
                                                    <p class="planServices"><i class="fa-solid fa-circle-check"></i> 30 days history</p>
                                                    <p class="planServices"><i class="fa-solid fa-circle-check"></i> Up to 1000 messages/mo</p>
                                                    <p class="planServices"><i class="fa-solid fa-circle-check"></i> Unlimited AI Capabilities</p>
                                                </div>
                                                <div>
                                                    <a href="" class="price1Btn"> Choose Plan </a>
                                                </div>
                                            </div>
                                            <div class="pricePlanCard3">
                                                <div class="border-bottom-1 pb-3">
                                                    <div class="d-flex align-items-center justify-content-between column-gap-4">
                                                        <h2 class="priceTitle">Pro Plus</h2>
                                                        <p class="pricePopularTag">Popular</p>
                                                    </div>
                                                    <p class="priceSubTitle"> Basic Chat Functionality </p>
                                                    <h1 class="priceAmount">BDT 499 <span>/ mo</span></h1>
                                                    <p class="priceAmountText">Per month renew</p>
                                                </div>
                                                <div class="py-3">
                                                    <p class="planServices"><i class="fa-solid fa-circle-check"></i> 30 days history</p>
                                                    <p class="planServices"><i class="fa-solid fa-circle-check"></i> Up to 1000 messages/mo</p>
                                                    <p class="planServices"><i class="fa-solid fa-circle-check"></i> Unlimited AI Capabilities</p>
                                                </div>
                                                <div>
                                                    <a href="" class="price1Btn"> Choose Plan </a>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="tab-pane fade viewProfileTab" id="v-pills-messages1" role="tabpanel" aria-labelledby="v-pills-messages1-tab">
                    <div class="">
                        <h2 class="p-2 mt-3 mb-0 px-0 tabForms" style="font-weight: 800;">My Profile </h2>
                        @if (is_null($profileDetails))
                            <p> You didn't create your profile yet ! </p>
                        @else
                        <ul class="nav nav-tabs profile-form-steps mt-4" id="myTab" role="tablist">
                            <li class="nav-item border-0" role="presentation">
                              <button class="nav-link profile-step active" id="home3-tab" data-bs-toggle="tab" data-bs-target="#home3" type="button" role="tab" aria-controls="home3" aria-selected="true">Basic Information</button>
                            </li>
                            <li class="nav-item border-0" role="presentation">
                              <button class="nav-link profile-step" id="profile3-tab" data-bs-toggle="tab" data-bs-target="#profile3" type="button" role="tab" aria-controls="profile3" aria-selected="false">Educational & Career Info.</button>
                            </li>
                            <li class="nav-item border-0" role="presentation">
                              <button class="nav-link profile-step" id="contact3-tab" data-bs-toggle="tab" data-bs-target="#contact3" type="button" role="tab" aria-controls="contact3" aria-selected="false">Family Info.</button>
                            </li>
                        </ul>
                        <div class="tab-content sticky-div " id="myTabContent">
                            <div class="tab-pane fade show active mobileProfilePad" id="home3" role="tabpanel" aria-labelledby="home3-tab">
                                <div class="row p-0">
                                    <div class="col-md-4 mt-0">
                                        <div class="imageDrop">
                                            <img src="{{ asset($profileDetails->image) }}" class="w-60">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label> About Yourself </label>
                                        <textarea class="profileDesc" readonly>{{ $profileDetails->desc }}</textarea>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> First Name </label>
                                            <input type="text" value="{{ $profileDetails->first_name }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Last Name </label>
                                            <input type="text" value="{{ $profileDetails->last_name }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Gender </label>
                                            <input type="text" value="{{ $profileDetails->gender }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Religion </label>
                                            <input type="text" value="{{ $profileDetails->religion }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Date of Birth </label>
                                            <input type="date" value="{{ $profileDetails->date_of_birth }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Birth Place </label>
                                            <input type="text" value="{{ $profileDetails->birth_place }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Nationality </label>
                                            <input type="text" value="{{ $profileDetails->nationality }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Present Address </label>
                                            <input type="text" value="{{ $profileDetails->present_address }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Mail ID </label>
                                            <input type="text" value="{{ $profileDetails->email }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Contact Number </label>
                                            <input type="text" value="{{ $profileDetails->contact_number }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Marital Status </label>
                                            <input type="text" value="{{ $profileDetails->marital_status }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Blood Group </label>
                                            <input type="text" value="{{ $profileDetails->blood_group }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Hobby </label>
                                            <input type="text" value="{{ $profileDetails->hobby }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Height </label>
                                            <input type="text" value="{{ $profileDetails->height }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Weight </label>
                                            <input type="text" value="{{ $profileDetails->weight }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade mobileProfilePad" id="profile3" role="tabpanel" aria-labelledby="profile3-tab">
                                <div class="row p-0">
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Education Level </label>
                                            <input type="text" value="{{ $profileDetails->education_level }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Institute Name </label>
                                            <input type="text" value="{{ $profileDetails->institute_name }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Working With </label>
                                            <input type="text" value="{{ $profileDetails->working_with }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Employee Name </label>
                                            <input type="text" value="{{ $profileDetails->employer_name }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Designation </label>
                                            <input type="text" value="{{ $profileDetails->designation }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Duration </label>
                                            <input type="text" value="{{ $profileDetails->duration }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Monthly Income </label>
                                            <input type="text" value="{{ $profileDetails->monthly_income }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade mobileProfilePad" id="contact3" role="tabpanel" aria-labelledby="contact3-tab">
                                <div class="row p-0">
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Father Status </label>
                                            <input type="text" value="{{ $profileDetails->father_status }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Mother Status </label>
                                            <input type="text" value="{{ $profileDetails->mother_status }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Number of Sibling </label>
                                            <input type="text" value="{{ $profileDetails->number_of_sibling }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0 pt-2 mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label> Family Type </label>
                                            <input type="text" value="{{ $profileDetails->family_type }}" class="profileInput" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <h2 class="p-2 mt-3 mb-0 px-4 tabForms" style="font-weight: 800; margin-left: 10px">Change Password</h2>
                    <div class="row p-0 ">
                        <div class="form-container card border-0">
                            <form id="change-password-settings" class="px-4 settings">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 pl-0 pt-2 mt-0">
                                        <input type="password" name="password" placeholder="New Password" class="profileInput">
                                    </div>
                                    <div class="col-md-12 pl-0 pt-2 mt-0">
                                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="profileInput">
                                    </div>
                                    <button type="submit" class="btn btn-secondary mt-3 w-30 profile-submit-form">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-editProfile" role="tabpanel" aria-labelledby="v-pills-editProfile-tab">
                    <h2 class="p-2 mt-3 mb-0 tabForms" style="font-weight: 800;">Edit Profile</h2>
                    <div class="row editingYourProfile p-0 ">
                        <div class="form-container card border-0">
                            @if (is_null($profileDetails))
                            <p> You didn't create your profile yet ! </p>
                        @else
                        <div class="">
                            <form id="edit-your-profile-form">
                                @csrf
                                <ul class="nav nav-tabs profile-form-steps mt-4" id="myTab" role="tablist">
                                    <li class="nav-item border-0" role="presentation">
                                      <button class="nav-link profile-step active" id="home13-tab" data-bs-toggle="tab" data-bs-target="#home13" type="button" role="tab" aria-controls="home13" aria-selected="true">Basic Information</button>
                                    </li>
                                    <li class="nav-item border-0" role="presentation">
                                      <button class="nav-link profile-step" id="profile13-tab" data-bs-toggle="tab" data-bs-target="#profile13" type="button" role="tab" aria-controls="profile13" aria-selected="false">Educational & Career Info.</button>
                                    </li>
                                    <li class="nav-item border-0" role="presentation">
                                      <button class="nav-link profile-step" id="contact13-tab" data-bs-toggle="tab" data-bs-target="#contact13" type="button" role="tab" aria-controls="contact13" aria-selected="false">Family Info.</button>
                                    </li>
                                </ul>
                                <div class="tab-content sticky-div" id="myTabContent">
                                    <div class="tab-pane fade show active mobileProfilePad" id="home13" role="tabpanel" aria-labelledby="home13-tab">
                                        <div class="row p-0">
                                            <div class="col-md-4 mt-0">
                                                <div class="imageDrop">
                                                    <img src="{{ asset($profileDetails->image) }}" class="w-60 savedImagePre">
                                                    <div id="imagePreviewContainer" class="newImagePre" style="display: none;">
                                                        <img id="imagePreview" src="" alt="Uploaded Image" style="max-width: 100%; max-height: 100%;">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-start align-items-center column-gap-2 my-2">
                                                    <label class="UploadnewImageLabel" for="photoInput"> <i class="fa-solid fa-upload"></i> Upload New Image </label>
                                                    <input type="file" name="image" id="photoInput" accept="image/*" class="d-none">
                                                    <button type="button" class="UploadnewImageremove" id="removeImageButton"><i class="fa-solid fa-trash"></i> Remove</button>
                                                </div>

                                            </div>
                                            <div class="col-md-8 mt-2">
                                                <label> About Yourself </label>
                                                <textarea class="profileDesc" name="desc">{{ $profileDetails->desc }}</textarea>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> First Name </label>
                                                    <input type="text" name="first_name" value="{{ $profileDetails->first_name }}" class="profileInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Last Name </label>
                                                    <input type="text" name="last_name" value="{{ $profileDetails->last_name }}" class="profileInput" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Gender </label>
                                                    <select name="gender" class="profileInput">
                                                        <option value="Male" {{ $profileDetails->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                        <option value="Female" {{ $profileDetails->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Religion </label>
                                                    <input type="text" name="religion" value="{{ $profileDetails->religion }}" class="profileInput" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Date of Birth </label>
                                                    <input type="date" name="date_of_birth" value="{{ $profileDetails->date_of_birth }}" class="profileInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Birth Place </label>
                                                    <input type="text" name="birth_place" value="{{ $profileDetails->birth_place }}" class="profileInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Nationality </label>
                                                    <input type="text" name="nationality" value="{{ $profileDetails->nationality }}" class="profileInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Present Address </label>
                                                    <input type="text" name="present_address" value="{{ $profileDetails->present_address }}" class="profileInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Mail ID </label>
                                                    <input type="email" name="email" value="{{ $profileDetails->email }}" class="profileInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Contact Number </label>
                                                    <input type="text" name="contact_number" value="{{ $profileDetails->contact_number }}" class="profileInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Marital Status </label>
                                                    <select name="maritial_status" class="profileInput">
                                                        <option value="single" {{ $profileDetails->marital_status == 'single' ? 'selected' : '' }}>Single</option>
                                                        <option value="divorced" {{ $profileDetails->marital_status == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Blood Group </label>
                                                    <select name="blood_group" class="profileInput">
                                                        <option value="A+" {{ $profileDetails->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                                                        <option value="A-" {{ $profileDetails->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                                                        <option value="B+" {{ $profileDetails->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                                                        <option value="B-" {{ $profileDetails->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                                                        <option value="AB+" {{ $profileDetails->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                                                        <option value="AB-" {{ $profileDetails->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                                                        <option value="O+" {{ $profileDetails->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                                                        <option value="O-" {{ $profileDetails->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Hobby </label>
                                                    <select name="hobby" class="profileInput">

                                                        <option value="Reading" {{ $profileDetails->hobby == 'Reading' ? 'selected' : '' }}>Reading</option>
                                                        <option value="Writing" {{ $profileDetails->hobby == 'Writing' ? 'selected' : '' }}>Writing</option>
                                                        <option value="Gaming" {{ $profileDetails->hobby == 'Gaming' ? 'selected' : '' }}>Gaming</option>
                                                        <option value="Travelling" {{ $profileDetails->hobby == 'Travelling' ? 'selected' : '' }}>Travelling</option>
                                                        <option value="Singing" {{ $profileDetails->hobby == 'Singing' ? 'selected' : '' }}>Singing</option>
                                                        <option value="Dancing" {{ $profileDetails->hobby == 'Dancing' ? 'selected' : '' }}>Dancing</option>
                                                        <option value="Art" {{ $profileDetails->hobby == 'Art' ? 'selected' : '' }}>Art</option>
                                                        <option value="Eating" {{ $profileDetails->hobby == 'Eating' ? 'selected' : '' }}>Eating</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Height </label>
                                                    <select name="height" class="profileInput">

                                                        <option value="5'" {{ $profileDetails->height == "5'" ? 'selected' : '' }}>5'</option>
                                                        <option value="5.1'" {{ $profileDetails->height == "5.1'" ? 'selected' : '' }}>5.1'</option>
                                                        <option value="5.2'" {{ $profileDetails->height == "5.2'" ? 'selected' : '' }}>5.2'</option>
                                                        <option value="5.3'" {{ $profileDetails->height == "5.3'" ? 'selected' : '' }}>5.3'</option>
                                                        <option value="5.4'" {{ $profileDetails->height == "5.4'" ? 'selected' : '' }}>5.4'</option>
                                                        <option value="5.5'" {{ $profileDetails->height == "5.5'" ? 'selected' : '' }}>5.5'</option>
                                                        <option value="5.6'" {{ $profileDetails->height == "5.6'" ? 'selected' : '' }}>5.6'</option>
                                                        <option value="5.7'" {{ $profileDetails->height == "5.7'" ? 'selected' : '' }}>5.7'</option>
                                                        <option value="5.8'" {{ $profileDetails->height == "5.8'" ? 'selected' : '' }}>5.8'</option>
                                                        <option value="5.9'" {{ $profileDetails->height == "5.9'" ? 'selected' : '' }}>5.9'</option>
                                                        <option value="5.10'" {{ $profileDetails->height == "5.10'" ? 'selected' : '' }}>5.10'</option>
                                                        <option value="5.11'" {{ $profileDetails->height == "5.11'" ? 'selected' : '' }}>5.11'</option>
                                                        <option value="6'" {{ $profileDetails->height == "6'" ? 'selected' : '' }}>6'</option>
                                                        <option value="6.1'" {{ $profileDetails->height == "6.1'" ? 'selected' : '' }}>6.1'</option>
                                                        <option value="6.2'" {{ $profileDetails->height == "6.2'" ? 'selected' : '' }}>6.2'</option>
                                                        <option value="6.3'" {{ $profileDetails->height == "6.3'" ? 'selected' : '' }}>6.3'</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Weight </label>
                                                    <select name="weight" class="profileInput">

                                                        <option value="50-60 Kg" {{ $profileDetails->weight == "50-60 Kg" ? 'selected' : '' }}>50-60 Kg</option>
                                                        <option value="60-70 Kg" {{ $profileDetails->weight == "60-70 Kg" ? 'selected' : '' }}>60-70 Kg</option>
                                                        <option value="70-80 Kg" {{ $profileDetails->weight == "70-80 Kg" ? 'selected' : '' }}>70-80 Kg</option>
                                                        <option value="80-90 Kg" {{ $profileDetails->weight == "80-90 Kg" ? 'selected' : '' }}>80-90 Kg</option>
                                                        <option value="90-100 Kg" {{ $profileDetails->weight == "90-100 Kg" ? 'selected' : '' }}>90-100 Kg</option>
                                                        <option value="100-110 Kg" {{ $profileDetails->weight == "100-110 Kg" ? 'selected' : '' }}>100-110 Kg</option>
                                                        <option value="110-120 Kg" {{ $profileDetails->weight == "110-120 Kg" ? 'selected' : '' }}>110-120 Kg</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary mt-3 profile-next-step" id="updateProfileEduNext">Next</button>
                                    </div>
                                    <div class="tab-pane fade mobileProfilePad" id="profile13" role="tabpanel" aria-labelledby="profile13-tab">
                                        <div class="row p-0">
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Education Level </label>
                                                    <input type="text" name="education_level" value="{{ $profileDetails->education_level }}" class="profileInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Institute Name </label>
                                                    <input type="text" name="institute_name" value="{{ $profileDetails->institute_name }}" class="profileInput" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Working With </label>
                                                    <select name="working_with" class="profileInput">

                                                        <option value="Private Company" {{ $profileDetails->working_with == "Private Company" ? 'selected' : '' }}>Private Company</option>
                                                        <option value="Govt. Service" {{ $profileDetails->working_with == "Govt. Service" ? 'selected' : '' }}>Govt. Service</option>
                                                        <option value="Business" {{ $profileDetails->working_with == "Business" ? 'selected' : '' }}>Business</option>
                                                        <option value="Not Working" {{ $profileDetails->working_with == "Not Working" ? 'selected' : '' }}>Not Working</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Employee Name </label>
                                                    <input type="text" name="employer_name" value="{{ $profileDetails->employer_name }}" class="profileInput" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Designation </label>
                                                    <input type="text" name="designation" value="{{ $profileDetails->designation }}" class="profileInput" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Duration </label>
                                                    <input type="text" name="duration" value="{{ $profileDetails->duration }}" class="profileInput" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Monthly Income </label>
                                                    <input type="number" name="monthly_income" value="{{ $profileDetails->monthly_income }}" class="profileInput">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary mt-3 profile-prev-step" id="updateProdilInfopre">Previous</button>
                                        <button type="button" class="btn btn-primary mt-3 profile-next-step" id="updateProfileFamilyNext">Next</button>
                                    </div>
                                    <div class="tab-pane fade mobileProfilePad" id="contact13" role="tabpanel" aria-labelledby="contact13-tab">
                                        <div class="row p-0">
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Father Status </label>
                                                    <select name="father_status" class="profileInput">

                                                        <option value="Employed" {{ $profileDetails->father_status == "Employed" ? 'selected' : '' }}>Employed</option>
                                                        <option value="Business" {{ $profileDetails->father_status == "Business" ? 'selected' : '' }}>Business</option>
                                                        <option value="Retired" {{ $profileDetails->father_status == "Retired" ? 'selected' : '' }}>Retired</option>
                                                        <option value="Not Working" {{ $profileDetails->father_status == "Not Working" ? 'selected' : '' }}>Not Working</option>
                                                        <option value="Passedaway" {{ $profileDetails->father_status == "Passedaway" ? 'selected' : '' }}>Passedaway</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Mother Status </label>
                                                    <select name="mother_status" class="profileInput">

                                                        <option value="Home Maker" {{ $profileDetails->mother_status == "Home Maker" ? 'selected' : '' }}>Home Maker</option>
                                                        <option value="Employed" {{ $profileDetails->mother_status == "Employed" ? 'selected' : '' }}>Employed</option>
                                                        <option value="Business" {{ $profileDetails->mother_status == "Business" ? 'selected' : '' }}>Business</option>
                                                        <option value="Retired" {{ $profileDetails->mother_status == "Retired" ? 'selected' : '' }}>Retired</option>
                                                        <option value="Passedaway" {{ $profileDetails->mother_status == "Passedaway" ? 'selected' : '' }}>Passedaway</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Number of Sibling </label>
                                                    <input type="number" name="number_of_sibling" value="{{ $profileDetails->number_of_sibling }}" class="profileInput" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pt-2 mt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label> Family Type </label>
                                                    <select name="family_type" class="profileInput">

                                                        <option value="Joint" {{ $profileDetails->family_type == "Joint" ? 'selected' : '' }}>Joint</option>
                                                        <option value="Nuclear" {{ $profileDetails->family_type == "Nuclear" ? 'selected' : '' }}>Nuclear</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary mt-3 profile-prev-step" id="updateProfileEdupre">Previous</button>
                                        <button type="submit" class="btn btn-primary mt-3 profile-next-step" id="">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif
                        </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
<div id="planPopup" class="d-none">
    <div class="planPopup">
        <div>
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Buy one of our plans to see Profile Details!</h3>
                    <button type="button" class="popUpPlanBtn d-none d-md-block" id="popUpPlanBtn">Buy Credit</button>
                    <button type="button" class="popUpPlanBtn d-md-none" id="popUpPlanBtn1">Buy Credit</button>
                    <button type="button" id="planPopupClose" class="close">X</button>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection

@section('customJs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.min.js"></script>

    <script>
        // JavaScript to handle tab switching
        document.getElementById('nextToProfile').addEventListener('click', function () {
            var profileTab = new bootstrap.Tab(document.getElementById('profile-tab'));
            profileTab.show();
        });

        document.getElementById('prevToHome').addEventListener('click', function () {
            var homeTab = new bootstrap.Tab(document.getElementById('home-tab'));
            homeTab.show();
        });

        document.getElementById('nextToContact').addEventListener('click', function () {
            var contactTab = new bootstrap.Tab(document.getElementById('contact-tab'));
            contactTab.show();
        });

        document.getElementById('prevToProfile').addEventListener('click', function () {
            var profileTab = new bootstrap.Tab(document.getElementById('profile-tab'));
            profileTab.show();
        });

        document.getElementById('nextToContact2').addEventListener('click', function () {
            var profileTab = new bootstrap.Tab(document.getElementById('v-pills-messages1-tab'));
            profileTab.show();
        });

        document.getElementById('nextToContact5').addEventListener('click', function () {
            var profile5Tab = new bootstrap.Tab(document.getElementById('v-pills-messages1-tab'));
            profile5Tab.show();
        });
    </script>

<script>
    document.getElementById('openFamilyInfoTab').addEventListener('click', function() {
        var contactTab = new bootstrap.Tab(document.getElementById('contact1-tab'));
        contactTab.show();
    });
    document.getElementById('openProfileTab').addEventListener('click', function() {
    var profileTab = new bootstrap.Tab(document.getElementById('profile1-tab'));
    profileTab.show();
});

document.getElementById('opensMessagesTab').addEventListener('click', function() {
    var messagesTab = new bootstrap.Tab(document.getElementById('v-pills-messages1-tab'));
    messagesTab.show();
});

</script>
<script>
    // JavaScript to handle tab switching
    document.getElementById('nextToProfile1').addEventListener('click', function () {
        var profileTab = new bootstrap.Tab(document.getElementById('profile1-tab'));
        profileTab.show();
    });

    document.getElementById('prevToHome1').addEventListener('click', function () {
        var homeTab = new bootstrap.Tab(document.getElementById('home1-tab'));
        homeTab.show();
    });

    document.getElementById('nextToContact1').addEventListener('click', function () {
        var contact1Tab = new bootstrap.Tab(document.getElementById('contact1-tab'));
        contact1Tab.show();
    });

    document.getElementById('prevToPartnerProfile1').addEventListener('click', function () {
        var profileTab = new bootstrap.Tab(document.getElementById('profile1-tab'));
        profileTab.show();
    });

</script>


<script>
   let uploadButton = document.getElementById("upload-button");
    let container = document.querySelector(".container");
    let imageUploadInput = document.getElementById("imageUploadInput");
    let error = document.getElementById("error");
    let imageDisplay = document.getElementById("image-display");

    const fileHandler = (file, name, type) => {
    if (type.split("/")[0] !== "image") {
        // File Type Error
        error.innerText = "Please upload an image file";
        return false;
    }
    error.innerText = "";
    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onloadend = () => {
        // Clear any existing images while keeping the label
        const existingImage = imageDisplay.querySelector('figure');
        if (existingImage) {
        existingImage.remove();
        }

        // Create and append the image element
        let imageContainer = document.createElement("figure");
        let img = document.createElement("img");
        img.src = reader.result;
        imageContainer.appendChild(img);
        imageContainer.innerHTML += `<figcaption>${name}</figcaption>`;
        imageDisplay.appendChild(imageContainer);

        // Adjust styles after image upload
        imageDisplay.style.zIndex = "99";
        imageUploadInput.style.opacity = "0";
    };
    };

    // Upload Button Event Listener
    uploadButton.addEventListener("change", () => {
    Array.from(uploadButton.files).forEach((file) => {
        fileHandler(file, file.name, file.type);
    });
    });

    container.addEventListener(
    "dragenter",
    (e) => {
        e.preventDefault();
        e.stopPropagation();
        container.classList.add("active");
    },
    false
    );

    container.addEventListener(
    "dragleave",
    (e) => {
        e.preventDefault();
        e.stopPropagation();
        container.classList.remove("active");
    },
    false
    );

    container.addEventListener(
    "dragover",
    (e) => {
        e.preventDefault();
        e.stopPropagation();
        container.classList.add("active");
    },
    false
    );

    container.addEventListener(
    "drop",
    (e) => {
        e.preventDefault();
        e.stopPropagation();
        container.classList.remove("active");
        let draggedData = e.dataTransfer;
        let files = draggedData.files;
        Array.from(files).forEach((file) => {
        fileHandler(file, file.name, file.type);
        });
    },
    false
    );

    window.onload = () => {
    error.innerText = "";
    };

</script>


<script>
    let uploadButton1 = document.getElementById("upload-button1");
    let container1 = document.querySelector(".container");
    let imageUploadInput1 = document.getElementById("imageUploadInput1");
    let error1 = document.getElementById("error1");
    let imageDisplay1 = document.getElementById("image-display1");

    const fileHandler1 = (file, name, type) => {
    if (type.split("/")[0] !== "image") {
        // File Type Error
        error1.innerText = "Please upload an image file";
        return false;
    }
    error1.innerText = "";
    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onloadend = () => {
        // Clear any existing images while keeping the label
        const existingImage = imageDisplay1.querySelector('figure');
        if (existingImage) {
        existingImage.remove();
        }

        // Create and append the image element
        let imageContainer = document.createElement("figure");
        let img = document.createElement("img");
        img.src = reader.result;
        imageContainer.appendChild(img);
        imageContainer.innerHTML += `<figcaption>${name}</figcaption>`;
        imageDisplay1.appendChild(imageContainer);

        // Adjust styles after image upload
        imageDisplay1.style.zIndex = "99";
        imageUploadInput1.style.opacity = "0";
    };
    };

    // Upload Button Event Listener
    uploadButton1.addEventListener("change", () => {
    Array.from(uploadButton1.files).forEach((file) => {
        fileHandler1(file, file.name, file.type);
    });
    });

    container1.addEventListener(
    "dragenter",
    (e) => {
        e.preventDefault();
        e.stopPropagation();
        container1.classList.add("active");
    },
    false
    );

    container1.addEventListener(
    "dragleave",
    (e) => {
        e.preventDefault();
        e.stopPropagation();
        container1.classList.remove("active");
    },
    false
    );

    container1.addEventListener(
    "dragover",
    (e) => {
        e.preventDefault();
        e.stopPropagation();
        container1.classList.add("active");
    },
    false
    );

    container1.addEventListener(
    "drop",
    (e) => {
        e.preventDefault();
        e.stopPropagation();
        container1.classList.remove("active");
        let draggedData = e.dataTransfer;
        let files = draggedData.files;
        Array.from(files).forEach((file) => {
        fileHandler1(file, file.name, file.type);
        });
    },
    false
    );

    window.onload = () => {
    error1.innerText = "";
    };

</script>

<script>
    $(document).ready(function () {
    $('#your--Profile').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{ route("profile.store") }}', // Change this to your route
            data: formData,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            contentType: false,
            processData: false,
            beforeSend: function () {
                // Optional: Show a loader or disable the submit button
            },
            success: function (response) {
                toastr.success('Your Profile Details Submited Successful!', '', {
                            "positionClass": "toast-top-right",
                            "timeOut": "2000", // Auto-close after 2 seconds
                            "progressBar": true,
                            "backgroundClass": 'bg-success', // Green background
                        });

                // Optionally, you can reset the form or redirect
                $('#your--Profile')[0].reset();

                setTimeout(function () {
                    location.reload();
                }, 2000);
            },
            error: function (response) {
                let errors = response.responseJSON.errors;

                $.each(errors, function (key, value) {
                    toastr.error(value[0]);
                });
            },
            complete: function () {
                // Optional: Hide the loader or enable the submit button
            }
        });
    });
});

</script>

<script>
    $(document).ready(function () {
    $('#your-partner-Profile').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{ route("partner.profile.store") }}', // Change this to your route
            data: formData,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            contentType: false,
            processData: false,
            beforeSend: function () {
                // Optional: Show a loader or disable the submit button
            },
            success: function (response) {
                toastr.success('Your Partner Profile Details Submited Successful!', '', {
                            "positionClass": "toast-top-right",
                            "timeOut": "2000", // Auto-close after 2 seconds
                            "progressBar": true,
                            "backgroundClass": 'bg-success', // Green background
                        });

                // Optionally, you can reset the form or redirect
                $('#your-partner-Profile')[0].reset();

                setTimeout(function () {
                    location.reload();
                }, 2000);
            },
            error: function (response) {
                let errors = response.responseJSON.errors;

                $.each(errors, function (key, value) {
                    toastr.error(value[0]);
                });
            },
            complete: function () {
                // Optional: Hide the loader or enable the submit button
            }
        });
    });
});

</script>

<script>
    $(document).ready(function () {
        // Password matching validation
        $('input[name="password_confirmation"]').on('keyup', function () {
            const password = $('input[name="password"]').val();
            const confirmPassword = $(this).val();
            const submitButton = $('button[type="submit"]');

            if (password !== confirmPassword) {
                $(this).css('border', '1px solid red');
                $('#password-error').remove(); // Remove previous error message
                $(this).after('<div id="password-error" style="color: red;">Passwords do not match</div>');
                submitButton.prop('disabled', true);
            } else {
                $(this).css('border', '1px solid #F43662');
                $('#password-error').remove();
                submitButton.prop('disabled', false);
            }
        });

        // AJAX form submission
        $('#change-password-settings').submit(function (event) {
            event.preventDefault(); // Prevent the default form submission

            const formData = $(this).serialize(); // Serialize form data

            $.ajax({
                type: 'POST',
                url: '{{ route("user.pass.change") }}', // Change this to your route
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }, // Replace with your actual endpoint

                success: function (response) {
                    if (response.success) {
                        // Handle success response (e.g., show a success message)
                        toastr.success('Password updated successfully!');
                    } else {
                        // Handle error response (e.g., show an error message)
                        toastr.error(response.message || 'An error occurred');
                    }
                },
                error: function (xhr) {
                    // Handle any unexpected errors
                    toastr.error('Something went wrong. Please try again.');
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const parentTabToOpen = urlParams.get('tab');
        const childTabToOpen = urlParams.get('childTab');

        let tabActivated = false;

        // Function to activate a tab
        function activateTab(tabId, contentId) {
            document.querySelectorAll('.nav-link').forEach(function(tab) {
                tab.classList.remove('active');
            });
            document.querySelectorAll('.tab-pane').forEach(function(content) {
                content.classList.remove('show', 'active');
            });

            const tab = document.querySelector(tabId);
            const content = document.querySelector(contentId);

            if (tab && content) {
                tab.classList.add('active');
                content.classList.add('show', 'active');
            }
        }

        // Activate the parent tab
        if (parentTabToOpen) {
            activateTab(`#v-pills-${parentTabToOpen}-tab`, `#v-pills-${parentTabToOpen}`);
            tabActivated = true;
        }

        // Activate the child tab if present
        if (childTabToOpen && parentTabToOpen) {
            activateTab(`#${childTabToOpen}-tab`, `#${childTabToOpen}`);
        } else if (parentTabToOpen) {
            // If no child tab is specified, activate the first child tab by default
            const firstChildTab = document.querySelector(`#v-pills-${parentTabToOpen} .nav-link`);
            const firstChildContent = firstChildTab ? document.querySelector(firstChildTab.getAttribute('href')) : null;

            if (firstChildTab && firstChildContent) {
                firstChildTab.classList.add('active');
                firstChildContent.classList.add('show', 'active');
            }
        }

        // Clean up the URL by removing query parameters
        if (tabActivated) {
            const cleanUrl = window.location.origin + window.location.pathname;
            window.history.replaceState(null, null, cleanUrl);
        }

        // Ensure that switching tabs always shows the first child tab by default
        document.querySelectorAll('.nav-link').forEach(function(tab) {
            tab.addEventListener('click', function() {
                const parentTabId = tab.getAttribute('data-bs-target');
                const firstChildTab = document.querySelector(`${parentTabId} .nav-link`);
                const firstChildContent = firstChildTab ? document.querySelector(firstChildTab.getAttribute('href')) : null;

                if (firstChildTab && firstChildContent) {
                    firstChildTab.classList.add('active');
                    firstChildContent.classList.add('show', 'active');
                }
            });
        });
    });


</script>

<script>
    // JavaScript
        document.getElementById('dateOfBirth').addEventListener('change', function() {
        this.classList.add('date-picked');

        // Remove the CSS hiding the date
        this.style.color = "#000";
        });

        document.getElementById('dateOfBirth2').addEventListener('change', function() {
        this.classList.add('date-picked');

        // Remove the CSS hiding the date
        this.style.color = "#000";
        });

</script>

<script>
        document.getElementById('externalButton').addEventListener('click', function() {
        // Programmatically click the hidden tab button
        document.getElementById('v-pills-messages2-tab').click();
    });

    document.getElementById('updateProfileEduNext').addEventListener('click', function() {
        // Programmatically click the hidden tab button
        document.getElementById('profile13-tab').click();
    });
    document.getElementById('updateProdilInfopre').addEventListener('click', function() {
        // Programmatically click the hidden tab button
        document.getElementById('home13-tab').click();
    });
    document.getElementById('updateProfileFamilyNext').addEventListener('click', function() {
        // Programmatically click the hidden tab button
        document.getElementById('contact13-tab').click();
    });
    document.getElementById('updateProfileEdupre').addEventListener('click', function() {
        // Programmatically click the hidden tab button
        document.getElementById('profile13-tab').click();
    });
    document.getElementById('popUpPlanBtn').addEventListener('click', function() {
        // Programmatically click the hidden tab button
        document.getElementById('v-pills-messages-tab').click();
    });
    document.getElementById('popUpPlanBtn1').addEventListener('click', function() {
        // Programmatically click the hidden tab button
        document.getElementById('v-pills-buymessages-tab').click();
    });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const photoInput = document.getElementById('photoInput');
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');
    const imagePreview = document.getElementById('imagePreview');
    const removeImageButton = document.getElementById('removeImageButton');

    // Show the image preview when a file is selected
    photoInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreviewContainer.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    // Remove the image preview
    removeImageButton.addEventListener('click', function() {
        imagePreview.src = '';
        imagePreviewContainer.style.display = 'none';
        photoInput.value = ''; // Clear the file input
    });

    // Form submission can proceed without an image
    document.getElementById('photoForm').addEventListener('submit', function(event) {
        // The form can submit even if there's no image selected
        // No additional handling is needed here
    });
});

</script>

<script>
    $(document).ready(function () {
    $('#edit-your-profile-form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{ route("profile.update") }}', // Change this to your route
            data: formData,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            contentType: false,
            processData: false,
            beforeSend: function () {
                // Optional: Show a loader or disable the submit button
            },
            success: function (response) {
                toastr.success('Your Profile Details Updated Successful!', '', {
                            "positionClass": "toast-top-right",
                            "timeOut": "2000", // Auto-close after 2 seconds
                            "progressBar": true,
                            "backgroundClass": 'bg-success', // Green background
                        });

                // Optionally, you can reset the form or redirect
                $('#edit-your-profile-form')[0].reset();

                setTimeout(function () {
                    location.reload();
                }, 2000);
            },
            error: function (response) {
                let errors = response.responseJSON.errors;

                $.each(errors, function (key, value) {
                    toastr.error(value[0]);
                });
            },
            complete: function () {
                // Optional: Hide the loader or enable the submit button
            }
        });
    });
});

</script>

<script>
    document.getElementById('working_with').addEventListener('change', function() {
    const workingWith = this.value;
    const employerNameDiv = document.getElementById('employer_name');
    const designationDiv = document.getElementById('designation');
    const durationDiv = document.getElementById('duration');
    const monthlyIncomeDiv = document.getElementById('monthly_income');

    // Reset visibility of all fields
    employerNameDiv.style.display = 'block';
    designationDiv.style.display = 'block';
    durationDiv.style.display = 'block';
    monthlyIncomeDiv.style.display = 'block';

    if (workingWith === 'Not Working') {
        // Hide all fields if "Not Working" is selected
        employerNameDiv.style.display = 'none';
        designationDiv.style.display = 'none';
        durationDiv.style.display = 'none';
        monthlyIncomeDiv.style.display = 'none';
    }
});


document.getElementById('working_with1').addEventListener('change', function() {
    const workingWith1 = this.value;
    const employerNameDiv1 = document.getElementById('employer_name1');
    const designationDiv1 = document.getElementById('designation1');
    const durationDiv1 = document.getElementById('duration1');
    const monthlyIncomeDiv1 = document.getElementById('monthly_income1');

    // Reset visibility of all fields
    employerNameDiv1.style.display = 'block';
    designationDiv1.style.display = 'block';
    durationDiv1.style.display = 'block';
    monthlyIncomeDiv1.style.display = 'block';

    if (workingWith1 === 'Not Working') {
        // Hide all fields if "Not Working" is selected
        employerNameDiv1.style.display = 'none';
        designationDiv1.style.display = 'none';
        durationDiv1.style.display = 'none';
        monthlyIncomeDiv1.style.display = 'none';
    }
});

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const planPopup = document.getElementById('planPopup');
        const profileDetailsBtns = document.querySelectorAll('.profileDetailsBtn');
        const profileDetailsBtns2 = document.querySelectorAll('.profileDetailsBtn2');
        const planPopupClose = document.getElementById('planPopupClose');
        const popUpPlanBtn = document.getElementById('popUpPlanBtn');
        const popUpPlanBtn1 = document.getElementById('popUpPlanBtn1');

        // Loop through each "View Details" button (profileDetailsBtn) and attach event listeners
        profileDetailsBtns.forEach(function(btn) {
            btn.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior
                planPopup.classList.remove('d-none');
            });
        });

        // Loop through each "Please Upgrade Plan" button (profileDetailsBtn2) and attach event listeners
        profileDetailsBtns2.forEach(function(btn) {
            btn.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior
                planPopup.classList.remove('d-none');
            });
        });

        // Close the popup when "Close" button is clicked
        planPopupClose.addEventListener('click', function() {
            planPopup.classList.add('d-none');
        });

        // Close the popup when "Buy Credit" buttons are clicked
        popUpPlanBtn.addEventListener('click', function() {
            planPopup.classList.add('d-none');
        });

        popUpPlanBtn1.addEventListener('click', function() {
            planPopup.classList.add('d-none');
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check if profile details are null
        @if(is_null($profileDetails))
            var profileModal = new bootstrap.Modal(document.getElementById('profileModal'), {
                backdrop: 'static', // Prevent closing the modal by clicking outside
                keyboard: false // Prevent closing the modal by pressing Esc
            });
            profileModal.show();
        @endif

        // Handle form submission
        document.getElementById('saveProfile').addEventListener('click', function() {
            var form = document.getElementById('profileForm');
            if (form.checkValidity()) {
                // Submit the form via AJAX or standard form submission
                form.submit();
            } else {
                form.reportValidity();
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('.price1Btn').click(function (e) {
            e.preventDefault();

            var planId = $(this).data('plan-id');

            // Show a confirmation dialog
            var confirmPurchase = confirm("Are you sure you want to purchase or upgrade to this plan?");

            if (confirmPurchase) {
                $.ajax({
                    url: '{{ route('subscribe-plan') }}',
                    type: 'POST',
                    data: {
                        plan_id: planId,
                        _token: '{{ csrf_token() }}' // Include CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            toastr.success('Plan upgraded successfully!');
                            // Optionally reload the page or update the UI

                            setTimeout(function () {
                        location.reload();
                    }, 2000);
                        } else {
                            toastr.error('Failed to upgrade plan!');
                        }
                    },
                    error: function () {
                        toastr.error('An error occurred while processing your request.');
                    }
                });
            }
        });
    });
</script>

<script>

document.getElementById('nextCreatProfile').addEventListener('click', function() {
    // Hide the Google info div and show the profile creation div
    document.getElementById('userInfoGoogle').style.display = 'none';
    document.getElementById('CreatProfilesDiv').style.display = 'block';

    // Show the "Previous" button
    document.getElementById('prevToLookingFor').style.display = 'inline-block';
});

document.getElementById('prevToLookingFor').addEventListener('click', function() {
    // Show the Google info div and hide the profile creation div
    document.getElementById('userInfoGoogle').style.display = 'block';
    document.getElementById('CreatProfilesDiv').style.display = 'none';

    // Optionally hide the "Previous" button again if needed
    document.getElementById('prevToLookingFor').style.display = 'none';
});

</script>



<script>
    $(document).ready(function () {
    $('#profileDetailsSubmit').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{ route("profile.store") }}', // Change this to your route
            data: formData,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            contentType: false,
            processData: false,
            beforeSend: function () {
                // Optional: Show a loader or disable the submit button
            },
            success: function (response) {
                toastr.success('Your Profile Details Submited Successful!', '', {
                            "positionClass": "toast-top-right",
                            "timeOut": "2000", // Auto-close after 2 seconds
                            "progressBar": true,
                            "backgroundClass": 'bg-success', // Green background
                        });

                setTimeout(function () {
                    location.reload();
                }, 2000);
            },
            error: function (response) {
                let errors = response.responseJSON.errors;

                $.each(errors, function (key, value) {
                    toastr.error(value[0]);
                });

                setTimeout(function () {
                    location.reload();
                }, 2000);
            },
            complete: function () {
                // Optional: Hide the loader or enable the submit button
            }
        });
    });
});

</script>

<script>
    document.getElementById('districtSelect').addEventListener('change', function() {
        var districtId = this.value;
        var upazilaSelect = document.getElementById('upazilaSelect');

        // Clear existing options
        upazilaSelect.innerHTML = '<option value="">Please Select</option>';

        if (districtId) {
            fetch(`/get-upazilas/${districtId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        data.forEach(function(upazila) {
                            var option = document.createElement('option');
                            option.value = upazila.id;
                            option.textContent = upazila.name;
                            upazilaSelect.appendChild(option);
                        });
                    } else {
                        upazilaSelect.innerHTML = '<option value="">No Upazilas Available</option>';
                    }
                })
                .catch(error => console.log('Error:', error));
        }
    });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
     // Get all cards and buttons
     const cards = document.querySelectorAll('.submitDtsCard');
     const buttons = document.querySelectorAll('.contineBtn');

     // Initially hide all cards except the first one
     cards.forEach((card, index) => {
         if (index !== 0) {
             card.style.display = 'none'; // Hide all cards except the first one
         }
     });

     buttons.forEach((button) => {
         button.addEventListener('click', function () {
             // Get the current card's ID
             const currentCard = button.closest('.submitDtsCard');
             const currentCardId = currentCard.id;

             // Extract the current card's number from its ID
             const currentCardNumber = parseInt(currentCardId.split('_')[1]);

             // Hide current card with an exit animation
             currentCard.classList.add('hide-card');

             setTimeout(function () {
                 // Remove the display and show-card class from the current card
                 currentCard.style.display = 'none';
                 currentCard.classList.remove('show-card', 'hide-card'); // Reset classes

                 // Get the next card's ID based on the current card number
                 const nextCardId = `card_${currentCardNumber + 1}`;
                 const nextCard = document.getElementById(nextCardId);

                 // Show the next card if it exists
                 if (nextCard) {
                     nextCard.style.display = 'block'; // Make the next card visible
                     nextCard.classList.add('show-card'); // Add entry animation
                 }
             }, 300); // Match the animation duration
         });
     });
 });


 </script>
 <script>
    // Get the checkbox and icon elements
    const checkbox = document.querySelector('.checkedTermsInput');
    const icon = document.querySelector('.checkedTermsInputIcon');

    // Add an event listener to the checkbox
    checkbox.addEventListener('change', function () {
        if (checkbox.checked) {
            // Hide the checkbox and show the icon when checked
            checkbox.style.display = 'none';
            icon.style.display = 'inline-block';
        } else {
            // Revert back if unchecked (optional)
            checkbox.style.display = 'inline-block';
            icon.style.display = 'none';
        }
    });
</script>

<script>
    document.getElementById('nationality').addEventListener('change', function() {
        var selectedNationality = this.value;
        var birthPlaceSelectWrapper = document.getElementById('birthPlaceWrapper');
        var birthPlaceTextWrapper = document.getElementById('birthPlaceTextWrapper');

        if (selectedNationality !== 'Bangladesh') {
            // Hide the select input and show the text input
            birthPlaceSelectWrapper.style.display = 'none';
            birthPlaceTextWrapper.style.display = 'block';
        } else {
            // Show the select input and hide the text input
            birthPlaceSelectWrapper.style.display = 'block';
            birthPlaceTextWrapper.style.display = 'none';
        }
    });

    // Initialize on page load based on the default selected nationality
    window.addEventListener('load', function() {
        var nationalitySelect = document.getElementById('nationality');
        nationalitySelect.dispatchEvent(new Event('change'));
    });
</script>
<script>
    document.getElementById('cardBtn_verify').addEventListener('click', function() {
        // Simulate mobile verification by showing the 'Continue' button
        const continueButton = document.getElementById('cardBtn_8');

        // Programmatically trigger the click event of the 'Continue' button
        continueButton.click();
    });

    // Add event listener for the 'Continue' button
    document.getElementById('cardBtn_8').addEventListener('click', function() {
        console.log("Continue button triggered");
        // Add your continue button logic here
    });
</script>








<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const carousel1 = document.getElementById("Testimonialcarousel1");
    const leftBtn1 = document.getElementById("testimonialleft");
    const rightBtn1 = document.getElementById("testimonialright");
    const cards1 = carousel1.querySelectorAll(".Testimonialcard");
    const cardWidth1 = cards1[0].offsetWidth;
    const totalCards1 = cards1.length;

    let isDragging1 = false,
        startX1,
        startScrollLeft1;

    // Set carousel width to fit exactly 4 visible cards
    carousel1.style.width = `${cardWidth1 * 4}px`;

    // Disable the left button initially because we start from the first card
    leftBtn1.classList.add("disabled");

    const dragStart1 = (e) => {
        isDragging1 = true;
        carousel1.classList.add("dragging");
        startX1 = e.pageX;
        startScrollLeft1 = carousel1.scrollLeft;
    };

    const dragging1 = (e) => {
        if (!isDragging1) return;
        const newScrollLeft1 = startScrollLeft1 - (e.pageX - startX1);
        carousel1.scrollLeft = newScrollLeft1;
    };

    const dragStop1 = () => {
        isDragging1 = false;
        carousel1.classList.remove("dragging");
        checkButtons1();  // Check buttons after drag stops
    };

    const checkButtons1 = () => {
        const scrollLeft1 = carousel1.scrollLeft;

        if (scrollLeft1 <= 0) {
            leftBtn1.classList.add("disabled");
        } else {
            leftBtn1.classList.remove("disabled");
        }

        if (scrollLeft1 >= (totalCards1 - 4) * cardWidth1) {
            rightBtn1.classList.add("disabled");
        } else {
            rightBtn1.classList.remove("disabled");
        }
    };

    leftBtn1.addEventListener("click", () => {
        if (carousel1.scrollLeft > 0) {
            carousel1.scrollBy({
                left: -cardWidth1,
                behavior: 'smooth'
            });
            setTimeout(checkButtons1, 800);
        }
    });

    rightBtn1.addEventListener("click", () => {
        if (carousel1.scrollLeft < (totalCards1 - 4) * cardWidth1) {
            carousel1.scrollBy({
                left: cardWidth1,
                behavior: 'smooth'
            });
            setTimeout(checkButtons1, 800);
        }
    });

    carousel1.addEventListener("mousedown", dragStart1);
    carousel1.addEventListener("mousemove", dragging1);
    document.addEventListener("mouseup", dragStop1);

    checkButtons1();
});


</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const carousel2 = document.getElementById("Testimonialcarousel2");
    const leftBtn2 = document.getElementById("testimonialleft2");
    const rightBtn2 = document.getElementById("testimonialright2");
    const cards2 = carousel2.querySelectorAll(".Testimonialcard");
    const cardWidth2 = cards2[0].offsetWidth;
    const totalCards2 = cards2.length;

    let isDragging2 = false,
        startX2,
        startScrollLeft2;

    carousel2.style.width = `${cardWidth2 * 4}px`;

    leftBtn2.classList.add("disabled");

    const dragStart2 = (e) => {
        isDragging2 = true;
        carousel2.classList.add("dragging");
        startX2 = e.pageX;
        startScrollLeft2 = carousel2.scrollLeft;
    };

    const dragging2 = (e) => {
        if (!isDragging2) return;
        const newScrollLeft2 = startScrollLeft2 - (e.pageX - startX2);
        carousel2.scrollLeft = newScrollLeft2;
    };

    const dragStop2 = () => {
        isDragging2 = false;
        carousel2.classList.remove("dragging");
        checkButtons2();
    };

    const checkButtons2 = () => {
        const scrollLeft2 = carousel2.scrollLeft;

        if (scrollLeft2 <= 0) {
            leftBtn2.classList.add("disabled");
        } else {
            leftBtn2.classList.remove("disabled");
        }

        if (scrollLeft2 >= (totalCards2 - 4) * cardWidth2) {
            rightBtn2.classList.add("disabled");
        } else {
            rightBtn2.classList.remove("disabled");
        }
    };

    leftBtn2.addEventListener("click", () => {
        if (carousel2.scrollLeft > 0) {
            carousel2.scrollBy({
                left: -cardWidth2,
                behavior: 'smooth'
            });
            setTimeout(checkButtons2, 800);
        }
    });

    rightBtn2.addEventListener("click", () => {
        if (carousel2.scrollLeft < (totalCards2 - 4) * cardWidth2) {
            carousel2.scrollBy({
                left: cardWidth2,
                behavior: 'smooth'
            });
            setTimeout(checkButtons2, 800);
        }
    });

    carousel2.addEventListener("mousedown", dragStart2);
    carousel2.addEventListener("mousemove", dragging2);
    document.addEventListener("mouseup", dragStop2);

    checkButtons2();
});


</script>

@endsection
