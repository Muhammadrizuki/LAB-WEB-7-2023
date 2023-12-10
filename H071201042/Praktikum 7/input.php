<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$usernamee = $_POST["username"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
// Lakukan validasi data (misalnya, cek apakah username sudah ada)
// Jika data valid, simpan data ke database
$server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "universitas";
$conn = new mysqli($server, $db_username, $db_password,
$db_name);
if ($conn->connect_error) {
die("Koneksi gagal: " . $conn->connect_error);
}
$sql = "INSERT INTO user (username, password) VALUES
('$username', '$password')";
if ($conn->query($sql) === TRUE) {
echo "Pendaftaran berhasil!";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}