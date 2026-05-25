<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Giri Thrifting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-body-tertiary">
    <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
        <div class="container">
            <a class="navbar-brand fw-semibold d-flex align-items-center gap-2"
               href="{{ route('produk.index') }}">
                <div class="bg-dark text-white rounded d-flex align-items-center justify-content-center" style="width:32px; height:32px;">
                    <i class="bi bi-bag"></i>
                </div>
                <span>Giri Thrifting</span>
            </a>
            <div class="ms-auto">
                @auth
                    <div class="d-flex align-items-center gap-3">
                        <span class="text-secondary small">
                            Hi, {{ Auth::user()->name }}
                        </span>
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                                Logout
                            </button>
                        </form>
                    </div>
                @endauth
                @guest
                    <div class="d-flex gap-2">
                        <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-dark btn-sm rounded-pill px-3">
                            Register
                        </a>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
    <div class="container py-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>