<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title> Link My Heart @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend-assets') }}/imgs/favicon2.png" type="image/x-icon">
    <!-- Template CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/style.css">

</head>

<body>

@yield('modals')

@if (Auth::check() && empty($showLoggedOutHeader))
    @include('frontend.include.member_header')
@else
    @include('frontend.include.header')
@endif


<main class="main">
    @yield('content')
</main>


<div class="modal fade Registration_Modal" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register New Member</h5>
          <button type="button" class="btn-modalclose" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
            <form id="sign-up">
                @csrf
                <div class="row">
                    <div class="w-50">
                        <input type="text" name="first_name" placeholder="First Name" class="form-control">
                    </div>
                    <div class=" w-50">
                        <input type="text" name="last_name" placeholder="Last Name" class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="w-50">
                        <input class="form-control" type="email" name="email" placeholder="Your Email">
                    </div>
                    <div class=" w-50">
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" />
                            <div class="input-group-appends">
                                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                    <i id="eyereg" class="fas fa-eye-slash"></i> <!-- Initial crossed eye icon -->
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 px-2">
                    <button class="btn submitBtn mt-2 w-100" type="submit" style="float: left">Sign Up</button>
                </div>
            </form>

            <div id="verification-form" style="display:none;">
                <input type="text" id="verification_code" placeholder="Enter Verification Code" class="form-control" required>
                <button id="verify-code" class="btn submitBtn mt-2">Verify & Continue</button>
            </div>
        </div>
      </div>
    </div>
</div>



@include('frontend.include.footer')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        // Toggle the menu when the toggle button is clicked
        $('#homeMenuNavToogle').on('click', function(e) {
            e.stopPropagation(); // Prevent click from bubbling to the document
            $('#homeMobileNav').toggleClass('show');
        });

        // Hide the menu when clicking outside of it
        $(document).on('click', function(e) {
            if ($('#homeMobileNav').hasClass('show') && !$(e.target).closest('#homeMobileNav, #homeMenuNavToogle').length) {
                $('#homeMobileNav').removeClass('show');
            }
        });

        // Prevent menu from closing when clicking inside it
        $('#homeMobileNav').on('click', function(e) {
            e.stopPropagation(); // Prevent click from bubbling to the document
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const userId = urlParams.get('id');
    if (userId) {
        // Assuming you have a function like `loadChat(userId)` that triggers the chat
        loadChat(userId);
    }
});

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passPopupButton = document.getElementById('passPopup');
        const passPopSection = document.getElementById('passPop');
        const passGoBackButton = document.getElementById('passGoBack');

        // Initially hide the 'passPop' section
        if (passPopSection) {
            passPopSection.style.display = 'none';
        }

        // Show the section when the 'passPopup' button is clicked
        if (passPopupButton) {
            passPopupButton.addEventListener('click', function() {
                if (passPopSection) {
                    passPopSection.style.display = 'block'; // Show the section
                }
            });
        }

        // Hide the section when the 'passGoBack' button is clicked
        if (passGoBackButton) {
            passGoBackButton.addEventListener('click', function() {
                if (passPopSection) {
                    passPopSection.style.display = 'none'; // Hide the section
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
    // Handle signup form submission
    $('#sign-up').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        var formData = $(this).serialize(); // Serialize form data

        // Send AJAX request to the server for signup
        $.ajax({
            url: '{{ route("userRegister") }}', // Route to the signup function
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    // Show success message via Toastr
                    toastr.success('Email verification code has been sent to your email.');

                    // Optionally hide the signup form and show the verification form
                    $('#sign-up').hide();
                    $('#verification-form').show();
                } else {
                    // Handle server-side validation errors or general errors
                    if (response.errors) {
                        // Display each error message using Toastr
                        $.each(response.errors, function(key, errorMessages) {
                            toastr.error(errorMessages[0]); // Show the first error message for each field
                        });
                    } else if (response.message) {
                        // Show general error message
                        toastr.error(response.message);
                    }
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors, typically validation errors or server issues
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    // Loop through validation errors and display them
                    $.each(xhr.responseJSON.errors, function(key, errorMessages) {
                        toastr.error(errorMessages[0]); // Show the first error message
                    });
                } else {
                    // Show a generic error if no specific message is returned
                    toastr.error('An error occurred. Please try again.');
                }
            }
        });
    });
});

</script>

<script>
        $(document).ready(function () {
    // Handle verification code submission
    $('#verify-code').click(function (event) {
        event.preventDefault();

        var verificationCode = $('#verification_code').val();

        // Ensure verification code is not empty
        if (!verificationCode) {
            toastr.error('Please enter the verification code.');
            return;
        }

        $.ajax({
            url: '{{ route("verifaction_code") }}',
            type: 'POST',
            data: {
                _token: $('input[name="_token"]').val(),
                code: verificationCode
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token in the header
            },
            beforeSend: function () {
                // Optionally show loader before sending request
                toastr.info('Verifying code...');
            },
            success: function (response) {
                if (response.success) {
                    // Show success message
                    toastr.success('Email verified and signing up...');

                    // Redirect to the dashboard after a short delay
                    setTimeout(function () {
                        window.location.href = response.redirect;
                    }, 2000);
                } else {
                    // Show error message
                    toastr.error(response.message);
                }
            },
            error: function (xhr) {
                // Log the error and show a generic error message
                console.log(xhr.responseText);
                toastr.error('An error occurred while verifying the code.');
            }
        });
    });
});


</script>

<script>
    document.getElementById('with_email').addEventListener('click', function() {
        document.getElementById('emailDivs').style.display = 'block';
        document.getElementById('signupOptions').style.display = 'none';
    });

    document.querySelector('.cancelBtn').addEventListener('click', function() {
        document.getElementById('emailDivs').style.display = 'none';
        document.getElementById('signupOptions').style.display = 'block';
    });

</script>


<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        // Toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // Toggle the eye slash icon
        this.querySelector("#eyereg").classList.toggle("fa-eye-slash");
        this.querySelector("#eyereg").classList.toggle("fa-eye");
    });
</script>
@vite('resources/js/app.js')

@yield('customJs')

</body>

</html>
