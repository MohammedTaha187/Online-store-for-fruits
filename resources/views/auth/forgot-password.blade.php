<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Fresh Fruits Market</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?fruits') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .forgot-card {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .form-control {
            border-radius: 10px;
        }
        .reset-btn {
            background: #ffa500;
            border: none;
            padding: 10px;
            border-radius: 10px;
            font-size: 18px;
            width: 100%;
            color: white;
            transition: 0.3s;
        }
        .reset-btn:hover {
            background: #ff7f00;
        }
        .login-link {
            text-align: center;
            display: block;
            margin-top: 10px;
            color: #ff4500;
        }
        .logo {
            width: 80px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="forgot-card">
        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="Fruit Logo" class="logo">
        <h2 class="text-center">Forgot Password?</h2>
        <p class="text-center text-muted">Enter your email and we'll send you a reset link.</p>
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn reset-btn">Send Reset Link</button>
            <a href="{{ route('login') }}" class="login-link">Back to Login</a>
        </form>
    </div>
</body>
</html>
