<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title> Link My Heart @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/style.css">

</head>

<body>

@yield('modals')

@include('frontend.include.header')

<main class="main">
    @yield('content')
</main>


<div class="popupModal d-none" id="popup">
    <div class="popupModalDiv d-flex align-items-center justify-content-center p-5">
        <div class="card d-flex flex-column row-gap-3 justify-content-between align-items-center p-5">
            <h4 class="text-center">Your Registration is Successfully completed !</h4>
        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sign Up Now!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="sign-up">
                @csrf
                <div class="w-100">
                    <p class="mb-3">I'm Looking for a </p>
                    <div class="form-group d-flex align-items-center column-gap-5">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="bride" name="looking_for" id="bride">
                            <label class="form-check-label" for="bride">Bride</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="groom" name="looking_for" id="groom">
                            <label class="form-check-label" for="groom">Groom</label>
                        </div>
                    </div>
                </div>

                <div class="w-100">
                        <p class="mb-3">Submitting For</p>
                        <div class="form-group d-flex align-items-center column-gap-5">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="myself" name="account_for" id="myself">
                                <label class="form-check-label" for="myself">Myself</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="others" name="account_for" id="others">
                                <label class="form-check-label" for="others">Others</label>
                            </div>
                        </div>
                </div>

                <div class="w-100" id="relation">
                        <p class="mb-3">Type Your Relation?</p>
                        <div class="mt-3">
                            <input class="form-group form-control" type="text" name="relation" placeholder=" What's Your Relation with the person !">
                        </div>
                </div>
                <div class="w-100" style="display: none;" id="number">
                    <p class="mb-3">Your Mobile Number</p>
                    <input class="form-group form-control" type="number" name="number" placeholder="Your Number">
                    <div class="">
                        <label class="form-label">Create Password</label>
                        <input class="form-group form-control" type="password" name="password" placeholder="Enter Your Password">
                        <input type="checkbox" id="terms" name="terms">
                        <label for="terms"> I agree with all Terms & Conditions </label>


                        <button class="btn submitBtn mt-4" type="submit" style="float: right">Sign Up</button>
                    </div>
                </div>

            </form>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login Now!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="w-100 d-flex align-items-center justify-content-center">
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
const radioButtons = document.querySelectorAll('input[name="account_for"]');
const numberDiv = document.getElementById('number');
const relationSection = document.getElementById('relation');
const accountForOthers = document.getElementById('others');
const checkbox = document.getElementById('terms');
const submitButton = document.getElementById('submitBtndiv');
const pass = document.getElementById('pass');

// Initially hide sections
if (relationSection) {
    relationSection.style.display = 'none';
}
if (numberDiv) {
    numberDiv.style.display = 'none';
}

// Function to handle the visibility of the 'relation' section and number input
function handleAccountForChange() {
    if (document.querySelector('input[name="account_for"]:checked')) {
        numberDiv.style.display = 'block'; // Show the number section if any option is selected
    } else {
        numberDiv.style.display = 'none'; // Hide the number section if no option is selected
    }

    if (accountForOthers.checked) {
        relationSection.style.display = 'block'; // Show the relation section if "Others" is selected
    } else {
        relationSection.style.display = 'none'; // Hide the relation section if "Myself" is selected
    }
}

// Add event listeners to the radio buttons
radioButtons.forEach(radio => {
    radio.addEventListener('change', handleAccountForChange);
});

// Initially handle the change event for the default state
handleAccountForChange();

// Handle the checkbox change for showing/hiding the submit button and password input
checkbox.addEventListener('change', function () {
    if (checkbox.checked) {
        submitButton.style.display = 'block'; // Show the button
        pass.style.display = 'block';
    } else {
        submitButton.style.display = 'none'; // Hide the button
        pass.style.display = 'none';
    }
});
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
    $(document).ready(function () {
        $('#sign-up').on('submit', function (e) {
            e.preventDefault();

            // Prepare form data
            let formData = $(this).serialize();

            $.ajax({
                url: '{{ route("userRegister") }}', // Using the named route
                type: 'POST',
                data: formData,
                dataType: 'json', // Expect JSON response
                success: function (response) {
                    if (response.success) {
                        // Show success notification with a green background
                        toastr.success('Registration Successful! Redirecting...', '', {
                            "positionClass": "toast-top-right",
                            "timeOut": "2000", // Auto-close after 2 seconds
                            "progressBar": true,
                            "backgroundClass": 'bg-success', // Green background
                        });

                        $('#popup').removeClass('d-none').fadeIn();

                        // Redirect to the dashboard after a short delay
                        setTimeout(function () {
                            window.location.href = response.redirect;
                        }, 2000); // Redirect after 2 seconds
                    } else {
                        // Handle the case where success is false and show errors
                        let errors = response.errors;
                        let errorMessage = '';

                        // Loop through errors and concatenate the messages
                        $.each(errors, function (key, value) {
                            errorMessage += value[0] + '<br>'; // value is an array, so take the first element
                        });

                        // Show error notification with a red background
                        toastr.error(errorMessage, '', {
                            "positionClass": "toast-top-right",
                            "backgroundClass": 'bg-danger', // Red background
                        });
                    }
                },
                error: function (xhr) {
                    toastr.error('An unexpected error occurred. Please try again.', '', {
                        "positionClass": "toast-top-right",
                        "backgroundClass": 'bg-danger', // Red background
                    });
                }
            });
        });

        // Close the popup when the close button is clicked
        $('.close-popup').on('click', function () {
            $('#popup').fadeOut();
        });
    });
</script>

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

@yield('customJs')

</body>

</html>
