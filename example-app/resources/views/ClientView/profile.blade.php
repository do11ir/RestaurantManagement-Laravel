
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
<title>پروفایل</title>    <link rel="stylesheet" href="{{ asset('profilePannel/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('profilePannel/css/responsive_991.css') }}" media="(max-width:991px)">
    <link rel="stylesheet" href="{{ asset('profilePannel/css/responsive_768.css') }}" media="(max-width:768px)">
    <link rel="stylesheet" href="{{ asset('profilePannel/css/font.css') }}">
    
</head>
<body>
    {{-- -----------------------------------------------------------------پنل مدیر رستوران-------------------------------------------------------- --}}
    @if ( Auth::user()->RoleAdmin == 'master')
<div class="sidebar__nav border-top border-left  ">
    <span class="bars d-none padding-0-18"></span>
    <a class="header__logo  d-none" href="https://netcopy.ir"></a>
    <div class="profile__info border cursor-pointer text-center">
        <div class="avatar__img"><img src="{{ asset('profilePannel/img/pro.jpg') }}" class="avatar___img">
            <input type="file" accept="image/*" class="hidden avatar-img__input">
            <div class="v-dialog__container" style="display: block;"></div>
            <div class="box__camera default__avatar"></div>
        </div>
        <span class="profile__name">کاربر : {{ Auth::user()->name }} </span>
    </div>

    <ul>
        <li class="item-li i-dashboard is-active"><a href="index.html">پیشخوان</a></li>
        <li class="item-li i-courses "><a href="{{ route('addFood') }}">اضافه کردن غذا</a></li>
        <li class="item-li i-dashboard "><a href="{{ route('reataurantFactors') }}"> سفارشات</a></li>
        <li class="item-li i-categories"><a href="{{ route('addCategory') }}">دسته بندی ها</a></li>
        <li class="item-li i-user__inforamtion"><a href="{{ route('editUserInfo') }}">ویرایش اطلاعات </a></li>
        <li class="item-li i-dashboard "><a href="{{ route('user') }}">صفحه اصلی</a></li>
    </ul>

