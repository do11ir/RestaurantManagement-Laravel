<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Food</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Custom Styles */
        body {
            background-color: #2b2b2b; /* Dark Gray background */
            color: white; /* White text color */
            font-family: 'Arial', sans-serif;
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }

        .container {
            max-width: 900px;
            margin-top: 30px;
            padding: 20px;
            background-color: #333; /* Dark Gray background for container */
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        .btn-primary {
            background-color: #ff4d4d; /* Cherry Red button */
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background-color: #ff3333;
        }

        .form-control {
            background-color: #444; /* Dark Gray input */
            color: white;
            border: 1px solid #555;
            border-radius: 8px;
            font-size: 16px;
        }

        .form-control:focus {
            background-color: #555;
            border-color: #ff4d4d; /* Cherry Red focus border */
            outline: none;
        }

        .form-select {
            background-color: #444; /* Dark Gray select */
            color: white;
            border: 1px solid #555;
            border-radius: 8px;
        }

        .form-select:focus {
            background-color: #555;
            border-color: #ff4d4d; /* Cherry Red focus border */
        }

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
<body dir="ltr">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Food</h2>
        <a class="btn btn-primary" href="{{ route('admin') }}"> Back to Admin Panel </a>
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

        <form action="{{ route('updateFoodAdmin') }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf 
            <input type="hidden" name="id" value="{{ $food->id }}">
            
            <div class="mb-3">
                <label for="name" class="form-label">Food Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $food->name }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Food Image</label>
                <input type="file" name="image" id="image" value="{{ $food->image }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="1">Available</option>
                    <option value="0">Not Available</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="entity" class="form-label">Quantity</label>
                <input type="number" name="entity" id="entity" class="form-control" value="{{ $food->entity }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ $food->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $food->price }}" required>
            </div>
              
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    @foreach($category as $categories)
                    <option value="{{ $categories->name }}">{{ $categories->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Update Food</button>
        </form>
    </div>
             
</body>
</html>
