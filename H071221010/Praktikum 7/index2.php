<?php
session_start();
// Periksa apakah ada permintaan logout
if (isset($_GET['logout'])) {
    if ($_SESSION['user_role'] === 'user') {
        // Hapus sesi dan arahkan ke halaman login
        $_SESSION['admin_logout'] = true;
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
}

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    if ($_SESSION['user_role'] === 'user') {
        $username = $_SESSION['username'];
        // Izinkan akses halaman user
        // Tambahkan kode halaman user di sini
    } else {
        // Pengguna dengan peran selain user tidak diizinkan mengakses halaman ini
        header("Location: index.php"); // Alihkan pengguna ke halaman admin
        exit();
    }
} else {
    // Pengguna yang belum login akan diarahkan ke halaman login
    header("Location: login.php");
    exit();
}

// Konfigurasi Koneksi
require('connection.php');

// --------------------------------

// Deklarasi Variabel Kosong
$nim = "";
$nama = "";
$alamat = "";
$jurusan = "";
$sukses = "";
$error = "";
// ----------------------------------

if (isset($_SESSION['admin_logout']) && $_SESSION['admin_logout'] === true) {
    if ($_SESSION['user_role'] === 'user') {
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: rgb(128, 98, 214);
            background: radial-gradient(circle, rgba(128, 98, 214, 1) 0%, rgba(0, 0, 0, 1) 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: #BEADFA;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 1080px;
            padding: 20px;
        }

        h1 {
            font-size: 30px;
            text-align: center;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #343a40;
            color: white;
            font-weight: bold;
            text-align: center;
            font-size: 20px;
            width: 97%;
            margin-left: 15px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>
            Hello,
            <?php echo $username ?>!
        </h1>
        <div class="card-header rounded">
            Data Mahasiswa Fakultas Matematika dan Ilmu Pengetahuan Alam
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="table">
                            <th class="text-center align-middle" scope='col'>No.</th>
                            <th class="text-center align-middle" scope='col'>NIM</th>
                            <th class="text-center align-middle" scope='col'>Nama</th>
                            <th class="text-center align-middle" scope='col'>Alamat</th>
                            <th class="text-center align-middle" scope='col'>Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql12 = "SELECT * FROM data";
                        $q2 = mysqli_query($koneksi, $sql12);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id = $r2["id"];
                            $nim = $r2["nim"];
                            $nama = $r2["nama"];
                            $alamat = $r2["alamat"];
                            $jurusan = $r2["jurusan"];

                            // Tambahkan kelas table-primary jika urut adalah genap
                            $row_class = ($urut % 2 == 0) ? "table-primary" : "table-info";

                            ?>
                            <tr class="<?= $row_class ?>">
                                <th class="text-center align-middle" scope='row'>
                                    <?php echo $urut++ ?>
                                </th>
                                <td class="text-center align-middle" scope='row'>
                                    <?php echo $nim ?>
                                </td>
                                <td class="text-center align-middle" scope='row'>
                                    <?php echo $nama ?>
                                </td>
                                <td class="text-center align-middle" scope='row'>
                                    <?php echo $alamat ?>
                                </td>
                                <td class="text-center align-middle" scope='row'>
                                    <?php echo $jurusan ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="login.php?logout=1" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>