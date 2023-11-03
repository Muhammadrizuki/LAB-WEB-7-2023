<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
</head>
<body>
    <center>
        <form style="margin-top: 170px" method="get">
            <label style="font-size: 20px; font-weight: bold;" for="barang">Jenis Barang : </label><br>
            <input style="border-radius: 10px; height: 15px; width: 150px; padding: 7px; margin-top: 10px; margin-right: 3px;" type="text" name="barang" id="barang" placeholder="Masukkan Jenis Barang">
            <button style="border-radius: 10px; height: 32px; width: 60px;" type="submit">Cari</button>
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

            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["barang"])) {
                $jenisBarang = ucwords(strtolower($_GET["barang"]));
                $adaData = false;
                
                foreach ($data as $barang) {
                    if ($barang["jenis"] == $jenisBarang) {
                        if (!$adaData) {
                            echo "<h3>$jenisBarang</h3>";
                            echo "<table border='1' cellspacing='0' cellpadding='7'>";
                            echo "<tr><th>Nama Barang</th><th>Harga</th><th>Stok</th></tr>";
                            $adaData = true;
                        }
                        echo "<tr>";
                        echo "<td>" . $barang["nama_barang"] . "</td>";
                        echo "<td>" . $barang["harga"] . "</td>";
                        echo "<td>" . $barang["stok"] . "</td>";
                        echo "</tr>";
                    }
                }

                if (!$adaData) {
                    echo "<br>data tidak ditemukan";
                } else {
                    echo "</table>";
                }
            }
        ?>
    </center>
</body>
</html>
