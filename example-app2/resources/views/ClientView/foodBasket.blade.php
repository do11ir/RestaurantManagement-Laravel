<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #2e2e2e;
            color: #fff;
            line-height: 1.6;
        }

        h1, h2 {
            margin: 0;
            text-align: center;
        }

        /* Header */
        .header {
            background-color: #D32F2F;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            font-size: 2rem;
            color: #fff;
        }

        /* Cart Container */
        .cart-container {
            padding: 20px;
        }

        /* Cart Item */
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #424242;
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
            color: #fff;
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

        /* Checkout Button */
        .checkout-btn {
            display: block;
            width: 100%;
            text-align: center;
            background-color: #D32F2F;
            color: #fff;
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
            background-color: #C62828;
        }

        /* Modal */
        .modal-content {
            background-color: #424242;
            padding: 20px;
            border-radius: 8px;
        }

        .modal-content input, .modal-content select, .modal-content textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #D32F2F;
            border-radius: 5px;
            background-color: #2b2b2b;
            color: #fff;
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .modal-content button {
            width: 100%;
            padding: 15px;
            background-color: #D32F2F;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
        }

        .modal-content button:hover {
            background-color: #C62828;
        }

        /* Footer */
        .footer {
            background-color: #424242;
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

        /* Alert Style */
        .alert-success {
            background-color: darkgreen;
            color: #fff;
            padding: 10px;
            border-radius: 15px;
            width: auto;
            max-width: 300px;
            margin: 20px auto;
            text-align: center;
        }
        .btn-cherry {
            background-color: #d32f2f;
            border: none;
            color: #fff;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Shopping Cart</h1>
    </header>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @php
        $total = 0;
    @endphp
    @php
    $restaurant_name = 'none';
    @endphp
    <div class="container cart-container">
        <h2>Items in Your Cart</h2>

        @foreach($food as $foodss)
            @foreach($products_baskets as $item)
                @if($foodss->id == $item->foods_id && $item->basket_id == $Basket->id)
                    <div class="cart-item d-flex align-items-center justify-content-between">
                        <img src="{{ 'img/'.$foodss->image }}" class="img-fluid" alt="Food Image">
                        <div class="cart-item-info text-end">
                            <h2>{{ $foodss->name }}</h2>
                            <p>{{ $foodss->description }}</p>
                            @php
                                $restaurant_name =  $foodss->restaurant_id;
                            @endphp
                            <p>Quantity: {{ $item->count }}</p>
                        </div>
                        <div class="cart-item-price">{{ $foodss->price }}</div>
                        @php 
                            $total += $foodss->price * $item->count;
                        @endphp
                        <a href="{{ route('deleteOrder', ['id' => $item->id]) }}" class="btn btn-cherry">Remove</a>
                    </div>
                @endif
            @endforeach
        @endforeach

        <h2>Total Price: {{ number_format($total) }}</h2>
        <button class="checkout-btn" id="openModalBtn">Proceed to Checkout</button>
    </div>

    <!-- Modal for Checkout Form -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('insertFactors') }}" method="post">
                    @csrf
                    <h2>Checkout</h2>
    
                    <!-- Name -->
                    <div style="margin-bottom: 20px;">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required>
                    </div>
    
                    <!-- Phone Number -->
                    <div style="margin-bottom: 20px;">
                        <label for="phone" >Phone Number</label>
                        <input type="text" id="phone" name="phoneNumber" value="{{ Auth::user()->phone }}" required >
                    </div>
                    
                    <!-- Total Price -->
                    <input type="hidden" id="totalPrice" name="totalPrice" value="{{ $total }}" required>
                    <input type="hidden" id="totalPrice" name="restaurant_name" value="{{ $total }}" required>
                   
                    <!-- Address -->
                    <div style="margin-bottom: 20px;">
                        <label for="address" >Address</label>
                        <select id="address" name="address" required >
                            <option value="" disabled selected>Select Address</option>
                            @foreach($NewAddress as $item)
                                @if($item->user_id == Auth::user()->id)
                                    <option value="{{ $item->address }}">{{ $item->address }}</option>
                                @endif
                            @endforeach
                            @if(Auth::user()->address)
                                <option value="{{ Auth::user()->address }}">{{ Auth::user()->address }}</option>
                            @endif
                        </select>
                    </div>
    
                    <!-- Order Description -->
                    <div style="margin-bottom: 20px;">
                        <label for="orderDescribtion">Order Description (Optional)</label>
                        <textarea id="orderDescribtion" name="orderDescribtion" ></textarea>
                    </div>

                    <!-- فیلد نام رستوران -->
                    <div style="margin-bottom: 20px;">
                        <label for="restaurant_name">restaurant</label>
                        @foreach($restaurant as $restaurants)
                                @if($restaurants->id == $restaurant_name)
                                    <p id="restaurant_name">{{ $restaurants->name }}</p>
                                    <input type="hidden" name="restaurant_name" value="{{ $restaurants->name }}">
                                @endif
                        @endforeach
                    
                    </div>
                    <input type="hidden" name="basket_id" value="{{ $Basket->id }}">
    
                    <!-- Submit Order Button -->
                    <button type="submit" class="checkout-btn">Submit Order</button>
                </form>
    
                <button type="button" class="btn btn-danger mt-3 w-100" id="closeModalBtn">Close</button>
            </div>
        </div>
    </div>
    

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        // Open the modal
        document.getElementById('openModalBtn').onclick = function() {
            var myModal = new bootstrap.Modal(document.getElementById('checkoutModal'));
            myModal.show();
        }

        // Close the modal
        document.getElementById('closeModalBtn').onclick = function() {
            var myModal = new bootstrap.Modal(document.getElementById('checkoutModal'));
            myModal.hide();
        }
    </script>
</body>
</html>
