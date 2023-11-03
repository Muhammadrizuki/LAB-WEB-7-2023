<?php
// echo "Hello, sWorld!";
// $nama = "John Doe"; // variabel string
// $umur = "25"; // variabel integer
// $tinggi = 175.5; // variabel float
// $aktif = true; // variabel boolean
// $agama = null; // variabel NULL
// $hobi = ["Membaca", "Memancing", "Menulis"]; // variabel array

// echo $hobi[1] . "<br>";

// $siswa = array("nama" => "John", "usia" => 25, "kelas" => "XII A");

// $sisswa = [["nama" => "John", "usia" => 25, "kelas" => "XII A"],["nama" => "John", "usia" => 25, "kelas" => "XII A"]];
// echo '<hr>';
// foreach ($sisswa as $siswa){

//     echo 'nama:'.$siswa['nama'].'<br>';
//     echo 'usia:'.$siswa['usia'].'<br>';
//     echo 'kelas:'.$siswa['kelas'].'<br>';
//     echo '<hr>';
// }

// echo $siswa['nama'];


// echo "<br>" . var_dump($umur)."<br>";

$keranjangs = [
    [
        "id" => "B1",
        "nama_barang" => "AK-47",
        "harga" => 300000,
        "nama_toko" => "Akku's Store"
    ],

    [
        "id" => "B2",
        "nama_barang" => "Peluru",
        "harga" => 50000,
        "nama_toko" => "Akku's Store"
    ],

    [
        "id" => "B4",
        "nama_barang" => "Shotgun",
        "harga" => 200000,
        "nama_toko" => "Aflah's Store"
    ]

];


$keranjang = [
    [
        "id" => "z1",
        "nama_barang" => "Buku",
        "harga" => 3000,
        "nama_toko" => "toko buku"
    ],


];
$nama='rendy';
function studicase($keranjang1,$kerangjang2){

    $nama;

}


echo studicase($keranjangs,$keranjang);

?>
<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba</title>
</head>

<body>
    <form method="post" action="proses.php">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <button type="submit">Kirim</button>
    </form>
    
</body>

</html> -->