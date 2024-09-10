@extends('frontend.master')

@section('title')
   | User Dashboard
@endsection

@section('modals')

@endsection

@section('content')

<div class="section d-flex align-items-center position-fixed dashboardMain">
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
                            {{-- <form id="your--Profile" class="px-4 tabForms yourProfileCreate">
                                @csrf
                                <ul class="nav nav-tabs profile-form-steps" id="myTab" role="tablist">
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
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row p-0">
                                            <div class="col-md-4 mt-0">
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
                                            <div class="col-md-8">
                                                <textarea name="desc" class="profileDesc" placeholder="Write something about yourself"></textarea>
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
                                                <input type="date" name="date_of_birth" placeholder="Date Of Birth" class="profileInput" id="dateOfBirth">
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
                                        <button type="button" class="btn btn-primary mt-3 profile-next-step" id="nextToProfile">Next</button>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row p-0">
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <input type="text" name="education_level" placeholder="Highest Level of Education" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <input type="text" name="institute_name" placeholder="Institute Name" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0">
                                                <select name="working_with" class="profileInput" id="working_with">
                                                    <option value="">Select Working With</option>
                                                    <option value="Private Company">Private Company</option>
                                                    <option value="Govt. Service">Govt. Service</option>
                                                    <option value="Business">Business</option>
                                                    <option value="Not Working">Not Working</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0"  id="employer_name">
                                                <input type="text" name="employer_name" placeholder="Employer Name" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0" id="designation">
                                                <input type="text" name="designation"  placeholder="Designation" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0" id="duration">
                                                <input type="text" name="duration"  placeholder="Duration" class="profileInput">
                                            </div>
                                            <div class="col-md-4 pl-0 pt-2 mt-0" id="monthly_income">
                                                <input type="number" name="monthly_income" placeholder="Monthly Income" class="profileInput">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary mt-3 profile-prev-step" id="prevToHome">Previous</button>
                                        <button type="button" class="btn btn-primary mt-3 profile-next-step" id="nextToContact">Next</button>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
                                        <button type="button" class="btn btn-secondary mt-3 profile-prev-step" id="prevToProfile">Previous</button>
                                        <button type="submit" class="btn btn-secondary mt-3 profile-submit-form">Submit</button>
                                    </div>
                                </div>
                            </form> --}}

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
                                            </div> --}}
                                        </div>
                                      </div>
                                      <div class="tab-pane fade  show active" id="v-pills-profilePlan" role="tabpanel" aria-labelledby="v-pills-profilePlan-tab">
                                        <div class="p-4 d-flex justify-content-center align-items-center w-100 mobilePriceTabCard">
                                            <div class="pricePlanCard1">
                                                <div class="border-bottom-1 pb-3">
                                                    <h2 class="priceTitle">Free</h2>
                                                    <p class="priceSubTitle"> Basic Chat Functionality </p>
                                                    <h1 class="priceAmount">BDT 0</h1>
                                                    {{-- <p class="priceAmountText">Per month renew</p> --}}
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
</div>


