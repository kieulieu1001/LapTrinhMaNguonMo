<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Quản trị Admin')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .sidebar { width: 220px; min-height: 100vh; position: fixed; }
        .main-content { margin-left: 220px; }
    </style>
</head>
<body>
    @include('admin.partials.sidebar')
    <div class="main-content">
        @include('admin.partials.topbar')
        <div class="container py-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
