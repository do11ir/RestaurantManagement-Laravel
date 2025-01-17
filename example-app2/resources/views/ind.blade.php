<!DOCTYPE html>
<html lang="fa">
<head>
  <title>Dine Out - Restaurant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
  <link rel="stylesheet" href="{{asset('css/style.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>

    <!-- page loader start-->
    <div class="page-loader"></div>
    <!-- page loader end-->

    <!-- header start -->
    <header class="header">
      <div class="container">
        <div class="row justify-content-between aling-items-center">
          <div class="logo">
            <a href="{{ route('user') }}"><img src="{{ asset('img/logo.png') }}" alt="logo"></a>
            @if(Auth::user())
              @if($Basket)
            {{-- <h3 style="background-color: aliceblue"><a href="foodBasket">مشاهده سبد خرید</a></h3> --}}
              <a href="{{ route('foodBasket') }}" class="cart-link">
                <i class="fas fa-shopping-cart"></i> سبد خرید
              </a>
              @else
                <h3 style="background-color: aliceblue"><a href="#"> سبد خرید شما خالی است</a></h3>
              @endif
            @endif
          </div>
                @if(session('success'))
                      <div class="alert alert-success" style="background-color: green ; height: 30px; border-radius: 15px;">
                            {{ session('success') }}
                      </div>
                @endif
          <button type="button" class="nav-toggler">
            <span></span>
          </button>
          <nav class="nav">
            <ul>
              <li class="nav-item"><a href="#home">خانه</a></li>
              <li class="nav-item"><a href="#about">درباره ما</a></li>
              <li class="nav-item"><a href="#our-menu">منو غذا</a></li>
              <li class="nav-item"><a href="#testimonials">توضیحات</a></li>
              <li class="nav-item"><a href="#team">تیم</a></li>
              <li class="nav-item"><a href="#footer">ارتباط</a></li>
              @if (Auth::user())
              <li class="nav-item"><a href="{{ route('logout') }}">خروج</a></li>
              <li class="nav-item"><a href="{{ route('profile') }}">پروفایل</a></li>
              @else
              <li class="nav-item"><a href="{{ route('login') }}">ورود</a></li>
              @endif
              
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <!-- header end -->
   
    <!-- home section start -->
    <section class="home-section" id="home">
      <div class="home-bg"></div>
      <div class="container">
        <div class="row min-vh-100 aling-items-center">
          <div class="home-text" data-aos="fade-up" data-aos-duration="1000">
            <h1>رستوران داین آوت</h1>
<p>
  بزرگ ترین رستوران آنلاین در ایران با صدها رستوران و کاربر آماده سرویس دهی به شماست. هیچ غذایی نیست که در داین آوت پیدا نشه هیچ کیفیتی نیست از داین آوت بهتر باشه
