<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Link My Heart | Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend-assets') }}/assets/images/fav/short2.png" />
    <link rel="apple-touch-icon" href="{{ asset('frontend-assets') }}/assets/images/fav/apple-touch-icon.png" />

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/assets/vendor/bootstrap-5.0.2.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/assets/vendor/font-awesome-6.5.1.min.css" />

    <!-- Template Main CSS -->
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/assets/css/style.css" />
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/assets/css/responsive.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <!-- Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700&display=swap');
        h1, h2, h3, h4, h5, h6, p, span, a, button, input, label {
            font-family: "Figtree", sans-serif;
        }
    </style>
</head>

<body>
    <div class="login-wrapper" style="min-height: 100vh">
        <div class="container-fluid">
            <div class="row">
                <!-- Left Side - Sign In Form -->
                <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center">
                    <div class="login-form">
                        <div class="text-center">
                            <a href="{{ route('home') }}" class="d-flex" style="text-align: center; margin: auto; width: fit-content">
                                <img src="{{ asset('frontend-assets') }}/assets/images/logo/short2.png" alt="Logo" style="width: 50px; margin-right: -7px; margin-top: -12px; height: 50px;" />
                                <img src="{{ asset('frontend-assets') }}/assets/images/logo/logo.png" alt="Logo" class="img-fluid mb-4" style="width: 165px" />
                            </a>
                            <h2>Sign In</h2>
                            <p>Welcome back! Please enter your details</p>
                        </div>
                        <form id="login">
                            @csrf
                            <div class="form-group">
                                <label for="phone">Mobile number</label>
                                <input type="text" class="form-control" id="phone" name="number" placeholder="Enter your registered mobile number" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                            </div>
                            <div class="form-check mt-2">
                                <input type="checkbox" class="form-check-input" id="remember" />
                                <label class="form-check-label" for="remember">Remember</label>
                            </div>
                            <button type="submit" class="btn btn-common btn-block mt-4">Sign in</button>
                            <a href="#" class="d-block text-center mt-3">Forgot password?</a>
                        </form>
                        <p class="text-center mt-2">Don't have an account? <a href="{{ route('home') }}">Sign up</a></p>
                    </div>
                </div>

                <!-- Right Side - Welcome Text & Graph -->
                <div class="col-lg-6 col-md-12 welcome-section d-none d-lg-flex align-items-center justify-content-center p-5">
                    <div class="text-center login-welcome">
                        <h1>Welcome back!</h1>
                        <p class="lead">Please sign in to your Filuick pay account</p>
                        <p>Lorem ipsum dolor sit amet consectetur. Facilisi neque lectus turpis id tincidunt eget. Sagittis et id cursus porttitor.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

                // Perform AJAX request
                $.ajax({
                    url: '{{ route("user.login") }}',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
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
                            toastr.error(xhr.responseJSON.message || 'Invalid mobile number or password.');
                        } else {
                            // Handle other errors
                            toastr.error('An error occurred. Please try again.');
                        }
                    }
                });
            });
        });
        </script>


</body>

</html>
