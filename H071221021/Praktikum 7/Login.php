<?php
require_once('Config/Helper.php');
require_once('Config/Connection.php');
$process = isset($_GET['process']) ? ($_GET['process']) : false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    $action = $_POST["action"];

    if ($action === BASE_URL . 'Login_Admin.php') {
        // Handle admin login
        $username = $_POST["username"];
        $password = $_POST["password"];
        $_SESSION["role"]= 'Admin.php';
        
        // Validasi login admin, misalnya dengan query ke database
        $query = mysqli_query($conn, "SELECT * FROM tb_adm WHERE username = '$username' AND password = '$password'");

        if (mysqli_num_rows($query) == 1) {
            // Login berhasil, alihkan ke halaman admin
            header("location: " . BASE_URL . 'Admin.php');
        } else {
            // Login gagal, tampilkan pesan kesalahan
            header("location: " . BASE_URL . 'Login.php?process=failedlogin');
        }
    } elseif ($action === BASE_URL . 'Login_Mahasiswa.php') {
        // Handle mahasiswa login
        $username = $_POST["username"];
        $password = $_POST["password"];
        $_SESSION["role"]= 'Mahasiswa.php';

        // Validasi login mahasiswa, misalnya dengan query ke database
        $query = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE username = '$username' AND password = '$password'");

        if (mysqli_num_rows($query) == 1) {
            // Login berhasil, alihkan ke halaman mahasiswa
            header("location: " . BASE_URL . 'Mahasiswa.php');
        } else {
            // Login gagal, tampilkan pesan kesalahan
            header("location: " . BASE_URL . 'Login.php?process=failedlogin');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= BASE_URL . 'Asset/CSS/Style.css' ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="content">
        <div class="card-login">
            <div class="card-main">
                <div class="card-header">Form Login</div>
                <?php
                if ($process === 'failedlogin'): ?>
                    <div class="alert alert-danger"
                        style="background-color: red; margin-top: 10px; padding: 1em; color: white; border-radius: 20px; text-align: center;">
                        Login gagal, Silahkan periksa kembali username dan password yang anda masukkan!
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <?php if ($process == 'successregister'): ?>
                        <div class="alert alert-success"
                            style="background-color: green; padding: 1em; color: white; border-radius: 20px; text-align: center;">
                            Register berhasil, silahkan masuk dengan akun anda
                        </div>
                    <?php endif; ?>
                    <form class="form-login" method="POST">
                        <label class="form-label">Username</label>
                        <input type="username" name="username" class="form-input">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-input">
                        <div class="button-container">
                            <button type="submit" name="action" value="<?= BASE_URL . 'Login_Admin.php' ?>"
                                class="btn btn-login">Login Admin</button>
                            <button type="submit" name="action" value="<?= BASE_URL . 'Login_Mahasiswa.php' ?>"
                                class="btn btn-login">Login Mahasiswa</button>
                        </div>
                    </form>

                    <p style="text-align: center;">Belum punya akun? <br> <span>
                            <div class="a-container">
                                <a href="<?= BASE_URL . "RegisterAdm.php" ?>" class="link"> Daftar sebagai admin</a> <br>
                                <a href="<?= BASE_URL . "RegisterMhs.php" ?>" class="link"> Daftar sebagai mahasiswa</a>
                            </div>
                        </span></p>
                </div>
            </div>
        </div>

    </div>
</body>

</html>