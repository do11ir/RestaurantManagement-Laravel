<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دسته بندی رستوران</title>
    <style>
        /* استایل‌های عمومی */
        body {
            margin: 0;
            font-family: 'Vazir', sans-serif;
            background-color: #121212;
            color: #ffffff;
            line-height: 1.6;
        }

        h1, h3 {
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

        /* کانتینر منو */
        .menu-container {
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);  /* 3 غذا در یک ردیف */
            gap: 20px;
            margin-top: 20px;
        }

        /* استایل آیتم‌های منو */
        .menu-item {
            background-color: #1f1f1f;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .menu-item:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        /* تصویر غذا */
        .menu-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* عنوان غذا */
        .menu-item-title h3 {
            margin: 15px 0;
            color: #ffcc00;
            font-size: 1.4rem;
        }

        /* قیمت غذا */
        .menu-item-price {
            font-size: 1.2rem;
            color: #ffffff;
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
            .menu-container {
                grid-template-columns: repeat(2, 1fr);  /* 2 غذا در یک ردیف */
            }

            .menu-item img {
                height: 150px;  /* کاهش ارتفاع تصاویر در صفحه‌های کوچکتر */
            }
        }

        @media (max-width: 480px) {
            .menu-container {
                grid-template-columns: 1fr;  /* یک غذا در هر ردیف */
            }

            .menu-item img {
                height: 130px;  /* کاهش بیشتر ارتفاع تصاویر برای موبایل‌ها */
            }
        }

    </style>
</head>
<body>

    <!-- هدر -->
    <header class="header">
        <h1>{{ $category->name }}</h1>
    </header>

    <!-- کانتینر منو -->
    <main class="menu-container" id="menu-container">
        <!-- آیتم‌های منو -->
        @foreach($food as $foods)
         @if($foods->category_id == $category->name)
        <div class="menu-item">
            <img src="{{ asset('img/'. $foods->image) }}" alt="{{ $foods->name }}">
            <div class="menu-item-title">
                <h3>{{ $foods->name }}</h3>
            </div>
            <div class="menu-item-price">{{ number_format($foods->price) }} تومان</div>
        </div>
         @endif
        @endforeach
    </main>
</body>
</html>
