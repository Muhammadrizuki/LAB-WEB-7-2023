<?php
session_start();
// Periksa apakah ada permintaan logout
if (isset($_GET['logout'])) {
    if ($_SESSION['user_role'] === 'admin') {
        // Hapus sesi dan arahkan ke halaman login
        $_SESSION['admin_logout'] = true;
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
}

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    if ($_SESSION['user_role'] === 'admin') {
        $username = $_SESSION['username'];
    } else {
        // Pengguna dengan peran selain admin tidak diizinkan mengakses halaman ini
        header("Location: index2.php"); // Alihkan pengguna ke halaman user
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
// --------------------------------

// Untuk Lihat Operasi delete or edit ini variabel op didalam server 
if (isset($_GET["op"])) {
    $op = $_GET["op"];
} else {
    $op = "";
}

// Perkondisian if $op = 'delete'
if ($op == "delete") {
    $id = $_GET["id"];
    $sql1 = "DELETE FROM data WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil Menghapus Data";
    } else {
        $error = "Gagal Menghapus Data";
    }
}
// --------------------------------


// Perkondisian if $op = 'edit'
if ($op == "edit") {
    $id = $_GET["id"];
    $sql1 = "SELECT * FROM data WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1) {
        $r1 = mysqli_fetch_array($q1);

        // Periksa apakah ada hasil dari query
        if ($r1) {
            $nim = $r1['nim'];
            $nama = $r1['nama'];
            $alamat = $r1['alamat'];
            $jurusan = $r1['jurusan'];
        } else {
            $error = "Data Tidak Ditemukan";
        }
    } else {
        $error = "Terjadi kesalahan saat mengambil data.";
    }
}
// --------------------------------------------------------------------


// For Create Data Dan Update Data
if (isset($_POST["simpan"])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];

    // Memeriksa apakah data terisi semua
    if ($nim && $nama && $alamat && $jurusan) {
        // For Update Data
        if ($op == 'edit') {
            $sql1 = "UPDATE data SET nim = '$nim', nama = '$nama', alamat = '$alamat', jurusan = '$jurusan' WHERE id = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);

            if ($q1) {
                $sukses = "Data Berhasil Di Update";
            } else {
                $error = "Data Gagal Di Update";
            }
        } else {
            // For Create Data
            // Periksa apakah data dengan NIM yang sama sudah ada dalam database
            $check_sql = "SELECT nim FROM data WHERE nim = '$nim'";
            $result = mysqli_query($koneksi, $check_sql);

            if (mysqli_num_rows($result) > 0) {
                $error = "NIM Telah Terpakai";
            } else {
                $sql1 = "INSERT INTO data (nim, nama, alamat, jurusan) VALUES ('$nim', '$nama', '$alamat', '$jurusan')";
                $q1 = mysqli_query($koneksi, $sql1);

                if ($q1) {
                    $sukses = "Berhasil Memasukkan Data Baru";
                } else {
                    $error = "Gagal Memasukkan Data";
                }
            }
        }

    } else {
        $error = "Silahkan Isi Semua Data";
    }
}
// -----------------------------------------------------------------------------------------------------------------------------
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
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background: rgb(128, 98, 214);
            background: radial-gradient(circle, rgba(128, 98, 214, 1) 0%, rgba(0, 0, 0, 1) 100%);

        }

        #card1,
        #card2 {
            margin: 30px 120px 30px 120px;
            padding: 20px;
            background-color: #BEADFA;
        }

        h1 {
            margin-bottom: 20px;
        }

        #read-data {
            font-size: 20px;
            text-align: center;
            font-weight: 500;
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="card" id="card1">
        <h1 class="text-center align-middle">
            Welcome My
            <?php echo $username ?> !
        </h1>
        <div class="card-header text-white bg-dark rounded">
            Tambah / Edit Data
        </div>
        <div class="card-body">
            <?php
            if ($error) {
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                header("refresh:3;url=index.php");
            }

            if ($sukses) {
                echo '<div class="alert alert-success" role="alert">' . $sukses . '</div>';
                header("refresh:3;url=index.php");
            }
            ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                </div>
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <select class="form-control" name="jurusan" id="jurusan">
                        <option value="">- Pilih jurusan -</option>
                        <option value="Matematika" <?php if ($jurusan == 'Matematika')
                            echo "selected" ?>>Matematika
                            </option>
                            <option value="Fisika" <?php if ($jurusan == 'Fisika')
                            echo "selected" ?>>Fisika</option>
                            <option value="Kimia" <?php if ($jurusan == 'Kimia')
                            echo "selected" ?>>Kimia</option>
                            <option value="Biologi" <?php if ($jurusan == 'Biologi')
                            echo "selected" ?>>Biologi</option>
                            <option value="Statistika" <?php if ($jurusan == 'Statistika')
                            echo "selected" ?>>Statistika
                            </option>
                            <option value="Geofisika" <?php if ($jurusan == 'Geofisika')
                            echo "selected" ?>>Geofisika
                            </option>
                            <option value="Sistem Informasi" <?php if ($jurusan == 'Sistem Informasi')
                            echo "selected" ?>>
                                Sistem Informasi</option>
                            <option value="Aktuaria" <?php if ($jurusan == 'Aktuaria')
                            echo "selected" ?>>Aktuaria
                            </option>
                        </select>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        </div>

        <div class="card" id="card2">
            <div class="card-header text-white bg-dark rounded" id="read-data">
                Data Mahasiswa Fakultas Matematika dan Ilmu Pengetahuan Alam
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" style="background-color: #BEADFA;">
                        <thead>
                            <tr class="table">
                                <th class="text-center align-middle" scope='col'>#</th>
                                <th class="text-center align-middle" scope='col'>NIM</th>
                                <th class="text-center align-middle" scope='col'>Nama</th>
                                <th class="text-center align-middle" scope='col'>Alamat</th>
                                <th class="text-center align-middle" scope='col'>Jurusan</th>
                                <th class="text-center align-middle" scope='col'>Aksi</th>
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
                            ?>
                            <tr class="table-info">
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
                                <td class="text-center align-middle" scope='row'>
                                    <a href="index.php?op=edit&id=<?php echo $id ?>"> <button type="button"
                                            class="btn btn-warning">Edit</button>
                                    </a>
                                    <a href="index.php?op=delete&id=<?php echo $id ?>"
                                        onclick="return confirm('Yakin Mau Delete Data?')"> <button type="button"
                                            class="btn btn-danger">Hapus</button>
                                    </a>
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
            <a href="index.php?logout=1" class="btn btn-danger">Logout</a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</body>

</html>