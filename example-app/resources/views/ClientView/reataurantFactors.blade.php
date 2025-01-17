<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت سفارشات</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body dir="rtl" class="bg-light">

    <div class="container mt-5">
        
                    @if(session('success'))
                      <div class="alert alert-success">
                            {{ session('success') }}
                       </div>
                    @endif

        <!-- نمایش پیام‌های خطا -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       
    </div>

    <div class="table__box">
        <table width="100%" class="table table-striped table-bordered">
            <thead>
                <tr class="title-row">
                   
                    <th>نام مشتری</th>
                    <th>توضیحات</th>
                    <th>شماره</th>
                    <th>ادرس مقصد</th>
                    <th>تاریخ سفارش</th>
                    <th>وضعیت سفارش</th>
                    <th> جزئیات سفارش</th>
                   
                </tr>
            </thead>
            
            @foreach ($factors as $item)
            <tbody>
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->phoneNumber }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->admin_status }}</td>
                    <td><a class="btn btn-primary" href="{{ route('orderDetails', ['id' => $item->id]) }}">مشاهده جزئیات </a></td>
                </tr>
                <!-- تکرار ردیف‌های دیگر -->
            </tbody>
              
            @endforeach
        </table>
    </div>
             
</body>
</html>
