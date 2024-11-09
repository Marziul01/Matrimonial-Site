@extends('frontend.master')

@section('title')
   | My Profile
@endsection

@section('content')

    <div class="section">
        <div class="profileDetailsDiv">
            <div class="menus">
                <a class="pro-menu {{ Route::currentRouteName() == 'user.profile' ? 'active' : '' }}" href="{{ route('user.profile') }}"><i class="fa-regular fa-user"></i> Profile</a>
                <a class="pro-menu {{ Route::currentRouteName() == 'user.profile.partner' ? 'active' : '' }}" href="{{ route('user.profile.partner') }}"><i class="fa-solid fa-people-arrows"></i> Partner Preference</a>
                <a class="pro-menu {{ Route::currentRouteName() == 'user.profile.contact' ? 'active' : '' }}" href="{{ route('user.profile.contact') }}"><i class="fa-solid fa-address-book"></i> Contact Informations</a>
                <a class="pro-menu {{ Route::currentRouteName() == 'user.profile.settings' ? 'active' : '' }}" href="{{ route('user.profile.settings') }}"><i class="fa-solid fa-gears"></i> Settings</a>
                <div>
                    <a href=""></a>
                </div>
            </div>
            <div class="detailsBox">
                <div class="statsBox">
                    <div class="statsBoxDiv">
                        {{-- <div class="image">
                            @if (isset(Auth::user()->profile->image))
                                <img src="{{ asset(Auth::user()->profile->image) }}" class="img w-100" alt="">
                            @else
                                <i class="fa-regular fa-user icon"></i>
                            @endif
                        </div> --}}
                        <div class="image">
                            <form id="save-profile-dp">
                                @csrf
                                <div class="imageDrop">
                                    <!-- Existing Image Preview -->
                                    @if (isset(Auth::user()->profile->image))
                                        <img src="{{ asset($profileDetails->image) }}" class="w-60 savedImagePre" id="savedImagePre">
                                    @else
                                        <i class="fa-regular fa-user icon" id="savedImagePre" class="savedImagePreicon"></i>
                                    @endif
                                    {{-- <img src="{{ asset($profileDetails->image) }}" class="w-60 savedImagePre" id="savedImagePre"> --}}
                                    <label class="UploadnewImageLabel" for="photoInput">
                                        <i class="fa-solid fa-upload"></i>
                                    </label>
                                    <input type="file" name="image" id="photoInput" accept="image/*" class="d-none">

                                    <!-- New Image Preview Container -->
                                    <div id="imagePreviewContainer" class="newImagePre" style="display: none;">
                                        <img id="imagePreview" src="" alt="Uploaded Image" style="max-width: 100%; max-height: 100%;">
                                        <button type="button" class="UploadnewImageLabel2" id="removeImageButton">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <button type="submit" class="dpimgsave"> Save </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="w-70">
                            <div class="profilestats">
                                <div>
                                    <h3 class="UserName text-white"> {{ Auth::user()->name }}
                                        <i class="fa-solid fa-pen edit-icon " id="editIcon1" data-bs-toggle="modal" data-bs-target="#editModal"></i>
                                    </h3>
                                    <p class="text-white">- {{ Auth::user()->profile->bio ?? 'Update your profile bio!'}}</p>
                                    <hr class="bg-white border-white" >
                                </div>
                                <div class="d-flex w-100 profiles-biopic">
                                    <div class="d-flex flex-column row-gap-2 w-25">
                                        <p class="text-white">Birthday :</p>
                                        <p class="text-white">City :</p>
                                        <p class="text-white">Religion :</p>
                                    </div>
                                    <div class="d-flex flex-column row-gap-2 w-50">
                                        <p class="text-white">{{ Auth::user()->profile->date_of_birth ?? 'Update your profile details!'}}</p>
                                        <p class="text-white">{{ Auth::user()->profile->location ?? 'Update your profile details!' }}</p>
                                        <p class="text-white">{{ Auth::user()->profile->religion ?? 'Update your profile details!'}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3 profile-allImages">
                    <p class="profile-title">My photos
                        <i class="fa-solid fa-pen mx-3 edit-gallery edit-infos"></i>
                        <i class="fa-regular @if(Auth::user()->profile->show_images==1) fa-eye @else fa-eye-slash  @endif mx-3 toggle-visibility coursor-pointer" id="toggleGallery" data-visible="{{ Auth::user()->profile->show_images ?? null }}"></i>
                    </p>
                    <div class="d-flex column-gap-2 align-items-center w-100 flex-wrap">
                        <div class="d-flex column-gap-2 row-gap-2 align-items-center flex-wrap" id="image-gallery">
                            @if (!is_null($userImages))
                                @foreach($userImages as $image)
                                    <div class="image-wrapper" id="image-{{ $image->id }}">
                                        <img src="{{ asset('frontend-assets/imgs/profiles/'.$image->image) }}" alt="">
                                        <button type="button" class="btn btn-danger btn-sm remove-image" style="display: none;" data-id="{{ $image->id }}"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        @if (!is_null($userImages))
                        <label class="image-label" for="imageInput" style="display: none;"><i class="fa-solid fa-arrow-up-from-bracket"></i></label>
                        <input type="file" id="imageInput" class="image-input" multiple accept="image/*" style="display: none;">
                        @endif
                    </div>


                    <div id="upload-section" style="display: none;">
                        <button id="save-images" class="profilecancelbtnn2 mt-2 float-end">Save</button>
                    </div>
                </div>

                <div class="p-3 profile-lookingfor">
                    <p class="profile-title">I'm looking for <a href="{{ route('user.profile.partner') }}" class="edit-infos"><i class="fa-solid fa-pen mx-3"></i></a></p>
                    <div class="d-flex column-gap-2 row-gap-2 align-items-center flex-wrap">
                        @if(!is_null(Auth::user()->match))
                        <p class="lookingp">{{ Auth::user()->match->looking_for }}</p>
                        <p class="lookingp">Age : {{ Auth::user()->match->from_age }} yr - {{ Auth::user()->match->to_age }}yr</p>
                        <p class="lookingp">{{ Auth::user()->match->religion  }}</p>
                        <p class="lookingp">{{ Auth::user()->match->marital_status }}</p>
                        @if (Auth::user()->match->location)
                        <p class="lookingp">{{ Auth::user()->match->location }}</p>
                        @endif
                        @if (Auth::user()->match->education)
                        <p class="lookingp">{{ Auth::user()->match->education }}</p>
                        @endif
                        @if (Auth::user()->match->education)
                        <p class="lookingp">Height : {{ Auth::user()->match->height_from }} Inch - {{ Auth::user()->match->height_to }} Inch</p>
                        @endif
                        @else
                        <p class="lookingp"> Please Update Your Match Preference</p>
                        @endif
                    </div>
                </div>

                <div class="p-3 profile-lookingfor">
                    <p class="profile-title">Contact Information <a href="{{  route('user.profile.contact') }}" class="edit-infos" ><i class="fa-solid fa-pen mx-3"></i></a>
                        <i class="fa-regular @if(Auth::user()->profile->show_contact == 1) fa-eye @else fa-eye-slash  @endif mx-3 toggle-contact-visibility coursor-pointer" id="toggleContactInfo" data-visible="{{ Auth::user()->profile->show_contact }}"></i>
                    </p>
                    <div class="d-flex column-gap-2 align-items-center flex-wrap row-gap-2">
                        <p class="lookingp"> Email: {{ $user->email }} </p>
                        <p class="lookingp"> Phone: +880 {{ $user->number ?? 'Add a Contact Number' }} </p>
                    </div>
                </div>

                <div class="p-3 profile-lookingfor">
                    <p class="profile-title">Freely about yourself
                        <a href="javascript:void(0);" id="edit-info1" class="mx-3 edit-infos">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </p>
                    <div class="d-flex column-gap-2 align-items-center flex-wrap row-gap-2">
                        <p class="" id="profiledesc">{{ $profileDetails->desc ?? 'Write a short description about yourself!' }}</p>
                        <form id="save-profile-desc" class="w-100">
                            @csrf
                            <textarea name="desc" id="profiledescinput" class="form-control" style="display: none;" placeholder="Write a short description about yourself!">{{ $profileDetails->desc ?? '' }}</textarea>
                            <div id="save-container" class="w-100" style="display: none;">
                                <div class="d-flex justify-content-start align-items-center column-gap-3 mt-2" >
                                    <button type="submit" id="save-info1" class="profilecancelbtnn2 m-0">Save</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>


                <div class="p-3 profile-personal">
                    <form id="personal-info-save">
                        @csrf
                        <p class="profile-title">Personal information <a href="javascript:void(0);" id="edit-info" class="mx-3 edit-infos">Change <i class="fa-solid fa-pen "></i></a></p>
                        <div class="">
                            <p class="bold">Appearance</p>
                            <div class="d-flex align-items-center flex-wrap column-gap-2 mt-3">
                                <div class="w-25">
                                    <label for="">Height</label>
                                    <select name="height" class="form-control" disabled>
                                        <option value="">Please Select</option>
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
                                <span>inch</span>
                                <div class="w-25">
                                    <label for="">Weight</label>
                                    <select name="weight" class="form-control" disabled>
                                        <option value="">Please Select</option>
                                        <option value="50-60 Kg" {{ $profileDetails->weight == "50-60 Kg" ? 'selected' : '' }}>50-60 Kg</option>
                                                        <option value="60-70 Kg" {{ $profileDetails->weight == "60-70 Kg" ? 'selected' : '' }}>60-70 Kg</option>
                                                        <option value="70-80 Kg" {{ $profileDetails->weight == "70-80 Kg" ? 'selected' : '' }}>70-80 Kg</option>
                                                        <option value="80-90 Kg" {{ $profileDetails->weight == "80-90 Kg" ? 'selected' : '' }}>80-90 Kg</option>
                                                        <option value="90-100 Kg" {{ $profileDetails->weight == "90-100 Kg" ? 'selected' : '' }}>90-100 Kg</option>
                                                        <option value="100-110 Kg" {{ $profileDetails->weight == "100-110 Kg" ? 'selected' : '' }}>100-110 Kg</option>
                                                        <option value="110-120 Kg" {{ $profileDetails->weight == "110-120 Kg" ? 'selected' : '' }}>110-120 Kg</option>
                                    </select>
                                </div>
                                <span>kg</span>
                            </div>
                            <div class="d-flex align-items-center flex-wrap column-gap-3 row-gap-3 p-0 m-0 mt-4">
                                <div class="w-30 p-0">
                                    <label for="">Body Type</label>
                                    <select name="body_type" class="form-control" disabled>
                                        <option value="">Please Select</option>
                                        <option value="Extra Slim" {{ $profileDetails->body_type == "Extra Slim" ? 'selected' : '' }}>Extra Slim</option>
                                        <option value="Slim" {{ $profileDetails->body_type == "Slim" ? 'selected' : '' }}>Slim</option>
                                        <option value="Medium" {{ $profileDetails->body_type == "Medium" ? 'selected' : '' }}>Medium</option>
                                        <option value="Healthy" {{ $profileDetails->body_type == "Healthy" ? 'selected' : '' }}>Healthy</option>
                                        <option value="Over Weight" {{ $profileDetails->body_type == "Over Weight" ? 'selected' : '' }}>Over Weight</option>
                                    </select>
                                </div>
                                <div class="w-30 p-0">
                                    <label for="">Complexion</label>
                                    <select name="complexion" class="form-control" disabled>
                                        <option value="">Please Select</option>
                                        <option value="Fair Skin" {{ $profileDetails->complexion == "Fair Skin" ? 'selected' : '' }}>Fair Skin</option>
                                        <option value="Medium Skin" {{ $profileDetails->complexion == "Medium Skin" ? 'selected' : '' }}>Medium Skin</option>
                                        <option value="Olive or Light Brown Skin" {{ $profileDetails->complexion == "Olive or Light Brown Skin" ? 'selected' : '' }}>Olive or Light Brown Skin</option>
                                        <option value="Brown Skin" {{ $profileDetails->complexion == "Brown Skin" ? 'selected' : '' }}>Brown Skin</option>
                                        <option value="Black Skin" {{ $profileDetails->complexion == "Black Skin" ? 'selected' : '' }}>Black Skin</option>
                                    </select>
                                </div>
                                <div class="w-30 p-0">
                                    <label for="">Blood Group</label>
                                    <select name="blood_group" class="form-control" disabled>
                                        <option value="">Please Select</option>
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

                            <hr class="my-4">
                            <p class="bold">Education</p>
                            <div class="d-flex align-items-center flex-wrap column-gap-3 row-gap-3 p-0 m-0 mt-4">
                                <div class="w-30 p-0">
                                    <label for="">Educational Level</label>
                                    <select name="education" id="" class="form-control" disabled>
                                        <option value="" >Select Education Level</option>
                                        <option value="Secondary Education" {{ $profileDetails->education_level == 'Secondary Education' ? 'selected' : '' }}>Secondary Education</option>
                                        <option value="Higher Secondary" {{ $profileDetails->education_level == 'Higher Secondary' ? 'selected' : '' }}>Higher Secondary</option>
                                        <option value="Diploma in Engineering" {{ $profileDetails->education_level == 'Diploma in Engineering' ? 'selected' : '' }}>Diploma in Engineering</option>
                                        <option value="Fazil" {{ $profileDetails->education_level == 'Fazil' ? 'selected' : '' }}>Fazil</option>
                                        <option value="Bachelor's" {{ $profileDetails->education_level == "Bachelor's" ? 'selected' : '' }}>Bachelor's</option>
                                        <option value="Master's" {{ $profileDetails->education_level == "Master's" ? 'selected' : '' }}>Master's</option>
                                        <option value="Doctorate" {{ $profileDetails->education_level == "Doctorate" ? 'selected' : '' }}>Doctorate</option>
                                    </select>
                                </div>
                                <div class="w-30 p-0">
                                    <label for="">Education Institute</label>
                                    <input type="text" class="form-control" name="education_institute" value="{{ $profileDetails->institute_name }}" readonly>
                                </div>
                                <div class="w-30 p-0">
                                    <label for="">Year</label>
                                    <input type="number" class="form-control" name="education_year" value="{{ $profileDetails->education_year }}" readonly>
                                </div>
                            </div>
                            <hr class="my-4">
                            <p class="bold">Work</p>
                            <div class="d-flex align-items-center flex-wrap column-gap-3 row-gap-3 p-0 m-0 mt-4">
                                <div class="w-30 p-0">
                                    <label for="">Profession</label>
                                    <select name="profession" class="form-control" disabled>
                                        <option value="">Please Select</option>
                                        <option value="Private Company" {{ $profileDetails->profession == "Private Company" ? 'selected' : '' }}>Private Company</option>
                                                        <option value="Govt. Service" {{ $profileDetails->profession == "Govt. Service" ? 'selected' : '' }}>Govt. Service</option>
                                                        <option value="Business" {{ $profileDetails->profession == "Business" ? 'selected' : '' }}>Business</option>
                                                        <option value="Not Working" {{ $profileDetails->profession == "Not Working" ? 'selected' : '' }}>Not Working</option>
                                    </select>
                                </div>
                                <div class="w-30 p-0">
                                    <label for="">Position</label>
                                    <input type="text" class="form-control" name="position" value="{{ $profileDetails->designation }}" readonly>
                                </div>
                                <div class="w-30 p-0">
                                    <label for="">Your Income (Monthly)</label>
                                    <select name="monthly_income" class="form-control" disabled>
                                        <option value="">Please Select</option>
                                        <option value="10,000 - 20,000" {{ $profileDetails->monthly_income == "10,000 - 20,000" ? 'selected' : '' }}>10,000 - 20,000 Bdt</option>
                                        <option value="20,000 - 30,000" {{ $profileDetails->monthly_income == "20,000 - 30,000" ? 'selected' : '' }}>20,000 - 30,000 Bdt</option>
                                        <option value="30,000 - 40,000" {{ $profileDetails->monthly_income == "30,000 - 40,000" ? 'selected' : '' }}>30,000 - 40,000 Bdt</option>
                                        <option value="40,000 - 50,000" {{ $profileDetails->monthly_income == "40,000 - 50,000" ? 'selected' : '' }}>40,000 - 50,000 Bdt</option>
                                        <option value="50,000 - 60,000" {{ $profileDetails->monthly_income == "50,000 - 60,000" ? 'selected' : '' }}>50,000 - 60,000 Bdt</option>
                                        <option value="60,000 - 70,000" {{ $profileDetails->monthly_income == "60,000 - 70,000" ? 'selected' : '' }}>60,000 - 70,000 Bdt</option>
                                        <option value="70,000 - 80,000" {{ $profileDetails->monthly_income == "70,000 - 80,000" ? 'selected' : '' }}>70,000 - 80,000 Bdt</option>
                                        <option value="80,000 - 90,000" {{ $profileDetails->monthly_income == "80,000 - 90,000" ? 'selected' : '' }}>80,000 - 90,000 Bdt</option>
                                        <option value="90,000 - 1lakh" {{ $profileDetails->monthly_income == "90,000 - 1lakh" ? 'selected' : '' }}>90,000 - 1Lakh Bdt</option>
                                        <option value="1 Lakh +" {{ $profileDetails->monthly_income == "1 Lakh +" ? 'selected' : '' }}>1 Lakh +</option>
                                        <option value="Do Not Mention" {{ $profileDetails->monthly_income == "Do Not Mention" ? 'selected' : '' }}>Do Not Mention</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="my-4">
                            <p class="bold">General</p>
                            <div class="d-flex align-items-center column-gap-3 row-gap-3 flex-wrap p-0 m-0 mt-4">
                                <div class="w-30 p-0">
                                    <label for="">Account For</label>
                                    <select name="account_for" class="form-control" disabled>
                                        <option value="self">Self</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="w-30 p-0">
                                    <label for="">Gender</label>
                                    <select name="gender" class="form-control" disabled>
                                        <option value="Female" {{ $profileDetails->gender == "Female" ? 'selected' : '' }}>Female</option>
                                        <option value="Male" {{ $profileDetails->gender == "Male" ? 'selected' : '' }}>Male</option>
                                    </select>
                                </div>
                                <div class="w-30 p-0">
                                    <label for="">Marital Status</label>
                                    <select name="marital_status" class="form-control" disabled>
                                        <option value="Single" {{ $profileDetails->marital_status == "Single" ? 'selected' : '' }}>Single</option>
                                        <option value="Divorced" {{ $profileDetails->marital_status == "Divorced" ? 'selected' : '' }}>Divorced</option>
                                        <option value="Widowed" {{ $profileDetails->marital_status == "Widowed" ? 'selected' : '' }}>Widowed</option>
                                        <option value="Awaiting Divorce" {{ $profileDetails->marital_status == "Awaiting Divorce" ? 'selected' : '' }}>Awaiting Divorce</option>
                                    </select>
                                </div>
                                <div class="w-30 p-0">
                                    <label for="">Nationality</label>
                                    <select name="nationality" id="nationality" class="form-control" disabled>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->nicename }}" @if(!is_null($profileDetails->nationality)) {{ $profileDetails->nationality == $country->nicename ? 'selected' : '' }} @else {{ $country->nicename == 'Bangladesh' ? 'selected' : '' }} @endif >
                                                {{ $country->nicename }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-30 p-0">
                                    <label for="">Birth Place</label>
                                    <select name="birth_place" id="birthPlaceSelect" class="form-control" disabled>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->name }}" {{ $profileDetails->birth_place == $district->name ? 'selected' : '' }}>{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="birth_place_text" id="birthPlaceText" class="form-control"  placeholder="Enter your birth place (Ex: New York, USA)" value="{{ $profileDetails->birthPlaceText }}" style="display:none" readonly>
                                </div>
                                <div class="w-30 p-0">
                                    <label for="">Family Status</label>
                                    <select name="family_status" class="form-control" disabled>
                                        <option value="Rich" {{ $profileDetails->family_status == "Rich" ? 'selected' : '' }}>Rich</option>
                                        <option value="Upper Middle Class" {{ $profileDetails->family_status == "Upper Middle Class" ? 'selected' : '' }}>Upper Middle Class</option>
                                        <option value="Middle Class" {{ $profileDetails->family_status == "Middle Class" ? 'selected' : '' }}>Middle Class</option>
                                    </select>
                                </div>
                                <div class="w-30 p-0">
                                    <label for="">Living With Family ?</label>
                                    <select name="living_with_family" class="form-control" disabled>
                                        <option value="Yes" {{ $profileDetails->living_with_family == "Yes" ? 'selected' : '' }}>Yes</option>
                                        <option value="No" {{ $profileDetails->living_with_family == "No" ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                                <div class="w-30 p-0">
                                    <label for="">Smoking</label>
                                    <select name="smoking" class="form-control" disabled>
                                        <option value="Yes" {{ $profileDetails->smoking == "Yes" ? 'selected' : '' }}>Yes</option>
                                        <option value="No" {{ $profileDetails->smoking == "No" ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                                <div class="w-30 p-0">
                                    <label for="">Drinking</label>
                                    <select name="drinking" class="form-control" disabled>
                                        <option value="Yes" {{ $profileDetails->drinking == "Yes" ? 'selected' : '' }}>Yes</option>
                                        <option value="No" {{ $profileDetails->drinking == "No" ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end align-items-center column-gap-3 mt-4">
                                <button type="button" id="cancel-edit" class="profilecancelbtnn" style="display: none;">Cancel</button>
                                <button type="submit" id="save-info" class="profilecancelbtnn2" style="display: none;">Save</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <div class="modal profileedit fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog overflow-hidden">
          <div class="modal-content">
            <div class="modal-body">
              <form id="profile-infos-update" class=" row">
                @csrf
                <div class="col-12 position-relative mb-4">
                    <h4 class="text-center text-white"> Update Profile Details </h4>
                    <button type="button" class="btn-close position-absolute closeprofilepop" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="inputData" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="inputData" value="{{ Auth::user()->name }}">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="inputData" class="form-label">Bio</label>
                  <input type="text" class="form-control" name="bio" id="inputData" @if(Auth::user()->profile->bio) value="{{  Auth::user()->profile->bio }}" @else placeholder="Write a short bio !" @endif >
                </div>
                <div class="col-12 mb-3">
                    <label for="inputData" class="form-label">Date of Birth</label>
                    <div class="row">
                        <div class="col-4 p-0">
                            <label class="form-label">Day</label>
                            <select name="day" id="daySelect" class="form-control">
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
                        <div class="col-4">
                            <label class="form-label">Month</label>
                            <select name="month" id="monthSelect" class="form-control">
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
                        <div class="col-4 p-0">
                            <label class="form-label">Year</label>
                            <select name="year" id="yearSelect" class="form-control">
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
                  <div class="col-6 mb-3">
                    <label for="inputData" class="form-label">Location</label>
                    <select name="location" id="birthPlaceSelect" class="form-control">
                        @foreach ($districts as $district)
                            <option value="{{ $district->name }}" {{ Auth::user()->profile->location == $district->name ? 'selected' : '' }}>{{ $district->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-6 mb-3">
                    <label for="inputData" class="form-label">Religion</label>
                    <select name="religion" class="form-control">
                        <option value="">Please Select</option>
                        <option value="Islam" {{ $user->profile->religion == "Islam" ? 'selected' : '' }}>Islam</option>
                        <option value="Hindu" {{ $user->profile->religion == "Hindu" ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddhism" {{ $user->profile->religion == "Buddhism" ? 'selected' : '' }}>Buddhism</option>
                        <option value="Christianity" {{ $user->profile->religion == "Christianity" ? 'selected' : '' }}>Christianity</option>
                        <option value="Atheist" {{ $user->profile->religion == "Atheist" ? 'selected' : '' }}>Atheist</option>
                        <option value="Others" {{ $user->profile->religion == "Others" ? 'selected' : '' }}>Others</option>
                    </select>
                  </div>
                <button type="submit" class="profileinfosub my-3">Save changes</button>
              </form>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="confirmVisibilityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Action</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="modalText">Are you sure you want to hide your image gallery?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmToggleBtn">Yes, Proceed</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmContactInfoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Action</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="modalContactText">Are you sure you want to hide your contact information?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmContactToggleBtn">Yes, Proceed</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customJs')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.min.js"></script>

<script>
    document.getElementById('edit-info').addEventListener('click', function (e) {
        e.preventDefault();

        const inputs = document.querySelectorAll('input, select');
        const isEditable = this.classList.contains('active'); // Check if it's in editable mode


        // Toggle readonly and disabled attributes
        inputs.forEach(function (input) {
            if (isEditable) {
                // If already editable, set back to readonly/disabled
                input.setAttribute('readonly', true);
                input.setAttribute('disabled', true);
            } else {
                // If not editable, remove readonly/disabled
                input.removeAttribute('readonly');
                input.removeAttribute('disabled');
            }
        });

        if (isEditable) {
            // If editable, go back to non-editable mode
            this.classList.remove('active'); // Remove active class from the change button
            document.getElementById('cancel-edit').style.display = 'none'; // Hide Cancel button
            document.getElementById('save-info').style.display = 'none'; // Hide Save button
            document.querySelectorAll('.form-control').forEach(function(input) {
                input.classList.remove('editing'); // Toggle a class on form controls
            });
        } else {
            // Enable editable mode
            this.classList.add('active'); // Add active class to the change button
            document.getElementById('cancel-edit').style.display = 'inline-block'; // Show Cancel button
            document.getElementById('save-info').style.display = 'inline-block'; // Show Save button
            document.querySelectorAll('.form-control').forEach(function(input) {
                input.classList.toggle('editing'); // Toggle a class on form controls
            });
        }
    });

    document.getElementById('cancel-edit').addEventListener('click', function () {
        const inputs = document.querySelectorAll('input, select');

        // Reapply readonly and disabled attributes
        inputs.forEach(function (input) {
            input.setAttribute('readonly', true);
            input.setAttribute('disabled', true);
        });

        // Reset buttons and the form
        document.getElementById('edit-info').classList.remove('active'); // Remove active class from the change button
        document.getElementById('cancel-edit').style.display = 'none'; // Hide Cancel button
        document.getElementById('save-info').style.display = 'none'; // Hide Save button

        document.querySelectorAll('.form-control').forEach(function(input) {
                input.classList.remove('editing'); // Toggle a class on form controls
            });
        // Optionally reset the form (this clears the input values, remove if unnecessary)
        document.getElementById('personal-info-save').reset();
    });


    // Profession change logic
    document.querySelector('select[name="profession"]').addEventListener('change', function () {
        const profession = this.value;
        const positionInput = document.querySelector('input[name="position"]');
        const incomeSelect = document.querySelector('select[name="monthly_income"]');

        if (profession === 'Not Working') {
            positionInput.parentElement.style.display = 'none'; // Hide the position input
            incomeSelect.parentElement.style.display = 'none';  // Hide the income select
        } else {
            positionInput.parentElement.style.display = 'block'; // Show the position input
            incomeSelect.parentElement.style.display = 'block';  // Show the income select
        }
    });

    // Nationality change logic
    document.querySelector('select[name="nationality"]').addEventListener('change', function () {
        const nationality = this.value;
        const birthPlaceSelect = document.getElementById('birthPlaceSelect');
        const birthPlaceTextWrapper = document.getElementById('birthPlaceText');

        if (nationality === 'Bangladesh') {
            birthPlaceSelect.style.display = 'block';  // Hide select input
            birthPlaceTextWrapper.style.display = 'none';  // Show text input
        } else {
            birthPlaceSelect.style.display = 'none';  // Show select input
            birthPlaceTextWrapper.style.display = 'block';  // Hide text input
        }
    });

</script>

<script>
    document.getElementById('personal-info-save').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        const formData = new FormData(this); // Create FormData object with form data
        const saveButton = document.getElementById('save-info');

        // Disable the button to prevent multiple submissions
        saveButton.disabled = true;

        fetch('{{ route("profile.store") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.errors) {
                // Handle validation errors
                Object.keys(data.errors).forEach(function (key) {
                    toastr.error(data.errors[key][0]); // Show each validation error using Toastr
                });
            } else {
                toastr.success('Profile Personal Details Updated');

                document.getElementById('personal-info-save').reset();

                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
        })
        .catch(error => {
            toastr.error('An error occurred. Please try again.');
        })
        .finally(() => {
            // Re-enable the button after the request is done
            saveButton.disabled = false;
        });
    });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the edit icon element
        const editIcon = document.getElementById('editIcon1');

        // Add event listener to the edit icon
        editIcon.addEventListener('click', function () {
            // Add "active" class to the icon when clicked
            this.classList.add('active');
        });

        // Get the modal element
        const editModal = document.getElementById('editModal');

        // Add event listener to the modal for when it hides
        editModal.addEventListener('hidden.bs.modal', function () {
            // Remove the "active" class from the icon when the modal is closed
            editIcon.classList.remove('active');
        });
    });

</script>

<script>
    // Get the dynamic saved date from the database (via PHP)
    const savedDate = "<?php echo $user->profile->date_of_birth; ?>";

    // Split the saved date into year, month, and day
    const [year, month, day] = savedDate.split('-');

    // Preselect the options in the select inputs
    document.getElementById('yearSelect').value = year;
    document.getElementById('monthSelect').value = month;
    document.getElementById('daySelect').value = parseInt(day, 10); // Use integer for day
</script>

<script>
    document.getElementById('profile-infos-update').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        const formData = new FormData(this); // Create FormData object with form data
        const saveButton = document.getElementById('save-info');

        // Disable the button to prevent multiple submissions
        saveButton.disabled = true;

        fetch('{{ route("profile.storetwo") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.errors) {
                // Handle validation errors
                Object.keys(data.errors).forEach(function (key) {
                    toastr.error(data.errors[key][0]); // Show each validation error using Toastr
                });
            } else {
                toastr.success('Profile Personal Details Updated');

                document.getElementById('profile-infos-update').reset();

                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
        })
        .catch(error => {
            toastr.error('An error occurred. Please try again.');
        })
        .finally(() => {
            // Re-enable the button after the request is done
            saveButton.disabled = false;
        });
    });

</script>

<script>
    // Get the elements
    const editIcon = document.getElementById('edit-info1');
    const profileDesc = document.getElementById('profiledesc');
    const profileDescInput = document.getElementById('profiledescinput');
    const saveContainer = document.getElementById('save-container');

    // Add a click event listener to the edit icon
    editIcon.addEventListener('click', function() {
        // Toggle visibility of the p and textarea
        if (profileDesc.style.display === 'none') {
            // Show the p and hide the textarea and save button div
            profileDesc.style.display = 'block';
            profileDescInput.style.display = 'none';
            saveContainer.style.display = 'none';
        } else {
            // Hide the p and show the textarea and save button div
            profileDesc.style.display = 'none';
            profileDescInput.style.display = 'block';
            saveContainer.style.display = 'block'; // Flex to align the button
        }

        // Toggle the 'active' class on the edit icon
        editIcon.classList.toggle('active');
    });
</script>

<script>
    document.getElementById('save-profile-desc').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        const formData = new FormData(this); // Create FormData object with form data
        const saveButton = document.getElementById('save-info');

        // Disable the button to prevent multiple submissions
        saveButton.disabled = true;

        fetch('{{ route("profile.storethree") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.errors) {
                // Handle validation errors
                Object.keys(data.errors).forEach(function (key) {
                    toastr.error(data.errors[key][0]); // Show each validation error using Toastr
                });
            } else {
                toastr.success('Profile Personal Details Updated');

                document.getElementById('save-profile-desc').reset();

                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
        })
        .catch(error => {
            toastr.error('An error occurred. Please try again.');
        })
        .finally(() => {
            // Re-enable the button after the request is done
            saveButton.disabled = false;
        });
    });

