<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulir Masuk</title>
    <!-- Tambahkan referensi Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Login</h1>
                </div>
                <div class="card-body">
                <?php
                    session_start();

                     if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $username = $_POST["username"];//mengambil username utk dimasukkan ke $
                        $password = $_POST["password"];
                        $role = $_POST["role"]; 

                        $server = "localhost";
                        $db_username = "root";
                        $db_password = "";
                        $db_name = "db_mahasiswa";

                    $conn = new mysqli($server, $db_username, $db_password, $db_name);

                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                     }

                    $sql = "SELECT username, password FROM users WHERE username='$username' AND role='$role'";//mengambil data dari variabel users
                    $result = $conn->query($sql);//menjalankan kueri dr variabel sql dgn objek koneksi yg ada dlm conn dan disimpan ke result

                    if ($result->num_rows == 1) {//jika hanya satu baris yg cocok dgn kriteria pencarian, maka
                        $row = $result->fetch_assoc();//satu baris data diambil dari kueri sebagai array asosiatif
            
                    if (password_verify($password, $row["password"])) {//memeriksa pass yg dimasukkan 
                        $_SESSION["username"] = $username;//
                        $_SESSION["role"] = $role;
                        //untuk menyimpan data pengguna di sisi server yang akan tersedia sepanjang sesi (session) pengguna, nilai yg disimpan dalam session akan digunakan sepanjang sesi
                
                    // Sesuaikan pengalihan berdasarkan peran
                    if ($role == "admin") {
                        header("Location: halaman_admin.php");
                    } elseif ($role == "mahasiswa") {
                        header("Location: halaman_mahasiswa.php");
                    } else {
                        echo "Autentikasi gagal. Peran tidak valid.";
                    }

                        exit();
                    } else {
                        echo "Autentikasi gagal. Silakan coba lagi.";
                    }
                    } else {
                        echo "Autentikasi gagal. Silakan coba lagi.";
                    }

                    $conn->close();
                }
                ?>

                <form method="post" action="">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Peran:</label>
                            <select id="role" name="role" class="form-select" required>
                                <option value="admin">Admin</option>
                                <option value="mahasiswa">Mahasiswa</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Masuk</button>
                        <p>Belum memiliki akun? <a href="registrasi.php">Daftar disini</a></p>
                    </form>
                </div>   
            </div>
        </div>
    </div>
</div>
</html>