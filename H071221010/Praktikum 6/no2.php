<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <h1>FORM</h1>
        <label for="nama">Nama Lengkap : </label>
        <input style="margin-bottom: 10px; width: 200px;" type="text" name="nama" id="nama" placeholder="Masukkan Nama Lengkap Anda" required> <br>
        <label for="usia">Usia : </label>
        <input style="margin-bottom: 10px; width: 200px;" type="text" name="usia" id="usia" placeholder="Masukkan Usia Anda" required> <br>
        <label for="email">Email : </label>
        <input style="margin-bottom: 10px; width: 200px;" type="text" name="email" id="email" placeholder="Masukkan Alamat Email Anda" required> <br>
        <label for="tanggal-lahir">Tanggal Lahir : </label>
        <input style="margin-bottom: 10px; width: 200px;" type="date" name="tanggal-lahir" id="tanggal-lahir" required> <br>
        <label style="margin-bottom: 10px;" for="">Jenis Kelamin : </label>
        <input type="radio" name="gender" id="male" value="Laki-laki" required>
        <label for="male">Laki-laki</label>
        <input type="radio" name="gender" id="female" value="Perempuan" required>
        <label for="female">Perempuan</label> <br>
        <label style="margin-bottom: 10px;" for="">Bahasa yang Dikuasai : </label>
        <input style="margin-bottom: 10px;" type="checkbox" name="bahasa[]" id="Java" value="Java">
        <label style="margin-bottom: 10px;" for="Java">Java</label>
        <input style="margin-bottom: 10px;" type="checkbox" name="bahasa[]" id="Python" value="Python">
        <label style="margin-bottom: 10px;" for="Python">Python</label>
        <input style="margin-bottom: 10px;" type="checkbox" name="bahasa[]" id="HTML" value="HTML">
        <label style="margin-bottom: 10px;" for="HTML">HTML</label>
        <input style="margin-bottom: 10px;" type="checkbox" name="bahasa[]" id="CSS" value="CSS">
        <label style="margin-bottom: 10px;" for="CSS">CSS</label>
        <input style="margin-bottom: 10px;" type="checkbox" name="bahasa[]" id="JavaScript" value="JavaScript">
        <label style="margin-bottom: 10px;" for="JavaScript">JavaScript</label>
        <input style="margin-bottom: 10px;" type="checkbox" name="bahasa[]" id="PHP" value="PHP">
        <label style="margin-bottom: 10px;" for="PHP">PHP</label><br>
        <button style="margin-bottom: 10px;" type="submit">Kirim</button>
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST["nama"];
            $usia = $_POST["usia"];
            $email = $_POST["email"];
            $tanggalLahir = $_POST["tanggal-lahir"];
            $gender = $_POST["gender"];
            $bahasa = isset($_POST["bahasa"]) ? $_POST["bahasa"] : [];
            $tanggalLahir = date('j F Y', strtotime($tanggalLahir));
            if (!empty($bahasa)) {
                echo "Alohaa! Perkenalkan aku merupakan seorang $gender bernama $nama. Aku lahir pada tanggal $tanggalLahir, makanya sekarang aku berusia $usia tahun. Saat ini Aku baru menguasai bahasa " . implode(", ", $bahasa) . ".";
            } else {
                echo "Alohaa! Perkenalkan aku merupakan seorang $gender bernama $nama. Aku lahir pada tanggal $tanggalLahir, makanya sekarang aku berusia $usia tahun. Saat ini Aku belum menguasai bahasa pemrograman apapun";
            }
        }
    ?>
</body>
</html>