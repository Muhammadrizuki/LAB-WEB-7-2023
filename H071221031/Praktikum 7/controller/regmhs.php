<?php

require_once('../config/helper.php');
require_once('../config/connection.php');

$namalengkap = $_POST['namalengkap'];
$username = $_POST['username'];
$nim = $_POST['nim'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

// Kondisi untuk register
if (empty($namalengkap) || empty($username) || empty($nim) || empty($password) || empty($repassword)) {
    header("location: " . BASE_URL . 'registermhs.php?process=failedempty');
} else {
    if ($password != $repassword) {
        header("location: " . BASE_URL . 'registermhs.php?process=failedpassword');
    } else {
        $query = mysqli_query($connection, "SELECT * FROM tb_mahasiswa WHERE username = '$username'");
        if (mysqli_num_rows($query) != 0) {
            header("location: " . BASE_URL . 'registermhs.php?process=failedusername');
        } else {
            mysqli_query($connection, "INSERT INTO tb_mahasiswa (namalengkap, username, nim, password) 
                                        VALUES ('$namalengkap', '$username', '$nim', '$password')");
            header("location: " . BASE_URL . 'login.php?process=successregister');
        }
    }
}