<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid 19 new case vs recovery 2020 Makassar</title>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Bootstrap core CSS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">H071201042</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('beranda')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('data')}}">Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="container-sm mb-2" style="background-color:#ffff; box-shadow: 0px 4px 12px rgba(0, 85, 150, 0.441); 
        border-radius: 10px;">
            <canvas class="p-5" id="combinedChart"></canvas>
        </div>
    </div>

    <script type="text/javascript">
    var labels = {{Js::from($labels)}};
    var cases = {{Js::from($cases)}};
    var recovered = {{Js::from($recover)}};

        var ctx = document.getElementById("combinedChart").getContext("2d");

        var combinedChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [{
                        label: "new Case",
                        data: cases,
                        backgroundColor: "rgba(158, 238, 73, 1)",
                        borderColor: "rgba(158, 238, 73, 1)",
                        borderWidth: 1,
                    },
                    {
                        label: "Recovered",
                        data: recovered,
                        backgroundColor: "rgba(255, 186, 186, 1)",
                        borderColor: "rgba(255, 186, 186, 1)",
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: false,
                    },
                    x: {
                        stacked: true,
                    },
                },
            },
        });

        $(document).ready(function() {
            $("#commodityInput").select2({
                placeholder: "Pilih Komoditas",
                allowClear: true,
            });
            $("#cityInput").select2({
                placeholder: "Pilih Kabupaten/Kota",
                allowClear: true,
            });
            $("#downloadPDFButton").on("click", function() {
                downloadPDF();
            });
        });
    </script>
</body>

</html>