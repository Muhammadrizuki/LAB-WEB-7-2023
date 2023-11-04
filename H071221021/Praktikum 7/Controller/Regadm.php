<?php

require_once('../Config/Helper.php');
require_once('../Config/Connection.php');

$Nama_Lengkap = $_POST['Nama_Lengkap'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

// Kondisi untuk register
if (empty($Nama_Lengkap) || empty($username) || empty($email) || empty($password) || empty($repassword)) {
    header("location: " . BASE_URL . 'RegisterAdm.php?process=failedempty');
} else {
    if ($password != $repassword) {
        header("location: " . BASE_URL . 'RegisterAdm.php?process=failedpassword');
    } else {
        $query = mysqli_query($conn, "SELECT * FROM tb_adm WHERE username = '$username'");
        if (mysqli_num_rows($query) != 0) {
            header("location: " . BASE_URL . 'RegisterAdm.php?process=failedusername');
        } else {
            mysqli_query($conn, "INSERT INTO tb_adm (Nama_Lengkap, username, email, password) 
                                        VALUES ('$Nama_Lengkap', '$username', '$email', '$password')");
            header("location: " . BASE_URL . 'Login.php?process=successregister');
        }
    }
}