<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
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
<body dir="ltr">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit User</h2>
        <a class="btn btn-primary" href="{{ route('admin') }}">Back to Admin Panel</a>

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

        <form action="{{ route('updateUser') }}" method="POST" enctype="multipart/form-data" class="mt-3">
            <input type="hidden" name="id" value="{{ $user->id }}">
            @csrf 
            
            <div class="mb-3">
                <label for="name" class="form-label">User Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">User Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">User Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">User Address</label>
                <textarea id="address" name="address" class="form-control" rows="3">{{ $user->address }}</textarea>
            </div>

            <div class="mb-3">
                <label for="RoleAdmin" class="form-label">User Role</label>
                <select name="RoleAdmin" id="RoleAdmin" class="form-select">
                    <option value="{{ $user->RoleAdmin }}" selected>{{ $user->RoleAdmin }}</option>
                    <option value="">User</option>
                    <option value="master" {{ old('RoleAdmin') == 'master' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Update User</button>
        </form>
    </div>

</body>
</html>
