<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<style>
    /* Custom Styles */
    body {
            background-color: #fff;
            color: black;
            font-family: 'Arial', sans-serif;
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            max-width: 900px;
            margin-top: 30px;
            padding: 20px;
            background-color: #c1c1c1;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        /* Buttons */
        .btn-primary {
            background-color: #ad2d2d;
            border: none;
            color: white;
        }

    .btn-primary:hover {
        background-color: #ff3333;
    }

    .btn-warning {
        background-color: #c9d81b;
        border: none;
        color: white;
    }

    .btn-warning:hover {
        background-color: #a5c618;
    }

    .btn-danger {
        background-color: #d81b1b;
        border: none;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c21515;
    }

    /* Input and Form Styles */
    .form-control {
            background-color: #fff;
            color: #000;
            border: 1px solid #444;
            border-radius: 8px;
            font-size: 16px;
        }

    .form-control:focus {
        background-color: #444;
        border-color: #ff4d4d;
        outline: none;
    }

    /* Alerts */
    .alert-success {
        background-color: #4caf50;
        color: white;
    }

    .alert-danger {
        background-color: #f44336;
        color: white;
    }

</style>
<body dir="rtl">

    <div class="container">
        <h2 class="text-center mb-4">افزودن غذای جدید</h2>
        <a class="btn btn-primary" href="{{ route('admin') }}">بازگشت به پنا ادمین</a>
                    @if(session('success'))
                      <div class="alert alert-success">
                            {{ session('success') }}
                       </div>
                    @endif

        <!-- Display error messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('insertFoodAdmin') }}" method="POST" enctype="multipart/form-data">
            @csrf 
            
            <div class="mb-3">
                <label for="name" class="form-label">نام </label>
                <input type="text" name="name" id="name" class="form-control"  required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">تصویر </label>
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
                <input type="number" name="entity" id="entity" class="form-control"  required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">جزییات</label>
                <textarea name="description" id="description" class="form-control" rows="4"  required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">قیمت</label>
                <input type="number" name="price" id="price" class="form-control"  required>
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
            
            <button type="submit" class="btn btn-primary w-100">افزودن</button>
        </form>
    </div>

    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr class="title-row">
                        <th>تصویر</th>
                        <th>نام </th>
                        <th>جزییات</th>
                        <th>تعداد</th>
                        <th>ایدی رستوران</th>
                        <th>تغییر</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                @foreach ($food as $item)
                <tbody>
                    <tr>
                        <td>
                            <img src="{{ asset('img/'.$item->image) }}" alt="Food Image" style="width: 100px; height: 100px; object-fit: cover;">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->entity }}</td>
                        <td>{{ $item->restaurant_id }}</td>
                        <td>
                            <a href="{{ route('editFoodAdmin' , ['id' => $item->id]) }}" style="background-color: #c9d81b" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                                <a href="{{ route('deleteFoodAdmin' , ['id' => $item->id]) }}" type="submit" style="background-color: #d81b1b" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
                
            </table>
        </div>
    </div>
             
</body>
</html>