</script>

<script>
    // Get DOM elements
    const photoInput = document.getElementById("photoInput");
    const imagePreviewContainer = document.getElementById("imagePreviewContainer");
    const imagePreview = document.getElementById("imagePreview");
    const removeImageButton = document.getElementById("removeImageButton");
    const savedImagePre = document.getElementById("savedImagePre");

    // Event listener for the file input change
    photoInput.addEventListener("change", function (e) {
        const file = e.target.files[0];

        // Check if a file is selected and if it is an image
        if (file && file.type.startsWith("image/")) {
            const reader = new FileReader();

            reader.onload = function (e) {
                // Display the uploaded image preview
                imagePreview.src = e.target.result;
                imagePreviewContainer.style.display = "block";  // Show the preview container
                savedImagePre.style.display = "none"; // Hide the existing image preview
            };

            reader.readAsDataURL(file);
        }
    });

    // Event listener for the "Remove" button
    removeImageButton.addEventListener("click", function () {
        // Clear the input field
        photoInput.value = "";

        // Hide the preview container
        imagePreviewContainer.style.display = "none";

        // Show the existing image preview again
        savedImagePre.style.display = "block";
    });
</script>

<script>
    document.getElementById('save-profile-dp').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        const formData = new FormData(this); // Create FormData object with form data
        const saveButton = document.getElementById('save-info');

        // Disable the button to prevent multiple submissions
        saveButton.disabled = true;

        fetch('{{ route("profile.storeImg") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.errors) {
                // Handle validation errors
                Object.keys(data.errors).forEach(function (key) {
                    toastr.error(data.errors[key][0]); // Show each validation error using Toastr
                });
            } else {
                toastr.success('Profile Image has been Updated');

                document.getElementById('save-profile-dp').reset();

                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
        })
        .catch(error => {
            toastr.error('An error occurred. Please try again.');
        })
        .finally(() => {
            // Re-enable the button after the request is done
            saveButton.disabled = false;
        });
    });

