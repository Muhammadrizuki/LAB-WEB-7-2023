<?php session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    // Saring data pengguna dari database dan verifikasi kata sandi
    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "universitas";
    $conn = new mysqli(
        $server,
        $db_username,
        $db_password,
        $db_name
    );
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    $sql = "SELECT username, password FROM user WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;
            $_SESSION["nama"] =  mysqli_fetch_array($conn->query("SELECT nama FROM user WHERE username='$username'"));
            $_SESSION["role"] =  mysqli_fetch_array($conn->query("SELECT role FROM user WHERE username='$username'"));
            $_SESSION["alamat"] = mysqli_fetch_array($conn->query("SELECT alamat FROM user WHERE username='$username'"));
            $_SESSION["tahun"] = mysqli_fetch_array($conn->query("SELECT tahun_lahir FROM user WHERE username='$username'"));
            header("Location: index.php");
            exit();
        } else {
            echo "Autentikasi gagal. Silakan coba lagi.";
        }
    } else {
        echo "Autentikasi gagal. Silakan coba lagi.";
    }
    $conn->close();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>

<body>
    <div class="container">
        <div class="body">
            <div class="box-2 flex-column">
                <div class="mt-2">
                    <p class="mb-1 h-1">Login</p>
                    <div class="d-flex flex-column ">
                        <form action="login.php" class="signin-form" method="post">
                            <div class="form-group my-3">
                                <label class="label" for="login">username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>

                            <br>
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                            </div>
                        </form>
                        <br>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif
        }

        .container {
            margin: 15vh auto;
        }

        .body {
            position: relative;
            width: 300px;
            height: 350px;
            margin: 20px auto;
            border: 1px solid #dddd;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .box-2 {
            padding: 10px;
        }

        .h-1 {
            font-size: 38px;
            font-weight: 600;
            text-align: center;
        }

        .text-muted {
            font-size: 14px;
        }




        @media (max-width:767px) {
            body {
                padding: 10px;
            }

            .body {
                width: 100%;
                height: 100%;
            }

            .box-1 {
                width: 100%;
            }

            .box-2 {
                width: 100%;
                height: 440px;
            }
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            -o-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        }

        @media (prefers-reduced-motion: reduce) {
            .form-control {
                -webkit-transition: none;
                -o-transition: none;
                transition: none;
            }
        }

        .form-control::-ms-expand {
            background-color: transparent;
            border: 0;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            -webkit-box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .form-control::-webkit-input-placeholder {
            color: #6c757d;
            opacity: 1;
        }

        .form-control:-ms-input-placeholder {
            color: #6c757d;
            opacity: 1;
        }

        .form-control::-ms-input-placeholder {
            color: #6c757d;
            opacity: 1;
        }

        .form-control::placeholder {
            color: #6c757d;
            opacity: 1;
        }

        .form-control:disabled,
        .form-control[readonly] {
            background-color: #e9ecef;
            opacity: 1;
        }




        .form-group {
            width: 100%;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            width: auto;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            -o-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        }

        @media (prefers-reduced-motion: reduce) {
            .btn {
                -webkit-transition: none;
                -o-transition: none;
                transition: none;
            }
        }

        .btn:hover {
            color: #212529;
            text-decoration: none;
        }

        .btn:focus,
        .btn.focus {
            outline: 0;
            -webkit-box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn.disabled,
        .btn:disabled {
            opacity: 0.65;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-primary:focus,
        .btn-primary.focus {
            -webkit-box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
        }

        .btn-primary.disabled,
        .btn-primary:disabled {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:not(:disabled):not(.disabled):active,
        .btn-primary:not(:disabled):not(.disabled).active,
        .show>.btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #0062cc;
            border-color: #005cbf;
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus,
        .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show>.btn-primary.dropdown-toggle:focus {
            -webkit-box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
        }

        .rounded {
            border-radius: 1.5rem !important;
        }
    </style>
</body>

</html>