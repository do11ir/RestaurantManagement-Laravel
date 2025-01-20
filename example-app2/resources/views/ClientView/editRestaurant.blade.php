<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Registration Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lalezar', cursive;
            background-color: #fff;
            color: #000;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #1c1c1c;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #f8f9fa;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #f8f9fa;
            margin-bottom: 5px;
            font-size: 16px;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #343a40;
            border-radius: 5px;
            background-color: #252a2e;
            color: #f8f9fa;
            box-sizing: border-box;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background-color: #ad2d2d;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #c41630;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body dir="rtl">

<div class="container">
    <h2>فرم ثبت رستوران</h2>
    <form method="POST" action="{{ route('insertRestaurant') }}">
        @csrf
        <!-- Restaurant Name -->
        <div class="form-group">
            <label for="name">نام رستوران</label>
            <input type="text" id="name" name="name"  required>
        </div>

        <!-- Restaurant Address -->
        <div class="form-group">
            <label for="restaurant_address">آدرس رستوران</label>
            <textarea id="restaurant_address" name="restaurant_address"  required></textarea>
        </div>

        <!-- master_id as hidden -->
        <input type="hidden" name="master_id" value="{{ Auth::user()->id }}">

        <!-- Submit Button -->
        <button type="submit" class="submit-btn">ثبت</button>
    </form>
</div>

</body>
</html>
