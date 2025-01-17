<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم ویرایش رستوران</title>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lalezar', cursive;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #555;
            margin-bottom: 5px;
            font-size: 16px;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
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
<body>

<div class="container">
    <h2>ویرایش رستوران</h2>
    <form method="POST" action="{{ route('updateRestaurants') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $restaurant->id }}">
        <!-- نام رستوران -->
        <div class="form-group">
            <label for="name">نام رستوران</label>
            <input type="text" id="name" name="name" value="{{ $restaurant->name }}" required>
        </div>

        <!-- آدرس رستوران -->
        <div class="form-group">
            <label for="restaurant_address">آدرس رستوران</label>
            <textarea id="restaurant_address" name="restaurant_address" required>{{ $restaurant->restaurant_address }}</textarea>
        </div>

        <!-- دکمه ارسال -->
        <button type="submit" class="submit-btn">ویرایش رستوران</button>
    </form>
</div>

</body>
</html>
