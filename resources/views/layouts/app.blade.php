<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        #kemajuanStudiChart {
            width: 100%;
            max-width: 600px;
            height: 300px;
            display: block;
        }

        .card {
            overflow: hidden;
        }
    </style>
</head>

<body>

    <div class="app-wrapper">
        @if (session('user.role') === 'admin')
            @include('components.sidebarAdmin')
        @elseif(session('user.role') === 'student')
            @include('components.sidebar')
        @else
            {{-- Optional: Fallback jika role tidak sesuai --}}
            <p class="text-center text-danger">Role tidak dikenali.</p>
        @endif

        <main>
            @yield('content')
        </main>

        <footer class="text-center py-3">
            <p>© {{ date('Y') }} @GOORMET</p>
        </footer>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const canvasElement = document.getElementById('kemajuanStudiChart');
            if (!canvasElement) {
                console.error('Canvas element not found');
                return;
            }

            const ctx = canvasElement.getContext('2d');
            console.log('Chart context:', ctx);

            const chartData = {
                labels: ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5'],
                datasets: [{
                    label: 'Kemajuan Studi',
                    data: [3.2, 3.1, 3.4, 3.4, 3.8],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            };

            console.log('Chart Data:', chartData);

            new Chart(ctx, {
                type: 'line',
                data: chartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: true, // Jaga rasio aspek
                    animation: {
                        duration: 0 // Nonaktifkan animasi
                    },
                    plugins: {
                        legend: {
                            display: true
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Semester'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Nilai'
                            }
                        }
                    }
                }
            });
        });
    </script>

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
