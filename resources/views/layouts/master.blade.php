<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Hệ thống Quản lý Khóa học</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            min-height: 100vh;
            background: #212529;
            color: white;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
        }

        .sidebar a:hover {
            background: #343a40;
            color: white;
        }

        .sidebar a.active {
            background: #0d6efd;
            color: white;
        }

        .content {
            padding: 20px;
        }

        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <nav class="col-md-2 d-none d-md-block sidebar shadow-sm">
                <div class="position-sticky pt-3">
                    <h4 class="text-center mb-4"><i class="fas fa-university"></i> EAUT Edu</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('dashboard-cms') ? 'active' : '' }}" href="{{ route('cms.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('courses*') ? 'active' : '' }}" href="{{ route('courses.index') }}">
                                <i class="fas fa-book me-2"></i> Khóa học
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- Sửa href="#" thành route bên dưới --}}
                            <a class="nav-link {{ request()->is('lessons*') ? 'active' : '' }}" href="{{ route('lessons.index') }}">
                                <i class="fas fa-video me-2"></i> Bài học
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('enrollments*') ? 'active' : '' }}" href="{{ route('enrollments.index') }}">
                                <i class="fas fa-user-graduate me-2"></i> Đăng ký
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('courses.trash') }}">
                                <i class="fas fa-trash me-2"></i> Thùng rác
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto px-md-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white mb-4">
                    <div class="container-fluid">
                        <span class="navbar-brand mb-0 h1">Quản trị hệ thống</span>
                        <div class="d-flex">
                            <span class="text-muted">Chào, <strong>Bùi Bảo Khang</strong></span>
                        </div>
                    </div>
                </nav>

                <div class="content container">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.min.js"></script>
</body>

</html>