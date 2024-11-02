<footer class="main section">
    <div class="foterWidgets">
        <div class="innerDiv">
            <h3 class="title">GET IN TOUCH</h3>
            <p class="infos">Address: {{ $siteSetting->address }}</p>
            <p class="infos">Phone: {{ $siteSetting->phone }}</p>
            <p class="infos">Email: {{ $siteSetting->email }}</p>
            @if ( $siteSetting->play_store )
            <div class="d-flex justify-content-start align-content-center column-gap-2 footerapps">
                <img src="{{ asset('frontend-assets/imgs/apps.png') }}" width="70%" class="mt-4">
            </div> 
            @endif
            
        </div>
        <div class="innerDiv">
            <h3 class="title">RESOURCES</h3>
            <div class="d-flex flex-column row-gap-2">
                <a class="footerMenu" href="{{ route('about') }}" >About us</a>
                <a class="footerMenu" href="{{route('contact')}}">Contact Us</a>
                <a class="footerMenu" href="{{route('reviews')}}" >More Customer Reviews</a>
                <a class="footerMenu" href="{{route('faq')}}" >FAQ</a>
            </div>
        </div>
        <div class="innerDiv">
            <h3 class="title">Useful Links</h3>
            <div class="d-flex flex-column row-gap-2">
                <a class="footerMenu" href="{{route('login')}}" >Login</a>
                <a class="footerMenu" href="{{route('user.dashboard')}}" >Dashboard</a>
                <a class="footerMenu" href="{{route('user.matches')}}">My Matches</a>
            </div>
        </div>
        <div class="innerDiv">
            <h3 class="title">SOCIAL MEDIA</h3>
            <div class="footerSocial">
                @if ($siteSetting->facebook)
                <a href="{{ $siteSetting->facebook }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                @endif
                @if ($siteSetting->twitter)
                <a href="{{ $siteSetting->twitter }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                @endif
                @if ($siteSetting->instagram)
                <a href="{{ $siteSetting->instagram }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                @endif
                @if ($siteSetting->youtube)
                <a href="{{ $siteSetting->youtube }}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                @endif
            </div>
        </div>
    </div>
</footer>
<div class="section foterWidgets2">
    <div class="d-flex column-gap-4 align-items-center">
        <a class="footerMenu">Privacy Policy</a>
        <a class="footerMenu">Terms of Use</a>
    </div>
    <div>
        <p class="copywrteText"><i class="fa-solid fa-copyright"></i> 2024-2025 Link My Heart </p>
    </div>
</div>

<div class="live-support">
    <i class="fa-solid fa-circle-xmark closethebox"></i>
    <div class="live-support-icon-box animate__animated animate__fadeIn">
        <i class="fa-solid fa-comments"></i>
        <div>
            <h4>Live Chat Online</h4>
            <p>Click here and start Chatting with us !</p>
        </div>

    </div>
    <div class="live-support-icon">
        <i class="fa-solid fa-comment-dots"></i>
    </div>
    <div class="live-support-box">
        <div class="chat-header">
            <strong>Live Support Center</strong>
            <span class="close-chat"><i class="fa-solid fa-xmark"></i></span>
        </div>
        <div class="chat-body">
            <p id="defp">Welcome to our Support Center! Please fill in the form below before starting the chat</p>

            <!-- First form (supportMsg) -->
            <div id="supportMsg">
                <input class="form-control" type="text" id="name" name="name" placeholder="Name" />
                <small class="error" id="nameError" style="color:red;display:none;">Please fill in your name</small>

                {{-- <input class="form-control dob_all" type="text" id="dob" name="date_of_birth" placeholder="Date Of Birth" />
                <small class="error" id="dobError" style="color:red;display:none;">Please select your date of birth</small> --}}

                <input class="form-control" type="email" id="email" name="email" placeholder="Email" />
                <small class="error" id="emailError" style="color:red;display:none;">Please provide a valid email</small>

                <input class="form-control" type="number" id="profileNumber" name="number" placeholder="Phone Number" />
                <small class="error" id="numberError" style="color:red;display:none;">Please provide your number</small>



                {{-- <select class="form-control" name="marital_status" id="maritalStatus">
                    <option value=""> Marital Status </option>
                    <option value="single">Single</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Awaiting Divorce">Awaiting Divorce</option>
                </select>
                <small class="error" id="statusError" style="color:red;display:none;">Please select your marital status</small> --}}

                <textarea class="form-control mesage" id="userMessage" name="message" placeholder="Type your message..."></textarea>
                <small class="error" id="messageError" style="color:red;display:none;">Please type your message</small>

                <button type="submit" id="sendMessageBtn" class="msgbtnsub w-100">Send <i class="fa-solid fa-paper-plane"></i></button>
            </div>

            <div id="successMessage" class=""></div>
        </div>


    </div>
</div>


