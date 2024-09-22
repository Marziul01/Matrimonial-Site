@extends('admin.master')

@section('title')
    Users
@endsection

@section('content')

<div class="chat-box">
    @foreach($messages as $message)
        <p>
            <strong>{{ $message->from_id == 1 ? 'Admin' : 'User' }}:</strong>
            {{ $message->message }}
        </p>
    @endforeach

    <!-- Admin reply form -->
    <form id="adminReplyForm">
        @csrf
        <input type="hidden" id="userId" value="{{ $userId }}">
        <input type="text" id="adminMessage" placeholder="Type your reply...">
        <button type="button" id="sendAdminReply">Send</button>  <!-- Change type to "button" -->
    </form>
</div>

@endsection


@section('customjs')

<script>
    const adminReplyUrl = "{{ route('adminReplyMessage') }}";
</script>

<script>
    const pusherKey = "{{ env('PUSHER_APP_KEY') }}"; // Your Pusher app key
    const pusherCluster = "{{ env('PUSHER_APP_CLUSTER') }}"; // Your Pusher cluster
    const adminId = "{{ session('admin_id') }}"; // Dynamic admin ID
</script>

   <script>
        document.querySelector('#sendAdminReply').addEventListener('click', function(e) {
    e.preventDefault();

    let messageInput = document.querySelector('#adminMessage');
    let userId = document.querySelector('#userId').value; // Assuming you have userId field

    if (messageInput.value.trim() === '') return;

    // Send admin message via AJAX
    fetch(adminReplyUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="_token"]').getAttribute('content')
        },
        body: JSON.stringify({ message: messageInput.value, user_id: userId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            let chatBox = document.querySelector('.chat-box');
            chatBox.innerHTML += `<p><strong>Admin:</strong> ${messageInput.value}</p>`;
            messageInput.value = '';
        }
    });

    // Listen for user responses in the specific user channel
    window.Echo.channel('live-support.' + userId)
        .listen('LiveSupport', (data) => {
            let chatBox = document.querySelector('.chat-box');
            if (data.sender === 'user') {
                chatBox.innerHTML += `<p><strong>User:</strong> ${data.message}</p>`;
            }
        });
});
    </script>



@endsection
