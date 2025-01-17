<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ6f+AZXkC6T6Cw7hfYIftysVveggt5e7eqYykHjvlg6gnj+v+9+eb3K5cQk" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/moment-jalaali@0.9.3/moment-jalaali.min.js"></script> <!-- Added Jalali library -->
    <style>
      body {
          background-color: #2b2b2b;
          color: white;
          font-family: Arial, sans-serif;
      }
      .sidebar {
          background-color: #333;
          height: 100vh;
          padding-top: 30px;
          position: fixed;
          width: 250px;
          left: 0;
          border-radius: 10px 0 0 10px;
      }
      .sidebar .nav-item {
          margin-bottom: 15px;
      }
      .sidebar .nav-item .nav-link {
          display: block;
          padding: 15px;
          border-radius: 10px;
          color: white;
          transition: background-color 0.3s ease, color 0.3s ease;
      }
      .sidebar .nav-item .nav-link:hover {
          background-color: #ff4d4d;
          color: white;
      }
      .navbar {
          background-color: #444;
          color: white;
          border-radius: 0 10px 10px 0;
          margin-left: 250px;
      }
      .card {
          background-color: #444;
          color: white;
          border: 1px solid #ff4d4d;
          margin-bottom: 20px;
          border-radius: 15px;
          padding: 20px; /* Added padding inside the card */
          transition: transform 0.3s ease;
      }
      .card:hover {
          transform: translateY(-5px);
          box-shadow: 0 4px 10px rgba(0,0,0,0.3);
      }
      .card-header {
          color: white;
          font-weight: bold;
          border-radius: 15px 15px 0 0;
      }
      .card-body {
          color: white;
      }
      .card-title {
          font-size: 1.5rem;
          font-weight: bold;
      }
      .live-time {
          color: #ff4d4d;
          font-size: 1.2rem;
      }
      .sidebar-header {
          text-align: center;
          margin-bottom: 30px;
      }
      .sidebar-header p {
          margin: 0;
          font-weight: bold;
          color: #ff4d4d;
      }
      .sidebar-header .live-time {
          font-size: 1rem;
      }
      .main-content {
          margin-left: 270px;
          padding: 20px;
      }
      .hint-text {
          font-size: 0.9rem;
          color: #bbb;
      }
      .row > .col-md-6 {
          margin-bottom: 20px;
      }
      .col-md-6, .col-12 {
          padding-left: 15px;
          padding-right: 15px;
      }
  </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <p>Welcome, {{ Auth::user()->name }}!</p>
            <div id="liveTime" class="live-time"></div>
            <div id="jalaliDate" class="live-time"></div> <!-- Added Jalali date element -->
        </div>

        <div class="nav-item">
            <a href="{{ route('restaurantManage') }}" class="nav-link">Restaurant Management</a>
        </div>
        <div class="nav-item">
            <a href="{{ route('userManage') }}" class="nav-link">User Management</a>
        </div>
        <div class="nav-item">
            <a href="{{ route('foodManage') }}" class="nav-link">Food Management</a>
        </div>
        <div class="nav-item">
            <a href="{{ route('categoryManage') }}" class="nav-link">Category Management</a>
        </div>
        <div class="nav-item">
            <a href="{{ route('factorManage') }}" class="nav-link">Order Management</a>
        </div>
        <div class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">Logout</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h3 class="navbar-brand" href="#">Admin Panel</h3>
        <div class="container-fluid">
            <div class="row">
                <!-- User Count Card -->
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            Users Count
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $userCount }}</h5>
                            <p class="hint-text">This represents the total number of registered users in the system.</p>
                        </div>
                    </div>
                </div>

                <!-- Factor Count Card -->
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            Orders Count
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $factorCount }}</h5>
                            <p class="hint-text">This shows the number of orders processed by the system.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Restaurant Count Card -->
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            Restaurants Count
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $restaurantCount }}</h5>
                            <p class="hint-text">This indicates how many restaurants are listed in the system.</p>
                        </div>
                    </div>
                </div>

                <!-- Food Count Card -->
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            Food Items Count
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $foodCount }}</h5>
                            <p class="hint-text">The total number of food items available in the system.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Live time
        function updateTime() {
            const timeElement = document.getElementById('liveTime');
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            timeElement.textContent = `${hours}:${minutes}:${seconds}`;
        }

        // Jalali Date
        function updateJalaliDate() {
            const dateElement = document.getElementById('jalaliDate');
            const now = moment();  // Using moment-jalaali
            const jalaliDate = now.format('jYYYY/jMM/jDD') + ' - ' + now.format('dddd');
            dateElement.textContent = jalaliDate;
        }

        setInterval(updateTime, 1000);
        setInterval(updateJalaliDate, 1000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybIYz0p6P0p/WeI2jC2j6FZBf3v5z5TOc3mb7ug2VdD2b6Jlm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-KyZXEJ6f+AZXkC6T6Cw7hfYIftysVveggt5e7eqYykHjvlg6gnj+v+9+eb3K5cQk" crossorigin="anonymous"></script>
</body>
</html>
