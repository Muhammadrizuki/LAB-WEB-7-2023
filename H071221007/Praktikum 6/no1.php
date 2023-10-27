<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nomor 1</title>
</head>
<body>
    <form method="post">
        <input type="text" name="jenis_barang" placeholder="Masukkan tipe">
        <input type="submit" value="Submit">
    </form>

    <?php 
$data = [
    [
        "nama_barang" => "HP",
        "harga" => 3000000,
        "stok" => 10,
        "jenis" => "Elektronik"
    ],
    [
        "nama_barang" => "Jeruk",
        "harga" => 5000,
        "stok" => 20,
        "jenis" => "Buah"
    ],
    [
        "nama_barang" => "Kemeja",
        "harga" => 5000,
        "stok" => 9,
        "jenis" => "Pakaian"
    ],
    [
        "nama_barang" => "Apel",
        "harga" => 5000,
        "stok" => 5,
        "jenis" => "Buah"
    ],
    [
        "nama_barang" => "Celana",
        "harga" => 5000,
        "stok" => 10,
        "jenis" => "Pakaian"
    ],
    [
        "nama_barang" => "Laptop",
        "harga" => 50000,
        "stok" => 30,
        "jenis" => "Elektronik"
    ],
    [
        "nama_barang" => "Semangka",
        "harga" => 5000,
        "stok" => 2,
        "jenis" => "Buah"
    ],
    [
        "nama_barang" => "Kaos",
        "harga" => 5000,
        "stok" => 1,
        "jenis" => "Pakaian"
    ],
    [
        "nama_barang" => "VGA",
        "harga" => 2000000,
        "stok" => 0,
        "jenis" => "Elektronik"
    ]
];


$result = [];


if (isset($_POST['jenis_barang'])) {
    $jenis_barang = $_POST['jenis_barang'];
    foreach ($data as $barang) {
        if (strtolower($barang['jenis']) == strtolower($jenis_barang)) {
            $result[] = $barang;
        }
    }
}

// Menampilkan hasil pencarian jika ada
if (!empty($result)) {
    echo "<table border='1'>";
    echo "<tr><th>Nama</th><th>Harga</th><th>Stok</th></tr>";
    foreach ($result as $barang) {
        echo "<tr>";
        echo "<td>" . $barang['nama_barang'] . "</td>";  
        echo "<td>" . $barang['harga'] . "</td>";
        echo "<td>" . $barang['stok'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}  else{
    echo "<table border='1'>";
    echo "<tr><th>Nama Barang</th><th>Harga</th><th>Stok</th></tr>";
    // echo "Barang dengan tipe $jenis_barang tidak ditemukan";
}
?>
</body>
</html>

















