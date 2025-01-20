<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Edit Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        /* Custom Styles */
        body {
            background-color: #fff;
            color: black;
            font-family: 'Arial', sans-serif;
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            max-width: 900px;
            margin-top: 30px;
            padding: 20px;
            background-color: #c1c1c1;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        /* Buttons */
        .btn-primary {
            background-color: #ad2d2d;
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background-color: #ff3333;
        }

        .form-control {
            background-color: #fff;
            color: #000;
            border: 1px solid #444;
            border-radius: 8px;
            font-size: 16px;
        }

        .form-control:focus {
            background-color: #555;
            border-color: #ff4d4d; /* Cherry Red focus border */
            outline: none;
        }

        .form-select {
            background-color: #444; /* Dark Gray select */
            color: white;
            border: 1px solid #555;
            border-radius: 8px;
        }

        .form-select:focus {
            background-color: #555;
            border-color: #ff4d4d; /* Cherry Red focus border */
        }

        .alert-success {
            background-color: #4caf50;
            color: white;
        }

        .alert-danger {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body dir="rtl">

<div class="container">
    <h2>تغییر رستوران</h2>
    <form method="POST" action="{{ route('updateRestaurants') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $restaurant->id }}">

        <!-- Restaurant Name -->
        <div class="form-group mb-3">
            <label for="name" class="form-label">نام رستوران</label>
            <input type="text" id="name" name="name" value="{{ $restaurant->name }}" class="form-control" required>
        </div>

        <!-- Restaurant Address -->
        <div class="form-group mb-3">
            <label for="restaurant_address" class="form-label">آدرس رستوران</label>
            <textarea id="restaurant_address" name="restaurant_address" class="form-control" required>{{ $restaurant->restaurant_address }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">ذخیره</button>
    </form>
</div>

</body>
</html>
