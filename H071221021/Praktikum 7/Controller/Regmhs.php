<?php

require_once('../Config/Helper.php');
require_once('../Config/Connection.php');

$Nama_Lengkap = $_POST['Nama_Lengkap'];
$username = $_POST['Username'];
$nim = $_POST['NIM'];
$password = $_POST['Password'];
$repassword = $_POST['Repassword'];

// Kondisi untuk register
if (empty($Nama_Lengkap) || empty($username) || empty($nim) || empty($password) || empty($repassword)) {
    header("location: " . BASE_URL . 'RegisterMhs.php?process=failedempty');
} else {
    if ($password != $repassword) {
        header("location: " . BASE_URL . 'RegisterMhs.php?process=failedpassword');
    } else {
        $query = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE Username = '$username'");
        if (mysqli_num_rows($query) != 0) {
            header("location: " . BASE_URL . 'RegisterMhs.php?process=failedusername');
        } else {
            mysqli_query($conn, "INSERT INTO tb_mahasiswa (Nama_Lengkap, Username, NIM, Password) 
                                        VALUES ('$Nama_Lengkap', '$username', '$nim', '$password')");
            header("location: " . BASE_URL . 'Login.php?process=successregister');
        }
    }
}