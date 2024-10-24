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
                <h6 class="m-0 font-weight-bold text-primary mb-3">User Profile Details</h6>
                <div class="search-bar mb-4">
                    <form id="searchForm" class=" d-flex align-items-center justify-content-between column-gap-2">
                        @csrf
                        <input type="text" name="email" id="emailInput" placeholder="Search by email" class="form-control" />
                        <input type="text" name="phone" id="phoneInput" placeholder="Search by phone number" class="form-control" />
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="button" id="resetButton" class="btn btn-secondary">Reset</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="allUserCards" id="defaultUserCards">
                    @if ($users->isNotEmpty())
                            @foreach ($users as $user)
                    {{-- <div class="card">
                        <div class="card-header">
                            <img src="{{ asset($user->profile->image) }}" width="100%">

                        </div>
                        <div class="card-body">
                            <p>Name: <strong>{{ $user->profile->first_name }} {{ $user->profile->last_name }}</strong></p>
                            <p>Date Of Birth : <strong> {{ $user->profile->date_of_birth }}</strong></p>
                            <p>Marital Status: <strong> {{ $user->profile->marital_status }}</strong></p>
                        </div>
                        <div class="card-footer">
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
                                <a class="btn btn-sm btn-info" href="{{ route('admin.sendPasswordReset', $user->id) }}" onclick="return confirm('Are you sure you want to send a password recovery email to this user?');"> Send Password Recovery </a>
                            </div>
                        </div>
                    </div> --}}
                    @endforeach

                    @else
                        <p class="text-center"> No Users Found !</td>
                    @endif


                </div>
                {{-- <div class="table-responsive">
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
                </div> --}}

                <div id="searchedUserCard" style="display: none;">
                    <!-- This div will be populated with the searched user card -->
                </div>
            </div>
        </div>


@endsection

@section('customjs')
<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    var assetBaseUrl = "{{ asset('') }}";  // This will give you the base asset URL
</script>
<script>
    var userProfileUrl = "{{ route('admin.userProfile', ':id') }}";
    var blockProfileUrl = "{{ route('profileStatus', [':id', 2]) }}";
    var unblockProfileUrl = "{{ route('profileStatus', [':id', 1]) }}";
</script>

<script>
    document.getElementById('searchForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const emailQuery = document.getElementById('emailInput').value;
        const phoneQuery = document.getElementById('phoneInput').value;

        fetch('{{ route("admin.searchUsers") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                email: emailQuery,
                phone: phoneQuery
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.user) {
                // Hide default user cards
                document.getElementById('defaultUserCards').style.display = 'none';

                // Show searched user card and populate it with the user data
                const searchedUserCard = document.getElementById('searchedUserCard');
                searchedUserCard.style.display = 'block';

                // Replace the placeholders with the actual user IDs
                const profileUrl = userProfileUrl.replace(':id', data.user.id);
                const blockUrl = blockProfileUrl.replace(':id', data.user.profile.id);
                const unblockUrl = unblockProfileUrl.replace(':id', data.user.profile.id);

                // Update the content of searchedUserCard with the user's information
                searchedUserCard.innerHTML = `
                    <div class="card w-33">
                        <div class="card-header">
                            <img src="${data.user.profile.image ? '{{ asset("' + data.user.profile.image + '") }}' : '{{ asset('default_image_path.jpg') }}'}" width="14%">
                        </div>
                        <div class="card-body">
                            <p>Name: <strong>${data.user.profile.name ? data.user.profile.name : "Didn't update profile yet!"}</strong></p>
                            <p>Date Of Birth: <strong>${data.user.profile.date_of_birth ? data.user.profile.date_of_birth : "Didn't update profile yet!"}</strong></p>
                            <p>Marital Status: <strong>${data.user.profile.marital_status ? data.user.profile.marital_status : "Didn't update profile yet!"}</strong></p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-sm btn-primary" href="${profileUrl}">View Profile</a>
                            ${data.user.profile.status == 1
                                ? `<a class="btn btn-sm btn-danger" href="${blockUrl}" onclick="return confirm('Are you sure you want to block this profile?');">Block</a>`
                                : `<a class="btn btn-sm btn-success" href="${unblockUrl}" onclick="return confirm('Are you sure you want to unblock this profile?');">Unblock</a>`
                            }
                            <a class="btn btn-sm btn-info" href="{{ route('admin.sendPasswordReset', $user->id) }}" onclick="return confirm('Are you sure you want to send a password recovery email to this user?');"> Send Password Recovery </a>
                        </div>
                    </div>
                `;

            } else {
                // Show Toastr error if no user found
                toastr.error('No user found with the provided details.', 'Error', {
                    positionClass: 'toast-top-right',
                    closeButton: true,
                    progressBar: true,
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            toastr.error('An error occurred while searching for the user.', 'Error', {
                positionClass: 'toast-top-right',
                closeButton: true,
                progressBar: true,
            });
        });
    });

    document.getElementById('resetButton').addEventListener('click', function () {
        // Reset form inputs
        document.getElementById('searchForm').reset();

        // Hide the searched user card
        document.getElementById('searchedUserCard').style.display = 'none';

        // Show the default user cards
        document.getElementById('defaultUserCards').style.display = 'grid';
    });
</script>



@endsection


