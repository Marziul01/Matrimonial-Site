@extends('frontend.master')

@section('title')
    Sign In
@endsection


@section('content')
@php $showLoggedOutHeader = true; @endphp
    <div class="">
        <div class="d-flex w-100 h-100 LoginPage">
            <div class="leftImage">
            </div>
            <div class="Loginhomebg ">
                <div class="signInForm ">
                    <div class="">
                        @include('frontend.auth.frontMessage')
                        <div class="text-center">
                            <p class="title">Welcome back</p>
                        </div>
                        <form id="login" class="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="phone">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="passwordlogin" name="password" placeholder="Enter your Password" />
                                    <div class="input-group-appends">
                                        <span class="input-group-text" id="togglePasswordlogin" style="cursor: pointer;">
                                            <i id="eyelogin" class="fas fa-eye-slash"></i> <!-- Initial crossed eye icon -->
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center px-3">
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="remember" />
                                    <label class="form-check-label" for="remember" style="color: white">Remember</label>
                                </div>
                                <a href="{{ route('forgetPass') }}" class="d-block text-center text-white mt-2">Forgot password?</a>
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-common btn-block mt-4 signConfBtn">Sign in</button>
                            </div>
                            {{-- <div class="form-group">
                                <a type="button" href="{{ URL::to('googleLogin') }}" class="googleSignin"> <img src="{{ asset('frontend-assets/imgs/Google_Icons-09-512.webp') }}">  Sign in with Google </a>
                            </div> --}}
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
        $(document).ready(function () {
            $('#login').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission

                // Serialize form data
                let formData = $(this).serialize();
                $('#loadingScreen').show();
                // Perform AJAX request
                $.ajax({
                    url: '{{ route("user.login") }}',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        $('#loadingScreen').hide();
                        if (response.success) {
                            // Show success message
                            toastr.success(response.message || 'Login Successful! Redirecting...');

                            // Redirect after showing the message
                            setTimeout(function () {
                                window.location.href = response.redirect;
                            }, 2000); // Redirect after 2 seconds
                        } else {
                            // Show error message
                            toastr.error(response.message || 'Login failed. Please try again.');
                        }
                    },
                    error: function (xhr) {
                        $('#loadingScreen').hide();
                        if (xhr.status === 422) {
                            // Handle validation errors
                            let errors = xhr.responseJSON.errors;
                            let errorMessage = '';

                            $.each(errors, function (key, value) {
                                errorMessage += value[0] + '<br>'; // Display errors
                            });

                            toastr.error(errorMessage);
                        } else if (xhr.status === 401) {
                            // Handle authentication errors
                            toastr.error(xhr.responseJSON.message || 'Invalid email or password.');
                        } else {
                            // Handle other errors
                            toastr.error('An error occurred. Please try again.');
                        }
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
