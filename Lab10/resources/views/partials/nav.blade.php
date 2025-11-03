<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="{{ route('tin.index') }}">Lab10 News</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="mainNav" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ !request('danh_muc') ? 'active' : '' }}" 
                       href="{{ route('tin.index') }}">Tất cả</a>
                </li>
                @foreach($danhMucs ?? [] as $dm)
                <li class="nav-item">
                    <a class="nav-link {{ request('danh_muc') == $dm->id ? 'active' : '' }}" 
                       href="{{ route('tin.index', ['danh_muc' => $dm->id]) }}">
                        {{ $dm->ten_danh_muc }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>