<!DOCTYPE html>
<html>
<head>
    <title>Form Perkenalan</title>
</head>
<body>
    <h2>Form Perkenalan</h2>
    <form method="post" action="">
        Nama: <input type="text" name="nama" required><br><br>
        Usia: <input type="text" name="usia" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Tanggal Lahir: <input type="date" name="tgl_lahir" required><br><br>
        Jenis Kelamin:
        <input type="radio" name="jenis_kelamin" value="Laki-laki" required>Laki-laki
        <input type="radio" name="jenis_kelamin" value="Perempuan" required>Perempuan<br><br>
        Bahasa yang dikuasai:
        <input type="checkbox" name="bahasa[]" value="html">html
        <input type="checkbox" name="bahasa[]" value="css">css
        <input type="checkbox" name="bahasa[]" value="java script">java script
        <input type="checkbox" name="bahasa[]" value="java">java
        <input type="checkbox" name="bahasa[]" value="python">python<br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $usia = $_POST['usia'];
            $email = $_POST['email'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $bahasa = isset($_POST['bahasa']) ? $_POST['bahasa'] : array(); // Periksa jika $bahasa ada atau kosong

            if (empty($bahasa)) {
                $perkenalan = "Halo, nama saya $nama. Saya berusia $usia tahun, lahir pada tanggal $tgl_lahir. Saya seorang $jenis_kelamin dan tidak menguasai bahasa apapun.";
            } else {
                $count = count($bahasa);
                $perkenalan = "Halo, nama saya $nama. Saya berusia $usia tahun, lahir pada tanggal $tgl_lahir. Saya seorang $jenis_kelamin dan menguasai bahasa:";
            }

            for ($i = 0; $i < $count; $i++) {  // Perulangan yang berfungsi apabila terdapat lebih dari 1 bahasa maka penguhubung terakhir nya akan menjadi dan
                $bahasaIndividu = $bahasa[$i];
                if ($count > 1) {
                    if ($i == $count - 1) {
                        $perkenalan .= "dan " . $bahasaIndividu;
                    } elseif ($i == $count - 2) {
                        $perkenalan .= $bahasaIndividu . " ";
                    } else {
                        $perkenalan .= $bahasaIndividu . ", ";
                    }
                }
            }


            echo "<p>$perkenalan</p>";
        }
    ?>
</body>
</html>