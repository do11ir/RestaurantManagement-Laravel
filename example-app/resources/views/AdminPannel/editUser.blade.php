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
        <h2 class="text-center mb-4">ویرایش کاربر </h2>
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
        <form action="{{ route('updateUser') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 shadow rounded">
            <input type="hidden" name="id" value="{{ $user->id }}">
            @csrf 
            <div class="mb-3">
                <label for="name" class="form-label">نام کاربران</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">شماره کاربر</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">ایمیل کاربر</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <label for="address">آدرس کاربر</label>
            <textarea id="address" style="width: 100%; height: 80px; border-radius: 8px; padding: 5px; margin: 5px" name="address">{{ $user->address }}</textarea>
               
            <select style="height: 30px; width: 120px;" name="RoleAdmin" class="select">
                <option value="{{ $user->RoleAdmin }}">{{ $user->RoleAdmin }}</option>
                <option value="">کاربر</option>
                <option value="master" {{ old('RoleAdmin') == 'master' ? 'selected' : '' }}>مدیر</option>
            </select>
           
            <button type="submit" class="btn btn-primary w-100">ویرایش کاربر</button>
        </form>
    </div>

</body>
</html>
