<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotoGp Riders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(90deg, #832121, #000, #000, #000);
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
            /* font-weight: bold; */
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 18px;
            text-align: center;
            color: white !important; /* Mengatur warna teks menjadi putih dengan !important */
        }


    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: linear-gradient(90deg, #000, #000, #000, #832121);">
        <a class="navbar-brand" href="/" style="margin-left: 65px;">
            <img src="/asets/logo2.jpg" height="50" class="d-inline-block align-top" alt="Logo" style="margin-right: 20px;">
            MotoGP
        </a>
    </nav>
    

    <div class="container" style="margin-top: 110px">
        @yield('home')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
