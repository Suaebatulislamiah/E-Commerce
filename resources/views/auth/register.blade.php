<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .login-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: block;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #0056b3;
        }
        .error {
            color: red;
            margin-bottom: 10px;
            font-size: 14px;
        }
        @media (max-width: 400px) {
            .login-container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>E-Commerce</h1>
        <h2>Register</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error">
                <strong>Error:</strong> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
            </div>
            <div class="mb-3">
                <input type="email" id="email" name="email" required value="{{ old('email') }}" placeholder="Email">
            </div>
            <div class="mb-3">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <p>Sudah memiliki akun? <a href="{{ route('login') }}">Login</a></p>
        </form>
    </div>
</body>
</html>