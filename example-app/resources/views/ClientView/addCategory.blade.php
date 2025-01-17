<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>افزودن دسته بندی</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body dir="rtl" class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">افزودن دسته بندی جدید</h2>
        <a  class="btn btn-primary" href="{{ route('profile') }}"> بازگشت به پروفایل  </a>
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

        <form action="{{ route('insertCategory') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 shadow rounded">
            @csrf 
            
            <div class="mb-3">
                <label for="name" class="form-label">نام دسته بندی</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="نام دسته بندی را وارد کنید" required>
            </div>

            <input type="hidden" name="restaurant_id" value="{{ Auth::user()->id }}">
           

            <button type="submit" class="btn btn-primary w-100">افزودن دسته بندی</button>
        </form>
    </div>

    <div class="table__box">
        <table width="100%" class="table table-striped table-bordered">
            <thead>
                <tr class="title-row">
                  
                    <th>نام دسته بندی</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
            </thead>
            @foreach ($category as $item)
            <tbody>
                <tr>
                   
                    <td>{{ $item->name }}</td>
                    </td>
                    <td>
                        <a href="{{ route('editCategory' , ['id' => $item->id]) }}" style="background-color: #c9d81b" class="btn btn-warning btn-sm">ویرایش</a>
                    </td>
                    <td>
                       
                           
                            <a href="{{ route('deleteCategory' , ['id' => $item->id]) }}" type="submit" style="background-color: #d81b1b" class="btn btn-danger">حذف</a>
                        
                    </td>
                </tr>
                <!-- تکرار ردیف‌های دیگر -->
            </tbody>
            @endforeach
           
        </table>
    </div>
             
</body>
</html>
