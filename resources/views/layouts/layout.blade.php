<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f5f6fa; }
        .sidebar { width: 260px; background: #1f1f1f; min-height: 100vh; position: fixed; }
        .sidebar a { color: #fff; padding: 14px 20px; display: block; text-decoration: none; }
        .sidebar a:hover { background: #333; }
        .content { margin-left: 260px; padding: 30px; }
        .card-custom { border-radius: 20px; padding: 25px; }
        .card-custom:hover { transform: translateY(-4px); transition: 0.2s; }
        #profiles{
            
        }
    </style>
</head>
<body>
<div class="sidebar">
    <h4 class="text-white text-center py-4">EmotiLens</h4>

    <a href="#profile">Profile</a>
    <a href="#subjects">Subject Listings</a>
    <a href="#enrollment">Enrollment Form</a>
    <a href="#payments">Payment Module</a>
    <a href="#schedule">Class Schedule</a>
    <a href="#grades">Grades Viewing</a>
      <div class="d-flex justify-content-center mb-lg-4">
        <!-- LOGOUT HANDLING ROUTE -->
         <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Logout sa ta dams</button>
        </form>
    </div>
</div>
</body>
</html>
