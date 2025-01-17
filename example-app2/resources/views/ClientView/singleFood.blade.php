<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $food->name }}</title>
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #2e2e2e;
            color: #ffffff; /* Light text color */
            line-height: 1.6;
        }

        h1, h3 {
            margin: 0;
        }

        /* Header */
        .header {
            background-color: #d32f2f;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            font-size: 2rem;
            color: #fff;
        }

        /* Product Container */
        .product-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 40px;
            padding: 40px;
        }

        /* Product Image */
        .product-image {
            flex: 1;
            max-width: 450px;
            height: 385px;
            background-image: url('{{ asset('img/'.$food->image) }}');
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .product-image:hover {
            transform: scale(1.05);
        }

        /* Product Details */
        .product-details {
            flex: 1;
            max-width: 500px;
            text-align: left;
            padding: 20px;
            background-color: #424242; /* Dark gray for details */
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }

        .product-details h2 {
            color: #fff;
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .product-details p {
            font-size: 1.1rem;
            margin: 15px 0;
            color: #ffffff;
            line-height: 1.5;
        }

        .product-details .price {
            font-size: 1.5rem;
            color: white;  /* Yellow for price */
            margin-top: 15px;
            font-weight: bold;
        }

        /* Add to Cart Button */
        .add-to-cart-btn {
            display: inline-block;
            background-color: #d32f2f;  /* Cherry Red */
            color: #fff;
            padding: 12px 25px;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
            text-decoration: none;
        }

        .add-to-cart-btn:hover {
            background-color: #ed5c5c;  /* Lighter cherry red on hover */
            transform: scale(1.05);
        }

        /* Restaurant Category */
        .restaurant-category {
            margin-top: 20px;
            font-size: 1.2rem;
            color: #ffffff;
        }

        .restaurant-category span {
            color: #ffcc00;  /* Yellow for category name */
            font-weight: bold;
        }


        /* Responsive Design for Smaller Screens */
        @media (max-width: 768px) {
            .product-container {
                flex-direction: column;
                align-items: center;
            }

            .product-details {
                text-align: center;
                padding: 30px;
                max-width: 90%;
            }

            .product-image {
                max-width: 350px;
                height: 250px;
            }
        }

        @media (max-width: 480px) {
            .product-details h2 {
                font-size: 1.6rem;
            }

            .product-details p {
                font-size: 1.1rem;
            }

            .product-details .price {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        @foreach($restaurant as $rest)
            @if($rest->id == $food->restaurant_id)
                <h1>{{ $rest->name }}</h1>
            @endif
        @endforeach
    </header>

    <!-- Display Product Information -->
    <div class="product-container">
        <!-- Product Image -->
        <div class="product-image">
            <!-- Image is now set as background -->
        </div>

        <!-- Product Details -->
        <div class="product-details">
            <h2>{{ $food->name }}</h2>
            <p>{{ $food->description }}</p>
            <p>Category: <span>{{ $food->category_id }}</span></p>
            @foreach($restaurant as $item)
                @if( $food->restaurant_id == $item->id )
                    <p>Restaurant: <span>{{ $item->name }}</span></p>
                @endif
            @endforeach
            <div class="price">{{ number_format($food->price) }}</div>
            <div style="margin-top: 40px;">
                <a href="{{ route('basket.add', ['foods_id'=>$food->id ]) }}" class="add-to-cart-btn" onclick="addToCart()">Add to Cart</a>
            </div>
        </div>
    </div>


    

    <script>
        function addToCart() {
            alert("Product added to the cart!");
        }
    </script>

</body>
</html>
