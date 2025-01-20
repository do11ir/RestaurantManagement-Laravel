<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
            color: #000;
        }

        .sidebar {
            background-color: #f0f0f0;
            min-height: 100vh;
            padding: 15px;
        }

        .sidebar a {
            color: #000;
            text-decoration: none;
        }

        .sidebar a:hover {
            color: #e63946;
        }

        .content {
            padding: 20px;
        }

        .card {
            background-color: #c0c0c0;
            border: 1px solid #343a40;
        }

        .card-header {
            background-color: #b0b0b0;
            color: #f8f9fa;
        }

        .card-body {
            background-color: #ad2d2d;
            color: #f8f9fa;
        }

        .btn-primary {
            background-color: #ad2d2d;
            border-color: #e63946;
        }

        .btn-primary:hover {
            background-color: #c41630;
            border-color: #c41630;
        }

        .table {
            background-color: #c0c0c0;
            color: #000;
        }

        .table th, .table td {
            border-color: #c0c0c0;
        }

        .alert {
            color: #fff;
            background-color: #198754;
        }
    </style>
</head>
<body dir="rtl">
    @if ( Auth::user()->RoleAdmin == 'master')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 sidebar">
                    <div class="text-center mb-4">
                        <img src="{{ asset('profilePannel/img/pro.jpg') }}" class="rounded-circle mb-3" alt="Profile" width="100">
                        <h5>{{ Auth::user()->name }}</h5>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">داشبرد</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('addFood') }}">افزودن غذا</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reataurantFactors') }}">سفارش ها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('addCategory') }}">دسته بندی ها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('editUserInfo') }}"> تغییر اطلاعات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user') }}">خانه</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 content">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4>خوش آمدید, {{ Auth::user()->name }}</h4>
                        <a href="{{ route('logout') }}" class="btn btn-primary">خروج</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-header">
                                    اطلاعات 
                                </div>
                                <div class="card-body">
                                    @if($restaurant)
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
                                        <p><strong>نام:</strong> {{ $restaurant->name }}</p>
                                        <p><strong>آدرس:</strong> {{ $restaurant->restaurant_address }}</p>
                                        <p><strong>غذاها:</strong> {{ $counter }}</p>
                                        @foreach($NewAddress as $New)
                                            @if ($New->user_id == Auth::user()->id)
                                            <div style="display: flex; align-items: center;">
                                                <p class="m-2"><strong>آدرس:</strong> {{ $New->address }}</p>
                                                <a href="{{ route('deleteAddress' , ['id' => $New->id]) }}" class="btn btn-primary" >delete</a>
                                            </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="alert alert-danger text-center">
                                            اطلاعات رستوران وارد نشده
                                        </div>
                                        <a href="{{ route('editRestaurant') }}" class="btn btn-primary d-block mx-auto" style="width: fit-content;">Complete Info</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">پروفایل</div>
                                <div class="card-body">
                                    <p><strong>نام مدیر:</strong> {{ Auth::user()->name }}</p>
                                    <p><strong>آدرس:</strong> {{ Auth::user()->address }}</p>
                                    <p><strong>تلفن:</strong> {{ Auth::user()->phone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">غذاها</div>
                        <div class="card-body">
                            <table class="table table-bordered table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>تصویر</th>
                                        <th>نام</th>
                                        <th>جزییات</th>
                                        <th>موجودی</th>
                                        <th>وضعیت</th>
                                        <th>تغییر</th>
                                        <th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($food as $item)
                                        @if ($restaurant && $item->restaurant_id == $restaurant->id)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('img/'.$item->image) }}" alt="Food" style="width: 80px; height: 80px; object-fit: cover;">
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->entity }}</td>
                                                <td>
                                                    <span class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $item->status ? 'Available' : 'Unavailable' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('editFood', ['id' => $item->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('deleteFood', ['id' => $item->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @endif
    @if(Auth::user()->RoleAdmin == '')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 sidebar">
                    <div class="text-center mb-4">
                        <img src="{{ asset('profilePannel/img/pro.jpg') }}" class="rounded-circle mb-3" alt="Profile" width="100">
                        <h5>{{ Auth::user()->name }}</h5>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">داشبرد</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('editUserInfo') }}"> تغییر کاربر</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user') }}">خانه</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 content">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4>خوش آمدید, {{ Auth::user()->name }}</h4>
                        <a href="{{ route('logout') }}" class="btn btn-primary">خروج</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-header">
                                    اطلاعات کاربر 
                                </div>
                                <div class="card-body">
                                    @php
                                        $key = 0;
                                    @endphp
                                        @foreach ($factors as $key => $item)
                                        <input type="hidden" value=" {{ $key++ }} ">
                                        @endforeach
                                    
                                    
                                    @if ( !$key )
                                        <p class="m-2"><strong>تعداد سفارش ها:</strong> 0</h1>
                                    @else
                                        <p class="m-2"><strong>سفارش ها:</strong> {{$key+1}}</h1>
                                    @endif
                                        <p class="m-2"><strong>نقش:</strong> کاربر</p>
                                        <p class="m-2"><strong>آدرس:</strong> {{ Auth::user()->address }}</p>
                                        <p class="m-2"><strong> شماره تماس:</strong>{{ Auth::user()->phone }} </p>
                                    @foreach($NewAddress as $New)
                                        @if ($New->user_id == Auth::user()->id)
                                            <div style="display: flex; align-items: center;">
                                                <p class="m-2"><strong>Address:</strong> {{ $New->address }}</p>
                                                <a href="{{ route('deleteAddress' , ['id' => $New->id]) }}" class="btn btn-primary" >delete</a>
                                            </div>
                                        @endif
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">پروفایل</div>
                                <div class="card-body">
                                    <p><strong>نام مدیر:</strong> {{ Auth::user()->name }}</p>
                                    <p><strong>آدرس:</strong> {{ Auth::user()->address }}</p>
                                    <p><strong>شماره تماس:</strong> {{ Auth::user()->phone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header"> آخرین سفارش ها</div>
                        <div class="card-body">
                            <table class="table table-bordered table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>زمان</th>
                                        <th>نام رستوران </th>
                                        <th>وضعیت</th>
                                        <th>پرداخت</th>
                                        <th>مبلغ کل </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($factors as $item)
                                        
                                            <tr>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->restaurant_name }}</td>
                                                <td>{{ $item->admin_status }}</td>
                                                <td>Done </td>
                                                <td>{{ $item->totalPrice }}</td>
                                            </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @endif
</body>
</html>
