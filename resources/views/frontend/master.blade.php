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
                <div class="names">
                    <div class="w-50">
                        <input type="text" name="first_name" placeholder="First Name" class="form-control">
                    </div>
                    <div class="w-50">
                        <input type="text" name="last_name" placeholder="Last Name" class="form-control">
                    </div>
                </div>
                <div class="w-100 radios">
                    <p class="">Gender</p>
                    <div class="d-flex align-items-center column-gap-2">
                        <div class="">
                            <input class="form-check-input" type="radio" value="female" name="gender" id="myself">
                            <label class="form-check-label" for="myself">Female</label>
                        </div>
                        <div class="">
                            <input class="form-check-input" type="radio" value="male" name="gender" id="others">
                            <label class="form-check-label" for="others">Male</label>
                        </div>
                    </div>
                </div>
                <div class="w-100 radios">
                    <p class="">I'm Looking for a </p>
                    <div class="d-flex align-items-center column-gap-2">
                        <div class="">
                            <input class="form-check-input" type="radio" value="bride" name="looking_for" id="bride">
                            <label class="form-check-label" for="bride">Bride</label>
                        </div>
                        <div class="">
                            <input class="form-check-input" type="radio" value="groom" name="looking_for" id="groom">
                            <label class="form-check-label" for="groom">Groom</label>
                        </div>
                    </div>
                </div>
                <div class="w-100 date_of_birth">
                    <p class="">Date of Birth</p>
                    <div class="fields">
                        <div class="select-wrapper">
                            <select name="month" id="" class="form-control">
                                <option value="">Month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="select-wrapper">
                            <select name="day" class="form-control">
                                <option value="">Day</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                        </div>
                        <div class="select-wrapper">
                            <select name="year" id="" class="form-control">
                                <option value="">Year</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="religion">
                    <div class="select-wrapper">
                    <select name="religion" id="" class="form-control">
                        <option value="">Religion</option>
                        <option value="Islam">Islam</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddhism">Buddhism</option>
                        <option value="Christianity">Christianity</option>
                        <option value="Atheist">Atheist</option>
                        <option value="Others">Others</option>
                    </select>
                    </div>
                </div>
                <div class="education">
                    <div class="select-wrapper">
                    <select name="education" id="" class="form-control">
                        <option value="">Education</option>
                        <option value="Secondary Education">Secondary Education</option>
                        <option value="Higher Secondary">Higher Secondary</option>
                        <option value="Diploma in Engineering">Diploma in Engineering</option>
                        <option value="Fazil">Fazil</option>
                        <option value="Bachelor's">Bachelor's</option>
                        <option value="Master's">Master's</option>
                        <option value="Doctorate">Doctorate</option>
                    </select>
                    </div>
                </div>
                <div class="w-100 emailDiv" style="display: none;" id="email">
                    <input class="form-control" type="email" name="email" placeholder="Your Email">
                    <div class="mt-3">
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" />
                            <div class="input-group-appends">
                                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                    <i class="fas fa-eye-slash"></i> <!-- Initial crossed eye icon -->
                                </span>
                            </div>
                        </div>
                        <button class="btn submitBtn mt-4" type="submit" style="float: left">Sign Up</button>
                        <button class="btn submitBtn mt-4 cancelBtn" type="button" style="float: right">Cancel</button>
                    </div>
                </div>
                <div class="signupOptions" id="signupOptions">
                    <button type="button" id="with_email" class="btn openEmailSignup"> Sign Up with Email </button>
                    <a type="button" href="{{ URL::to('googleLogin') }}" class="googleSignin"> <img src="{{ asset('frontend-assets/imgs/Google_Icons-09-512.webp') }}">  Sign Up with Google </a>
                </div>
            </form>
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
    document.getElementById('with_email').addEventListener('click', function() {
    document.getElementById('email').style.display = 'block';
    document.getElementById('signupOptions').style.display = 'none';
});

document.querySelector('.cancelBtn').addEventListener('click', function() {
    document.getElementById('email').style.display = 'none';
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
        this.querySelector("i").classList.toggle("fa-eye-slash");
        this.querySelector("i").classList.toggle("fa-eye");
    });
</script>

@yield('customJs')

</body>

</html>
