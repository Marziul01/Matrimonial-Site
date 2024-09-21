<div class="card">
    <div class="card-header">
        <img src="{{ asset($user->profile->image) }}" width="100%">
    </div>
    <div class="card-body">
        <p>Name: <strong>{{ $user->profile->first_name }} {{ $user->profile->last_name }}</strong></p>
        <p>Date Of Birth: <strong>{{ $user->profile->date_of_birth }}</strong></p>
        <p>Marital Status: <strong>{{ $user->profile->marital_status }}</strong></p>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-start align-items-center" style="column-gap: 10px">
            <a class="btn btn-sm btn-primary" href="{{ route('admin.userProfile', $user->id) }}">View Profile</a>
            @if (isset($user->partnerProfile))
                <a class="btn btn-sm btn-warning" href="{{ route('admin.userPartner', $user->id) }}">View Partner Profile</a>
            @endif
            @if ($user->profile->status == 1)
                <a class="btn btn-sm btn-danger" href="{{ route('profileStatus', ['id' => $user->profile->id, 'status' => 2]) }}" onclick="return confirm('Are you sure you want to block this profile?');">Block</a>
            @else
                <a class="btn btn-sm btn-success" href="{{ route('profileStatus', ['id' => $user->profile->id, 'status' => 1]) }}" onclick="return confirm('Are you sure you want to unblock this profile?');">Unblock</a>
            @endif
        </div>
    </div>
</div>

