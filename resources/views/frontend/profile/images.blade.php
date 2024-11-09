@extends('frontend.master')

@section('title')
    | My Profile
@endsection

@section('content')
    <div class="section">
        <div class="profileDetailsDiv">
            <div class="menus">
                <a class="pro-menu {{ Route::currentRouteName() == 'user.profile' ? 'active' : '' }}"
                    href="{{ route('user.profile') }}"><i class="fa-regular fa-user"></i> Profile</a>
                <a class="pro-menu {{ Route::currentRouteName() == 'user.profile.partner' ? 'active' : '' }}"
                    href="{{ route('user.profile.partner') }}"><i class="fa-solid fa-people-arrows"></i> Partner Preference</a>
                <a class="pro-menu {{ Route::currentRouteName() == 'user.profile.contact' ? 'active' : '' }}"
                    href="{{ route('user.profile.contact') }}"><i class="fa-solid fa-address-book"></i> Contact
                    Informations</a>
                <a class="pro-menu {{ Route::currentRouteName() == 'user.profile.settings' ? 'active' : '' }}"
                    href="{{ route('user.profile.settings') }}"><i class="fa-solid fa-gears"></i> Settings</a>
                <div>
                    <a href=""></a>
                </div>
            </div>
            <div class="detailsBox">
                <div class="statsBox">
                    <div class="statsBoxDiv">
                        <div class="w-100 profiles-mathc-form-div">
                            <form id="save-profile-dp">
                                @csrf
                                <h3 class="text-white mb-4">
                                    Tell Us About Your Ideal Match Partner Preference ...
                                </h3>
                                <div class="d-flex align-items-center flex-wrap mb-3 matchradiosdiv">
                                    <label class="text-white w-100 mb-2">Looking For</label>
                                    <div>
                                        <input type="radio" name="looking_for" id="Groom" value="Groom" class="d-none" {{ $user->profile->gender == 'Female' ? 'checked' : '' }} >
                                        <label for="Groom" class="matchradios">Groom</label>
                                    </div>
                                    <div class="mx-3">
                                        <input type="radio" name="looking_for" id="Bride" value="Bride" class="d-none" {{ $user->profile->gender == 'Male' ? 'checked' : '' }}>
                                        <label for="Bride" class="matchradios">Bride</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="text-white">Partners Age</label>
                                    <div class="d-flex align-items-center column-gap-2 mt-2">
                                        <div class="w-25">
                                            <select name="from_age" class="form-control text-white">
                                                <option value="" class="text-black">Please Select</option>
                                                @for ($age = 18; $age <= 45; $age++)
                                                    <option value="{{ $age }}" class="text-black" @if(!is_null($user->match)) {{ $user->match->from_age == $age ? 'selected' : '' }} @endif>{{ $age }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <span class="text-white">to</span>
                                        <div class="w-25">
                                            <select name="to_age" class="form-control text-white">
                                                <option value="">Please Select</option>
                                                @for ($age = 18; $age <= 45; $age++)
                                                    <option value="{{ $age }}" class="text-black" @if(!is_null($user->match)) {{ $user->match->to_age == $age ? 'selected' : '' }} @endif>{{ $age }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center column-gap-2 mb-3">
                                    <div class="col-5">
                                        <label class="text-white mb-2">Marital Status</label>
                                        <select name="marital_status" class="form-control text-white">
                                            <option value="Single" class="text-black" @if(!is_null($user->match)) {{ $user->match->marital_status == "Single" ? 'selected' : '' }} @endif>Single</option>
                                            <option value="Divorced" class="text-black" @if(!is_null($user->match)) {{ $user->match->marital_status == "Divorced" ? 'selected' : '' }} @endif>Divorced</option>
                                            <option value="Widowed" class="text-black" @if(!is_null($user->match)) {{ $user->match->marital_status == "Widowed" ? 'selected' : '' }} @endif>Widowed</option>
                                            <option value="Awaiting Divorce" class="text-black" @if(!is_null($user->match)) {{ $user->match->marital_status == "Awaiting Divorce" ? 'selected' : '' }} @endif>Awaiting Divorce</option>
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <label class="text-white mb-2">Religion</label>
                                        <select name="religion" class="form-control text-white">
                                            <option value="" class="text-black">Please Select</option>
                                            <option value="Islam" class="text-black" @if(!is_null($user->match)) {{ $user->match->religion == "Islam" ? 'selected' : '' }} @endif>Islam</option>
                                            <option value="Hindu" class="text-black" @if(!is_null($user->match)) {{ $user->match->religion == "Hindu" ? 'selected' : '' }} @endif>Hindu</option>
                                            <option value="Buddhism" class="text-black" @if(!is_null($user->match)) {{ $user->match->religion == "Buddhism" ? 'selected' : '' }} @endif>Buddhism</option>
                                            <option value="Christianity"  class="text-black" @if(!is_null($user->match)) {{ $user->match->religion == "Christianity" ? 'selected' : '' }} @endif>Christianity</option>
                                            <option value="Atheist"  class="text-black" @if(!is_null($user->match)) {{ $user->match->religion == "Atheist" ? 'selected' : '' }} @endif>Atheist</option>
                                            <option value="Others" class="text-black" @if(!is_null($user->match)) {{ $user->match->religion == "Others" ? 'selected' : '' }} @endif>Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center column-gap-2 mb-3">
                                    <div class="col-5">
                                        <label class="text-white mb-2">Location (optional)</label>
                                        <select name="location" id="birthPlaceSelect" class="form-control text-white">
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->name }}" class="text-black"@if(!is_null($user->match))  {{ $user->match->location == $district->name ? 'selected' : '' }} @endif>{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-30 p-0">
                                        <label class="text-white mb-2">Educational Level (optional)</label>
                                        <select name="education" id="" class="form-control text-white">
                                            <option value="" class="text-black" >Select Education Level</option>
                                            <option value="Secondary Education" class="text-black" @if(!is_null($user->match)) {{ $user->match->education == 'Secondary Education' ? 'selected' : '' }} @endif>Secondary Education</option>
                                            <option value="Higher Secondary" class="text-black" @if(!is_null($user->match)) {{ $user->match->education == 'Higher Secondary' ? 'selected' : '' }} @endif>Higher Secondary</option>
                                            <option value="Diploma in Engineering" class="text-black" @if(!is_null($user->match)) {{ $user->match->education == 'Diploma in Engineering' ? 'selected' : '' }} @endif>Diploma in Engineering</option>
                                            <option value="Fazil" class="text-black" @if(!is_null($user->match)) {{ $user->match->education == 'Fazil' ? 'selected' : '' }} @endif>Fazil</option>
                                            <option value="Bachelor's" class="text-black" @if(!is_null($user->match)) {{ $user->match->education == "Bachelor's" ? 'selected' : '' }} @endif>Bachelor's</option>
                                            <option value="Master's" class="text-black" @if(!is_null($user->match)) {{ $user->match->education == "Master's" ? 'selected' : '' }} @endif>Master's</option>
                                            <option value="Doctorate" class="text-black" @if(!is_null($user->match)) {{ $user->match->education == "Doctorate" ? 'selected' : '' }} @endif>Doctorate</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="text-white">Partners Height (optional)</label>
                                    <div class="d-flex align-items-center column-gap-2 mt-2">
                                        <div class="w-25">
                                            <select name="height_from" class="form-control text-white">
                                                <option value="" class="text-black" >Please Select</option>
                                                @for ($feet = 5; $feet <= 6; $feet++)
                                                    @for ($inches = 0; $inches <= 11; $inches++)
                                                        @php
                                                            $height = $feet . "'" . $inches . '"';
                                                        @endphp
                                                        <option value="{{ $height }}" class="text-black" @if(!is_null($user->match)) {{ $user->match->height_from == $height ? 'selected' : '' }} @endif>
                                                            {{ $height }}
                                                        </option>
                                                        @if ($feet == 6 && $inches == 5) {{-- Limit 6 feet to 6'5" --}}
                                                            @break
                                                        @endif
                                                    @endfor
                                                @endfor
                                            </select>
                                        </div>
                                        <span class="text-white">to</span>
                                        <div class="w-25">
                                            <select name="height_to" class="form-control text-white">
                                                <option value="" class="text-black">Please Select</option>
                                                @for ($feet = 5; $feet <= 6; $feet++)
                                                    @for ($inches = 0; $inches <= 11; $inches++)
                                                        @php
                                                            $height = $feet . "'" . $inches . '"';
                                                        @endphp
                                                        <option value="{{ $height }}" class="text-black" @if(!is_null($user->match)) {{ $user->match->height_to == $height ? 'selected' : '' }} @endif>
                                                            {{ $height }}
                                                        </option>
                                                        @if ($feet == 6 && $inches == 5) {{-- Limit 6 feet to 6'5" --}}
                                                            @break
                                                        @endif
                                                    @endfor
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div id="upload-section">
                                        <button id="save-images" class="profilecancelbtnn3 mt-2 float-end">Save</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')

<script>
    $(document).ready(function() {
    $('#save-profile-dp').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        $('#loadingScreen').show();

        $.ajax({
            url: "{{ route('match.details.submit') }}", // Use the route helper
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                // Optionally show a loader before sending
            },
            success: function(response) {
                $('#loadingScreen').hide();
                if (response.success) {
                    toastr.success(response.message); // Show success message

                    // Redirect to the user profile route
                    setTimeout(function() {
                        window.location.href = "{{ route('user.profile') }}"; // Replace with your actual route
                    }, 1500); // Optional: Delay for a better user experience
                } else {
                    toastr.error(response.message); // Show error message
                }
            },
            error: function(xhr) {
                $('#loadingScreen').hide();
                // Handle validation errors
                if(xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, error) {
                        toastr.error(error[0]); // Show validation error messages
                    });
                } else {
                    toastr.error("Something went wrong, please try again.");
                }
            },
            complete: function() {
                // Optionally hide the loader after the request is complete
            }
        });
    });
});

</script>

@endsection
