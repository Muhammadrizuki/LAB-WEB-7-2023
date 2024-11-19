<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernamee = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $alamat = $_POST["alamat"];
    $tahun = $_POST["tahun"];
    $nama = $_POST["nama"];
    $role = "mahasiswa";
    // Lakukan validasi data (misalnya, cek apakah username sudah ada)
    // Jika data valid, simpan data ke database
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
    if (mysqli_num_rows($conn->query("SELECT username from user WHERE username='$usernamee'")) == 0) {
        $sql = "INSERT INTO user (username, password, tahun_lahir,nama,alamat,role) VALUES
               ('$usernamee', '$password','$tahun','$nama','$alamat','$role')";
        if ($conn->query($sql) === TRUE) {
            echo "Input berhasil!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    } else {
        echo "User sudah ada";
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
    <?php
    session_start();
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
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        $role = $_SESSION["role"];
        $nama = $_SESSION["nama"];
        $alamat = $_SESSION["alamat"];
        $tahun = $_SESSION["tahun"];
    } else {
        header("Location: login.php");
    }
    if ($role[0] == "admin") {
        $daftar =mysqli_fetch_all($conn->query("SELECT username,nama,alamat,tahun_lahir from user WHERE NOT role='admin'"));
    }
    ?>
    <div class="container-fluid">
        <?php if ($role[0] == "admin") : ?>
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <div class="container-fluid ">
                    <a class="navbar-brand mx-auto" href="#">
                        <b>Welcome <?= $username; ?></b>
                    </a>

                </div>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>

        <?php else : ?>
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <div class="container-fluid ">
                    <a class="navbar-brand mx-auto" href="#">
                        <b>Welcome <?= $nama[0]; ?></b>
                    </a>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>

        <?php endif; ?>
        <?php if ($role[0] == "admin") : ?>
            <div class="d-flex justify-content-between mb-1">
                <h1 class="h1 text-black-800">Daftar Mahasiswa</h1>
                <button type="button" class="btn btn-primary px-2 py-1" data-bs-toggle="modal" data-bs-target="#TambahPenguji">Tambah Mahasiswa</button>

            </div>
            <div class="container-md">
                <div class="table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tahun Lahir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $id = 1 ?>
                            <?php
                            foreach ($daftar as $key) : ?>
                                <tr>
                                    <th scope="row"><?= $id++; ?></th>
                                    <td><?= $key[1]; ?></td>
                                    <td><?= $key[0]; ?></td>
                                    <td><?= $key[2]; ?></td>
                                    <td><?= $key[3]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    <div class="container-fluid" style="background-color: #f0f0f0;">
        <div class="modal fade" id="TambahPenguji" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Mahasiswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="container-md">
                        <form action="index.php" method="post">
                            <div class=" d-flex mb-3">
                                <div class="form-group col-md-6">
                                    <label class="label" for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="label" for="username">NIM</label>
                                    <input type="text" name="username" class="form-control  " placeholder="NIM" required>
                                </div>

                            </div>
                            <div class=" d-flex mb-3">
                                <div class="form-group col-md-6">
                                    <label class="label" for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control  " placeholder="Alamat" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="label" for="tahun">Tahun Lahir</label>
                                    <input type="number" name="tahun" class="form-control  " placeholder="Tahun Lahir" required>
                                </div>
                            </div>
                            <div class=" d-flex mb-3">
                                <div class=" form-group col-md-6">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php else : ?>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">Nama : <?= $nama[0]; ?></li>
            <li class="list-group-item">NIM : <?= $username; ?></li>
            <li class="list-group-item">Alamat : <?= $alamat[0]; ?></li>
            <li class="list-group-item">Tahun Lahir : <?= $tahun[0]; ?></li>
            <li class="list-group-item">Pekerjaan : <?= $role[0]; ?></li>
        </ul>
    </div>

<?php endif; ?>

<br>
<div class="container-md">

</div>
</div>
</div>
</body>

</html>