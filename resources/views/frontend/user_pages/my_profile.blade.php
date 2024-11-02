@extends('frontend.master')

@section('title')
   | {{$profile->name}}
@endsection


@section('content')

<div class="section profileview">
    <div class="dashDetailsDiv">
        <div class="imageBox">
            <div class="swiper-container mySwiper position-relative">
                <div class="swiper-wrapper">
                    <!-- Profile Picture Slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset($profile->image) }}" class="img" alt="Profile Image">
                    </div>
                    
                    <!-- Image Gallery Slides -->
                    @if (!is_null($userImages) && $profile->show_images != 0)
                        @if ($user->plans->plan_id !== 1 )
                            @foreach($userImages as $image)
                                <div class="swiper-slide">
                                    <img src="{{ asset('frontend-assets/imgs/profiles/'.$image->image) }}" alt="">
                                </div>
                            @endforeach
                        @endif
                    @endif
                        
                </div>
                <!-- Navigation Buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    
        <div class="detailsBox flex-wrap row-gap-4">
            <div class="w-75 statsBox1">
                <h1 class="UserName">{{ $profile->name }}</h1>
                <p>- {{ $profile->bio }} </p>
                <div class="d-flex w-100 mt-4">
                    <div class="d-flex flex-column row-gap-2 w-25">
                        <p class="text-white">Age :</p>
                        <p class="text-white">Marital Status :</p>
                        <p class="text-white">Religion :</p>
                        <p class="text-white">Address :</p>
                    </div>
                    <div class="d-flex flex-column row-gap-2 w-50">
                        <p class="text-white">{{ $profile->age . 'yr' }}</p>
                        <p class="text-white">{{ $profile->marital_status }}</p>
                        <p class="text-white">{{ $profile->religion }}</p>
                        <p class="text-white">{{ $profile->location }}</p>
                    </div>
                </div>
            </div>
            <div class="w-25 ">
                <div class="request-box flex-column row-gap-3">
                    {{-- Case 1: Logged-in user already sent a request --}}
                    @if($sentRequest && $sentRequest->status === 1)
                        <a class="requestsendbtn" onclick="showConfirmationModal({{ $sentRequest->id }}, 'cancel')">Delete Request</a>

                    {{-- Case 2: Profile user has sent a request to logged-in user --}}
                    @elseif($receivedRequest && $receivedRequest->status === 1)
                        <a class="requestsendbtn" onclick="showConfirmationModal({{ $receivedRequest->id }}, 'accept')">Accept Request</a>
                        <a class="requestsendbtn" onclick="showConfirmationModal({{ $receivedRequest->id }}, 'cancel')">Cancel Request</a>

                    {{-- Case 3: Either user has accepted the request --}}
                    @elseif(($sentRequest && $sentRequest->status === 2) || ($receivedRequest && $receivedRequest->status === 2))
                        <a class="requestsendbtn" onclick="showConfirmationModal({{ $sentRequest->id ?? $receivedRequest->id }}, 'cancel')" >Cancel Connection</a>
                        <a class="requestsendbtn" href="{{ url('/message' , ['id' => $profile->user_id , 'name' => $profile->name ]) }}">Chat Now</a>

                    {{-- Default: No connection or pending request --}}
                    @else
                        <a href="javascript:void(0);" class="requestsendbtn" id="sendRequestBtn" data-recipient-id="{{ $profile->user_id }}">
                            Send Connect Request <i class="fa-solid fa-user-plus"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="w-100 infos">
                <div class="w-100"> 
                    <h3 class="mb-3" >About @if($profile->gender == 'Male') Himself @else Herself  @endif  <i class="fa-regular fa-address-card"></i></h3>
                    <p> {{ $profile->desc }} </p>
                    <div class="w-100">
                        <h5 class="mt-4">Personal information :</h5>
                        <div class="d-flex w-100 mt-4 justify-content-between">
                            <div class="d-flex flex-column w-33 justify-content-start align-items-start row-gap-5">
                                <div class="d-flex column-gap-5 lookingp1 px-3">
                                    <p class="lookingp">Nationality :</p>
                                    <p class="lookingp">{{ $profile->nationality }}</p>
                                </div>
                                <div class="d-flex column-gap-5 lookingp1 px-3">
                                    <p class="lookingp">Weight :</p>
                                    <p class="lookingp">{{ $profile->weight }} kg</p>
                                </div>
                                <div class="d-flex column-gap-5 lookingp1 px-3 px-3">
                                    <p class="lookingp">Blood Group :</p>
                                    <p class="lookingp">{{ $profile->blood_group }}</p>
                                </div>
                            </div>

                            <div class="d-flex flex-column w-33 justify-content-start align-items-start row-gap-5">
                                <div class="d-flex column-gap-5 lookingp1 px-3">
                                    <p class="lookingp">Birth Place :</p>
                                    <p class="lookingp">{{ $profile->birth_place }}</p>
                                </div>
                                <div class="d-flex column-gap-5 lookingp1 px-3">
                                    <p class="lookingp">Body Type :</p>
                                    <p class="lookingp">{{ $profile->body_type }}</p>
                                </div>
                                <div class="d-flex column-gap-5 lookingp1 px-3">
                                    <p class="lookingp">Family Status :</p>
                                    <p class="lookingp">{{ $profile->family_status }}</p>
                                </div>
                            </div>

                            <div class="d-flex flex-column w-33 justify-content-start align-items-start row-gap-5">
                                <div class="d-flex column-gap-5 lookingp1 px-3">
                                    <p class="lookingp">Height :</p>
                                    <p class="lookingp">{{ $profile->height }} Inch</p>
                                </div>
                                <div class="d-flex column-gap-5 lookingp1 px-3">
                                    <p class="lookingp">Complexion :</p>
                                    <p class="lookingp">{{ $profile->complexion }}</p>
                                </div>
                                <div class="d-flex column-gap-5 lookingp1 px-3">
                                    <p>Living With Family ?</p>
                                    <p class="lookingp">{{ $profile->living_with_family }}</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="w-100 mt-3">
                        <h5 class="mt-4">Education :</h5>
                        <div class="d-flex w-100 mt-4 justify-content-between">
                            <div class="d-flex flex-column w-33 justify-content-start align-items-start row-gap-5">
                                <div class="d-flex column-gap-3 lookingp1 px-3">
                                    <p class="lookingp">Highest Educational :</p>
                                    <p class="lookingp">{{ $profile->education_level }}</p>
                                </div>
                            </div>

                            <div class="d-flex flex-column w-33 justify-content-start align-items-start row-gap-5">
                                <div class="d-flex column-gap-5 lookingp1 px-3">
                                    <p class="lookingp">Education Institute :</p>
                                    <p class="lookingp">{{ $profile->institute_name }}</p>
                                </div>
                            </div>

                            <div class="d-flex flex-column w-33 justify-content-start align-items-start row-gap-5">
                                <div class="d-flex column-gap-5 lookingp1 px-3">
                                    <p class="lookingp">Passing Year :</p>
                                    <p class="lookingp">{{ $profile->education_year }}</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="w-100 mt-3">
                        <h5 class="mt-4">Work :</h5>
                        <div class="d-flex w-100 mt-4 justify-content-between">
                            <div class="d-flex flex-column w-33 justify-content-start align-items-start row-gap-5">
                                <div class="d-flex column-gap-5 lookingp1 px-3">
                                    <p class="lookingp">Profession :</p>
                                    <p class="lookingp">{{ $profile->profession }}</p>
                                </div>
                            </div>

                            <div class="d-flex flex-column w-33 justify-content-start align-items-start row-gap-5">
                                @if (isset($profile->institute_name))
                                    <div class="d-flex column-gap-5 lookingp1 px-3">
                                        <p class="lookingp">Designation :</p>
                                        <p class="lookingp">{{ $profile->institute_name }}</p>
                                    </div> 
                                @endif
                            </div>

                            <div class="d-flex flex-column w-33 justify-content-start align-items-start row-gap-5">
                                @if (isset($profile->monthly_income))
                                    <div class="d-flex column-gap-3 lookingp1 px-3">
                                        <p class="lookingp">Your Income (Monthly) :</p>
                                        <p class="lookingp">{{ $profile->monthly_income }} BDT</p>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="w-100 infos">
                <div class="w-100"> 
                    <h3 class="mb-3" >Contact Details  <i class="fa-solid fa-phone-volume"></i> </h3>
                    <div class="d-flex w-100 mt-4 justify-content-start">
                        @if ($profile->show_contact == 1)
                            <div class="d-flex flex-column w-33 justify-content-start align-items-start row-gap-5">
                                <div class="d-flex column-gap-5 lookingp1 px-3">
                                    <p class="lookingp">Email :</p>
                                    <p class="lookingp">{{ $profile->email }}</p>
                                </div>
                            </div>
                            <div class="d-flex flex-column w-33 justify-content-start align-items-start row-gap-5">
                                @if (isset($profile->contact_number))
                                    <div class="d-flex column-gap-5 lookingp1 px-3">
                                        <p class="lookingp">Contact Number :</p>
                                        <p class="lookingp">{{ $profile->contact_number }}</p>
                                    </div> 
                                @endif
                            </div>
                        @else
                            <div class="d-flex flex-column w-33 justify-content-start align-items-start row-gap-5">
                                <div class="d-flex column-gap-5 lookingp1 px-3">
                                    <p class="lookingp">Email :</p>
                                    <p class="lookingp"><span class="blur">example</span>@gmail.com</p>
                                </div>
                            </div>
                            <div class="d-flex flex-column w-33 justify-content-start align-items-start row-gap-5">
                                @if (isset($profile->contact_number))
                                    <div class="d-flex column-gap-5 lookingp1 px-3">
                                        <p class="lookingp">Contact Number :</p>
                                        <p class="lookingp">+880 <span class="blur"> 1234567899</span></p>
                                    </div> 
                                @endif
                            </div>
                        @endif
                        
                    </div>
                </div>
            </div>

            <div class="w-100 infos">
                <div class="w-100"> 
                    <h3 class="mb-3" >Hobbies <i class="fa-solid fa-palette"></i> </h3>
                    <div class="d-flex w-100 mt-4 justify-content-start">
                        <div class="d-flex flex-wrap w-100 justify-content-start align-items-center column-gap-5">
                            <p class="lookingp1"><i class="fa-solid fa-champagne-glasses"></i> Drinking : {{ $profile->drinking }}</p>
                            <p class="lookingp1"><i class="fa-solid fa-smoking"></i> Smoking : {{ $profile->smoking }}</p>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="w-100 flex-column infos ">
                <h3 class="mb-3" >What is  @if($profile->gender == 'Male') He @else She  @endif Looking For ! <i class="fa-solid fa-hand-holding-hand"></i> </h3>
                <div class="w-100 d-flex flex-column-reverse"> 
                    <div class="d-flex w-100 mt-4 {{ Auth::user()->plans->plan_id == 1 ? 'blur' : '' }}">
                        <div class="d-flex flex-column w-75  row-gap-5">
                            <div class="d-flex w-100 flex-column column-gap-5 lookingp2 px-3">
                                <p class="lookingp">Religion :<br> <span>{{ $profile->matchProfile->religion }}</span></p>
                                <p class="lookingp">Marital Status :<br> <span>{{ $profile->matchProfile->marital_status }}</span></p>
                                <p class="lookingp">Age :<br> <span>{{ $profile->matchProfile->from_age }}yr to {{ $profile->matchProfile->to_age }}yr</span></p>
                                @if (isset($profile->matchProfile->education))
                                <p class="lookingp">Education :<br> <span>{{ $profile->matchProfile->education }}</span></p>
                                @endif
                                @if (isset($profile->matchProfile->location))
                                <p class="lookingp">Location :<br> <span>{{ $profile->matchProfile->location }}</span></p>
                                @endif
                                @if (isset($profile->matchProfile->height_from))
                                <p class="lookingp">Height :<br> <span>{{ $profile->matchProfile->height_from }}Inch to {{ $profile->matchProfile->height_to }}Inch</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex flex-column w-25 justify-content-start align-items-start row-gap-5">
                            <div class="d-flex w-100 flex-column column-gap-5 lookingp3 px-3">
                                @php
                                    $matchCount = 0;
                                @endphp
                    
                                <!-- Religion Match -->
                                <p class="lookingp">
                                    @if($profile->matchProfile->religion == Auth::user()->profile->religion)
                                        <i class="fa-solid fa-circle-check"></i>
                                        @php $matchCount++; @endphp
                                    @else
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    @endif
                                </p>
                    
                                <!-- Marital Status Match -->
                                <p class="lookingp">
                                    @if($profile->matchProfile->marital_status == Auth::user()->profile->marital_status)
                                        <i class="fa-solid fa-circle-check"></i>
                                        @php $matchCount++; @endphp
                                    @else
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    @endif
                                </p>
                    
                                <!-- Age Match -->
                                <p class="lookingp">
                                    @if(Auth::user()->profile->age >= $profile->matchProfile->from_age && Auth::user()->profile->age <= $profile->matchProfile->to_age)
                                        <i class="fa-solid fa-circle-check"></i>
                                        @php $matchCount++; @endphp
                                    @else
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    @endif
                                </p>
                    
                                <!-- Education Match -->
                                @if (isset($profile->matchProfile->education))
                                <p class="lookingp">
                                    @if(isset($profile->matchProfile->education) && $profile->matchProfile->education == Auth::user()->profile->education)
                                        <i class="fa-solid fa-circle-check"></i>
                                        @php $matchCount++; @endphp
                                    @else
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    @endif
                                </p>
                                @endif
                    
                                <!-- Location Match -->
                                @if (isset($profile->matchProfile->location))
                                <p class="lookingp">
                                    @if(isset($profile->matchProfile->location) && $profile->matchProfile->location == Auth::user()->profile->location)
                                        <i class="fa-solid fa-circle-check"></i>
                                        @php $matchCount++; @endphp
                                    @else
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    @endif
                                </p>
                                @endif
                                <!-- Height Match -->
                                @if (isset($profile->matchProfile->height_from))
                                <p class="lookingp">
                                    @if(isset($profile->matchProfile->height_from) && Auth::user()->profile->height >= $profile->matchProfile->height_from && Auth::user()->profile->height <= $profile->matchProfile->height_to)
                                        <i class="fa-solid fa-circle-check"></i>
                                        @php $matchCount++; @endphp
                                    @else
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    @endif
                                </p>
                                @endif
                            </div> 
                        </div>
                    </div>
                    <div class="d-flex w-100 mt-4 justify-content-between mb-4">
                        <div class="d-flex w-25 flex-column justify-content-center align-items-center row-gap-1">
                            <img src="{{ asset($profile->image) }}" class="prefrenceimg" alt="">
                            <p>@if($profile->gender == 'Male') His @else Her  @endif Preference</p>
                        </div>
                        <div class="d-flex flex-column w-50 justify-content-center align-items-center row-gap-1 {{ Auth::user()->plans->plan_id == 1 ? 'blur' : '' }}" >
                            <p class="w-100 text-center">------------------------------------------------------------------------</p>
                            <p class="lookingp1">Total Matches: {{ $matchCount }} out of 6</p>
                        </div>
                        <div class="d-flex flex-column w-25 justify-content-center align-items-center row-gap-1">
                            <img src="{{ asset(Auth::user()->profile->image) }}" class="prefrenceimg" alt="">
                            <p class="lookingp">Your Match</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</div>


