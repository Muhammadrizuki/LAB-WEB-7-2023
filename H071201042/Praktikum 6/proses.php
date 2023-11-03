<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    if (!empty($nama)) {
        echo "Nama: $nama <br>";
        echo "Email: $email <br>";
    }else {
        echo "silahkan isi nama terlebih dahulu";
    }
}
