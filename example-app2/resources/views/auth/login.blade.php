<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link rel="icon" href="{{ asset('img/favicon1.png')}}" type="image/x-icon">
    <style>
        body {
            background-color: #fff;
            color: #000;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            direction: ltr; /* Ensure LTR direction */
        }

        .container {
            background-color: #ad2d2d;
            padding: 2rem;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h1 {
            color: #fff;
            margin-bottom: 1rem;
            font-size: 2rem;
        }

        .alert-danger {
            background-color: #ff5252;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            color: white;
        }

        .form input {
            background-color: #f5f5f5; /* Set the background color to gray */
            border: 1px solid #fff; /* Set border color to gray */
            padding: 1rem;
            margin-bottom: 1rem;
            width: 100%;
            border-radius: 5px;
            color: black;
        }

        .form input::placeholder {
            color: #aaa; /* Placeholder text color */
        }

        .form input:focus {
            outline: none;
            border-color: #d32f2f; /* Focus border color */
        }

        .submit {
            background-color: #c0c0c0;
            color: #000;
            border: none;
            padding: 1rem;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
        }

        .submit:hover {
            background-color: #b71c1c;
        }

        .login-link {
            margin-top: 1rem;
            color: #bbb;
        }

        .login-link a {
            color: #fff;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ورود</h1>

        <!-- Display error messages -->
        @if ($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="form">
            @csrf

            <!-- Email or Phone field -->
            <input type="text" name="email" dir="rtl" placeholder="ایمیل یا شماره تماس" required value="{{ old('email') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <!-- Password field -->
            <input name="password" dir="rtl" required placeholder="رمز عبور" type="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <!-- Submit button -->
            <input class="submit" value="ورو به حساب" type="submit">
        </form>

        <p class="login-link">
            حساب کاربری ندارید؟
            <a href="{{ route('register') }}">ثبت نام کنید</a>
        </p>
    </div>
</body>
</html>
