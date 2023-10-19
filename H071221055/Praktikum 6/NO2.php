<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .input-group {
            display: flex;
            flex-direction: row;
            margin: 8px 0;
            align-items: center;
        }

        .input-group label {
            display: flex;
            justify-content: space-between;
            min-width: 216px;
            margin-right: 4px;
        }
    </style>
</head>

<body>
    <h1>Form Perkenalan</h1>
    <form method="post">

        <form id="form-personal-data" method="post">
            <div class="input-group">
                <label>Nama Lengkap <span>:</span></label>
                <input name="Nama" placeholder="Masukkan nama" type="text" required>
            </div>
            <div class="input-group">
                <label>Usia <span>:</span></label>
                <input name="Usia" placeholder="Masukkan umur" type="number" min="0" required>
            </div>
            <div class="input-group">
                <label>Email <span>:</span></label>
                <input name="Email" placeholder="Masukkan email" type="email" required>
            </div>
            <div class="input-group">
                <label>Tanggal Lahir <span>:</span></label>
                <input name="tanggal_lahir" type="date" required>
            </div>

            <div class="input-group">
                <label>Jenis Kelamin <span>:</span></label>
                <input name="jenis_kelamin" value="Laki-laki" type="radio"><span>Laki-laki</span>
                <input name="jenis_kelamin" value="Perempuan" type="radio"><span>Perempuan</span>
            </div>

            <div class="input-group">
                <label>Bahasa yang dikuasai <span>:</span></label>
                <input name="bahasa[]" value="Java" type="checkbox"><span>Java</span>
                <input name="bahasa[]" value="Python" type="checkbox"><span>Python</span>
                <input name="bahasa[]" value="HTML" type="checkbox"><span>HTML</span>
                <input name="bahasa[]" value="CSS" type="checkbox"><span>CSS</span>
                <input name="bahasa[]" value="JavaScript" type="checkbox"><span>JavaScript</span>
                <input name="bahasa[]" value="PHP" type="checkbox"><span>PHP</span>
            </div>

            <div class="input-group">
                <button type="submit">Submit</button>
            </div>
        <!-- </form>
        <input type="checkbox" name="rules" value="web">
        <label for="web">family man</label> <br>
        <input type="checkbox" name="rules" value="web">
        <label for="web">smell good is a must</label> <br>
        <input type="checkbox" name="rules" value="web">
        <label for="web">always been there if i need</label> <br>
        <input type="checkbox" name="rules" value="web">
        <label for="web">no starboy</label> <br> -->

        <?php
        //server method untuk akses informasi 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['Nama'];
            $usia = $_POST['Usia'];
            $email = $_POST['Email'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $bahasa = $_POST['bahasa'];
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $tanggal_lahir = $_POST['tanggal_lahir'];
                $tanggal_lahir = date('d F Y', strtotime($tanggal_lahir));
            }

            $kalimat = "Hai, nama saya adalah $nama.Saya berusia $usia tahun.";
            $kalimat .= "Saya lahir pada tanggal $tanggal_lahir. ";
            $kalimat .= "Email saya adalah  $email. ";
            $kalimat .= "Saya adalah seorang $jenis_kelamin. ";

            if (!empty($bahasa)) {
                $kalimat .= "Saya bisa berbicara dalam bahasa ";
                $kalimat .= implode(", ", $bahasa); //implode, yang mengubah array bahasa menjadi string yang dipisahkan oleh koma.kalau pakai implode brarti pakai array
                $kalimat .= ".";

            } else {
                $kalimat .= "Saya tidak menguasai bahasa pemrograman";
            }

            echo "<h2>Perkenalan Singkat:</h2>";
            echo $kalimat;
        }
        ?>
</body>

</html>