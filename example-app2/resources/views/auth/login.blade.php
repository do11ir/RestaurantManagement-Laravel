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
            background-color: #2e2e2e;
            color: #fff;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            direction: ltr; /* Ensure LTR direction */
        }

        .container {
            background-color: #424242;
            padding: 2rem;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h1 {
            color: #d32f2f;
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
            background-color: #555; /* Set the background color to gray */
            border: 1px solid #777; /* Set border color to gray */
            padding: 1rem;
            margin-bottom: 1rem;
            width: 100%;
            border-radius: 5px;
            color: white;
        }

        .form input::placeholder {
            color: #aaa; /* Placeholder text color */
        }

        .form input:focus {
            outline: none;
            border-color: #d32f2f; /* Focus border color */
        }

        .submit {
            background-color: #d32f2f;
            color: #fff;
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
            color: #d32f2f;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>

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
            <input type="text" name="email" placeholder="Email or Phone Number" required value="{{ old('email') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <!-- Password field -->
            <input name="password" required placeholder="Password" type="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <!-- Submit button -->
            <input class="submit" value="Login" type="submit">
        </form>

        <p class="login-link">
            Don't have an account? 
            <a href="{{ route('register') }}">Register</a>
        </p>
    </div>
</body>
</html>
