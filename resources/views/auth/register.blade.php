<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Fresh Fruits Market</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?fruits') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-card {
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
        .register-btn {
            background: #ffa500;
            border: none;
            padding: 10px;
            border-radius: 10px;
            font-size: 18px;
            width: 100%;
            color: white;
            transition: 0.3s;
        }
        .register-btn:hover {
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
    <div class="register-card">
        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="Fruit Logo" class="logo">
        <h2 class="text-center">Join Fresh Fruits Market</h2>
        <p class="text-center text-muted">Create an account to get fresh and organic fruits!</p>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn register-btn">Register</button>
            <a href="{{ route('login') }}" class="login-link">Already have an account? Login</a>
        </form>
    </div>
</body>
</html>
