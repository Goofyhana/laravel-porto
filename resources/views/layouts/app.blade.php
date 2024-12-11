<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<x-header-component />
<body>
  <div class="container">
    <!-- Tempat untuk isi konten -->
    @yield('content')
  </div>
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-footer-component />
</html>
