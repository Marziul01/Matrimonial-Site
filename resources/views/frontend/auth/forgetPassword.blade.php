@extends('frontend.master')

@section('title')
    Forget Password
@endsection


@section('content')
    <div class="">
        <div class="d-flex w-100 h-100 LoginPage">
            <div class="leftImage">
            </div>
            <div class="Loginhomebg ">
                <div class="signInForm ">
                    <div class="">
                        @include('frontend.auth.frontMessage')
                        <div class="text-center">
                            <p class="title">Forget Password</p>
                        </div>
                        <form id="forgot-password-form" class="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-common btn-block mt-4 signConfBtn">Verify Email</button>
                            </div>
                        </form>

                        <!-- Initially hidden forms for code verification and password reset -->
                        <form id="code-verification-form" class="login-form" style="display:none;">
                            @csrf
                            <div class="form-group">
                                <label for="code">Verification Code</label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Enter the code" required />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-common btn-block mt-4 signConfBtn">Verify Code</button>
                            </div>
                        </form>

                        <form id="reset-password-form" method="POST" style="display:none;">
                            @csrf
                            <!-- Hidden inputs for email and code -->
                            <input type="hidden" name="prevemail" value="">
                            <input type="hidden" name="prevcode" value="">

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" required />
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password" required />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary signConfBtn">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('customJs')

    <!-- Jquery 3.7.1 -->
    <script src="{{ asset('frontend-assets') }}/assets/vendor/jquery-3.7.1.min.js"></script>
    <!-- Popper js 2.9.2 -->
    <script src="{{ asset('frontend-assets') }}/assets/vendor/popper-2.9.2.min.js"></script>
    <!-- Bootstrap js 5.0.2 -->
    <script src="{{ asset('frontend-assets') }}/assets/vendor/bootstrap-5.0.2.min.js"></script>
    <!-- Toastr for notifications -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
    // Handle email verification form
    $('#forgot-password-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route("password.verifyEmail") }}',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    $('#forgot-password-form').hide();
                    $('#code-verification-form').show();
                } else {
                    toastr.error(response.message);
                }
            },
            error: function() {
                toastr.error('An unexpected error occurred.');
            }
        });
    });

    // Handle code verification form
    $('#code-verification-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route("password.verifyCode") }}',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    // Hide the code verification form
                    $('#code-verification-form').hide();
                    // Show the reset password form
                    $('#reset-password-form').show();
                    // Set the email and code values in the hidden inputs
                    $('#reset-password-form input[name="prevemail"]').val(response.email);
                    $('#reset-password-form input[name="prevcode"]').val(response.code);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function() {
                toastr.error('An unexpected error occurred.');
            }
        });
    });

    // Handle password reset form
    $('#reset-password-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route("password.reset") }}',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    setTimeout(function() {
                        window.location.href = response.redirect;
                    }, 2000); // Redirect after 2 seconds
                } else {
                    toastr.error(response.message);
                }
            },
            error: function() {
                toastr.error('An unexpected error occurred.');
            }
        });
    });
});

        </script>

<script>

    const togglePassword1 = document.querySelector("#togglePasswordlogin");
    const password1 = document.querySelector("#passwordlogin");

    togglePassword1.addEventListener("click", function () {
        // Toggle the type attribute
        const type1 = password1.getAttribute("type") === "password" ? "text" : "password";
        password1.setAttribute("type", type1);

        // Toggle the eye slash icon
        this.querySelector("#eyelogin").classList.toggle("fa-eye-slash");
        this.querySelector("#eyelogin").classList.toggle("fa-eye");
    });


</script>

<!-- Font Awesome (for the eye icon) -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
