<?php

require_once('Config/Helper.php');
require_once('Config/Connection.php');

$process = isset($_GET['process']) ? ($_GET['process']) : false;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Mahasiswa</title>
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
                <div class="card-header">Form Register</div>
                <div class="card-body">
                    <?php if ($process == 'failedempty'): ?>
                        <div class="alert alert-danger"
                            style="background-color: red; padding: 1em; color: white;border-radius: 20px;">
                            Register gagal, terdapat form yang kosong
                        </div>
                    <?php endif; ?>
                    <?php if ($process == 'failedusername'): ?>
                        <div class="alert alert-danger"
                            style="background-color: red; padding: 1em; color: white;border-radius: 20px;">
                            Register gagal, username sudah terdaftar di database
                        </div>
                    <?php endif; ?>
                    <?php if ($process == 'failedpassword'): ?>
                        <div class="alert alert-danger"
                            style="background-color: red; padding: 1em; color: white;border-radius: 20px;">
                            Register gagal, password tidak sesuai
                        </div>
                    <?php endif; ?>
                    <form class="form-login" method="POST" action="<?= BASE_URL . 'Controller/Regmhs.php' ?>">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="Nama_Lengkap" class="form-input">
                        <label class="form-label">Username</label>
                        <input type="text" name="Username" class="form-input">
                        <label class="form-label">NIM</label>
                        <input type="text" name="NIM" class="form-input">
                        <label class="form-label">Password</label>
                        <input type="password" name="Password" class="form-input">
                        <label class="form-label">Re-Password</label>
                        <input type="password" name="Repassword" class="form-input">
                        <button type="submit" class="btn btn-login">Register</button>
                    </form>
                    <p style="text-align: center;">Sudah punya akun?<span><a href="<?= BASE_URL . "Login.php" ?>"
                                class=""> Masuk disini</a></span></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>