@extends('layout.layout')
@section('content')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-lg navbar-white navbar-light">
    <!-- Brand -->
    <a class="navbar-brand" href="{{ route('admin') }}">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" height="30">
      رستوران شاندیز
    </a>
    <!-- Navbar toggle button for mobile view -->
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar links -->
    <div class="collapse navbar-collapse d-lg-none" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="{{ route('restaurantManage') }}" class="nav-link d-flex align-items-center">
            <i class="far fa-circle nav-icon mr-2"></i>
            <p class="mb-0">مدیریت رستوران ها</p>
            
    
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('userManage') }}" class="nav-link d-flex align-items-center">
            <i class="far fa-circle nav-icon mr-2"></i>
            <p class="mb-0">مدیریت کاربران</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('foodManage') }}" class="nav-link d-flex align-items-center">
            <i class="far fa-circle nav-icon mr-2"></i>
            <p class="mb-0">مدیریت غذا ها</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('categoryManage') }}" class="nav-link d-flex align-items-center">
            <i class="far fa-circle nav-icon mr-2"></i>
            <p class="mb-0">مدیریت دسته بندی ها</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('factorManage') }}" class="nav-link d-flex align-items-center">
            <i class="far fa-circle nav-icon mr-2"></i>
            <p class="mb-0">مدیریت سفارشات</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link d-flex align-items-center">
            <i class="far fa-circle nav-icon mr-2"></i>
            <p class="mb-0">خروج از حساب</p>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  
  <div class="content-wrapper d-flex flex-column flex-lg-row">
    <aside class="main-sidebar sidebar-dark-primary elevation-4 d-none d-lg-block">
      <!-- Brand Logo -->
      <a href="{{ route('admin') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">رستوران شاندیز</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block">Admin shayan</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  داشبورد اصلی
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('restaurantManage') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>مدیریت رستوران ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('foodManage') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>مدیریت غذا ها</p>
                  </a>
                </li>
                <li class="nav-item">
  
 
                  <a href="{{ route('userManage') }}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                    <p>مدیریت کاربران</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('categoryManage') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>مدیریت دسته بندی ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('factorManage') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>مدیریت سفارشات</p>
                  </a>
                </li>
               
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>خروج از حساب</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  
    <!-- Main content area -->
    <div class="content flex-fill">
      {{-- <img src="{{ asset('img/background-admin.png') }}" alt="Sample Image" class="img-fluid w-100 h-100"> --}}
    </div>
  </div>
  
  <!-- Include jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-ZvpUoO/+PpV5B+c5OU0TI7UR9s06MF0dXrB2ZXK1Q1HI5T92p5kfs6kZSl9lf7cv" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-B1Lc3Gz1Bbt1HLbOMIrtQ1HrsQ1T2T5iJz5D/nGECxPo9+1rEUL6EUrzFt1fmjGq" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4Ag4SOBOBcbw1p" crossorigin="anonymous"></script>
  <style>
    @media (max-width: 992px) {
      .content-wrapper {
        flex-direction: column;
      }
      .main-sidebar {
        display: none;
      }
      .content img {
        height: auto;
      }
    }
  </style>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-ZvpUoO/+PpV5B+c5OU0TI7UR9s06MF0dXrB2ZXK1Q1HI5T92p5kfs6kZSl9lf7cv" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-B1Lc3Gz1Bbt1HLbOMIrtQ1HrsQ1T2T5iJz5D/nGECxPo9+1rEUL6EUrzFt1fmjGq" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4Ag4SOBOBcbw1p" crossorigin="anonymous"></script>







