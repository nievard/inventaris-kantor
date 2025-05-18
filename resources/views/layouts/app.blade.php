<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f6fa;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(to bottom, #1e1e2f, #151522);
            color: white;
            padding: 2rem 1rem;
        }
        .sidebar h6 {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: #7f8c8d;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
        }
        .sidebar .nav-link {
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 0.9rem;
            border-radius: 10px;
            font-weight: 500;
            transition: background 0.2s ease;
        }
        .sidebar .nav-link.active {
            background-color: #4a5cff;
            color: #fff;
        }
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <h6 class="text-center" style="margin-top: 0.5rem; margin-bottom: 0.3rem;">
                <img src="{{ asset('images/ik.png') }}" alt="Menu Icon" style="width: 80px; height: 80px; display: block; margin: 0 auto 0.1rem;">
                Menu Utama
                </h6>
                <ul class="nav flex-column mb-3">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="fas fa-chart-bar"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                            <i class="fas fa-layer-group"></i> Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('items.*') ? 'active' : '' }}" href="{{ route('items.index') }}">
                            <i class="fas fa-box-open"></i> Barang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('borrows.*') ? 'active' : '' }}" href="{{ route('borrows.index') }}">
                            <i class="fas fa-hand-holding"></i> Peminjaman
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
