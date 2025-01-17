<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به رستوران</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link rel="icon" href="{{ asset('img/favicon1.png')}}" type="image/x-icon">
    
    <!-- اضافه کردن فونت لاله زار -->
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Lalezar', cursive; /* تنظیم فونت لاله زار */
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form .input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        .submit:hover {
            background-color: #0056b3;
        }

        .alert-danger {
            color: #ff0000;
            background-color: #f8d7da;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .alert-danger ul {
            list-style: none;
            padding: 0;
        }

        .alert-danger ul li {
            padding: 5px 0;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ورود به رستوران</h1>

        <!-- نمایش پیغام‌های خطا -->
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

            <!-- فیلد ایمیل یا شماره تماس -->
            <input type="text" name="email" placeholder="ایمیل یا شماره تماس" required value="{{ old('email') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <!-- فیلد رمز عبور -->
            <input name="password" required placeholder="رمز عبور" type="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <!-- دکمه ورود -->
            <input class="submit" value="ورود" type="submit">
        </form>

        <p class="login-link">
            ثبت‌نام نکرده‌اید؟ 
            <a href="{{ route('register') }}">ثبت‌نام</a>
        </p>
    </div>
</body>
</html>
