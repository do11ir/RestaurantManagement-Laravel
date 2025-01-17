<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
<body>
    @if ( Auth::user()->RoleAdmin == 'master')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 sidebar">
                    <div class="text-center mb-4">
                        <img src="{{ asset('profilePannel/img/pro.jpg') }}" class="rounded-circle mb-3" alt="Profile" width="100">
                        <h5>{{ Auth::user()->name }}</h5>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('addFood') }}">Add Food</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reataurantFactors') }}">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('addCategory') }}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('editUserInfo') }}">Edit Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user') }}">Home</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 content">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4>Welcome, {{ Auth::user()->name }}</h4>
                        <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-header">
                                    Restaurant Info
                                </div>
                                <div class="card-body">
                                    @if($restaurant)
                                    @php
                                        $counter =0;
                                    @endphp
                                    @foreach ($food as $item)
                                        @if($restaurant && $item->restaurant_id == $restaurant->id)  
                                        @php
                                            $counter++;
                                        @endphp
                                        @endif
                                    @endforeach
                                        <p><strong>Name:</strong> {{ $restaurant->name }}</p>
                                        <p><strong>Address:</strong> {{ $restaurant->restaurant_address }}</p>
                                        <p><strong>Foods:</strong> {{ $counter }}</p>
                                        @foreach($NewAddress as $New)
                                            @if ($New->user_id == Auth::user()->id)
                                            <div style="display: flex; align-items: center;">
                                                <p class="m-2"><strong>Address:</strong> {{ $New->address }}</p>
                                                <a href="{{ route('deleteAddress' , ['id' => $New->id]) }}" class="btn btn-primary" >delete</a>
                                            </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="alert alert-danger text-center">
                                            You haven't added your restaurant info yet.
                                        </div>
                                        <a href="{{ route('editRestaurant') }}" class="btn btn-primary d-block mx-auto" style="width: fit-content;">Complete Info</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">Profile</div>
                                <div class="card-body">
                                    <p><strong>Manager Name:</strong> {{ Auth::user()->name }}</p>
                                    <p><strong>Address:</strong> {{ Auth::user()->address }}</p>
                                    <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">Foods</div>
                        <div class="card-body">
                            <table class="table table-bordered table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Stock</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($food as $item)
                                        @if ($restaurant && $item->restaurant_id == $restaurant->id)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('img/'.$item->image) }}" alt="Food" style="width: 80px; height: 80px; object-fit: cover;">
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->entity }}</td>
                                                <td>
                                                    <span class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $item->status ? 'Available' : 'Unavailable' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('editFood', ['id' => $item->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('deleteFood', ['id' => $item->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @endif
    @if(Auth::user()->RoleAdmin == '')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 sidebar">
                    <div class="text-center mb-4">
                        <img src="{{ asset('profilePannel/img/pro.jpg') }}" class="rounded-circle mb-3" alt="Profile" width="100">
                        <h5>{{ Auth::user()->name }}</h5>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('editUserInfo') }}">Edit User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user') }}">Home</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 content">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4>Welcome, {{ Auth::user()->name }}</h4>
                        <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-header">
                                    User Info
                                </div>
                                <div class="card-body">
                                    @php
                                        $key = 0;
                                    @endphp
                                        @foreach ($factors as $key => $item)
                                        <input type="hidden" value=" {{ $key++ }} ">
                                        @endforeach
                                    
                                    
                                    @if ( !$key )
                                        <p class="m-2"><strong>Number of orders:</strong> 0</h1>
                                    @else
                                        <p class="m-2"><strong>Number of orders:</strong> {{$key+1}}</h1>
                                    @endif
                                        <p class="m-2"><strong>Rule:</strong> User</p>
                                        <p class="m-2"><strong>Address:</strong> {{ Auth::user()->address }}</p>
                                        <p class="m-2"><strong>Phone Number:</strong>{{ Auth::user()->phone }} </p>
                                    @foreach($NewAddress as $New)
                                        @if ($New->user_id == Auth::user()->id)
                                            <div style="display: flex; align-items: center;">
                                                <p class="m-2"><strong>Address:</strong> {{ $New->address }}</p>
                                                <a href="{{ route('deleteAddress' , ['id' => $New->id]) }}" class="btn btn-primary" >delete</a>
                                            </div>
                                        @endif
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header">Profile</div>
                                <div class="card-body">
                                    <p><strong>Manager Name:</strong> {{ Auth::user()->name }}</p>
                                    <p><strong>Address:</strong> {{ Auth::user()->address }}</p>
                                    <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">Recent Orders</div>
                        <div class="card-body">
                            <table class="table table-bordered table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Restaurant Name</th>
                                        <th>Status</th>
                                        <th>Payment</th>
                                        <th>Total Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($factors as $item)
                                        
                                            <tr>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->restaurant_name }}</td>
                                                <td>{{ $item->admin_status }}</td>
                                                <td>Done </td>
                                                <td>{{ $item->totalPrice }}</td>
                                            </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @endif
</body>
</html>
