<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Site</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffffff;
            color: #000;
        }
        header {
            background-color: #313131;
            padding: 1rem;
            color: #000;
        }
        .buy-basket {
            background-color: #b71c1c;
            color: #fff;
            padding: 0.5rem;
            text-align: center;
        }
        footer {
            background-color: #f0f0f0;
            padding: 1rem;
            text-align: center;
            
        }
        .hero {
            background: #ad2d2d ;
           
            color: #fff;
            padding: 1rem 1rem;
            text-align: center;
        }
        .section-title {
            margin-bottom: 1rem;
            text-align: right;
            color: #ad2d2d;
        }
        .section-title1 {
            margin-bottom: 1rem;
            text-align: right;
            color: #fff;
        }
        .category-card {
            background-color: #f0f0f0;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            margin-right: 1rem;
        }
        .restaurant-card, .food-card {
            background-color: #f0f0f0;
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
            background-color: #ad2d2d;
            border: none;
            color: #fff;
        }

        .flex-container {
        display: flex;
        flex-direction: row;
        }
    </style>
</head>
<body dir="rtl">
   
    <!-- Header -->
    <header class="d-flex justify-content-between align-items-center p-3 bg-danger text-white">
      <h1 class="mb-0">رستوران دال</h1>
      <div>
          @if(Auth::check())
              <!-- If user is logged in -->
              <a href="{{ route('profile') }}" class="btn btn-light me-2">داشبرد</a>
              <a href="{{ route('logout') }}" class="btn btn-outline-light"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">خروج</a>
              <!-- Logout Form -->
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          @else
              <a href="{{ route('login') }}" class="btn btn-outline-light">ورود</a>
              <a href="{{ route('register') }}" class="btn btn-outline-light">ثبت نام</a>
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
               <i class="fas fa-shopping-cart"></i>مشاهده سبد خرید
            </a>
         @else
            <h3 class="buy-basket">سبد خرید خالی است</h3>
         @endif
      @endif
   </div>

    <!-- Hero Section -->
   <div class="hero">
      <h2></h2>
      <p>خوش آمدید!</p>

      <!-- Categories Section -->
   <div class="container my-5" >
      <h2  class="section-title1">دسته بندی ها</h2>
      <div class="d-flex overflow-auto">
         @foreach ($category as $itemCategory)
            <div class="category-card">
               <a href="{{ route('singleCategory', ['id' => $itemCategory->id]) }}" type="button" class="btn btn-cherry w-100">{{ $itemCategory->name }}</a>
            </div>
         @endforeach
      </div>
  </div>
   </div>
   
   

  <!-- Foods Section -->
  <div class="container my-5">
      <h2 class="section-title">غذا ها</h2>
      <div class="row g-3">
         @foreach ($food as $item)
            <div class="col-md-2">
               <div class="card food-card">
                  <img src="{{ asset('img/' . $item->image) }}" alt="{{ $item->name }}">
                  <div class="food-card-body">
                     <h5>{{ $item->name }}</h5>
                     <h6>قیمت: {{ number_format($item->price) }}</h6>
                     <p>دسته بندی: {{ $item->category_id }}</p>
                     <a href="{{ route('singleFood' , ['id'=> $item->id]) }}" type="button" class="btn btn-cherry w-100">افزون به سبد خرید</a>
                     
                  </div>
               </div>
            </div>
                                   
         @endforeach
          
      </div>
   </div>

   

  <!-- Restaurants Section -->
  <div class="container my-5">
      <h2 class="section-title">رستوران ها</h2>
      <div class="row g-4">
         @foreach ($restaurant as $restaurants)
         <div class="col-md-3">
            <div class="card restaurant-card h-100 shadow-lg">
                <!-- <img src="{{ $restaurants->image_url ?? 'https://via.placeholder.com/300x200' }}" 
                     alt="{{ $restaurants->name }}" 
                     class="card-img-top" 
                     style="height: 200px; object-fit: cover;"> -->
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-center">{{ $restaurants->name }}</h5>
                    <p class="card-text text-muted text-center">{{ $restaurants->restaurant_address }}</p>
                    <a href="{{ route('singleRestaurant', ['id' => $restaurants->id]) }}" 
                       class="btn btn-cherry mt-auto"> مشاهده منو </a>
                </div>
            </div>
        </div>
         @endforeach
         
          
      </div>
  </div>

  

   
    
    <!-- Footer -->
    <footer>
    <img src="https://do11.ir/wp-content/uploads/2024/10/Do11-PNG.png" width="50px" alt="do11.ir">
        <p>&copy;طراحی و توسعه توسط تیم برنامه نویسی دال</p>
        
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