</div>
<div class="content">
    <div class="header d-flex item-center bg-white width-100 border-bottom padding-12-30">
        <div class="header__right d-flex flex-grow-1 item-center">
            <span class="bars"></span>
            
        </div>
        <div class="header__left d-flex flex-end item-center margin-top-2">
            
           
            <a href="{{ route('logout') }}" class="logout" title="خروج">خروج</a>
        </div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="index.html" title="پیشخوان">پیشخوان</a></li>

          </ul>
         
    </div>
    <div class="main-content">
        
        <div class="row no-gutters font-size-13 margin-bottom-10">
            <div class="col-8 padding-20 bg-white margin-bottom-10 margin-left-10 border-radius-3">
                محل قرار گیری نمودار
               
                <h4>
                   
                       @if($restaurant)
                          <p><strong>نام رستوران:</strong> {{ $restaurant->name }}</p>
                          <p><strong>آدرس رستوران:</strong> {{ $restaurant->restaurant_address }}</p>
                          @foreach($NewAddress as $New)
                          @if ($New->user_id == Auth::user()->id)
                          <div style="display: flex; align-items: center; margin-bottom: 10px;">
                             <p style="margin: 0; font-size: 14px; color: #444;">
                                 <span>{{ $New->address }}</span>
                             </p>
                             <a href="{{ route('deleteAddress' , ['id' => $New->id]) }}" style="margin-left: 10px; background-color: red; color: white; border: none; padding: 2px 4px; border-radius: 5px; cursor: pointer; font-size: 10px;" >حذف</a>
                         </div>
                         
                          @endif
                         @endforeach
                        <h3><a href="{{ route('editUserInfo') }}" class="button" style="color: #77b8fd">ویرایش اطلاعات رستوران</a></h3>
                      @else
                       <div style="text-align: center;font-size: 15px; background-color: #ff0000; border-radius: 30px" >
                        <div>
                        <h1 style="color: #fff; padding: 5px">شما هنوز اطلاعات رستوران خود را وارد نکرده اید </h1> 
                    </div>
                </div>
                <div   style="border-radius: 20px ; margin-top: 20px ;background-size: 500px " >
                    <h2><a href="{{ route('editRestaurant') }}" type="button" style="color: #0962ce;font-size: 20px; text-align: center;  justify-content: center; display: flex;; ">تکمیل اطلاعات رستوران</a></h2>
                </div>
                    @endif
                 
                </h4>
                  @php
                      $counter =0;
                  @endphp
                @foreach ($food as $item)
                 @if($restaurant && $item->restaurant_id == $restaurant->id)
                     
                 @php
                     $counter++;
                 @endphp
               
                @endif
             @endforeach
             <h1>تعداد غذای رستوران: {{ $counter }}</h1>
            </div>
            <div class="col-4 info-amount padding-20 bg-white margin-bottom-12-p margin-bottom-10 border-radius-3">

                <p class="title icon-outline-receipt">نام مدیر رستوران</p>
                <p class="amount-show color-444"><span> {{ Auth::user()->name }} </span></p>
                <p class="title icon-sync">آدرس رستوران</p>
                <p class="amount-show color-444"><span> {{ Auth::user()->address }} </span></p>
                <p class="title icon-sync">شماره تماس رستوران</p>
                <p class="amount-show color-444"><span> {{ Auth::user()->phone }} </span></p>
                
               
            </div>
        </div>
        <div class="row bg-white no-gutters font-size-13">
            <div class="title__row">
                <p>سفارش های اخیر </p>
                <a class="all-reconcile-text margin-left-20 color-2b4a83">نمایش همه سفارش های این رستوران </a>
            </div>
           
                
           
            <div class="table__box">
                <table width="100%" class="table table-striped table-bordered">
                    <thead>
                        <tr class="title-row">
                            <th>تصویر غذا</th>
                            <th>نام غذا</th>
                            <th>توضیحات</th>
                            <th>موجودی</th>
                            <th>وضعیت موجودی</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    @foreach ($food as $item)
                     @if ($restaurant && $item->restaurant_id == $restaurant->id)
                    <tbody>
                        <tr>
                            <td>
                                <img src="{{ asset('img/'.$item->image) }}" alt="تصویر غذا" style="width: 100px; height: 100px; object-fit: cover;">
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->entity }}</td>
                            <td>
                                <select class="form-select">
                                    <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>موجود</option>
                                    <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>ناموجود</option>
                                </select>
                                
                            </td>
                            <td>
                                <a href="{{ route('editFood' , ['id' => $item->id]) }}" style="background-color: #c9d81b" class="btn btn-warning btn-sm">ویرایش</a>
                            </td>
                            <td>
                               
                                   
                                    <a href="{{ route('deleteFood' , ['id' => $item->id]) }}" type="submit" style="background-color: #d81b1b" class="btn btn-danger">حذف</a>
                                
                            </td>
                        </tr>
                        <!-- تکرار ردیف‌های دیگر -->
                    </tbody>
                      @endif
                    @endforeach
                    @if(session('success'))
                    <div style="border-radius: 15px; height: 30px; widows: 100%;  background-color: rgb(39, 240, 79)" class="alert">
                          {{ session('success') }}
                     </div>
                  @endif
                </table>
            </div>
        
    
        </div>
    </div>
</div>




{{-- -----------------------------------------------------------------پنل کاربر عادی-------------------------------------------------------- --}}
@elseif(Auth::user()->RoleAdmin == '')
<div class="sidebar__nav border-top border-left  ">
    <span class="bars d-none padding-0-18"></span>
    <a class="header__logo  d-none" href="https://netcopy.ir"></a>
    <div class="profile__info border cursor-pointer text-center">
        <div class="avatar__img"><img src="{{ asset('profilePannel/img/pro.jpg') }}" class="avatar___img">
            <input type="file" accept="image/*" class="hidden avatar-img__input">
            <div class="v-dialog__container" style="display: block;"></div>
            <div class="box__camera default__avatar"></div>
        </div>
        <span class="profile__name">کاربر : {{ Auth::user()->name }} </span>
    </div>

    <ul>
        <li class="item-li i-dashboard is-active"><a href="index.html">پیشخوان</a></li>
        <li class="item-li i-dashboard "><a href="{{ route('user') }}">صفحه اصلی</a></li>
        <li class="item-li i-user__inforamtion"><a href="{{ route('editUserInfo') }}">ویرایش اطلاعات کاربر</a></li>
    </ul>

