<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
    <!-- Add Bootstrap 4 or 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            background-color: #2b2b2b;
            color: white;
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
            background-color: #444;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        /* Buttons */
        .btn-primary {
            background-color: #ff4d4d;
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
            background-color: #333;
            color: white;
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
<body>

    <!-- Main Container -->
    <div class="container">
        <h2>Add New Category</h2>
        <a class="btn btn-primary mb-3" href="{{ route('admin') }}">Back to Admin Panel</a>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Add Category Form -->
        <form action="{{ route('insertCategoryAdmin') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" required>
            </div>

            <input type="hidden" name="restaurant_id" value="{{ Auth::user()->id }}">

            <button type="submit" class="btn btn-primary w-100">Add New Category</button>
        </form>
    </div>

    <!-- Categories Table -->
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ route('editCategoryAdmin', ['id' => $item->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('deleteCategoryAdmin', ['id' => $item->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
