<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت غذا</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body dir="rtl" class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">افزودن غذای جدید</h2>
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

        <form action="{{ route('insertFoodAdmin') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 shadow rounded">
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

            <input type="hidden" name="restaurant_id" value="{{ Auth::user()->id }}">
            
           

            <button type="submit" class="btn btn-primary w-100">افزودن غذا</button>
        </form>
    </div>

    <div class="table__box">
        <table width="100%" class="table table-striped table-bordered">
            <thead>
                <tr class="title-row">
                    <th>تصویر غذا</th>
                    <th>نام غذا</th>
                    <th>توضیحات</th>
                    <th>موجودی</th>
                    <th>آیدی رستوران</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
            </thead>
            @foreach ($food as $item)
            <tbody>
                <tr>
                    <td>
                        <img src="{{ asset('img/'.$item->image) }}" alt="تصویر غذا" style="width: 100px; height: 100px; object-fit: cover;">
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->entity }}</td>
                    <td>{{ $item->restaurant_id }}</td>
                    <td>
                        <a href="{{ route('editFoodAdmin' , ['id' => $item->id]) }}" style="background-color: #c9d81b" class="btn btn-warning btn-sm">ویرایش</a>
                    </td>
                    <td>
                            <a href="{{ route('deleteFoodAdmin' , ['id' => $item->id]) }}" type="submit" style="background-color: #d81b1b" class="btn btn-danger">حذف</a>
                    </td>
                </tr>
                <!-- تکرار ردیف‌های دیگر -->
            </tbody>
              
            @endforeach
            @if(session('success'))
            <div style="border-radius: 15px; height: 30px; widows: 100%;  background-color: rgb(39, 240, 79)" class="alert">
                  {{ session('success') }}
             </div>
          @endif
        </table>
    </div>
             
</body>
</html>
