<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Mahasiswa</title>
    <!-- Tambahkan referensi Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <h1 class="mb-4">Halaman Mahasiswa</h1>   
    <!-- Formulir Tampilkan Data Mahasiswa -->
    <form method="get">
        <input type="hidden" name="aksi" value="tampil">
        <button type="submit" class="btn btn-primary m-3">Tampilkan Data Mahasiswa</button>
    </form>
<?php

$server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "db_mahasiswa";

// Fungsi Read (Select)
function ambilDataMahasiswa() {//fungsi unutk mengmabil data mahasiswa
    global $server, $db_username, $db_password, $db_name;//penggunaan variabel global yang mengacu pada informasi koneksi database

    $conn = new mysqli($server, $db_username, $db_password, $db_name);//koneksi ke database

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql = "SELECT  id, Nama, NIM, Prodi FROM tb_mahasiswa";//mengambil data dri tb
    $result = $conn->query($sql);//hasil kueri disimpan ke result

    $data = array();//akan digunakan untuk menyimpan data mahasiswa yang akan diambil dari database

    if ($result->num_rows > 0) {//klo lebih dri nol brrti ada data yg bisa diambil
        while ($row = $result->fetch_assoc()) {//setiap baris data yg diambil dri hasil kueri disimpan dlm row yg merupakan assositif array
            $data[] = $row;//setiap  baris akan ditambahkan ke array data
        }
    }

    $conn->close();//objek koneksi ditutup setelah semua proses selesai
    return $data;//mengembalikan nilai $data 
}

// Menampilkan data dalam bentuk tabel HTML
function tampilkanTabelMahasiswa() {
    $dataMahasiswa = ambilDataMahasiswa();

    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Nama</th>';
    echo '<th>NIM</th>';
    echo '<th>Prodi</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    //di masukkan isinya row ke dlm tabel
    foreach ($dataMahasiswa as $row) {
        echo '<tr>';
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['Nama']}</td>";
        echo "<td>{$row['NIM']}</td>";
        echo "<td>{$row['Prodi']}</td>";
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}

// Panggil fungsi untuk menampilkan tabel mahasiswa jika ada parameter aksi
if (isset($_GET['aksi']) && $_GET['aksi'] === 'tampil') {
    tampilkanTabelMahasiswa();
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


