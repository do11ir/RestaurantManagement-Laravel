<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
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

    <div class="container mt-5">
        
        <a class="btn btn-primary" href="{{ route('admin') }}">بازگشت به پنل ادمین</a>
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

    </div>

    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr class="title-row">
                        <th>نام مشتری</th>
                        <th>جزییات</th>
                        <th> تلفت تماس</th>
                        <th> ایدی رستوران</th>
                        <th> آدرس تحویل</th>
                        <th> تاریخ سفارش</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                @foreach ($factor as $item)
                <tbody>
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->phoneNumber }}</td>
                        <td>{{ $item->restaurant_name }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                                <a href="{{ route('deleteFactorAdmin' , ['id' => $item->id]) }}" type="submit" style="background-color: #d81b1b" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
             
</body>
</html>
