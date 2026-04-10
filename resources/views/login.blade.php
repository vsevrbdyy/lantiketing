<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LAN-JALAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 40px;
            width: 100%;
            max-width: 450px;
            border: 1px solid #e5e7eb;
        }
        .btn-login {
            background: #1f2937;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 8px;
        }
        .btn-login:hover {
            background: #374151;
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo img {
            height: 60px;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            padding: 10px;
        }
        .form-control:focus {
            border-color: #9ca3af;
            box-shadow: none;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="login-card">
            <div class="logo">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo">
                <h3 class="mt-3 fw-bold" style="color: #1f2937;">LAN-JALAN</h3>
                <p class="text-muted">Login ke Akun Anda</p>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold" style="color: #1f2937;">Alamat Email</label>
                    <input type="email" class="form-control" id="email" name="email" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-bold" style="color: #1f2937;">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary btn-login w-100">Login</button>

                <div class="text-center mt-4">
                    <p class="text-muted">Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-decoration-none fw-bold" style="color: #1f2937;">Daftar di sini</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>