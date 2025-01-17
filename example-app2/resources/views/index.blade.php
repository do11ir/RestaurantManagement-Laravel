<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Site</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #2e2e2e;
            color: #fff;
        }
        header {
            background-color: #d32f2f;
            padding: 1rem;
            color: #fff;
        }
        .buy-basket {
            background-color: #b71c1c;
            color: #fff;
            padding: 0.5rem;
            text-align: center;
        }
        footer {
            background-color: #424242;
            padding: 1rem;
            text-align: center;
        }
        .hero {
            background: #d32f2f url('https://via.placeholder.com/1920x500') no-repeat center;
            background-size: cover;
            color: #fff;
            padding: 3rem 1rem;
            text-align: center;
        }
        .section-title {
            margin-bottom: 1rem;
            text-align: center;
            color: #d32f2f;
        }
        .category-card {
            background-color: #424242;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            margin-right: 1rem;
        }
        .restaurant-card, .food-card {
            background-color: #424242;
            border: none;
            border-radius: 8px;
            overflow: hidden;
        }
        .restaurant-card img, .food-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .restaurant-card-body, .food-card-body {
            padding: 1rem;
        }
        .btn-cherry {
            background-color: #d32f2f;
            border: none;
            color: #fff;
        }
    </style>
</head>
<body>
   
    <!-- Header -->
    <header class="d-flex justify-content-between align-items-center p-3 bg-danger text-white">
      <h1 class="mb-0">Restaurant Site</h1>
      <div>
          @if(Auth::check())
              <!-- If user is logged in -->
              <a href="{{ route('profile') }}" class="btn btn-light me-2">Dashboard</a>
              <a href="{{ route('logout') }}" class="btn btn-outline-light"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
              <!-- Logout Form -->
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          @else
              <a href="{{ route('login') }}" class="btn btn-outline-light">login</a>
              <a href="{{ route('register') }}" class="btn btn-outline-light">register</a>
          @endif
      </div>
  </header>

    <!-- Buy Basket -->
    
   <div class="buy-basket">
        <!-- Buy Basket -->
      @if(Auth::user())
         @if($Basket)
            {{-- <h3 style="background-color: aliceblue"><a href="foodBasket">مشاهده سبد خرید</a></h3> --}}
            <a href="{{ route('foodBasket') }}" class="buy-basket">
               <i class="fas fa-shopping-cart"></i>View cart
            </a>
         @else
            <h3 class="buy-basket">cart is empty</h3>
         @endif
      @endif
   </div>

    <!-- Hero Section -->
   <div class="hero">
      <h2>Welcome to Our Restaurant</h2>
      <p>Delicious food, amazing restaurants, and much more!</p>
   </div>
   
   <!-- Categories Section -->
   <div class="container my-5">
      <h2 class="section-title">Categories</h2>
      <div class="d-flex overflow-auto">
         @foreach ($category as $itemCategory)
            <div class="category-card">
               <a href="{{ route('singleCategory', ['id' => $itemCategory->id]) }}" type="button" class="btn btn-cherry w-100">{{ $itemCategory->name }}</a>
            </div>
         @endforeach
      </div>
  </div>

  <!-- Restaurants Section -->
  <div class="container my-5">
      <h2 class="section-title">Restaurants</h2>
      <div class="row g-4">
         @foreach ($restaurant as $restaurants)
         <div class="col-md-4">
            <div class="card restaurant-card h-100 shadow-lg">
                <img src="{{ $restaurants->image_url ?? 'https://via.placeholder.com/300x200' }}" 
                     alt="{{ $restaurants->name }}" 
                     class="card-img-top" 
                     style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-center">{{ $restaurants->name }}</h5>
                    <p class="card-text text-muted text-center">{{ $restaurants->restaurant_address }}</p>
                    <a href="{{ route('singleRestaurant', ['id' => $restaurants->id]) }}" 
                       class="btn btn-cherry mt-auto"> Menu</a>
                </div>
            </div>
        </div>
         @endforeach
         
          
      </div>
  </div>

  <!-- Foods Section -->
   <div class="container my-5">
      <h2 class="section-title">Foods</h2>
      <div class="row g-4">
         @foreach ($food as $item)
            <div class="col-md-3">
               <div class="card food-card">
                  <img src="{{ asset('img/' . $item->image) }}" alt="{{ $item->name }}">
                  <div class="food-card-body">
                     <h5>{{ $item->name }}</h5>
                     <h6>price : {{ number_format($item->price) }}</h6>
                     <p>Category: {{ $item->category_id }}</p>
                     <a href="{{ route('singleFood' , ['id'=> $item->id]) }}" type="button" class="btn btn-cherry w-100">add to cart</a>
                     
                  </div>
               </div>
            </div>
                                   
         @endforeach
          
      </div>
   </div>

   
    
    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Restaurant Site. All Rights Reserved.</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
