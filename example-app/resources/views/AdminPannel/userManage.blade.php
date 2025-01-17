<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت کاربران</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body dir="rtl" class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">افزودن کاربر جدید</h2>
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
        <form action="{{ route('insertUser') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 shadow rounded">
            @csrf 
            <div class="mb-3">
                <label for="name" class="form-label">نام کاربران</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="نام کاربر را وارد کنید" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">شماره کاربر</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder=" شماره کاربر را وارد کنید" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">ایمیل کاربر</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="ایمیل کاربر را وارد کنید" required>
            </div>
            <label for="address">آدرس کاربر</label>
            <textarea id="address" style="width: 100%; height: 80px; border-radius: 8px; padding: 5px; margin: 5px" name="address" placeholder="آدرس کاربر را وارد کنید" required></textarea>
        
            <input name="password" placeholder="رمز عبور" type="password" class="input" style="width: 300px;height: 60px;border-radius: 10px" required>
                <br>
                <br>
            <input name="password_confirmation" placeholder="تایید رمز عبور" type="password" class="input" style="width: 300px;height: 60px;border-radius: 10px" required>
                <br>
                <br>


               
            <select style="height: 30px; width: 120px;" name="RoleAdmin" class="select">
                <option value="">کاربر</option>
                <option value="master" {{ old('RoleAdmin') == 'master' ? 'selected' : '' }}>مدیر</option>
            </select>
           
            <button type="submit" class="btn btn-primary w-100">افزودن کاربر</button>
        </form>
    </div>

    <div class="table__box">
        <table width="100%" class="table table-striped table-bordered">
            <thead>
                <tr class="title-row">
                  
                    <th>نام کاربر</th>
                    <th>نقش کاربر</th>
                    <th>ایمیل کاربر</th>
                    <th>شماره کاربر</th>
                    <th>آدرس کاربر</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
            </thead>
            @foreach ($user as $item)
            <tbody>
                <tr>
                   
                    <td>{{ $item->name }}</td>
                            @if($item->RoleAdmin == 'master')
                                <td>مدیر رستوران</td>
                                @elseif($item->RoleAdmin == 'admin')
                                <td>ادمین</td>
                            @else
                            <td>کاربر عادی</td>
                            @endif
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->address }}</td>
                    <td>
                        <a href="{{ route('editUser' , ['id' => $item->id]) }}" style="background-color: #c9d81b" class="btn btn-warning btn-sm">ویرایش</a>
                    </td>
                    <td>
                        <a href="{{ route('deleteUser' , ['id' => $item->id]) }}" type="submit" style="background-color: #d81b1b" class="btn btn-danger">حذف</a>
                    </td>
                </tr>
                <!-- تکرار ردیف‌های دیگر -->
            </tbody>
            @endforeach
           
        </table>
    </div>
             
</body>
</html>
