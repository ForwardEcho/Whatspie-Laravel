<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message via WhatsPie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Send Message</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="device" class="form-label">Sender Number</label>
                    <input type="text" class="form-control" id="device" name="device" value="{{ $phone }}"
                        required readonly>
                </div>
                <div class="col-md-6">
                    <label for="receiver" class="form-label">Receiver Numbers (Comma Separated)</label>
                    <input type="text" class="form-control" id="receiver" name="receiver"
                        placeholder="Enter receiver numbers (e.g., 6289876543210, 6289876543220)" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message / Caption</label>
                <textarea class="form-control" id="message" name="message" rows="3"
                    placeholder="Type your message or caption here"></textarea>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="type" class="form-label">Message Type</label>
                    <select class="form-control" id="type" name="type" onchange="toggleFileInput(this.value)">
                        <option value="chat" selected>Chat</option>
                        <option value="file">File</option>
                        <option value="image">Image</option>
                        <option value="video">Video</option>
                        <option value="audio">Audio</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="simulate_typing" class="form-label">Simulate Typing</label>
                    <select class="form-control" id="simulate_typing" name="simulate_typing">
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <div class="mb-3" id="file-input-container" style="display: none;">
                <label for="image" class="form-label">Upload File</label>
                <input type="file" class="form-control" id="image" name="image" accept="*/*">
            </div>

            <button type="submit" class="btn btn-primary w-100">Send Message</button>
        </form>
    </div>

    <script>
        function toggleFileInput(type) {
            const fileInputContainer = document.getElementById('file-input-container');
            const messageInput = document.getElementById('message');
            if (['file', 'image', 'video', 'audio'].includes(type)) {
                fileInputContainer.style.display = 'block';
                messageInput.placeholder = 'Optional caption (can be empty)';
            } else {
                fileInputContainer.style.display = 'none';
                messageInput.placeholder = 'Type your message here';
            }
        }
    </script>
</body>

</html>
