<!DOCTYPE html>
<html>

<head>
    <title>Lupa Password</title>
    <script>
        function showNotification() {
            alert("Link reset password sedang dikirim. Silakan cek email zimbra Anak Anda.");
        }
    </script>
</head>

<body>
    <form action="{{ route('password.send-link') }}" method="POST" onsubmit="showNotification()">
        @csrf
        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" required>
        <button type="submit">Kirim Link Reset</button>
    </form>
</body>

</html>
