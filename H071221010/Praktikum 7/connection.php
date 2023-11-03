<?php 
// koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tugas7");
if (!$koneksi) {
    die("Tidak Bisa Terkoneksi Ke Database");
}
?>