<!DOCTYPE html>
<html>
<head>
    <title>Welcome to ClassicModels</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href='https://fonts.googleapis.com/css2?family=Satisfy&display=swap'> -->
    <style>
        body {
            background-image: url('/asets/bg.jpg'); /* Ganti 'background.jpg' dengan URL atau path gambar latar belakang Anda */
            background-size: cover; /* Mengisi seluruh area latar belakang */
            background-repeat: no-repeat; /* Menghindari pengulangan gambar */
            background-attachment: fixed;
            color: white; /* Membuat gambar latar belakang tetap di tempatnya saat menggulir */
            font-size: 20px;
        }

        .custom-font-classicmod {
            font-size: 30px;
            margin-top: 30px;
            /* color: white; */
            color: rgb(241, 190, 22);
        }

        .custom-font-welcome {
            font-size: 50px;
            font-weight: bold;
            color: rgb(241, 190, 22);
        }

        .custom-button {
            font-size: 18px;
            background-color: rgb(241, 190, 22);
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 30px;
        }

        .custom-lorem {
            margin-top: 30px;
            font-size: 18px;
            line-height: 1.4;
            text-shadow: 2px 2px 4px #000;
        }

        .navbar {
            /* font-family: 'Satisfy', cursive; */
            background-color: transparent;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            position: absolute;
            width: 100%;
            top: 0; /* Menempatkan navbar di bagian atas */
        }

        .login-button {
            background-color: rgb(241, 190, 22);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 25px;
            margin-right: 10px;
        }

        .navbar .navbar-brand {
            margin-right: 20px; /* Jarak antara logo dan "Home" */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="border-bottom: 1px solid #fff; position: fixed; top: 0; width: 100%; z-index: 999;">
        <a class="navbar-brand" href="#"><img src="/asets/logo.png" alt="ClassicModels" width="100"></a>
        <div class="container">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex align-items-left-center">
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('/') ? ' active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('product*') ? ' active' : '' }}" href="/product">Products</a>
                </li>
            </ul>
        </div>
    </nav>
    
    

    


    <!-- Konten Utama -->
    <div class="container mt-5">
        @yield('container')
    </div>
    
    
    <div class="products">
        @yield('tampilan-produk')
    </div>
    
    
    <div class="productsId">
        @yield('content')
    </div>
    {{-- <script>
        document.getElementById('btnSearchProductLine').addEventListener('click', () => {
            var selectedOption = document.getElementById('productSelect').value;
            if (selectedOption) {
                var url = '/products/' + selectedOption;
                window.location.href = url;
            }
        });
    </script> --}}


    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        document.getElementById('btnSearchProductLine').addEventListener('click', () => {
            var selectedOption = document.getElementById('productSelect').value;
            if (selectedOption) {
                var url = '/products/' + selectedOption;
                window.location.href = url;
            }
        });
    </script> --}}


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
