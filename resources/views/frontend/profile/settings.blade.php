@extends('frontend.master')

@section('title')
    | Profile Settings
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
            <div class="detailsBox ">
                <div class="statsBox statsBoxDiv flex-column justify-content-start align-items-baseline">
                    <h2 class="p-2 mt-3 mb-0 px-4 tabForms text-white" style="font-weight: 800; margin-left: 10px">Change Password</h2>
                    <div class="row p-0 ">
                        <div class="form-container border-0">
                            <form id="change-password-settings" class="">
                                @csrf
                                <div class="row">
                                    <div class="col-12 p-0 pt-2 mt-0">
                                        <input type="password" name="password" class="form-control" placeholder="New Password">
                                    </div>
                                    <div class="col-12 p-0 pt-2 mt-0">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <button type="submit" class="profilecancelbtnn3 mt-3 w-30">Submit</button>
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
    $(document).ready(function () {
        // Password matching validation
        $('input[name="password_confirmation"]').on('keyup', function () {
            const password = $('input[name="password"]').val();
            const confirmPassword = $(this).val();
            const submitButton = $('button[type="submit"]');

            if (password !== confirmPassword) {
                $(this).css('border', '1px solid red');
                $('#password-error').remove(); // Remove previous error message
                $(this).after('<div id="password-error" style="color: white;">Passwords do not match</div>');
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

@endsection
