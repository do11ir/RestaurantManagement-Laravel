<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fff;
            color: #000;
        }

        .sidebar {
            background-color: #1c1c1c;
            min-height: 100vh;
            padding: 15px;
        }

        .sidebar a {
            color: #f8f9fa;
            text-decoration: none;
        }

        .sidebar a:hover {
            color: #e63946;
        }

        .content {
            padding: 20px;
        }

        .card {
            background-color: #1c1c1c;
            border: 1px solid #343a40;
        }

        .card-header {
            background-color: #343a40;
            color: #f8f9fa;
        }

        .card-body {
            background-color: #252a2e;
            color: #f8f9fa;
        }

        .btn-primary {
            background-color: #ad2d2d;
            border-color: #e63946;
        }

        .btn-primary:hover {
            background-color: #c41630;
            border-color: #c41630;
        }

        .table {
            background-color: #f0f0f0;
            color: #000;
        }

        .table th, .table td {
            border-color: #343a40;
        }

        .alert {
            color: #fff;
            background-color: #198754;
        }
    </style>
</head>
<body dir="rtl">

    <div class="container mt-5">
        <h2 class="text-center mb-4">افزودن دسته بندی</h2>
        <a class="btn btn-primary" href="{{ route('profile') }}">بازگشت به پروفایل </a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('insertCategory') }}" method="POST" enctype="multipart/form-data" class="p-4 shadow rounded">
            @csrf 
            
            <div class="mb-3">
                <label for="name" class="form-label"> نام دسته بندی</label>
                <input type="text" name="name" id="name" class="form-control"  required>
            </div>

            <input type="hidden" name="restaurant_id" value="{{ Auth::user()->id }}">
           
            <button type="submit" class="btn btn-primary w-100"> افزودن</button>
        </form>
    </div>

    <div class="table__box mt-3">
        <table width="100%" class="table table-dark table-striped table-bordered">
            <thead>
                <tr class="title-row">
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            @foreach ($category as $item)
            <tbody>
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route('editCategory' , ['id' => $item->id]) }}" style="background-color: #c9d81b" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('deleteCategory' , ['id' => $item->id]) }}" type="submit" style="background-color: #d81b1b" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
             
</body>
</html>
