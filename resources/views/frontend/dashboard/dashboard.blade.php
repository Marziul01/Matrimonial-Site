@extends('frontend.master')

@section('title')
   | User Dashboard
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
                            <button class="nav-link dashboardButton active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
                            <a class="nav-link dropdown-toggle text-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Profile
                            </a>
                            <div class="collapse mb-3" id="collapseExample">
                                <div class="card card-body">
                                    <button class="nav-link" id="v-pills-your-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-your-profile" type="button" role="tab" aria-controls="v-pills-your-profile" aria-selected="true">Create Your Profile</button>
                                    <button class="nav-link mb-0" id="v-pills-your-partner-tab" data-bs-toggle="pill" data-bs-target="#v-pills-your-partner-profile" type="button" role="tab" aria-controls="v-pills-your-partner-profile" aria-selected="true">Create Your Partner Profile</button>
                                </div>
                            </div>
                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Buy Credit</button>

                        </div>
                        <a class="nav-link text-center dashboardLogOut" href="{{ route('user.logout') }}">Logout</a>
                    </div>

                <div class="nav flex-column justify-content-between nav-pills me-3 dashboardNav d-none d-md-block" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div class="">
                        <button class="nav-link dashboardButton active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
                        <a class="nav-link dropdown-toggle text-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Profile
                        </a>
                        <div class="collapse mb-3" id="collapseExample">
                            <div class="card card-body">
                                <button class="nav-link" id="v-pills-your-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-your-profile" type="button" role="tab" aria-controls="v-pills-your-profile" aria-selected="true">Create Your Profile</button>
                                <button class="nav-link mb-0" id="v-pills-your-partner-tab" data-bs-toggle="pill" data-bs-target="#v-pills-your-partner-profile" type="button" role="tab" aria-controls="v-pills-your-partner-profile" aria-selected="true">Create Your Partner Profile</button>
                            </div>
                        </div>
                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Buy Credit</button>
                        <button class="nav-link d-none" id="v-pills-messages1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages1" type="button" role="tab" aria-controls="v-pills-messages1" aria-selected="false">Buy Credit</button>
                    </div>
                    <a class="nav-link text-center dashboardLogOut" href="{{ route('user.logout') }}">Logout</a>
                </div>
                <div class="tab-content w-100" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <h2 class="text-center p-2 mt-3 mb-0 bestMatch">For Your Best Match</h2>
                    <div class="row sticky-div pb-5">
                        @if ($profiles->isEmpty())
                                <h4 class="text-center">Sorry ! No Profiles to show !</h4>
                            @else
                                @foreach ($profiles as $profile)
                                    <div class="col-md-4">
                                        <div class="profileCard  @if(!$profileComplete) blur @endif">
                                            <img src="{{ asset($profile->image) }}" width="100%">
                                            <div class="profileCardDiv">
                                                <p>Name : <span> {{ $profile->first_name ?? 'N/A' }} </span></p>
                                                <p>Address : <span> {{ $profile->present_address ?? 'N/A' }} </span></p>
                                                <p>Age : <span> {{ $profile->age ?? 'N/A' }} </span></p>
                                                <p>Contact : <span style="font-style: italic; color: #F43662"> {{ $profile->contact_numbe ?? 'Please Upgrade Plan' }} </span></p>
                                                <a class="profileDetailsBtn text-center mt-4" href="">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

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
                            <form id="your--Profile" class="px-4 tabForms">
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
                                                <input type="text" name="hobby" placeholder="Hobby" class="profileInput">
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
                            </form>

                        </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-your-partner-profile" role="tabpanel" aria-labelledby="v-pills-your-partner-profile-tab">
                    <h2 class="p-2 mt-3 mb-0 px-4 tabForms" style="font-weight: 800; margin-left: 10px">Hey! Create Your Partner Profile</h2>
                    <div class="row sticky-div p-0">
                        <div class="form-container pb-3">
                            <form id="your-partner-Profile" class="px-4 tabForms">
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
                                        <button type="button" class="btn btn-primary mt-3 profile-next-step" id="nextToProfile1">Next</button>
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
                                        <button type="button" class="btn btn-secondary mt-3 profile-prev-step" id="prevToHome1">Previous</button>
                                        <button type="button" class="btn btn-primary mt-3 profile-next-step" id="nextToContact1">Next</button>
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
                                        <button type="button" class="btn btn-secondary mt-3 profile-prev-step" id="prevToProfile1">Previous</button>
                                        <button type="submit" class="btn btn-secondary mt-3 profile-submit-form">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    ......
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
                                            {{-- <img src="{{ asset($profileDetails->image) }}" class="w-60"> --}}
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
                                            <input type="text" value="{{ $profileDetails->maritial_status }}" class="profileInput" readonly>
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
                                            <input type="text" value="{{ $profileDetails->employee_name }}" class="profileInput" readonly>
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

                </div>
              </div>
        </div>
    </div>
</div>

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

        document.getElementById('nextToContact1').addEventListener('click', function () {
            var profileTab = new bootstrap.Tab(document.getElementById('v-pills-messages1-tab'));
            profileTab.show();
        });

        document.getElementById('nextToContact2').addEventListener('click', function () {
            var profileTab = new bootstrap.Tab(document.getElementById('v-pills-messages1-tab'));
            profileTab.show();
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
        var contactTab = new bootstrap.Tab(document.getElementById('contact1-tab'));
        contactTab.show();
    });

    document.getElementById('prevToProfile1').addEventListener('click', function () {
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

@endsection
