@extends('frontend.master')

@section('title')
    | My Contact Details
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
                        <div class="w-100">
                            <form id="save-profile-dp">
                                @csrf
                                <h3 class="text-white mb-4">
                                    Update Your Contact Informations
                                </h3>
                                <div class="row mb-3">
                                    <div class="col-12 mb-3">
                                        <label class="text-white mb-2">Email</label>
                                        <input type="email" name="email" class="form-control bg-transparent text-white"  id="" value="{{ Auth::user()->email }}" disabled>
                                    </div>
                                    <div class="col-12 ">
                                        <label class="text-white mb-2">Phone Number</label>
                                        <input type="number" name="number" class="form-control" id="" value="{{ Auth::user()->number ?? 'Add Your Phone Number !' }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div id="upload-section">
                                        <button type="submit" id="save-images" class="profilecancelbtnn3 mt-2 float-end">Save</button>
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
            e.preventDefault(); // Prevent form from submitting normally
            let formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '{{ route('profile.update.contact') }}', // Your route here
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    toastr.info('Saving...', 'Please wait');
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message, 'Success');
                    }
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        toastr.error(value[0], 'Error');
                    });
                }
            });
        });
    });
</script>

@endsection
