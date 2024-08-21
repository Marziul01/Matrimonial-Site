@extends('frontend.master')

@section('title')
   | User Dashboard
@endsection

@section('modals')

@endsection

@section('content')

<div class="section d-flex align-items-center">
    <div class="card w-100 border-0">
        <div class="card-body w-100  pb-0 pt-0">
            <div class="d-flex align-items-start column-gap-3">
                <div class="nav flex-column nav-pills me-3 dashboardNav " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div class="">
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
                        <a class="nav-link dropdown-toggle text-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Profile
                        </a>
                        <div class="collapse mb-3" id="collapseExample">
                            <div class="card card-body">
                                <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Create Your Profile</button>
                                <button class="nav-link mb-0" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Create Your Partner Profile</button>
                            </div>
                        </div>
                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Buy Credit</button>
                    </div>
                </div>
                <div class="tab-content w-100" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <h2 class="text-center p-2 mt-3 mb-0 bestMatch">For Your Best Match</h2>
                    <div class="row sticky-div">
                        <div class="col-md-4">
                            <div class="profileCard">
                                <img src="{{ asset('frontend-assets/imgs/hero.jpg') }}" width="100%">
                                <div class="profileCardDiv">
                                    <p>Name : <span> ABC </span></p>
                                    <p>Address : <span> ABC </span></p>
                                    <p>Age : <span> 26 years </span></p>
                                    <p>Contact : <span style="font-style: italic; color: #F43662"> Please Upgrade Plan </span></p>
                                    <a class="profileDetailsBtn text-center mt-4">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="profileCard">
                                <img src="{{ asset('frontend-assets/imgs/hero.jpg') }}" width="100%">
                                <div class="profileCardDiv">
                                    <p>Name : <span> ABC </span></p>
                                    <p>Address : <span> ABC </span></p>
                                    <p>Age : <span> 26 years </span></p>
                                    <p>Contact : <span style="font-style: italic; color: #F43662"> Please Upgrade Plan </span></p>
                                    <a class="profileDetailsBtn text-center mt-4">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="profileCard">
                                <img src="{{ asset('frontend-assets/imgs/hero.jpg') }}" width="100%">
                                <div class="profileCardDiv">
                                    <p>Name : <span> ABC </span></p>
                                    <p>Address : <span> ABC </span></p>
                                    <p>Age : <span> 26 years </span></p>
                                    <p>Contact : <span style="font-style: italic; color: #F43662"> Please Upgrade Plan </span></p>
                                    <a class="profileDetailsBtn text-center mt-4">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="profileCard">
                                <img src="{{ asset('frontend-assets/imgs/hero.jpg') }}" width="100%">
                                <div class="profileCardDiv">
                                    <p>Name : <span> ABC </span></p>
                                    <p>Address : <span> ABC </span></p>
                                    <p>Age : <span> 26 years </span></p>
                                    <p>Contact : <span style="font-style: italic; color: #F43662"> Please Upgrade Plan </span></p>
                                    <a class="profileDetailsBtn text-center mt-4">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="profileCard">
                                <img src="{{ asset('frontend-assets/imgs/hero.jpg') }}" width="100%">
                                <div class="profileCardDiv">
                                    <p>Name : <span> ABC </span></p>
                                    <p>Address : <span> ABC </span></p>
                                    <p>Age : <span> 26 years </span></p>
                                    <p>Contact : <span style="font-style: italic; color: #F43662"> Please Upgrade Plan </span></p>
                                    <a class="profileDetailsBtn text-center mt-4">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="profileCard">
                                <img src="{{ asset('frontend-assets/imgs/hero.jpg') }}" width="100%">
                                <div class="profileCardDiv">
                                    <p>Name : <span> ABC </span></p>
                                    <p>Address : <span> ABC </span></p>
                                    <p>Age : <span> 26 years </span></p>
                                    <p>Contact : <span style="font-style: italic; color: #F43662"> Please Upgrade Plan </span></p>
                                    <a class="profileDetailsBtn text-center mt-4">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection

@section('customJs')


@endsection
