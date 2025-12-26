<!doctype html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CRM')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="en">

    {{-- ✅ Header --}}
    @include('layout.admin-layout.header')

    {{-- ✅ Sidebar --}}
    @include('layout.admin-layout.sidebar')

    {{-- ✅ Main Content --}}
    <div id="mainContent" class="main-content">
        @yield('content')
    </div>

    {{-- ✅ Footer --}}
    @include('layout.admin-layout.footer')

    {{-- ✅ Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById('toggleSidebar');
        toggleBtn?.addEventListener('click', function () {
          document.body.classList.toggle('sidebar-collapsed');
        });
      });
    </script>
</body>
</html>
