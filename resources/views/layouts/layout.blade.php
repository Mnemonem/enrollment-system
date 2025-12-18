<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | EmotiLens</title>

    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #F5F7FA;
            font-family: 'Google Sans', sans-serif;
            margin: 0;
            color: #333;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: #FFFFFF;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 900;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 10px rgba(0,0,0,0.03);
            /* align-items: center; */
                
        }

        .sidebar-header {
            height: 80px;
            display: flex;
            align-items: center;
            padding-left: 50px;
            margin-bottom: 20px;
        }

        .brand-text {
            font-weight: 700;
            font-size: 1.3rem;
            letter-spacing: 0.5px;
        }

        .sidebar-menu a {
            color: #555;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: 0.2s;
        }

        .sidebar-menu a i {
            width: 25px;
            margin-right: 10px;
            font-size: 1.1rem;
            color: #888;
            align-items: center;
        }

        .sidebar-menu a:hover {
            background: #f4f4f4;
            color: #111;
        }

        .sidebar-menu a.active {
            background: #eaeaea;
            color: #000;
            font-weight: 600;
            border-right: 4px solid #555;
        }

        /* NAVBAR */
        .top-navbar {
            position: fixed;
            top: 0;
            left: 260px;
            right: 0;
            height: 80px;
            background: #F5F7FA;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 13px;
            z-index: 1000;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 10px;
            height: 100%;
        }

        .hamburger-btn { 
            width: 100%;
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            color: #333;
            
        }

        .company-logo {
            height: 40px;
            width: auto;
            object-fit: contain;
            margin-right: 10px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-info .name {
            font-weight: 600;
            font-size: 0.9rem;
            margin: 0;
        }

        .logout-link {
            font-size: 0.85rem;
            color: #666;
            text-decoration: none;
            margin-left: 20px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .logout-link:hover {
            color: #dc3545;
        }
        .logo-group{
            display: flex;
            align-items: center;
        }

        .content {
            margin-left: 260px;
            margin-top: 100px; 
            padding: 10px; 
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="sidebar-header">
        <div class="brand-text">EmotiLens</div>
    </div>

    <div class="sidebar-menu">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i> Dashboard
        </a>

        <a href="{{ route('mood.entry') }}" class="{{ request()->routeIs('mood.entry') ? 'active' : '' }}">
            <i class="fas fa-pen-nib"></i> Mood Entry
        </a>

        <a href="{{ route('mood.history') }}" class="{{ request()->routeIs('mood.history') ? 'active' : '' }}">
            <i class="fas fa-history"></i> Mood History
        </a>
    </div>
</div>

<!-- TOP NAVBAR -->
<div class="top-navbar">
    <div class="nav-left">
        <button class="hamburger-btn">
            <i class="fas fa-bars"></i>
        </button>

        <div class="d-flex align-items-center gap-2 logo-group">
            <img src="{{ asset('EmotiLens_Logo.png') }}" class="company-logo">
            <strong>EmotiLens</strong>
        </div>
    </div>

    <div class="d-flex align-items-center">
        <div class="user-profile">
            @if(Auth::user()->profile_photo_url ?? false)
                <img src="{{ Auth::user()->profile_photo_url }}" class="rounded-circle" width="40" height="40">
            @else
                <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center"
                     style="width:40px;height:40px;">
                    <i class="fas fa-user"></i>
                </div>
            @endif
            <div class="user-info">
                <p class="name">{{ Auth::user()->name ?? 'User' }}</p>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button class="btn btn-link logout-link p-0">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</div>

<!-- PAGE CONTENT -->
<div class="content">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
