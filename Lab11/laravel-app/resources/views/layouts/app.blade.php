<!DOCTYPE html>
<html>
<head>
    <title>Quản lý Tin Tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Quản lý Tin Tức</a>
            <div class="d-flex ms-auto">
                @auth
                    <span class="navbar-text me-3">
                        Xin chào, <strong>{{ Auth::user()->name }}</strong>
                        (<span class="text-primary">{{ Auth::user()->role }}</span>)
                    </span>
                @endauth
            </div>
        </div>
    </nav>
    <div class="container py-4">
        @yield('content')
    </div>
</body>
</html>
