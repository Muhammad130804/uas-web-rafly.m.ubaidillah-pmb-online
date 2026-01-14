<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | PMB Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,.2);
            background: #fff;
            padding: 30px;
        }
        .login-title {
            font-weight: 700;
            color: #0d6efd;
        }
        .login-subtitle {
            font-size: 14px;
            color: #6c757d;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-login {
            border-radius: 10px;
            font-weight: 600;
        }
        .logo {
            font-size: 50px;
        }
    </style>
</head>
<body>

<div class="login-card">

    <!-- Header -->
    <div class="text-center mb-4">
        <div class="logo">🎓</div>
        <h4 class="login-title">PMB Online</h4>
        <p class="login-subtitle">Silakan login untuk melanjutkan</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- Error -->
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Masukkan email"
                value="{{ old('email') }}"
                required
                autofocus
            >
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Masukkan password"
                required
            >
        </div>

        <!-- Remember -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>

            <a href="{{ route('password.request') }}" class="text-decoration-none">
                Lupa password?
            </a>
        </div>

        <!-- Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-login">
                🔐 Login
            </button>
        </div>
    </form>

    <div class="text-center mt-4 text-muted" style="font-size: 13px;">
        &copy; {{ date('Y') }} PMB Online - Universitas Ma'soem
    </div>

</div>

</body>
</html>
