<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
      <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="public/Job_portal/img/logos.png" />
    <style>
    body {
        font-family: 'Arial', Helvetica, sans-serif;
        background-color: whitesmoke;
        margin: 0;
        padding: 0;
    }

    #chat-container {
        max-height: 450px;
        overflow-y: auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
    }

    /* Hide scrollbar */
    #chat-container::-webkit-scrollbar {
        width: 0;
    }

    .chat-message {
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
    }

    .chat-message .message-content {
        max-width: 75%;
        word-wrap: break-word;
        padding: 15px 20px;
        border-radius: 25px;
        position: relative;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .text-end .message-content {
        margin-left: auto;
        background-color: #3c82eb;
        color: white;
        border-top-right-radius: 0;
        box-shadow: 0 2px 5px rgba(0, 123, 255, 0.4);
    }

    .chat-message:not(.text-end) .message-content {
        margin-right: auto;
        background-color: #f1f1f1;
        color: #333;
        border-top-left-radius: 0;
    }

    .chat-message:not(.text-end) {
        margin-right: 55px;
    }

    .chat-header {
        display: flex;
        align-items: center;
        padding: 10px;
        background-color: #3c82eb;
        color: white;
        border-radius: 10px 10px 0 0;
    }
    .chat-header h5 {
        font-size: 1.2em;
        margin-bottom: 5px;
    }

    .chat-footer {
        padding: 20px;
        background-color: #ffffff;
        border-radius: 0 0 10px 10px;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    }

    .chat-footer .input-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .chat-footer .form-control {
        flex: 1;
        border-radius: 30px;
        border: 1px solid #ced4da;
        padding-left: 20px;
        height: 45px;
        font-size: 16px;
    }

    .chat-footer .btn-primary {
        background-color: #3c82eb;
        border: none;
        border-radius: 30px;
        padding: 12px 30px;
        color: white;
        font-size: 16px;
    }

    .chat-footer .btn-primary:hover {
        background-color: #3c82eb;
        border: none;
    }

    .card {
        width: 75% !important;
        max-width: 800px;
        margin: 0 auto;
    }

    .chat-card {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
    }

    small {
        font-size: 0.8em;
        color: #6c757d;
    }

   

    .message-time {
        position: absolute;
        bottom: -18px;
        right: 5px;
        font-size: 0.75em;
        color: #888;
    }
</style>
</head>
<body>
<div class="container">
    <div class="row chat-card justify-content-center py-4">
        <div class="card">
            <!-- Chat Header -->
            <div class="chat-header">
                <div class="ms-3">
                    <h5 class="mb-0">{{ $receiver->name }}</h5>
                    <small>{{ ucfirst($receiver->user_type) }}</small>
                </div>
            </div>

            <!-- Chat Container -->
            <div id="chat-container" class="p-3">
                @foreach ($messages as $message)
                    <div class="chat-message {{ $message->sender_id == auth()->id() ? 'text-end' : '' }}">
                        <div class="message-content {{ $message->sender_id == auth()->id() ? 'bg-primary text-white' : 'bg-light text-dark' }}">
                            {{ $message->messages }}
                            <small class="message-time">
                                {{ $message->created_at->format('h:i A') }}
                            </small>
                        </div>
                    </div>
                @endforeach
            </div>

           
            <div class="chat-footer">
                <form id="chat-form" method="post" action="{{ route('chat.send') }}">
                    @csrf
                    <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
                    <div class="input-group">
                        <input type="text" name="message" class="form-control" placeholder="Type your message here ..." required>
                        
                        <button class="btn btn-primary" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const fetchMessagesUrl = "{{ route('chat.fetchMessages', $receiver->id) }}";
        const storeChatUrl = "{{ route('chat.send') }}";
        const chatContainer = document.getElementById('chat-container');
        const chatForm = document.getElementById('chat-form');

        function fetchMessages() {
            fetch(fetchMessagesUrl)
                .then(response => response.json())
                .then(data => {
                    renderMessages(data.messages);
                })
                .catch(error => {
                    console.error("Error fetching messages:", error);
                });
        }

        function renderMessages(messages) {
            chatContainer.innerHTML = '';

            if (messages.length === 0) {
                chatContainer.innerHTML = '<p class="text-muted text-center">No messages yet. Start a conversation!</p>';
                return;
            }

            messages.forEach(function (message) {
                const isSender = message.sender_id === {{ auth()->id() }};
                let messageHtml =
                    `<div class="chat-message ${isSender ? 'text-end' : ''}">
                        <div class="message-content ${isSender ? 'bg-primary text-white' : 'bg-light text-dark'}">
                            ${message.messages}
                            <small class="message-time">${new Date(message.created_at).toLocaleTimeString()}</small>
                        </div>
                    </div>`;

                chatContainer.insertAdjacentHTML('beforeend', messageHtml);
            });

            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        chatForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission
            const formData = new FormData(chatForm);

            fetch(storeChatUrl, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": formData.get('_token'),
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const newMessageHtml =
                    `<div class="chat-message text-end">
                        <div class="message-content bg-primary text-white">
                            ${data.message}
                            <small class="message-time">${data.created_at}</small>
                        </div>
                    </div>`;
                chatContainer.insertAdjacentHTML('beforeend', newMessageHtml);
                chatContainer.scrollTop = chatContainer.scrollHeight;
                chatForm.reset(); // Reset the form after sending the message
            })
            .catch(error => {
                console.error("Error sending message:", error);
            });
        });

        fetchMessages();
        setInterval(fetchMessages, 1000);
    });
</script>

</html>



