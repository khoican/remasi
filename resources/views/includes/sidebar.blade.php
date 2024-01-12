<nav class="nav px-5 py-5 sidebar shadow bg-white">
    <div class="mx-auto">
        <img src="{{ asset('assets/images/logo.png') }}" alt="" class="logo" style="width: 100px">
    </div>

    <div class="nav-item w-100 mt-5">
        <a href="/admin" class="nav-link d-flex align-items-center gap-3 rounded {{ request()->routeIs('admin.*') ? 'text-white bg-success' : 'text-success' }}"><i class="bi bi-card-list"></i> Semua Resep</a>
        <a href="/kategori" class="nav-link d-flex align-items-center gap-3 rounded {{ request()->routeIs('kategori.*') ? 'text-white bg-success' : 'text-success' }}"><i class="bi bi-bookmarks"></i> Kategori</a>
        <a href="/" class="nav-link d-flex align-items-center gap-3 rounded text-success"><i class="bi bi-house-door"></i> Website</a>
    </div>

</nav>
