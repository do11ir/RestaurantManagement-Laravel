<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fff;
            color: #000;
        }

        .bg-dark-custom {
            background-color: #f0f0f0;
        }

        .form-container {
            background-color: #c1c1c1;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #ad2d2d;
            border-color: #e63946;
        }

        .btn-primary:hover {
            background-color: #c41630;
            border-color: #c41630;
        }

        .alert-success {
            background-color: #198754;
            color: #fff;
        }
    </style>
</head>
<body dir="rtl">

    <div class="container mt-5">
        <!-- Header -->
        <header class="text-center mb-4">
            <h2> تغییر اطلاعات</h2>
            <a href="{{ route('profile') }}" class="btn btn-primary"> بازگشت به پروفایل</a>
        </header>

        <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- User Information Update Section -->
        <section class="mb-4">
            <h3 class="mb-3">تغییر</h3>
            <form action="{{ route('updateUserInfo') }}" method="POST" enctype="multipart/form-data" class="form-container">
                @csrf 
                <input type="hidden" name="id" value="{{ $user->id }}">

                <div class="mb-3">
                    <label for="name" class="form-label"> نام کاربری</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">آدرس</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">شماره تماس</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">ذخیره</button>
            </form>
        </section>

        <!-- New Address Section -->
        <section class="mb-4">
            <h3 class="mb-3">افزودن آدرس جدید</h3>
            <form action="{{ route('newAddress') }}" method="POST" enctype="multipart/form-data" class="form-container">
                @csrf 
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                <div class="mb-3">
                    <label for="new_address" class="form-label">آدرس</label>
                    <input type="text" name="address" id="new_address" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">افزودن</button>
            </form>
        </section>

        <!-- Admin Section for Restaurant Information -->
        @if (Auth::user()->RoleAdmin == 'master')
        <section class="mb-4">
            <h3 class="mb-3">اطلاعات رستوران</h3>
            <form action="{{ route('updateRestaurantInfo') }}" method="POST" enctype="multipart/form-data" class="form-container">
                @csrf 
                <input type="hidden" name="id" value="{{ $user->id }}">

                <div class="mb-3">
                    <label for="restaurant_name" class="form-label">نام رستوران</label>
                    <input type="text" name="name" id="restaurant_name" class="form-control" 
                    value="{{ $restaurant ? $restaurant->name : '' }}" required>
                </div>

                <div class="mb-3">
                    <label for="restaurant_address" class="form-label">آدرس رستوران</label>
                    <input type="text" name="restaurant_address" id="restaurant_address" class="form-control" 
                    value="{{ $restaurant ? $restaurant->restaurant_address : '' }}" required>
                </div>

                <input type="hidden" name="master_id" value="{{ Auth::user()->id }}">

                <button type="submit" class="btn btn-primary w-100">ذخیره</button>
            </form>
        </section>
        @endif
    </div>

</body>
</html>
