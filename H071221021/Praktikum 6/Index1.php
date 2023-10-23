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
    $jenis = strtolower($_POST['jenis']); // Mengonversi input ke huruf kecil
    $dataa = array_filter($data, function($item) use ($jenis){ //use digunakan untuk mengakses variabel yang berada di luar fungsi yang sedang dipanggil
        return strtolower($item['jenis']) == $jenis; // Mengonversi jenis barang dalam data ke huruf kecil
    });
} else {
    $dataa = $data;
}

?>

<form method="POST">
    <input type="text" name="jenis" id="jenis" placeholder="Masukkan jenis barang">
    <input type="submit" value="Submit">
</form>

<table border="1">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Stok</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dataa as $item): ?>
            <tr>
                <td><?= $item['nama_barang'] ?></td>
                <td><?= $item['stok'] ?></td>
                <td><?= $item['harga'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>