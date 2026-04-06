 {{-- File: resources/views/admin/layouts/guest.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | {{ config('app.name') }} - Admin</title>


    <!-- Tailwind CSS  -->
    
    <!--@ v ite(['resources/css/app.css'])-->
    
    <!-- Tailwind Play CDN Link -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;display=swap');
        body {
            font-family: 'Inter', system_ui, sans-serif;
        }
        .tail-container {
            /* Ensures Tailwind classes work */
        }
    </style>
</head>
<body class="bg-gray-50 tail-container">
    @yield('content')

    <!-- Toastr JS + global setup (required by all admin pages) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "preventDuplicates": true
        };

        // Show Laravel session messages via Toastr (success / error)
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>

    @yield('scripts')
</body>
</html>