</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editIcon = document.querySelector(".edit-gallery");
        const uploadSection = document.getElementById("upload-section");
        const imageWrappers = document.querySelectorAll(".image-wrapper");
        const uploadLabel = document.querySelector('.image-label');
        const imageGallery = document.getElementById("image-gallery");
        const imageInput = document.getElementById("imageInput");
        let imagePreviews = [];
        let filesArray = [];

        // Toggle upload section and remove buttons on edit icon click
        editIcon.addEventListener("click", function() {
            this.classList.toggle("active"); // Toggle active class on the icon

            // Show/hide upload section
            if (uploadSection.style.display === "block") {
                uploadSection.style.display = "none";
                hideRemoveButtons(); // Hide remove buttons
                uploadLabel.style.display = 'none'; // Hide the upload label
            } else {
                uploadSection.style.display = "block";
                showRemoveButtons(); // Show remove buttons
                uploadLabel.style.display = 'block'; // Show the upload label
            }
        });

        // Function to show remove buttons
        function showRemoveButtons() {
            imageWrappers.forEach(wrapper => {
                const removeButton = wrapper.querySelector('.remove-image');
                removeButton.style.display = 'block'; // Show the remove button
            });
        }

        // Function to hide remove buttons
        function hideRemoveButtons() {
            imageWrappers.forEach(wrapper => {
                const removeButton = wrapper.querySelector('.remove-image');
                removeButton.style.display = 'none'; // Hide the remove button
            });
        }

        // 1. Handle the image upload logic
        imageInput.addEventListener("change", function() {
            Array.from(imageInput.files).forEach((file) => {
                // Avoid adding duplicates by checking if the file already exists in filesArray
                if (!filesArray.some(f => f.name === file.name)) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = file.name;
                        img.classList.add("preview-image");

                        // Create wrapper for the image and remove button
                        let wrapper = document.createElement('div');
                        wrapper.classList.add('image-wrapper');
                        wrapper.appendChild(img);

                        // Add remove button for new images
                        let removeBtn = document.createElement('button');
                        removeBtn.classList.add('btn', 'btn-danger', 'btn-sm');
                        removeBtn.innerHTML = `<i class="fa-solid fa-trash"></i>`;
                        removeBtn.addEventListener('click', function () {
                            wrapper.remove();
                            // Remove the file from the files array
                            filesArray = filesArray.filter(f => f !== file);
                            updateImageInput();
                        });

                        wrapper.appendChild(removeBtn);
                        imageGallery.appendChild(wrapper);
                        imagePreviews.push(wrapper);

                        // Add the file to the files array
                        filesArray.push(file);
                        updateImageInput(); // Update the input files
                    }
                    reader.readAsDataURL(file);
                }
            });
        });

        // Function to update the input value with all files in filesArray
        function updateImageInput() {
            const dataTransfer = new DataTransfer();
            filesArray.forEach(file => dataTransfer.items.add(file));
            imageInput.files = dataTransfer.files; // Update the input's files property
        }

        // 2. Remove existing images via AJAX
        document.querySelectorAll('.remove-image').forEach(button => {
            button.addEventListener('click', function() {
                let imageId = this.getAttribute('data-id'); // Get the image ID from the button

                if (confirm('Are you sure you want to delete this image?')) {
                    // AJAX request to delete the image
                    fetch(`/account/delete-image/${imageId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Remove the image from the DOM instantly
                            document.getElementById(`image-${imageId}`).remove();
                            console.log("Image deleted successfully");
                        } else {
                            console.log("Error deleting image");
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            });
        });

        // 3. Save uploaded images via AJAX
        document.getElementById("save-images").addEventListener("click", function() {
            const formData = new FormData();
            const files = filesArray; // Use the updated filesArray instead

            // Check file count and size
            if (files.length > 5) {
                toastr.error("You can only upload a maximum of 5 images.");
                return;
            }

            for (const file of files) {
                if (file.size > 2 * 1024 * 1024) {
                    toastr.error("Each image should be less than 2MB.");
                    return;
                }
                formData.append('images[]', file);
            }

            // Send AJAX request to save images
            fetch('{{ route("profile.storeImggallery") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    toastr.success(data.message);
                    location.reload(); // Reload the page to show the new images
                } else {
                    toastr.error(data.message || "Error uploading images.");
                }
            }).catch(error => {
                console.error('Error:', error);
                toastr.error("An error occurred while uploading images.");
            });
        });

    });

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleGalleryIcon = document.getElementById('toggleGallery');
        let showImages = toggleGalleryIcon.getAttribute('data-visible'); // Get the current visibility state

        // Set initial icon based on current visibility state
        if (showImages === "1") {
            toggleGalleryIcon.classList.add('fa-eye');
        } else {
            toggleGalleryIcon.classList.add('fa-eye-slash');
        }

        // Handle icon click to show confirmation modal
        toggleGalleryIcon.addEventListener("click", function () {
            showImages = this.getAttribute('data-visible'); // Update visibility state on each click
            const modal = new bootstrap.Modal(document.getElementById('confirmVisibilityModal'));

            if (showImages === "1") {
                document.getElementById('modalText').textContent = "Are you sure you want to hide your image gallery?";
            } else {
                document.getElementById('modalText').textContent = "Are you sure you want to show your image gallery?";
            }
            modal.show(); // Show the modal
        });

        // Handle confirmation button click
        document.getElementById('confirmToggleBtn').addEventListener("click", function () {
            // Determine new visibility state based on current one
            const newVisibility = showImages === "1" ? 0 : 1;
            const url = '{{ route("profile.toggleGalleryVisibility") }}';

            // AJAX request to update 'show_images' column
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ show_images: newVisibility }) // Send updated value (0 or 1)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toastr.success(newVisibility === 0 ? "Your image gallery is now hidden." : "Your image gallery is now visible.");
                        toggleGalleryIcon.setAttribute('data-visible', newVisibility.toString()); // Update visibility state

                        // Toggle between eye and eye-slash icons
                        if (newVisibility === 0) {
                            toggleGalleryIcon.classList.remove('fa-eye');
                            toggleGalleryIcon.classList.add('fa-eye-slash');
                        } else {
                            toggleGalleryIcon.classList.remove('fa-eye-slash');
                            toggleGalleryIcon.classList.add('fa-eye');
                        }

                        const modal = bootstrap.Modal.getInstance(document.getElementById('confirmVisibilityModal'));
                        modal.hide(); // Hide the modal
                    } else {
                        toastr.error("Error updating gallery visibility.");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error("An error occurred.");
                });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleContactIcon = document.getElementById('toggleContactInfo');
        let showContactInfo = toggleContactIcon.getAttribute('data-visible'); // Get the current visibility state for contact info

        // Set initial icon based on current visibility state
        if (showContactInfo === "1") {
            toggleContactIcon.classList.add('fa-eye');
        } else {
            toggleContactIcon.classList.add('fa-eye-slash');
        }

        // Handle icon click to show confirmation modal for contact info
        toggleContactIcon.addEventListener("click", function () {
            showContactInfo = this.getAttribute('data-visible'); // Update visibility state on each click
            const contactModal = new bootstrap.Modal(document.getElementById('confirmContactInfoModal'));

            if (showContactInfo === "1") {
                document.getElementById('modalContactText').textContent = "Are you sure you want to hide your contact information?";
            } else {
                document.getElementById('modalContactText').textContent = "Are you sure you want to show your contact information?";
            }
            contactModal.show(); // Show the modal
        });

        // Handle confirmation button click for contact info
        document.getElementById('confirmContactToggleBtn').addEventListener("click", function () {
            // Determine new visibility state based on current one
            const newContactVisibility = showContactInfo === "1" ? 0 : 1;
            const url = '{{ route("profile.toggleContactVisibility") }}';

            // AJAX request to update 'show_contact_info' column
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ show_contact_info: newContactVisibility }) // Send updated value (0 or 1)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toastr.success(newContactVisibility === 0 ? "Your contact information is now hidden." : "Your contact information is now visible.");
                        toggleContactIcon.setAttribute('data-visible', newContactVisibility.toString()); // Update visibility state

                        // Toggle between eye and eye-slash icons for contact info
                        if (newContactVisibility === 0) {
                            toggleContactIcon.classList.remove('fa-eye');
                            toggleContactIcon.classList.add('fa-eye-slash');
                        } else {
                            toggleContactIcon.classList.remove('fa-eye-slash');
                            toggleContactIcon.classList.add('fa-eye');
                        }

                        const contactModal = bootstrap.Modal.getInstance(document.getElementById('confirmContactInfoModal'));
                        contactModal.hide(); // Hide the modal
                    } else {
                        toastr.error("Error updating contact information visibility.");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error("An error occurred.");
                });
        });
    });
</script>
@endsection
