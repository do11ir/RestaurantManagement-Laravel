<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #fff;
            color: #000;
            line-height: 1.6;
        }

        h1, h2 {
            margin: 0;
            text-align: center;
            font-family: 'Helvetica', sans-serif;
        }

        /* Header */
        .header {
            background-color: #ad2d2d;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            font-size: 2rem;
            color: #fff;
        }

        /* Menu Container */
        .menu-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* Menu Item */
        .menu-item {
            background-color: #f0f0f0;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 350px;
            position: relative;
        }

        .menu-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .menu-item .image-container {
            width: 100%;
            height: 200px;
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .menu-item h2 {
            font-size: 1.6rem;
            color: #ad2d2d;
            font-weight: bold;
        }

        .menu-item p {
            font-size: 1rem;
            color: #000;
            margin-bottom: 15px;
        }

        .menu-item .price {
            font-size: 1.2rem;
            color: #000;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .menu-item button {
            background-color: #ff4c4c;
            color: #ffffff;
            padding: 12px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: bold;
        }

        .menu-item button:hover {
            background-color: #e60000;
        }

        .menu-item .image-container {
            width: 100%;
            height: 200px; /* Adjust the height as needed */
            background-size: cover; /* Ensures the image covers the container */
            background-position: center; /* Centers the image */
            border-radius: 8px;
            margin-bottom: 15px;
        }

        /* Cart Link */
        .cart-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 25px 5px 5px;
            background-color: #fff;
            color: #333;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            border: 2px solid #333;
            border-radius: 50px;
            transition: all 0.3s ease;
            margin: 0 auto;
        }

        .cart-link i {
            margin-right: 8px;
            font-size: 18px;
        }

        .cart-link:hover {
            background-color: #333;
            color: #fff;
            border-color: #333;
        }

        .cart-link:active {
            transform: scale(0.95);
        }

        
        /* Responsive */
        @media (max-width: 768px) {
            .menu-container {
                grid-template-columns: 1fr 1fr;
            }

            .menu-item {
                height: auto;
            }

            .menu-item .image-container {
                height: 150px;
            }
        }
    </style>
</head>
<body dir="rtl">

    <!-- Header -->
    <header class="header">
        <h1>{{ $restaurant->name }}</h1>
    </header>

    <!-- Success Message -->
    @if(session('success'))
        <div style="border-radius: 15px; height: 30px; width: 300px; background-color: rgb(39, 240, 79)" class="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Menu Container -->
    <main class="menu-container">
        @foreach($food as $foodss)
            @if($foodss->restaurant_id == $restaurant->id)
            <div class="menu-item" >
                <div class="image-container" style="background-image: url('{{ asset('img/'.$foodss->image) }}');"></div>
                <h2>{{ $foodss->name }}</h2>
                <p>{{ $foodss->description }}</p>
                <div class="">{{ $foodss->price }}</div>
                <a href="{{ route('basket.add', ['foods_id' => $foodss->id]) }}" class="cart-link">
                    <i class="fas fa-shopping-cart"></i> افزودن به سبد خرید
                </a>
            </div>
            @endif
        @endforeach
    </main>

</body>
</html>
