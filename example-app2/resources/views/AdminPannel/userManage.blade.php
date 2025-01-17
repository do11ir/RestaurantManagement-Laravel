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
<body dir="ltr">

    <div class="container">
        <h2 class="text-center mb-4">Add New User</h2>
        <a class="btn btn-primary" href="{{ route('admin') }}">Return to Admin Panel</a>
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
                <label for="name" class="form-label">User Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter user name" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">User Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter user phone number" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">User Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter user email" required>
            </div>
            <label for="address">User Address</label>
            <textarea id="address" class="form-control" name="address" placeholder="Enter user address" required></textarea>

            <label for="password">Password</label>
            <input name="password" id="password" placeholder="Password" type="password" class="form-control" required>

            <label for="password_confirmation">Password Confirmation</label>
            <input name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" type="password" class="form-control" required>
           
            <label>Role</label>
            <select class="form-control" name="RoleAdmin" class="select">
                <option value="">User</option>
                <option value="master" {{ old('RoleAdmin') == 'master' ? 'selected' : '' }}>Restaurant Manager</option>
            </select>
           
            <button type="submit" class="btn btn-primary w-100">Add User</button>
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
