@extends('admin.master')

@section('title')
    Users
@endsection

@section('content')

    <div class="container-fluid">
        @include('admin.auth.message')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="alert-ul">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User Profile Details</h6>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.users') }}"> Back </a>
            </div>
            <div class="card-body">

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
                <div class="tab-content sticky-div px-4" id="myTabContent">
                    <div class="tab-pane fade show active viewProfileTab mobileProfilePad" id="home3" role="tabpanel" aria-labelledby="home3-tab">
                        <div class="row p-0">
                            <div class="col-md-4 mt-0">
                                <div class="imageDrop">
                                    <img src="{{ asset($profileDetails->image) }}" class="w-60" width="60%">
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
            </div>
        </div>


@endsection

@section('customjs')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
