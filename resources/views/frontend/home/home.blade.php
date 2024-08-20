@extends('frontend.master')

@section('title')

@endsection

@section('modals')

@endsection

@section('content')

    <div class="section">
        <div class="homebg d-flex flex-column justify-content-center align-items-center w-100 row-gap-md-5">
            <div class="home-section my-3">
                <h2 class="text-white text-center homeMain-heading">Find Your Perfect Partner 💕</h2>
                <p class="text-white text-center homeMain-subheading">We made it easy for You to get your loving soulmate in your Location</p>
            </div>
            <form id="sign-up" class="home-section d-flex justify-content-center w-100 mx-5 px-5 mb-5">
                @csrf
                <div class="card d-flex row-gap-3 align-items-center p-4">
                    <div class="d-flex w-100 flex-column flex-md-row row-gap-3 justify-content-between align-items-center column-gap-5">
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
                        </div>

                    </div>
                    <div>
                        <div class=" mt-3">
                            <div class="d-flex align-items-start column-gap-2">
                                <input class="form-check-input" type="checkbox" value="1" name="terms" id="terms">
                                <label class="form-check-label" for="terms">
                                    I'm agree with all the Terms & Conditions
                                </label>
                            </div>
                        </div>
                        <div id="submitBtndiv" style=" display:none">
                            <div class="d-flex justify-content-center align-items-center column-gap-2 mt-3">
                                <p class="">Allow me to</p>
                                <a class="btn submitBtn" id="passPopup">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="passwordPopup" id="passPop">
                    <div class="d-flex w-100 justify-content-center align-items-center p-5" style="height: 100%">
                        <div class="card p-3">
                            <div class="">
                                <label class="form-label">Create Password</label>
                                <input class="form-group form-control" type="password" name="password" placeholder="Enter Your Password">
                                <button class="btn submitBtn mt-4" type="submit">Sign Up</button>
                                <a class="btn btn-success close-popup mt-4" id="passGoBack">Go Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="popupModal d-none" id="popup">
        <div class="popupModalDiv d-flex align-items-center justify-content-center p-5">
            <div class="card d-flex flex-column row-gap-3 justify-content-between align-items-center p-5">
                <h4 class="text-center">Your Registration is Successfully completed !</h4>
            </div>
        </div>
    </div>


@endsection


@section('customJs')

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
            success: function (response) {
                if (response.success) {
                    // Show success notification
                    toastr.success('Registration Successful! Redirecting...');

                    $('#popup').removeClass('d-none').fadeIn();
                    // Redirect to the dashboard after a short delay
                    setTimeout(function () {
                                window.location.href = response.redirect;
                            }, 2000); // Redirect after 2 seconds
                }
            },
            error: function (xhr) {
                // Handle error, e.g., show validation errors
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = '';

                    $.each(errors, function (key, value) {
                        errorMessage += value + '\n';
                    });

                    toastr.error(errorMessage);
                } else {
                    toastr.error('An error occurred. Please try again.');
                }
            }
        });
    });
    $('.close-popup').on('click', function () {
        $('#popup').fadeOut();
    });
});


    </script>


@endsection
