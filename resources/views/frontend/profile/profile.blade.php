@extends('frontend.master')

@section('title')
   | My Profile
@endsection

@section('modals')

@endsection

@section('content')

<div class="section d-flex align-items-center position-fixed">
    <div class="card w-100 border-0">
        <div class="card-body w-100  pb-0 pt-0">
            <div class="d-flex align-items-start column-gap-3">
                <div class="nav flex-column justify-content-between nav-pills me-3 dashboardNav mobile-navbar d-md-none " id="mobileNavbar">
                    <div class="">
                        <a href="{{ route('user.dashboard', ['tab' => 'home']) }}" class="nav-link btn btn-primary profileNav">Dashboard</a>
                        <a class="nav-link dropdown-toggle text-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Profile
                        </a>
                        <div class="collapse mb-3" id="collapseExample">
                            <div class="card card-body">
                                <a href="{{ route('user.dashboard',  ['tab' => 'your-profile', 'childTab' => 'home']) }}" class="nav-link btn btn-primary profileNav">Create Your Profile</a>
                                <a href="{{ route('user.dashboard',  ['tab' => 'your-partner-profile', 'childTab' => 'home1']) }}" class="nav-link btn btn-primary profileNav">Create Your Partner Profile</a>
                            </div>
                        </div>
                        <a href="{{ route('user.dashboard',  ['tab' => 'settings']) }}" class="nav-link btn btn-primary profileNav">Settings</a>
                        <a href="{{ route('user.dashboard',  ['tab' => 'messages']) }}" class="nav-link btn btn-primary profileNav">Buy Credit</a>
                    </div>
                    <a class="nav-link text-center dashboardLogOut" href="{{ route('user.logout') }}">Logout</a>
                </div>
                <div class="nav flex-column justify-content-between nav-pills me-3 dashboardNav d-none d-md-block" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div class="">
                        <a href="{{ route('user.dashboard', ['tab' => 'home']) }}" class="nav-link btn btn-primary profileNav">Dashboard</a>
                        <a class="nav-link dropdown-toggle text-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Profile
                        </a>
                        <div class="collapse mb-3" id="collapseExample">
                            <div class="card card-body">
                                <a href="{{ route('user.dashboard',  ['tab' => 'your-profile', 'childTab' => 'home']) }}" class="nav-link btn btn-primary profileNav">Create Your Profile</a>
                                <a href="{{ route('user.dashboard',  ['tab' => 'your-partner-profile', 'childTab' => 'home1']) }}" class="nav-link btn btn-primary profileNav">Create Your Partner Profile</a>
                            </div>
                        </div>
                        <a href="{{ route('user.dashboard',  ['tab' => 'settings']) }}" class="nav-link btn btn-primary profileNav">Settings</a>
                        <a href="{{ route('user.dashboard',  ['tab' => 'messages']) }}" class="nav-link btn btn-primary profileNav">Buy Credit</a>
                    </div>
                    <a class="nav-link text-center dashboardLogOut" href="{{ route('user.logout') }}">Logout</a>
                </div>
                <div class="tab-content w-100" id="v-pills-tabContent">
                    <ul class="nav nav-tabs profile-form-steps mt-4" id="myTab" role="tablist">
                        <li class="nav-item border-0" role="presentation">
                          <button class="nav-link profile-step active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Basic Information</button>
                        </li>
                        <li class="nav-item border-0" role="presentation">
                          <button class="nav-link profile-step" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Educational & Career Info.</button>
                        </li>
                        <li class="nav-item border-0" role="presentation">
                          <button class="nav-link profile-step" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Family Info.</button>
                        </li>
                    </ul>
                    <div class="tab-content sticky-div" id="myTabContent">
                        <div class="tab-pane fade show active mobileProfilePad" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row p-0">
                                <div class="col-md-4 mt-0">
                                    <div class="imageDrop">
                                        <img src="{{ asset($profile->image) }}" class="w-60">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="desc" class="profileDesc">Write something about yourself</textarea>
                                </div>
                                <div class="col-md-4 pl-0 pt-2 mt-0">
                                    <input type="text" name="first_name" placeholder="First Name" class="profileInput">
                                </div>
                                <div class="col-md-4 pl-0 pt-2 mt-0">
                                    <input type="text" name="last_name" placeholder="Last Name" class="profileInput">
                                </div>
                                <div class="col-md-4 pl-0 pt-2 mt-0">
                                    <input type="text" name="gender" placeholder="Gender" class="profileInput">
                                </div>
                                <div class="col-md-4 pl-0 pt-2 mt-0">
                                    <input type="text" name="religion" placeholder="Religion" class="profileInput">
                                </div>
                                <div class="col-md-4 pl-0 pt-2 mt-0">
                                    <input type="date" name="date_of_birth" placeholder="Date Of Birth" class="profileInput">
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
                                    {{-- <div class="profileInput">
                                        <p class="">Submitting For</p>
                                        <div class="d-flex align-items-center column-gap-5">
                                            <div class="">
                                                <input class="form-check-input" type="radio" value="myself" name="account_for" id="myself">
                                                <label class="form-check-label" for="myself">Myself</label>
                                            </div>
                                            <div class="">
                                                <input class="form-check-input" type="radio" value="others" name="account_for" id="others">
                                                <label class="form-check-label" for="others">Others</label>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="col-md-4 pl-0 pt-2 mt-0">
                                    <input type="text" name="blood_group" placeholder="Blood Group" class="profileInput">
                                </div>
                                <div class="col-md-4 pl-0 pt-2 mt-0">
                                    <input type="text" name="hobby" placeholder="Hobby" class="profileInput">
                                </div>
                                <div class="col-md-4 pl-0 pt-2 mt-0">
                                    <input type="text" name="height" placeholder="Height" class="profileInput">
                                </div>
                                <div class="col-md-4 pl-0 pt-2 mt-0">
                                    <input type="text" name="weight" placeholder="Weight" class="profileInput">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mobileProfilePad" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row p-0">
                                <div class="col-md-4 pl-0 pt-2 mt-0">
                                    <input type="text" name="education_level" placeholder="Highest Level of Education" class="profileInput">
                                </div>
                                <div class="col-md-4 pl-0 pt-2 mt-0">
                                    <input type="text" name="institute_name" placeholder="Institute Name" class="profileInput">
                                </div>
                                <div class="col-md-4 pl-0 pt-2 mt-0">
                                    <select name="working_with" class="profileInput">
                                        <option value="">Select Working With</option>
                                        <option value="Private Company">Private Company</option>
                                        <option value="Govt. Service">Govt. Service</option>
                                        <option value="Business">Business</option>
                                        <option value="Not Working">Not Working</option>
                                    </select>
                                </div>
                                <div class="col-md-4 pl-0 pt-2 mt-0">
                                    <input type="text" name="employer_name" placeholder="Employer Name" class="profileInput">
                                </div>
                                <div class="col-md-4 pl-0 pt-2 mt-0">
                                    <input type="text" name="designation" placeholder="Designation" class="profileInput">
                                </div>
                                <div class="col-md-4 pl-0 pt-2 mt-0">
                                    <input type="text" name="duration" placeholder="Duration" class="profileInput">
                                </div>
                                <div class="col-md-4 pl-0 pt-2 mt-0">
                                    <input type="number" name="monthly_income" placeholder="Monthly Income" class="profileInput">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mobileProfilePad" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('customJs')


@endsection
