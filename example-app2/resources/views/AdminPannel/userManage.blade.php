<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
</head>
<body dir="rtl">

    <h2 class="text-center mb-4">افزودن کاربر جدید</h2>
    <div class="container">
        <a class="btn btn-primary" href="{{ route('admin') }}">بازگشت به پنل ادمین</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Displaying error messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('insertUser') }}" method="POST" enctype="multipart/form-data">
            @csrf 
            <div class="mb-3">
                <label for="name" class="form-label">نام کاربر</label>
                <input type="text" name="name" id="name" class="form-control"  required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">تلفن تماس</label>
                <input type="text" name="phone" id="phone" class="form-control"  required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">ایمیل</label>
                <input type="email" name="email" id="email" class="form-control"  required>
            </div>
            <label for="address">آدرس</label>
            <textarea id="address" class="form-control" name="address"  required></textarea>

            <label for="password">رمز عبور</label>
            <input name="password" id="password" type="password" class="form-control" required>

            <label for="password_confirmation">تکرار رمزعبور</label>
            <input name="password_confirmation" id="password_confirmation"  type="password" class="form-control" required>
           
            <label>نقش</label>
            <select class="form-control" name="RoleAdmin" class="select">
                <option value="">کاربر</option>
                <option value="master" {{ old('RoleAdmin') == 'master' ? 'selected' : '' }}>مدیر رستوران</option>
            </select>
           
            <button type="submit" class="btn btn-primary w-100">افزودن</button>
        </form>
    </div>

    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr class="title-row">
                        <th>User Name</th>
                        <th>User Role</th>
                        <th>User Email</th>
                        <th>User Phone</th>
                        <th>User Address</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                @foreach ($user as $item)
                <tbody>
                    <tr>
                        <td>{{ $item->name }}</td>
                        @if($item->RoleAdmin == 'master')
                            <td>Restaurant Manager</td>
                        @elseif($item->RoleAdmin == 'admin')
                            <td>Admin</td>
                        @else
                            <td>Normal User</td>
                        @endif
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <a href="{{ route('editUser' , ['id' => $item->id]) }}" style="background-color: #c9d81b" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('deleteUser' , ['id' => $item->id]) }}" type="submit" style="background-color: #d81b1b" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
             
</body>
</html>
