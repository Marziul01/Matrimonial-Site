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
            Live Chat Support
            <span class="close-chat">x</span>
        </div>
        <div class="chat-body">
            <div id="supportMsg"></div>
        </div>
        <div class="chat-footer">
            <input type="text" id="userMessage" placeholder="Type your message..." />
            <button id="sendMessage">Send <i class="fa-solid fa-paper-plane"></i></button>
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

<script>
    document.querySelector('#sendMessage').addEventListener('click', function() {
    let message = document.querySelector('#userMessage').value;
    let userId = '{{ session('live_support_user_id', uniqid('user_', true)) }}';  // Pass dynamically based on user context

    if (message.trim() === '') return;

    // Send the message via AJAX to the server
    fetch('/live_support-message', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ message: message, user_id: userId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Append the message to the chat box
            let supportMsg = document.querySelector('#supportMsg');
            supportMsg.innerHTML += `<p><strong>You:</strong> ${message}</p>`;

            // Clear input field
            document.querySelector('#userMessage').value = '';
        }
    });

    // Listen for Admin responses
    window.Echo.channel('live-support.' + userId)
        .listen('LiveSupport', (data) => {
            let supportMsg = document.querySelector('#supportMsg');
            if (data.sender === 'admin') {
                supportMsg.innerHTML += `<p><strong>Admin:</strong> ${data.message}</p>`;
            }
        });
});


</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fetch the previous messages for the user
        fetch('/live_support-messages', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF protection
            },
        })
        .then(response => response.json())
        .then(data => {
            // Check if messages are returned
            if (data.messages && data.messages.length > 0) {
                let supportMsg = document.querySelector('#supportMsg');

                // Loop through messages and append them to the chat body
                data.messages.forEach(function (msg) {
                    supportMsg.innerHTML += `<p><strong>You:</strong> ${msg.message}</p>`;
                });
            }
        })
        .catch(error => {
            console.error('Error fetching messages:', error);
        });
    });
</script>