<!-- Bootstrap Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="confirmationModalLabel">Confirm Action</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
             Are you sure you want to proceed with this action?
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
             <button type="button" id="confirmActionBtn" class="btn btn-primary">Confirm</button>
          </div>
       </div>
    </div>
 </div>

@endsection

@section('customJs')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            // Enable swipe gesture
            grabCursor: true,
            // Set autoplay if desired
            // autoplay: {
            //     delay: 3000,
            //     disableOnInteraction: false,
            // },
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#sendRequestBtn').on('click', function(e) {
            e.preventDefault();
            
            let recipientId = $(this).data('recipient-id');
            
            $.ajax({
                url: '{{ route("send.request") }}',
                method: 'POST',
                data: {
                    recipient_id: recipientId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    toastr.success(response.message);
                    location.reload();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        // Handle validation errors
                        $.each(xhr.responseJSON.errors, function(key, error) {
                            toastr.error(error[0]);
                        });
                    } else if (xhr.status === 409) {
                        // Handle credit error
                        toastr.error(xhr.responseJSON.message);
                    } else {
                        // Handle other errors
                        toastr.error('Something went wrong. Please try again.');
                    }
                }
            });
        });
    });
</script>


<script>
    let actionId = null;
    let actionType = null;

    // Show confirmation modal and set action type
    function showConfirmationModal(id, type) {
       actionId = id;
       actionType = type;
       $('#confirmationModal').modal('show');
    }

    // Confirm button click
    document.getElementById('confirmActionBtn').addEventListener('click', function () {
       if (actionType === 'accept') {
          acceptRequest(actionId);
       } else if (actionType === 'cancel') {
          cancelRequest(actionId);
       }
       $('#confirmationModal').modal('hide');
    });

    // AJAX function for accepting the request
    function acceptRequest(id) {
       $.ajax({
          url: `{{ route('requests.accept', ':id') }}`.replace(':id', id),
          type: 'POST',
          data: {
                _token: '{{ csrf_token() }}'
          },
          success: function (response) {
                toastr.success(response.message);
                location.reload();
          },
          error: function (xhr) {
                toastr.error(xhr.responseJSON.message || 'Something went wrong.');
          }
       });
    }

    // AJAX function for canceling the request
    function cancelRequest(id) {
       $.ajax({
          url: `{{ route('requests.cancel', ':id') }}`.replace(':id', id),
          type: 'DELETE',
          data: {
                _token: '{{ csrf_token() }}'
          },
          success: function (response) {
                toastr.success(response.message);
                location.reload();
          },
          error: function (xhr) {
                toastr.error(xhr.responseJSON.message || 'Something went wrong.');
          }
       });
    }

 </script>

@endsection
