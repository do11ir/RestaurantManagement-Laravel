<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم ثبت‌نام</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <style>
        body {
            font-family: Arial, sans-serif;
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

        .form .select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        .submit-btn {
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

        .submit-btn:hover {
            background-color: #0056b3;
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

        /* Styling for error messages */
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
    </style>
</head>
<body>
    <div class="container">
        <h1>فرم ثبت‌نام</h1>

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

        <form method="POST" action="{{ route('register') }}" class="form">
            @csrf
            <input name="name" placeholder="نام" type="text" class="input" value="{{ old('name') }}" required>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input name="email" placeholder="ایمیل" type="email" class="input" value="{{ old('email') }}" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input name="phone" placeholder="شماره تماس" type="text" class="input" value="{{ old('phone') }}" required>
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input name="address" placeholder="آدرس" type="text" class="input" value="{{ old('address') }}" required>
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input name="password" placeholder="رمز عبور" type="password" class="input" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input name="password_confirmation" placeholder="تایید رمز عبور" type="password" class="input" required>

            <!-- Select box برای انتخاب نقش -->
            <select name="RoleAdmin" class="select">
                <option value="">کاربر</option>
                <option value="master" {{ old('RoleAdmin') == 'master' ? 'selected' : '' }}>مدیر</option>
            </select>

            <button type="submit" class="submit-btn">ثبت‌ نام</button>
        </form>

        <p class="login-link">
            ثبت‌نام کرده‌اید؟ <a href="{{ route('login') }}">ورود</a>
        </p>
    </div>
</body>
</html>
