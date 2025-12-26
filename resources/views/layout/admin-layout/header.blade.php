<header id="mainHeader" class="d-flex justify-content-between align-items-center bg-white shadow-sm px-4 py-2 position-fixed top-0 start-0 w-100" style="z-index: 1030; height: 70px;">
    <div class="d-flex align-items-center gap-2">
        <button id="toggleSidebar" class="btn btn-outline-secondary d-md-none">
            <i class="fas fa-bars"></i>
        </button>          
        <input type="text" class="form-control" placeholder="Search..." style="max-width: 250px;">
    </div>
    <div class="d-flex align-items-center gap-3">
        <span>Hello, {{ optional(Auth::user())->name ?? 'Guest' }}</span>
        <img src="{{ asset('images/images.png') }}" class="rounded-circle" width="40" height="40">
        <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
            </div>
</header>
