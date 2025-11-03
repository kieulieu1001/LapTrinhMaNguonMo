<aside class="sidebar bg-dark text-white">
    <div class="sidebar-header p-3 border-bottom border-secondary">
        <h4 class="mb-0">
            <i class="bi bi-speedometer2"></i> Admin Panel
        </h4>
    </div>
    
    <nav class="sidebar-nav p-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" 
                   class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-house-door"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.tintuc.index') }}" 
                   class="nav-link text-white {{ request()->routeIs('admin.tintuc.*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i> Quản lý tin tức
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.danhmuc.index') }}" 
                   class="nav-link text-white {{ request()->routeIs('admin.danhmuc.*') ? 'active' : '' }}">
                    <i class="bi bi-folder"></i> Quản lý danh mục
                </a>
            </li>
            <li class="nav-item">
                <hr class="border-secondary my-3">
            </li>
            <li class="nav-item">
                <a href="{{ route('tin.index') }}" class="nav-link text-white" target="_blank">
                    <i class="bi bi-box-arrow-up-right"></i> Xem website
                </a>
            </li>
        </ul>
    </nav>
</aside>