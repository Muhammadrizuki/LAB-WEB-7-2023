<?php
//panggil koneksi database
require_once('config/helper.php');
require_once('config/connection.php');

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <button type="button" class="btn btn-danger mt-4 btn-logout">
            Log Out
        </button>
        <h3 class="text-center mt-4 mb-4">Data Mahasiswa</h3>

        <div class="card">

            <div class="card-header bg-primary text-white">
                Data Mahasiswa
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>No.</th>
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Jurusan</th>
                    </tr>

                    <?php

                    //persiapan menampilkan data
                    $no = 1;
                    $tampil = mysqli_query($connection, "SELECT * FROM tb_admin ORDER  BY nim");
                    while ($data = mysqli_fetch_array($tampil)):
                        ?>

                        <tr>
                            <td>
                                <?= $no++ ?>
                            </td>
                            <td>
                                <?= $data['nim'] ?>
                            </td>
                            <td>
                                <?= $data['namalengkap'] ?>
                            </td>
                            <td>
                                <?= $data['jeniskelamin'] ?>
                            </td>
                            <td>
                                <?= $data['alamat'] ?>
                            </td>
                            <td>
                                <?= $data['jurusan'] ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
        document.querySelector(".btn-logout").addEventListener("click", function () {
            // Mengarahkan pengguna kembali ke halaman login
            window.location.href = "login.php"; // Ganti "login.php" sesuai dengan alamat halaman login Anda
        });
    </script>>
</body>

</html>