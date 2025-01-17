<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رستوران </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        /* استایل‌های عمومی */
        body {
            margin: 0;
            font-family: 'Vazir', sans-serif;
            background-color: #121212;
            color: #ffffff;
            line-height: 1.6;
        }

        h1, h2 {
            margin: 0;
            text-align: center;
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

        /* کانتینر سبد خرید */
        .cart-container {
            padding: 20px;
            max-width: 900px;
            margin: 0 auto;
        }

        /* لیست محصولات */
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1f1f1f;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .cart-item:hover {
            background-color: #2b2b2b;
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .cart-item-info {
            flex: 2;
            margin-right: 15px;
            text-align: right;
        }

        .cart-item-info h2 {
            color: #ffcc00;
            font-size: 1.4rem;
        }

        .cart-item-info p {
            font-size: 1rem;
            color: #ffffff;
        }

        .cart-item-price {
            font-size: 1.2rem;
            color: #ffffff;
            margin-left: 15px;
        }

        .cart-item button {
            background-color: #ff4d4d;
            color: #ffffff;
            border: none;
            padding: 8px 12px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .cart-item button:hover {
            background-color: #ff1a1a;
        }
/* ظاهر کلی لینک سبد خرید */
.cart-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 20px;
    background-color: #fff; /* رنگ سفید */
    color: #333; /* رنگ متن */
    font-size: 16px;
    font-weight: bold;
    text-decoration: none; /* حذف خط زیر */
    border: 2px solid #333; /* حاشیه */
    border-radius: 50px; /* گرد کردن گوشه‌ها */
    transition: all 0.3s ease; /* انیمیشن تغییر حالت */
}

/* آیکون داخل لینک */
.cart-link i {
    margin-right: 8px; /* فاصله بین آیکون و متن */
    font-size: 18px;
}

/* حالت هاور */
.cart-link:hover {
    background-color: #333; /* تغییر رنگ پس‌زمینه */
    color: #fff; /* تغییر رنگ متن */
    border-color: #333; /* تغییر رنگ حاشیه */
}

/* حالت فعال */
.cart-link:active {
    transform: scale(0.95); /* انیمیشن کوچک شدن */
}

        /* دکمه ثبت سفارش */
        .checkout-btn {
            display: block;
            width: 100%;
            text-align: center;
            background-color: #ffcc00;
            color: #121212;
            padding: 15px 0;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .checkout-btn:hover {
            background-color: #ffaa00;
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

        /* ریسپانسیو */
        @media (max-width: 768px) {
            .cart-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .cart-item img {
                margin-bottom: 10px;
            }

            .cart-item-info {
                margin-right: 0;
            }

            .cart-item-price {
                margin-left: 0;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- هدر -->
    <header class="header">
        <h1>{{ $restaurant->name }}</h1>
    </header>
    @if(session('success'))
            <div style="border-radius: 15px; height: 30px; width: 300px%;  background-color: rgb(39, 240, 79)" class="alert">
                {{ session('success') }}
            </div>
     @endif
    <!-- کانتینر سبد خرید -->
    <main class="cart-container">
        <!-- محصول 1 -->
        @foreach($food as $foodss)
               @if($foodss->restaurant_id == $restaurant->id)
            <div class="cart-item">
                <img src="{{ asset                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  ('img/'.$foodss->image) }}" alt="">
                <div class="cart-item-info">
                    <h2>{{ $foodss->name }}</h2>
                    <p>{{ $foodss->description }}</p>
                </div>
                <div class="cart-item-price">{{ $foodss->price }} تومان</div>
                {{-- <a href="{{ route('basket.add', ['foods_id'=>$foodss->id ]) }}"  > خرید</a> --}}
                <a href="{{ route('basket.add', ['foods_id' => $foodss->id]) }}" class="cart-link">
                    <i class="fas fa-shopping-cart"></i> خرید
                </a>
                
                </div>
                @endif
        @endforeach
    </main>

</body>
</html>
