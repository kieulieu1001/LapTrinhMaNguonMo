<nav class="topbar bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
    <div>
        <button class="btn btn-outline-secondary btn-sm" id="sidebarToggle">
            <i class="bi bi-list"></i>
        </button>
        <span class="ms-3 fw-bold">@yield('page-title', 'Dashboard')</span>
    </div>
    
    <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle"></i> Admin
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Cài đặt</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Hồ sơ</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right"></i> Đăng xuất</a></li>
        </ul>
    </div>
</nav>