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

$filtered_products = [];


if (isset($_GET["jenis_barang"])) { //Ini adalah kondisi yang memeriksa apakah parameter GET dengan nama "jenis_barang" telah diterima atau tidak
  // filter datanya
  $jenis_barang = $_GET["jenis_barang"]; //mengambil nilai get jenis barang untuk dimasukkan ke jenis barang

  for ($i = 0; $i < count($data); $i++) {//perulangan memeriksa jenis barang apakah sama dengan nilai yg diterima dari get jenis barang
    if (strtolower($data[$i]['jenis']) == strtolower($jenis_barang)) {//klo misal sama, maka produk akan dimasukkan ke dlm array filtered dgn menggunakan push
      array_push($filtered_products, $data[$i]);
    } 
    //Ini berarti bahwa produk-produk yang memiliki jenis barang yang sesuai dengan nilai dari parameter GET akan ditempatkan dalam array $filtered_products
  }
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Search Barang</title>

  <style>
    table,
    th,
    td {
      border: 1px solid black;
      padding: 4px 8px;
      border-collapse: collapse;
    }
  </style>
</head>

<body>
  <form method="GET" action="./nomor1.php">
    <input name="jenis_barang" placeholder="Masukkan tipe">
    <button>Submit</button>
  </form>

<?php
    if (isset ($_GET["jenis_barang"]) ) {
        if (count($filtered_products) == 0) {
            echo "Tipe tidak ditemukan";
        }
    }
?>
  <br>
  <table>
    <thead>
      <tr>
        <th>Nama</th>
        <th>Stock</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php
      for ($i = 0; $i < count($filtered_products); $i++) {//perulangan untuk filter produk yg sdh dilakukan di atas
      ?>
        <tr>
          <td><?= $filtered_products[$i]['nama_barang'] ?></td>
          <td><?= $filtered_products[$i]['stok'] ?></td>
          <td>Rp.<?= $filtered_products[$i]['harga'] ?>,-</td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
</body>

</html>