<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80% !important">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Let's Complete Your Profile First!</h5>
            </div>
            <div class="modal-body">
                <form id="your--Profile" class="px-4 tabForms yourProfileCreate">
                    @csrf
                    
                    @if (Auth::user()->userInfo->looking_for == 'google')
                        <div id="userInfoGoogle" class="">
                            <div class="w-100">
                                <p class="">I'm Looking for a </p>
                                <div class="form-group d-flex align-items-center column-gap-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="bride" name="looking_for" id="bride">
                                        <label class="form-check-label" for="bride">Bride</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="groom" name="looking_for" id="groom">
                                        <label class="form-check-label" for="groom">Groom</label>
                                    </div>
                                </div>
                            </div>

                            <div class="w-100">
                                    <p class="">Submitting For</p>
                                    <div class="form-group d-flex align-items-center column-gap-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="myself" name="account_for" id="myself">
                                            <label class="form-check-label" for="myself">Myself</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="others" name="account_for" id="others">
                                            <label class="form-check-label" for="others">Others</label>
                                        </div>
                                    </div>
                            </div>

                            <div class="w-100" id="relation">
                                    <p class="">Type Your Relation?</p>
                                    <div class="">
                                        <input class="form-group form-control" type="text" name="relation" placeholder=" What's Your Relation with the person !">
                                    </div>
                            </div>
                            <button type="button" class="btn btn-primary mt-3 profile-next-step" id="nextCreatProfile">Next</button>
                        </div>
                    @endif


                    <div @if(Auth::user()->userInfo->looking_for == 'google') id="CreatProfilesDiv" @endif>
                        <ul class="nav nav-tabs profile-form-steps" id="myTab" role="tablist">
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
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row p-0">
                                    <div class="col-md-4 mt-0">
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
                                    <div class="col-md-8">
                                        <textarea name="desc" class="profileDesc" placeholder="Write something about yourself"></textarea>
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
                                        <input type="date" name="date_of_birth" placeholder="Date Of Birth" class="profileInput" id="dateOfBirth">
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
                                <button type="button" class="btn btn-secondary mt-3 profile-prev-step" id="prevToLookingFor">Previous</button>
                                <button type="button" class="btn btn-primary mt-3 profile-next-step" id="nextToProfile">Next</button>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row p-0">
                                    <div class="col-md-4 pl-0 pt-2 mt-0">
                                        <input type="text" name="education_level" placeholder="Highest Level of Education" class="profileInput">
                                    </div>
                                    <div class="col-md-4 pl-0 pt-2 mt-0">
                                        <input type="text" name="institute_name" placeholder="Institute Name" class="profileInput">
                                    </div>
                                    <div class="col-md-4 pl-0 pt-2 mt-0">
                                        <select name="working_with" class="profileInput" id="working_with">
                                            <option value="">Select Working With</option>
                                            <option value="Private Company">Private Company</option>
                                            <option value="Govt. Service">Govt. Service</option>
                                            <option value="Business">Business</option>
                                            <option value="Not Working">Not Working</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 pl-0 pt-2 mt-0"  id="employer_name">
                                        <input type="text" name="employer_name" placeholder="Employer Name" class="profileInput">
                                    </div>
                                    <div class="col-md-4 pl-0 pt-2 mt-0" id="designation">
                                        <input type="text" name="designation"  placeholder="Designation" class="profileInput">
                                    </div>
                                    <div class="col-md-4 pl-0 pt-2 mt-0" id="duration">
                                        <input type="text" name="duration"  placeholder="Duration" class="profileInput">
                                    </div>
                                    <div class="col-md-4 pl-0 pt-2 mt-0" id="monthly_income">
                                        <input type="number" name="monthly_income" placeholder="Monthly Income" class="profileInput">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary mt-3 profile-prev-step" id="prevToHome">Previous</button>
                                <button type="button" class="btn btn-primary mt-3 profile-next-step" id="nextToContact">Next</button>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
                                <button type="button" class="btn btn-secondary mt-3 profile-prev-step" id="prevToProfile">Previous</button>
                                <button type="submit" class="btn btn-secondary mt-3 profile-submit-form">Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Match Details Modal -->
<div class="modal fade" id="matchDetailsModal" tabindex="-1" role="dialog" aria-labelledby="matchDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="matchDetailsModalLabel">Give us some Information to Find Perfect <span style="text-transform:capitalize; color: #f43662">{{ Auth::user()->userInfo->looking_for }}</span> For You! </h5>
            </div>
            <div class="modal-body">
                <form id="matchDetailsForm">
                    @csrf
                    <div>
                        <label for="preference" class="mb-2">Aged</label>
                        <div class="d-flex justify-content-center align-items-center column-gap-2">
                            <input type="number" name="from_age" class="form-control"> <span> to </span> <input type="number" name="to_age" class="form-control">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="" class="mb-2">Religion</label>
                        <select name="religion" id="" class="form-control">
                            <option value="Muslim">Muslim</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Christian">Christian</option>
                            <option value="Buddhists">Buddhists</option>
                            <option value="Others">Others</option>
                            <option value="Atheist">Atheist</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="" class="mb-2">Marital Status</label>
                        <select name="marital_status" id="" class="form-control">
                            <option value="single">Single</option>
                            <option value="divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Let's Begin</button>
                </form>
            </div>
        </div>
    </div>
</div>


@if($planWarning)
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="planExpiredModal" tabindex="-1" role="dialog" aria-labelledby="planExpiredModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="planExpiredModalLabel">Plan Expired</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your previous plan has expired. You have been switched to the Free plan.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to automatically show the modal on page load -->
    <script>
        $(document).ready(function() {
            $('#planExpiredModal').modal('show');
        });
    </script>
@endif


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


@if($fillMatchDetails == 'Yes')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#matchDetailsModal').modal({
                backdrop: 'static',  // Prevent closing by clicking outside the modal
                keyboard: false      // Disable closing the modal with the keyboard
            });
            $('#matchDetailsModal').modal('show'); // Show the modal
        });
    </script>
@endif

<script>
    $(document).ready(function(){
        $('#matchDetailsForm').on('submit', function(e) {
            e.preventDefault();  // Prevent default form submission
            let formData = $(this).serialize();  // Serialize form data

            $.ajax({
                url: '{{ route('match.details.submit') }}',
                type: 'POST',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function (response) {
                toastr.success('Match Profile Details Submitted Successfully!', '', {
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
            }
            });
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

@endsection
