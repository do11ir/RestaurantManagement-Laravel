<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #121212;
            color: #f8f9fa;
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
    </div>

    <div class="table__box">
        <table width="100%" class="table table-dark table-striped table-bordered">
            <thead>
                <tr class="title-row">
                    <th>Customer Name</th>
                    <th>Description</th>
                    <th>Phone Number</th>
                    <th>Delivery Address</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                    <th>Order Details</th>
                </tr>
            </thead>
            @foreach ($factors as $item)
                <tbody>
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->phoneNumber }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->admin_status }}</td>
                        <td><a class="btn btn-primary" href="{{ route('orderDetails', ['id' => $item->id]) }}">View Details</a></td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
             
</body>
</html>
