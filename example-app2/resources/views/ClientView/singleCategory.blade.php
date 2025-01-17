<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #2e2e2e;
            color: #ffffff;
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

        /* Menu Container */
        .menu-container {
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);  /* 3 items per row */
            gap: 20px;
            margin-top: 20px;
        }

        /* Menu Item Styles */
        .menu-item {
            background-color: #424242;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .menu-item:hover {
            transform: scale(1.01);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        /* Food Image */
        .menu-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* Food Title */
        .menu-item-title h3 {
            margin: 15px 0;
            color: #ffcc00;
            font-size: 1.4rem;
        }

        /* Food Price */
        .menu-item-price {
            font-size: 1.2rem;
            color: #ffffff;
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

        .btn-cherry {
            background-color: #d32f2f;
            border: none;
            color: #fff;
        }
        
        .btn-cherry:hover {
            background-color: #ed5c5c;
            transform: scale(1.01);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }
        /* Responsive Design for Smaller Screens */
        @media (max-width: 768px) {
            .menu-container {
                grid-template-columns: repeat(2, 1fr);  /* 2 items per row */
            }

            .menu-item img {
                height: 150px;  /* Reduce image height for smaller screens */
            }
        }

        @media (max-width: 480px) {
            .menu-container {
                grid-template-columns: 1fr;  /* 1 item per row for mobile */
            }

            .menu-item img {
                height: 130px;  /* Further reduce image height for mobile */
            }
        }

    </style>
</head>
<body>

    <!-- Header Section -->
    <header class="header">
        <h1>{{ $category->name }}</h1>
    </header>

    <!-- Menu Container -->
    <main class="menu-container" id="menu-container">
        <!-- Menu Items -->
        @foreach($food as $foods)
            @if($foods->category_id == $category->name)  <!-- Updated condition to match category ID -->
            <div class="menu-item">
                <img src="{{ asset('img/'. $foods->image) }}" alt="{{ $foods->name }}">
                <div class="menu-item-title">
                    <h3>{{ $foods->name }}</h3>
                </div>
                <div class="menu-item-price">{{ number_format($foods->price) }}</div>
                <a href="{{ route('singleFood' , ['id'=> $foods->id]) }}" type="button" class="btn btn-cherry w-100">add to cart</a>
            </div>
            @endif
        @endforeach
    </main>

   

</body>
</html>
