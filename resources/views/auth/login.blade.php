<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Student Information System</title>
    <link rel="stylesheet" href="{{ asset('assets\css\login.css') }}">

</head>

<body>
    <div class="container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <img src="{{ asset('assets/img/logo_Del.jpg') }}" alt="Del Logo">
            <div class="welcome-content">
                <h1>Selamat Datang, Di SIS</h1>
                <p>Student Information System</p>
            </div>
        </div>

        <!-- Login Section -->
        <div class="login-section">
            <h2>SIS</h2>
            <p style="text-align: center; color: #555; margin-bottom: 20px;">Student Information System</p>
            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" id="nim" name="nim" placeholder="Student NIM" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="*******" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
