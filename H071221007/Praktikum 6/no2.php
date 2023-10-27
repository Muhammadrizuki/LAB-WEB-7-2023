<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir</title>

</head>
<body>
    <h2>Form</h2>
    <form method="post">
        <label for="nama">Nama Lengkap</label>
        <!-- <p>:</p> -->
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="usia">Usia</label>
        <!-- <p>:</p> -->
        <input type="number" id="usia" name="usia" required><br><br>

        <label for="email">Email</label>
        <!-- <p>:</p> -->
        <input type="email" id="email" name="email" required><br><br>

        <label for="tanggal_lahir">Tanggal Lahir</label>
        <!-- <p>:</p> -->
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br><br>

        <label>Jenis Kelamin</label>
        <!-- <p>:</p> -->
        <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
        <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan<br><br>

        <label>Bahasa yang dikuasai</label>
        <!-- <p>:</p> -->
        <input type="checkbox" name="bahasa[]" value="Java"> Java
        <input type="checkbox" name="bahasa[]" value="Python"> Python
        <input type="checkbox" name="bahasa[]" value="HTML"> HTML
        <input type="checkbox" name="bahasa[]" value="CSS"> CSS
        <input type="checkbox" name="bahasa[]" value="JavaScript"> JavaScript
        <input type="checkbox" name="bahasa[]" value="PHP"> PHP
        <br><br>

        <input type="submit" value="Submit">
    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $usia = $_POST['usia'];
        $email = $_POST['email'];
        $tanggal_lahir = strtotime($_POST['tanggal_lahir']);
        $tanggal = date('d', $tanggal_lahir);
        $bulanIndonesia = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $bulan = $bulanIndonesia[intval(date('m', $tanggal_lahir)) - 1]; 
        $bulan = lcfirst($bulan); 
        $tahun = date('Y', $tanggal_lahir);
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $bahasa = isset($_POST["bahasa"]) ? $_POST["bahasa"] : [];
        $jumlah_bahasa = count($bahasa);


        if (empty($bahasa)) {
            $kalimat = 
            "Halo, Perkenalkan nama saya $nama, 
            saya berumur $usia tahun, 
            saya lahir pada tanggal $tanggal $bulan tahun $tahun, 
            saya berjenis kelamin $jenis_kelamin, 
            saya belum menguasai bahasa pemrograman apapun.";
        } else {
            $kalimat = 
            "Halo, perkenalkan nama saya $nama, 
            saya berumur $usia tahun, 
            saya lahir pada tanggal $tanggal $bulan tahun $tahun, 
            saya berjenis kelamin $jenis_kelamin, 
            saya berhasil menguasai bahasa pemrograman";
            for ($i = 0; $i < $jumlah_bahasa; $i++) {
                if ($i === ($jumlah_bahasa - 1)) {
                    $kalimat.= " dan $bahasa[$i].";
                    continue;
                }
                $kalimat.= " $bahasa[$i],";
            };
        }

        echo "<p>$kalimat</p>";

    }
    ?>
</body>
</html>
