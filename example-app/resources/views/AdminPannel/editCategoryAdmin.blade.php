<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش دسته بندی ها</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body dir="rtl" class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">ویرایش دسته بندی ها</h2>
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

        <form action="{{ route('updateCategoryAdmin') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 shadow rounded">
            <input type="hidden" name="id" value="{{ $category->id }}">
            @csrf 
            
            <div class="mb-3">
                <label for="name" class="form-label">نام دسته بندی</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
            </div>
           

            <button type="submit" class="btn btn-primary w-100">ویرایش دسته بندی</button>
        </form>
    </div>

   
             
</body>
</html>
