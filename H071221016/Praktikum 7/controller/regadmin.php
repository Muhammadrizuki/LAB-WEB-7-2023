<?php

require_once('../config/helper.php');
require_once('../config/connection.php');

$namalengkap = $_POST['namalengkap'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

// Kondisi untuk register
if (empty($namalengkap) || empty($username) || empty($email) || empty($password) || empty($repassword)) {
    header("location: " . BASE_URL . 'registeradm.php?process=failedempty');
} else {
    if ($password != $repassword) {
        header("location: " . BASE_URL . 'registeradm.php?process=failedpassword');
    } else {
        $query = mysqli_query($connection, "SELECT * FROM tb_adm WHERE username = '$username'");
        if (mysqli_num_rows($query) != 0) {
            header("location: " . BASE_URL . 'registeradm.php?process=failedusername');
        } else {
            mysqli_query($connection, "INSERT INTO tb_adm (namalengkap, username, email, password) 
                                        VALUES ('$namalengkap', '$username', '$email', '$password')");
            header("location: " . BASE_URL . 'login.php?process=successregister');
        }
    }
}