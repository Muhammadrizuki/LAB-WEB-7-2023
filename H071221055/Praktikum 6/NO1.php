<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Barang</h1>
    <form method = "post" action="">
        <label for="nama">Jenis Barang</label>
        <input type="text" id="nama_barang" name="jenis"><br>
        <input type="submit" value="Tampilkan">
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

    if(isset($_POST['jenis'])){
        $jenis = $_POST['jenis'];
        $dataditemukan = false;

        foreach ($data as $barang){
            if (strcasecmp($barang['jenis'], $jenis) === 0) {
                $dataditemukan = true;
            }
        }
        if($dataditemukan){
        echo '<h2>Data Barang dengan Jenis : ' . $jenis . '</h2>';
        echo '<table border ="2">
        <tr>
            <th>Nama</th>
            <th>Stok</th>
            <th>Harga</th>
        </tr>';
        foreach ($data as $barang) { //setiap elemen dari array akan disimpan dalam variabel $barang.
            if (strcasecmp($barang['jenis'], $jenis) === 0) {
                echo '<tr>';
                echo '<td>' . $barang['nama_barang'] . '</td>';
                echo '<td>' . $barang['stok'] . '</td>';
                echo '<td>' . $barang['harga'] . '</td>';
                echo '</tr>';
            }
        }
        echo '</table>';
    } else {
        echo '<p>Tidak ada data barang dengan jenis ' . $jenis . '</p>';
    }
    }
    ?>

</body>
</html>