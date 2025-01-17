<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $food->name }}</title>
    <style>
        /* استایل‌های عمومی */
        body {
            margin: 0;
            font-family: 'Vazir', sans-serif;
            background-color: #121212;
            color: #ffffff;
            line-height: 1.6;
        }

        h1, h3, h2 {
            margin: 0;
        }

        /* هدر */
        .header {
            background-color: #1f1f1f;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            font-size: 2rem;
            color: #ffcc00;
        }

        /* نمایش اطلاعات محصول */
        .product-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            gap: 30px;
            margin-top: 20px;
        }

        .product-image {
            flex: 1;
            max-width: 400px;
            margin-right: 20px;
        }

        .product-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .product-details {
            flex: 2;
            text-align: right;
        }

        .product-details h2 {
            color: #ffcc00;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .product-details p {
            font-size: 1.2rem;
            margin: 15px 0;
            color: #ffffff;
        }

        .product-details .price {
            font-size: 1.5rem;
            color: #ffcc00;
            margin-top: 10px;
        }

        /* دکمه افزودن به سبد خرید */
        .add-to-cart-btn {
            background-color: #ffcc00;
            color: #121212;
            padding: 10px 20px;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .add-to-cart-btn:hover {
            background-color: #ffaa00;
        }

        /* اطلاعات رستوران و دسته‌بندی */
        .restaurant-category {
            margin-top: 20px;
            font-size: 1.2rem;
            color: #ffffff;
        }

        .restaurant-category span {
            color: #ffcc00;
            font-weight: bold;
        }

        /* فوتر */
        .footer {
            background-color: #1f1f1f;
            text-align: center;
            padding: 10px;
            position: relative;
            width: 100%;
            bottom: 0;
        }

        .footer p {
            margin: 0;
            color: #ffffff;
            font-size: 1rem;
        }

        /* ریسپانسیو برای صفحه‌های کوچکتر */
        @media (max-width: 768px) {
            .product-container {
                flex-direction: column;
                align-items: center;
            }

            .product-image {
                margin-right: 0;
            }

            .product-details {
                text-align: center;
            }
        }
    </style>
</head>
<body>
   
      <h3><a style="text-decoration: none; color: #ffaa00" href="{{ route('user') }}">صفحه اصلی</a></h3>
    
    <!-- هدر -->
    <header class="header">
        @foreach($restaurant as $rest)
         @if($rest->id == $food->restaurant_id)
        <h1>{{ $rest->name }}</h1>
        @endif
        @endforeach
    </header>

    <!-- نمایش اطلاعات محصول -->
    <div class="product-container">
        <!-- تصویر محصول -->
        <div class="product-image">
            <img src="{{ asset('img/'.$food->image) }}" alt="{{ $food->name }}">
        </div>

        <!-- جزئیات محصول -->
        <div class="product-details">
            <h2>{{ $food->name }}</h2>
            <p>{{ $food->description }}</p>
            <div class="price">{{ number_format($food->price) }} تومان</div>
                    <div style="margin-top: 40px;">
                    <a href="{{ route('basket.add', ['foods_id'=>$food->id ]) }}" class="add-to-cart-btn" style="text-decoration: none" onclick="addToCart()">افزودن به سبد خرید</a>
                    </div>
        </div>
    </div>

    <!-- اطلاعات رستوران و دسته‌بندی -->
    <div class="restaurant-category">
        <p>دسته‌بندی: <span>{{ $food->category_id }}</span></p>
        @foreach($restaurant as $item)
        @if( $food->restaurant_id == $item->id )
        <p>رستوران: <span>{{ $item->name }}</span></p>
       @endif
       @endforeach
       
    </div>

    <!-- فوتر -->
   

    <script>
        function addToCart() {
            // این تابع برای افزودن محصول به سبد خرید
            alert("محصول به سبد خرید اضافه شد!");
        }
    </script>

</body>
</html>
