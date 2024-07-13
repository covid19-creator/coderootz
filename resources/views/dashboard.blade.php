<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        .main-content {
            flex: 1;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            transition: transform 0.3s ease;
            transform: translateX(-100%);
        }
        .sidebar.show {
            transform: translateX(0);
        }
        .content {
            flex: 1;
            padding: 20px;
            transition: margin-left 0.3s ease;
            margin-left: 0;
        }
        .content.shifted {
            margin-left: 250px;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header class="navbar navbar-light bg-light p-3">
        <div class="container-fluid d-flex align-items-center">
            <button class="navbar-toggler" type="button" id="sidebarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand ms-3" href="#">Kodsozluk</a>
            <div class="user-role ms-auto">{{ strtoupper(auth()->user()->role[0]) }}</div> <!-- Displaying the first letter of the user role in uppercase -->
        </div>
    </header>

    <div class="main-content">
        <!-- Sidebar Section -->
        <div class="sidebar bg-light" id="sidebar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 p-3">
                <li class="nav-item"><a class="nav-link" href="{{route 'user_management'}}" data-bs-toggle="collapse">User Management</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route 'role_management'}}" data-bs-toggle="collapse">Role Management</a></li>
                <li class="nav-item"><a class="nav-link" href="#menu3" data-bs-toggle="collapse">Menu 3</a></li>
                <li class="nav-item"><a class="nav-link" href="#menu4" data-bs-toggle="collapse">Menu 4</a></li>
                <li class="nav-item"><a class="nav-link" href="#menu5" data-bs-toggle="collapse">Menu 5</a></li>
                <li class="nav-item"><a class="nav-link" href="#menu6" data-bs-toggle="collapse">Menu 6</a></li>
                <li class="nav-item"><a class="nav-link" href="#menu7" data-bs-toggle="collapse">Menu 7</a></li>
                
            </ul>
        </div>

        <!-- Main Content Section -->
        <div class="content" id="content">
            <div class="collapse" id="menu1">
                <h2>Menu 1 Content</h2>
                <p>This is the content for menu 1.</p>
            </div>
            <div class="collapse" id="menu2">
                <h2>Menu 2 Content</h2>
                <p>This is the content for menu 2.</p>
            </div>
            <div class="collapse" id="menu3">
                <h2>Menu 3 Content</h2>
                <p>This is the content for menu 3.</p>
            </div>
            <div class="collapse" id="menu4">
                <h2>Menu 4 Content</h2>
                <p>This is the content for menu 4.</p>
            </div>
            <div class="collapse" id="menu5">
                <h2>Menu 5 Content</h2>
                <p>This is the content for menu 5.</p>
            </div>
            <div class="collapse" id="menu6">
                <h2>Menu 6 Content</h2>
                <p>This is the content for menu 6.</p>
            </div>
            <div class="collapse" id="menu7">
                <h2>Menu 7 Content</h2>
                <p>This is the content for menu 7.</p>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-light text-center text-lg-start mt-auto">
        <div class="container p-4">
            <p class="text-center">&copy; 2024 Kodsozluk. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
            document.getElementById('content').classList.toggle('shifted');
        });
    </script>
</body>
</html>
