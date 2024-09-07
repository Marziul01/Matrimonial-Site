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
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Profile Details</h6>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered userProfiles" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Looking For</th>
                                <th>Number</th>
                                <th>Plan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->isNotEmpty())
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset($user->profile->image) }}"></td>
                                <td>{{ $user->profile->first_name }} {{ $user->profile->last_name }}</td>
                                <td>{{ $user->userInfo->looking_for }}</td>
                                <td>{{ $user->profile->contact_number }}</td>
                                <td> @if (isset($user->plans->plan->name ))
                                        {{ $user->plans->plan->name }}
                                @else
                                        No Plan
                                @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center" style="column-gap: 10px">
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.userProfile', $user->id) }}"> View Profile </a>
                                        @if (isset($user->partnerProfile))
                                            <a class="btn btn-sm btn-warning" href="{{ route('admin.userPartner', $user->id) }}"> View Partner Profile </a>
                                        @endif
                                        @if ($user->profile->status == 1)
                                            <a class="btn btn-sm btn-danger" href="{{ route('profileStatus', [ 'id' => $user->profile->id, 'status' => 2]) }}" onclick="return confirm('Are you sure you want to block this profile?');"> Block </a>
                                        @else
                                        <a class="btn btn-sm btn-success" href="{{ route('profileStatus', [ 'id' => $user->profile->id, 'status' => 1]) }}" onclick="return confirm('Are you sure you want to unblock this profile?');"> Unblock </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            @else
                                <td colspan="7"> No Users Found !</td>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


@endsection

@section('customjs')

@endsection


