<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>افزودن غذا</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body dir="rtl" class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">افزودن غذای جدید</h2>
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

        <form action="{{ route('insertFood') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 shadow rounded">
            @csrf 
            
            <div class="mb-3">
                <label for="name" class="form-label">نام غذا</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="نام غذا را وارد کنید" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">تصویر غذا</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">وضعیت</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="1">موجود</option>
                    <option value="0">ناموجود</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="entity" class="form-label">تعداد</label>
                <input type="number" name="entity" id="entity" class="form-control" placeholder="تعداد را وارد کنید" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">توضیحات</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="توضیحات را وارد کنید" required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">قیمت</label>
                <input type="number" name="price" id="price" class="form-control" placeholder="قیمت را وارد کنید" required>
            </div>
              
            <div class="mb-3">
                <label for="status" class="form-label">دسته بندی</label>
                <select name="category_id" id="status" class="form-select" required>
                    @foreach ($category as $tem)
                        
                   
                    <option value="{{ $tem->name }}">{{ $tem->name }}</option>
                    @endforeach
                   
                </select>
            </div>

            <input type="hidden" name="restaurant_id" value="{{$restaurant->id }}">
           

            <button type="submit" class="btn btn-primary w-100">افزودن غذا</button>
        </form>
    </div>
             
</body>
</html>