</p>    
        <a href="#our-menu" class="btn btn-default">منو غذاها</a>
          </div>
        </div>
      </div>
    </section>
    <!-- home section end -->

    <!-- about section start -->
    <section class="about-section sec-padding" id="about">
      <div class="container">
        <div class="row">
          <div class="section-title">
            <h2 data-title="داستان ما" data-aos="fade-up">درباه ما</h2>
          </div>
        </div>
        <div class="row">
          <div class="about-text" data-aos="fade-left">
            <h3>خوش آمدید به رستوران داین آوت </h3>
            <p>
               
            </p>
            <p>
              لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد 
            </p>
            <a href="our-menu" class="btn btn-default">منو غذاها</a>
          </div>
          <div class="about-img" data-aos="fade-right">
            <div class="img-box">
              <h3>20 سال سابقه </h3>
              <img src="{{ asset('img/about-img.jpg') }}" alt="about img">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- about section end -->

    <!-- menu section start -->
    <section class="menu-section sec-padding" id="our-menu">
      <div class="container">
        <div class="row">
          <div class="section-title">
            <h2 data-title="اکنون سفارش دهید" data-aos="fade-up">منوی غذاها</h2>
          </div>
        </div>
    
        @if (Auth::user())
          <div class="row">
            <div class="menu-tabs" data-aos="fade-up">
              {{-- <button type="button"  data-target="#all">همه</button> --}}
              <button type="button" class="menu-tab-item"> همه دسته بندی ها:</button>
              @foreach ($category as $itemCategory)
                <a href="{{ route('singleCategory', ['id' => $itemCategory->id]) }}" type="button" class="menu-tab-item">{{ $itemCategory->name }}</a>
              @endforeach
            </div>
          </div>

          <div class="row">
            <div class="menu-tabs" data-aos="fade-up">
              <button type="button" class="menu-tab-item"> همه رستوران ها:</button>
              @foreach ($restaurant as $restaurants)
                <a href="{{ route('singleRestaurant', ['id' => $restaurants->id]) }}" type="button" class="menu-tab-item">{{ $restaurants->name }}</a>
              @endforeach
            </div>
          </div>
    
          <!-- همه غذاها -->
          <div class="row menu-tab-content active" id="all">
            @foreach ($food as $item)
           
              <div class="menu-item" data-aos="{{ $loop->iteration % 2 == 0 ? 'fade-up-right' : 'fade-up-left' }}">
                <div class="menu-item-title">
                  <img src="{{ asset('img/' . $item->image) }}" alt="{{ $item->name }}">
                  {{-- <a href="{{ route('basket.add', ['foods_id'=>$item->id ]) }}"  > خرید</a> --}}
                  <a href="{{ route('singleFood' , ['id'=> $item->id]) }}"> <h3>{{ $item->name }}</h3></a>
                </div>
                <div class="menu-item-price">
                  {{ number_format($item->price) }} تومان
                </div>
              </div>
              
                                        
            @endforeach
           
          </div>
    
          <!-- غذاها بر اساس دسته‌بندی -->
          
            <div class="row menu-tab-content" id="{{ $itemCategory->name }}">
              @foreach ($food as $item)
                @if ($item->category_id == $itemCategory->name)
                  <div class="menu-item" data-aos="{{ $loop->iteration % 2 == 0 ? 'fade-up-right' : 'fade-up-left' }}">
                    <div class="menu-item-title">
                      <img src="{{ asset('img/' . $item->image) }}" alt="{{ $item->name }}">
                      <h3>{{ $item->name }}</h3>
                    </div>
                    <div class="menu-item-price">
                      {{ number_format($item->price) }} تومان
                    </div>
                  </div>
                @endif
              @endforeach
            </div>
          
        @else
          <div style="text-align: center">
            <h2>برای مشاهده منو لطفا ورود کنید</h2>
            <a href="{{ route('login') }}" class="btn btn-default">ورود به سایت</a>
            <a href="{{ route('register') }}" class="btn btn-default">ثبت نام</a>
          </div>
        @endif
      </div>
    </section>
         
    <!-- menu section end -->

    <!-- testimonials section strart-->
    <section class="testimonials-section sec-padding" id="testimonials">
      <div class="container">
        <div class="row">
          <div class="section-title">
            <h2 data-aos="fade-up" data-title="توصیفات">نظرات مشتریان</h2>
          </div>
        </div>
        <div class="row">
          <div class="testi-item" data-aos="zoom-in">
            <div class="testi-author">
              <div class="testi-author-name">
                <h3>نسرین مولایی</h3>
                <span>متخصص غذا</span>
              </div>
              <div class="testi-author-img">
                <img src="{{ asset('img/testimonials/1.jpg') }}" alt="testi author img">
              </div>
            </div>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است </p>
            <div class="ratings">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <div class="testi-item" data-aos="zoom-in">
            <div class="testi-author">
              <div class="testi-author-name">
                <h3>آنوشا رضایی</h3>
                <span>متخصص غذا</span>
              </div>
              <div class="testi-author-img">
                <img src="{{ asset('img/testimonials/2.jpg') }}" alt="testi author img">
              </div>
            </div>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است </p>
            <div class="ratings">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <div class="testi-item" data-aos="zoom-in">
            <div class="testi-author">
              <div class="testi-author-name">
                <h3>عرفان محمدی</h3>
                <span>متخصص غذا</span>
              </div>
              <div class="testi-author-img">
                <img src="{{ asset('img/testimonials/3.jpg') }}" alt="testi author img">
              </div>
            </div>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است </p>
            <div class="ratings">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- testimonials section end-->

    <!-- team section start -->
    <section class="team-section sec-padding" id="team">
      <div class="container">
        <div class="row">
          <div class="section-title">
            <h2 data-aos="fade-up" data-title="تیم">سرآشپزهای ما</h2>
          </div>
        </div>
        <div class="row">
          <div class="team-item" data-aos="flip-left" data-aos-duration="1000">
            <img src="{{ asset('img/team/1.jpg') }}" alt="team item">
            <div class="team-item-info">
              <h3>ارشین حمتی</h3>
              <p>سر آشپز</p>
            </div>
          </div>
          <div class="team-item" data-aos="flip-left" data-aos-duration="1000">
            <img src="{{ asset('img/team/2.jpg') }}" alt="team item">
            <div class="team-item-info">
              <h3>پیمان خردمند</h3>
              <p>سر آشپز</p>
            </div>
          </div>
          <div class="team-item" data-aos="flip-left" data-aos-duration="1000">
            <img src="{{ asset('img/team/3.jpg') }}" alt="team item">
            <div class="team-item-info">
              <h3>سارا رمضانزاده</h3>
              <p>سر آشپز</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- team section end -->

    <!-- footer start-->
    <footer class="footer" id="footer">
      <div class="container">
        <div class="row">
          <div class="footer-item" data-aos="fade-up">
            <h3>آدرس ما</h3>
            <p>مشهد , پدیده شاندیز , <br>خیابان ابریشم - پلاک 15</p>
          </div>
          <div class="footer-item" data-aos="fade-up">
            <h3>ساعت کار</h3>
            <p>شنبه تا جمعه <br> از 10 صبح تا 10 شب</p>
          </div>
          <div class="footer-item" data-aos="fade-up">
            <h3>راه های ارتباطی</h3>
            <p>09351234567</p>
            <p>info@gmail.com</p>
            <div class="social-links">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="copyright">
            &copy; 2021 - طراحی شده توسط ShayanWebMaster
          </div>
        </div>
      </div>
    </footer>
    <!-- footer end-->

<script src="{{ asset('js/aos.js') }}"></script> 
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

