<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت رستوران ها</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body dir="rtl" class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">افزودن رستوران جدید</h2>
        <a  class="btn btn-primary" href="{{ route('admin') }}"> بازگشت به پنل ادمین  </a>
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
        <form action="{{ route('insertRestaurants') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 shadow rounded">
            @csrf 
            
            <div class="mb-3">
                <label for="name" class="form-label">نام رستوران</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="نام رستوران را وارد کنید" required>
            </div>
            <label for="restaurant_address">آدرس رستوران</label>
            <textarea id="restaurant_address" style="width: 100%; height: 80px; border-radius: 8px; padding: 5px; margin: 5px" name="restaurant_address" placeholder="آدرس رستوران را وارد کنید" required></textarea>

            <input type="hidden" name="master_id" value="{{ Auth::user()->id }}">
            <button type="submit" class="btn btn-primary w-100">افزودن رستوران</button>
        </form>
    </div>

    <div class="table__box">
        <table width="100%" class="table table-striped table-bordered">
            <thead>
                <tr class="title-row">
                  
                    <th>نام رستوران</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
            </thead>
            @foreach ($restaurant as $item)
            <tbody>
                <tr>
                   
                    <td>{{ $item->name }}</td>
                    </td>
                    <td>
                        <a href="{{ route('editRestaurants' , ['id' => $item->id]) }}" style="background-color: #c9d81b" class="btn btn-warning btn-sm">ویرایش</a>
                    </td>
                    <td>
                        <a href="{{ route('deleteRestaurants' , ['id' => $item->id]) }}" type="submit" style="background-color: #d81b1b" class="btn btn-danger">حذف</a>
                    </td>
                </tr>
                <!-- تکرار ردیف‌های دیگر -->
            </tbody>
            @endforeach
           
        </table>
    </div>
             
</body>
</html>
