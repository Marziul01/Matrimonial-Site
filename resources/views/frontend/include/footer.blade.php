<footer class="main section">
    <div class="foterWidgets">
        <div class="innerDiv">
            <h3 class="title">GET IN TOUCH</h3>
            <p class="infos">Address: Mirpur DOHS, Mirpur Dhaka 1216</p>
            <p class="infos">Phone: +880 1947-782635</p>
            <p class="infos">Email: info@linkmyheart.com</p>
            <div class="d-flex justify-content-start align-content-center column-gap-2 footerapps">
                <img src="{{ asset('frontend-assets/imgs/apps.png') }}" width="70%" class="mt-4">
            </div>
        </div>
        <div class="innerDiv">
            <h3 class="title">RESOURCES</h3>
            <div class="d-flex flex-column row-gap-2">
                <a class="footerMenu">About us</a>
                <a class="footerMenu">Contact Us</a>
                <a class="footerMenu">FAQ</a>
                <a class="footerMenu">Guide</a>
                <a class="footerMenu">Careers</a>
            </div>
        </div>
        <div class="innerDiv">
            <h3 class="title">SUPPORT</h3>
            <div class="d-flex flex-column row-gap-2">
                <a class="footerMenu">About us</a>
                <a class="footerMenu">Contact Us</a>
                <a class="footerMenu">FAQ</a>
                <a class="footerMenu">Guide</a>
                <a class="footerMenu">Careers</a>
            </div>
        </div>
        <div class="innerDiv">
            <h3 class="title">SOCIAL MEDIA</h3>
            <div class="footerSocial">
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-x-twitter"></i>
                <i class="fa-brands fa-github"></i>
                <i class="fa-solid fa-paper-plane"></i>
                <i class="fa-brands fa-instagram"></i>
            </div>
        </div>
    </div>
</footer>
<div class="section foterWidgets2">
    <div class="d-flex column-gap-4 align-items-center">
        <a class="footerMenu">Privacy Policy</a>
        <a class="footerMenu">Terms of Use</a>
        <a class="footerMenu">Sales and Refunds</a>
        <a class="footerMenu">Legal</a>
        <a class="footerMenu">Site Map</a>
    </div>
    <div>
        <p class="copywrteText"><i class="fa-solid fa-copyright"></i> 2024-2025 Link My Heart </p>
    </div>
</div>

<div class="live-support">
    <div class="live-support-icon">
        <i class="fa-solid fa-comment-dots"></i>
    </div>
    <div class="live-support-box">
        <div class="chat-header">
            Live Support Center
            <span class="close-chat"><i class="fa-solid fa-sort-down"></i></span>
        </div>
        <div class="chat-body">
            <p id="defp">Welcome to our Support Center! Please fill in the form below before starting the chat</p>

            <!-- First form (supportMsg) -->
            <div id="supportMsg">
                <input class="form-control" type="text" id="name" name="name" placeholder="Your Name" />
                <small class="error" id="nameError" style="color:red;display:none;">Please fill in your name</small>

                <input class="form-control" type="email" id="email" name="email" placeholder="Your Email" />
                <small class="error" id="emailError" style="color:red;display:none;">Please provide a valid email</small>

                <textarea class="form-control mesage" id="userMessage" name="message" placeholder="Type your message..."></textarea>
                <small class="error" id="messageError" style="color:red;display:none;">Please type your message</small>

                <button type="button" id="sendMessageBtn" class="msgbtnsub">Send Message <i class="fa-solid fa-paper-plane"></i></button>
            </div>

            <!-- Second form (supportMsg2) -->
            <div id="supportMsg2" style="display: none;">
                <input class="form-control" type="number" id="profileNumber" name="number" placeholder="Your Profile Number" />
                <small class="error" id="numberError" style="color:red;display:none;">Please provide your profile number</small>

                <input class="form-control" type="date" id="dob" name="date_of_birth" placeholder="Your Profile Date Of Birth" />
                <small class="error" id="dobError" style="color:red;display:none;">Please select your date of birth</small>

                <select class="form-control" name="marital_status" id="maritalStatus">
                    <option value="">Select Your Profile Marital Status </option>
                    <option value="single">Single</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Awaiting Divorce">Awaiting Divorce</option>
                </select>
                <small class="error" id="statusError" style="color:red;display:none;">Please select your marital status</small>

                <button type="button" id="submitFormBtn" class="msgbtnsub w-100">Submit</button>
            </div>

            <div id="successMessage" class=""></div>
        </div>


    </div>
</div>


<script>
    document.querySelector('.live-support-icon').addEventListener('click', function() {
        var chatBox = document.querySelector('.live-support-box');
        chatBox.classList.toggle('active');
    });

    document.querySelector('.close-chat').addEventListener('click', function() {
        var chatBox = document.querySelector('.live-support-box');
        chatBox.classList.remove('active');
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

        if ($('#userMessage').val() === '') {
            $('#messageError').show();
            isValid = false;
        } else {
            $('#messageError').hide();
        }

        return isValid;
    }

    // Event handler for the "Send Message" button
    $('#sendMessageBtn').click(function() {
        if (validateSupportMsg()) {
            $('#supportMsg').hide();
            $('#supportMsg2').show();
        }
    });

    // Function to validate the second form (supportMsg2)
    function validateSupportMsg2() {
        var isValid = true;

        if ($('#profileNumber').val() === '') {
            $('#numberError').show();
            isValid = false;
        } else {
            $('#numberError').hide();
        }

        if ($('#dob').val() === '') {
            $('#dobError').show();
            isValid = false;
        } else {
            $('#dobError').hide();
        }

        if ($('#maritalStatus').val() === '') {
            $('#statusError').show();
            isValid = false;
        } else {
            $('#statusError').hide();
        }

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
    $('#submitFormBtn').click(function() {
    if (validateSupportMsg2()) {
        // Prepare form data for submission
        var formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            message: $('#userMessage').val(),
            number: $('#profileNumber').val(),
            date_of_birth: $('#dob').val(),
            marital_status: $('#maritalStatus').val()
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
    }
});


});


</script>

