<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جزئیات سفارشات</title>
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
                   
                    <th>شماره سفارش</th>
                    <th>نام غذا</th>
                    <th>تعداد</th>
                   
                   
                </tr>
            </thead>
            
            @foreach ($ProductsBasket as $item)
            <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    @foreach ($food as $foods)
                        @if ($foods->id == $item->foods_id)
                            <td>{{ $foods->name }}</td>
                        @endif
                    @endforeach
                    <td>{{ $item->count }}</td>
                </tr>
                <!-- تکرار ردیف‌های دیگر -->
            </tbody>
              
            @endforeach
        </table>
    </div>
             
</body>
</html>
