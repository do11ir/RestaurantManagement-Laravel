<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سبد خرید</title>
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
@php
$restaurant_name = 'هیچکدام';
@endphp
    <!-- هدر -->
    <header class="header">
        <h1>سبد خرید شما</h1>
    </header>
    @if(session('success'))
            <div style="border-radius: 15px; height: 30px; width: 300px%;  background-color: rgb(39, 240, 79)" class="alert">
                {{ session('success') }}
            </div>
     @endif
    <!-- کانتینر سبد خرید -->
    <main class="cart-container">
        @php
        $total ='0';
        @endphp
        <!-- محصول 1 -->
        @foreach($food as $foodss)
            @foreach($products_baskets as $item)
               @if($foodss->id == $item->foods_id && $item->basket_id == $Basket->id)
            <div class="cart-item">
                <img src="{{ 'img/'.$foodss->image }}" alt="">
                <div class="cart-item-info">
                    <h2>{{ $foodss->name }}</h2>
                    <p>{{ $foodss->description }}</p>
                   @php
                     $restaurant_name =  $foodss->restaurant_id;
                   @endphp
                    <p>تعداد:  {{ $item->count}}</p>
                </div>
                <div class="cart-item-price">{{ $foodss->price }} تومان</div>
                @php 
                 $total = $foodss->price*$item->count + $total;
                @endphp
                    <a href="{{ route('deleteOrder' , ['id' => $item->id]) }}" style="border-radius: 15px;padding: 10px; background-color: red; color: #ffffff; text-decoration: none" type="submit">حذف</a>
                </div>
                   
                @endif
            @endforeach
        @endforeach
                   <h2> {{ $total }} مجموع قیمت</h2>
        <!-- دکمه ثبت سفارش -->
        <form action="{{ route('insertFactors') }}" method="post">
            @csrf
            <!-- فیلد نام -->
            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 8px; font-weight: bold; color: #ffcc00;">نام</label>
                <input type="text" id="name" value="{{ Auth::user()->name }}" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ffcc00; border-radius: 5px; background-color: #2b2b2b; color: #ffffff; font-size: 1rem;">
            </div>

            <!-- فیلد شماره تلفن -->
            <div style="margin-bottom: 20px;">
                <label for="phone" style="display: block; margin-bottom: 8px; font-weight: bold; color: #ffcc00;">شماره تلفن</label>
                <input type="text" id="phone" value="{{ Auth::user()->phone }}" name="phoneNumber" required style="width: 100%; padding: 10px; border: 1px solid #ffcc00; border-radius: 5px; background-color: #2b2b2b; color: #ffffff; font-size: 1rem;">
            </div>

            <!-- فیلد قیمت کل -->
           
                
                <input type="hidden" id="totalPrice" name="totalPrice" value="{{ $total }}" required style="width: 100%; padding: 10px; border: 1px solid #ffcc00; border-radius: 5px; background-color: #2b2b2b; color: #ffffff; font-size: 1rem;">
           

            <!-- فیلد آدرس -->
            <div style="margin-bottom: 20px;">
                <label for="address" style="display: block; margin-bottom: 8px; font-weight: bold; color: #ffcc00;">آدرس</label>
                <select id="address" name="address" required style="width: 100%; padding: 10px; border: 1px solid #ffcc00; border-radius: 5px; background-color: #2b2b2b; color: #ffffff; font-size: 1rem;">
                    <option value="" disabled selected>انتخاب آدرس</option>
                    @foreach($NewAddress as $item)
                        @if($item->user_id == Auth::user()->id)
                          <option value="{{ $item->address }}">{{ $item->address }}</option>
                        @endif
                    @endforeach
                    @if(Auth::user()->address)
                    <option value="{{ Auth::user()->address }}">{{ Auth::user()->address }}</option>
                    @endif
                    <!-- آدرس‌های بیشتر را می‌توانید به اینجا اضافه کنید -->
                </select>
            </div>
            

            <!-- فیلد توضیحات سفارش -->
            <div style="margin-bottom: 20px;">
                <label for="orderDescribtion" style="display: block; margin-bottom: 8px; font-weight: bold; color: #ffcc00;">توضیحات سفارش (اختیاری)</label>
                <textarea id="orderDescribtion" name="orderDescribtion" style="width: 100%; padding: 10px; border: 1px solid #ffcc00; border-radius: 5px; background-color: #2b2b2b; color: #ffffff; font-size: 1rem;" rows="3"></textarea>
            </div>

            <!-- فیلد نام رستوران -->
            <div style="margin-bottom: 20px;">
                <label for="restaurant_name" style="display: block; margin-bottom: 8px; font-weight: bold; color: #ffcc00;">نام رستوران</label>
                @foreach($restaurant as $restaurants)
                        @if($restaurants->id == $restaurant_name)
                            <p id="restaurant_name"  style="width: 100%; padding: 10px; border: 1px solid #ffcc00; border-radius: 5px; background-color: #2b2b2b; color: #ffffff; font-size: 1rem;">{{ $restaurants->name }}</p>
                            <input type="hidden" name="restaurant_name" value="{{ $restaurants->name }}">
                        @endif
                @endforeach
               
            </div>
                  <input type="hidden" name="basket_id" value="{{ $Basket->id }}">
            <!-- دکمه ارسال -->
            <button type="submit" style="width: 100%; padding: 15px; background-color: #ffcc00; color: #121212; font-size: 1rem; border: none; border-radius: 5px; cursor: pointer;">ثبت سفارش</button>
        </form>
    </main>

    <!-- فوتر -->

</body>
</html>