</div>
<div class="content">
    <div class="header d-flex item-center bg-white width-100 border-bottom padding-12-30">
        <div class="header__right d-flex flex-grow-1 item-center">
            <span class="bars"></span>
            
        </div>
        <div class="header__left d-flex flex-end item-center margin-top-2">
            
           
            <a href="{{ route('logout') }}" class="logout" title="خروج">خروج</a>
        </div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="index.html" title="پیشخوان">پیشخوان</a></li>
          </ul>
         
    </div>
    <div class="main-content">
        
        <div class="row no-gutters font-size-13 margin-bottom-10">
            <div class="col-8 padding-20 bg-white margin-bottom-10 margin-left-10 border-radius-3">
                @php
                    $key = 0;
                @endphp
                    @foreach ($factors as $key => $item)
                    <input type="hidden" value=" {{ $key++ }} ">
                    @endforeach
                
                آمارها
                @if ( !$key )
                   <h1>تعداد سفارشات: 0</h1>
                   @else
                   <h1>تعداد سفارشات: {{ $key+1 }}</h1>
                @endif
               
                <br>
                <h3>نقش کاربر: کاربر عادی</h3>
            </div>
          
            <div class="col-4 info-amount padding-20 bg-white margin-bottom-12-p margin-bottom-10 border-radius-3">

                <p class="title icon-outline-receipt">نام کاربر</p>
                <p class="amount-show color-444"><span> {{ Auth::user()->name }} </span></p>
                <p class="title icon-sync">آدرس کاربر</p>
                <p class="amount-show color-444"><span> {{ Auth::user()->address }} </span></p>
                @foreach($NewAddress as $New)
                 @if ($New->user_id == Auth::user()->id)
                 <div style="display: flex; align-items: center; margin-bottom: 10px;">
                    <p style="margin: 0; font-size: 14px; color: #444;">
                        <span>{{ $New->address }}</span>
                    </p>
                    <a href="{{ route('deleteAddress' , ['id' => $New->id]) }}" style="margin-left: 10px; background-color: red; color: white; border: none; padding: 2px 4px; border-radius: 5px; cursor: pointer; font-size: 10px;" >حذف</a>
                </div>
                
                 @endif
                @endforeach
                <p class="title icon-sync">شماره تماس کاربر</p>
                <p class="amount-show color-444"><span> {{ Auth::user()->phone }} </span></p>
                
               
            </div>
        </div>
        <div class="row bg-white no-gutters font-size-13">
           
           
                
           
            <div class="table__box">
                <table width="100%" class="table table-striped table-bordered">
                    <thead>
                        <tr class="title-row">
                           
                            <th>تاریخ و ساعت</th>
                            <th>نام رستوران</th>
                            <th>وضعیت سفارش</th>
                            <th>وضعیت پرداخت</th>
                            <th>مجموع قیمت</th>
                        </tr>
                    </thead>
                    @foreach ($factors as $item)
                      
                    <tbody>
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->restaurant_name }}</td>
                            <td>{{ $item->admin_status }}</td>
                            <td>پرداخت شده </td>
                            <td>{{ $item->totalPrice }}</td>
                           
                        </tr>
                       
                    </tbody>
                    
                    @endforeach
                    @if(session('success'))
                    <div style="border-radius: 15px; height: 30px; widows: 100%;  background-color: rgb(39, 240, 79)" class="alert">
                          {{ session('success') }}
                     </div>
                  @endif
                </table>
            </div>
        
    
        </div>
    </div>
</div>

@endif
</body>
<script src="{{ asset('profilePannel/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('profilePannel/js/js.js') }}"></script>
</html>