<script>
    // When the 'live-support-icon' is clicked, toggle the chat box
    document.querySelector('.live-support-icon').addEventListener('click', function() {
        var chatBox = document.querySelector('.live-support-box');
        var iconBox = document.querySelector('.live-support-icon-box');
        var iconcloseicons = document.querySelector('.closethebox');

        chatBox.classList.toggle('active');
        iconBox.style.display = 'none'; // Hide the live-support-icon-box
        iconcloseicons.style.display = 'none';
    });

    // When the 'live-support-icon-box' is clicked, open the chat box and hide the 'live-support-icon-box'
    document.querySelector('.live-support-icon-box').addEventListener('click', function() {
        var chatBox = document.querySelector('.live-support-box');
        var iconBox = document.querySelector('.live-support-icon-box');
        var iconcloseicons = document.querySelector('.closethebox');

        chatBox.classList.toggle('active'); // Open the chat box
        iconBox.style.display = 'none'; // Hide the live-support-icon-box
        iconcloseicons.style.display = 'none';
    });

    // Close the chat box when the close chat icon is clicked
    document.querySelector('.close-chat').addEventListener('click', function() {
        var chatBox = document.querySelector('.live-support-box');
        chatBox.classList.remove('active');
    });

    // When the 'closethebox' icon inside 'live-support-icon-box' is clicked, hide the 'live-support-icon-box'
    document.querySelector('.closethebox').addEventListener('click', function(event) {
        event.stopPropagation(); // Prevent triggering the 'live-support-icon-box' click event
        var iconBox = document.querySelector('.live-support-icon-box');

        iconBox.style.display = 'none'; // Hide the 'live-support-icon-box'
        document.querySelector('.closethebox').style.display = 'none'; // Hide the close icon
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Hide supportMsg2 by default
        $('#supportMsg2').hide();

        // Function to validate the first form (supportMsg)
        function validateSupportMsg() {
            var isValid = true;

            if ($('#name').val() === '') {
                $('#nameError').show();
                isValid = false;
            } else {
                $('#nameError').hide();
            }

            if ($('#email').val() === '') {
                $('#emailError').show();
                isValid = false;
            } else {
                $('#emailError').hide();
            }

            // if ($('#userMessage').val() === '') {
            //     $('#messageError').show();
            //     isValid = false;
            // } else {
            //     $('#messageError').hide();
            // }

            if ($('#profileNumber').val() === '') {
                $('#numberError').show();
                isValid = false;
            } else {
                $('#numberError').hide();
            }

            // if ($('#dob').val() === '') {
            //     $('#dobError').show();
            //     isValid = false;
            // } else {
            //     $('#dobError').hide();
            // }

            // if ($('#maritalStatus').val() === '') {
            //     $('#statusError').show();
            //     isValid = false;
            // } else {
            //     $('#statusError').hide();
            // }

            return isValid;
        }

        // Function to display validation errors using Toastr
        function showErrors(errors) {
            // Loop through errors and show them
            $.each(errors, function(key, value) {
                toastr.error(value[0]); // Display the first error for each field
            });
        }

        // Event handler for the "Submit" button
        $('#sendMessageBtn').click(function() {
            // Prepare form data for submission
            var formData = {
                name: $('#name').val(),
                email: $('#email').val(),
                message: $('#userMessage').val(),
                number: $('#profileNumber').val(),
                // date_of_birth: $('#dob').val(),
                // marital_status: $('#maritalStatus').val(),
            };

            // Perform AJAX form submission
            $.ajax({
                url: '/user-chat-support', // Replace with your server URL
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                },
                success: function(response) {
                    // If the form is successfully submitted, hide forms and show success message
                    if (response.success) {
                        $('#supportMsg, #supportMsg2, #defp').hide();
                        $('#successMessage').html("<div class='defp'><i class='fa-solid fa-circle-check'></i> Hello, " + formData.name + ". <br> Your message has been sent to our Support Center. We will get back to you via your provided email. Thank you! </div>").show();

                        toastr.success("Your message has been sent successfully!");
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        // Handle validation errors
                        const errors = xhr.responseJSON.errors;
                        if (errors) {
                            for (const key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    // Show each error message using Toastr
                                    toastr.error(errors[key][0]); // Show the first error message for each field
                                }
                            }
                        }
                    } else if (xhr.status === 404) {
                        // Handle "no profile found" error
                        toastr.error(xhr.responseJSON.message || "No profile found with the provided information.");
                    } else {
                        // Handle other errors
                        toastr.error("An error occurred while submitting the form.");
                    }
                }
            });
    });


    });


</script>

<script>
    document.getElementById('dob').addEventListener('click', function() {
        this.type = 'date';
        this.showPicker(); // Open the date picker immediately
    });
</script>

<script>
    // Function to hide the elements after 15 seconds
    setTimeout(function() {
        // Hide the X mark icon
        document.querySelector('.closethebox').style.display = 'none';

        // Hide the live chat box
        document.querySelector('.live-support-icon-box').style.display = 'none';
    }, 15000); // 15000 milliseconds = 15 seconds
</script>
