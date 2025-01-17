<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش اطلاعات</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body dir="rtl" class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">ویرایش اطلاعات</h2>
        <a  class="btn btn-primary" href="{{ route('profile') }}"> بازگشت به پروفایل  </a>
                    @if(session('success'))
                      <div class="alert alert-success">
                            {{ session('success') }}
                       </div>
                    @endif

        <!-- نمایش پیام‌های خطا -->
      
        <form action="{{ route('updateUserInfo') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 shadow rounded">
            @csrf 
               <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="mb-3">
                <label for="name" class="form-label">نام کاربر</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label for="entity" class="form-label">آدرس</label>
                <input type="text" name="address" id="entity" class="form-control" value="{{ $user->address }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">شماره تماس</label>
                <input type="text" name="phone" id="entity" class="form-control" value="{{ $user->phone }}" required>
                
            </div>

            <button type="submit" class="btn btn-primary w-100">ثبت تغییرات</button>
        </form>

        <form action="{{ route('newAddress') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 shadow rounded">
            @csrf 
               <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <div class="mb-3">
                <label for="entity" class="form-label">آدرس جدید </label>
                <input type="text" name="address" id="entity" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">ثبت تغییرات</button>
        </form>
        @if (Auth::user()->RoleAdmin == 'master')
        <form action="{{ route('updateRestaurantInfo') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 shadow rounded">
            @csrf 
               <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="mb-3">
                <label for="name" class="form-label">نام رستوران</label>
                <input type="text" name="name" id="name" class="form-control" 
                value="{{ $restaurant ? $restaurant->name : '' }}" required>


            </div>
            <div class="mb-3">
                <label for="entity" class="form-label">آدرس رستوران</label>
                <input type="text" name="restaurant_address" id="name" class="form-control" 
       value="{{ $restaurant ? $restaurant->restaurant_address : '' }}" required>

            </div>
            <input type="hidden" name="master_id" value="{{ Auth::user()->id }}">

            <button type="submit" class="btn btn-primary w-100">ثبت تغییرات</button>
        </form>

        <form action="{{ route('newAddress') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 shadow rounded">
            @csrf 
               <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <div class="mb-3">
                <label for="entity" class="form-label">آدرس جدید </label>
                <input type="text" name="address" id="entity" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">ثبت تغییرات</button>
        </form>

        @endif
    </div>
             
</body>
</html>
