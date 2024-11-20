<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets\css\style.css') }}">
</head>

<body>

        <div class="app-wrapper">
            <!-- Sidebar -->
            @include('components.sidebar')

            <!-- Konten Utama -->
            <main>
                @yield('content')
            </main>

            <footer class="text-center py-3">
            <p>© {{ date('Y') }} @GOORMET</p>
        </footer>
        
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script> <!-- Tambahkan jika ada JavaScript tambahan -->

    <script>
        function toggleSubMenu(submenuId) {
            const submenu = document.getElementById(submenuId);
            const toggleIcon = document.querySelector(`#${submenuId}-toggle`);

            if (submenu.style.display === "none" || submenu.style.display === "") {
                submenu.style.display = "block";
                toggleIcon.classList.add("open");
            } else {
                submenu.style.display = "none";
                toggleIcon.classList.remove("open");
            }
        }
    </script>


</body>

</html>
