<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
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
            background-color: #e63946;
            border-color: #e63946;
        }

        .btn-primary:hover {
            background-color: #c41630;
            border-color: #c41630;
        }

        .table {
            background-color: #1c1c1c;
            color: #f8f9fa;
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
<body dir="ltr">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Category</h2>
        <a class="btn btn-primary" href="{{ route('profile') }}"> Back to Profile </a>
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

        <form action="{{ route('updateCategory') }}" method="POST" enctype="multipart/form-data" class="p-4 shadow rounded">
            <input type="hidden" name="id" value="{{ $category->id }}">
            @csrf 
            
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
            </div>

            <input type="hidden" name="restaurant_id" value="{{ Auth::user()->id }}">

            <button type="submit" class="btn btn-primary w-100">Update Category</button>
        </form>
    </div>

</body>
</html>
