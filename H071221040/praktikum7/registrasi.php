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
                        <h1 class="text-center">Registrasi akun</h1>
                    </div>
                    <div class="card-body">

                        <?php
                             if ($_SERVER["REQUEST_METHOD"] == "POST") {//memeriksa apakah permintaan HTTP yang diterima adalah POST request
                                $username = $_POST["username"];//mengambil username utk disimpan ke dlm $
                                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);//mengacak sandi sebelum msk ke $password, untuk mengamankan permintaan post
                                $role = $_POST["role"]; 

                                $server = "localhost";
                                $db_username = "root";
                                $db_password = "";
                                $db_name = "db_mahasiswa";


                            $conn = new mysqli($server, $db_username, $db_password, $db_name);//membuat koneksi ke database 

                             if ($conn->connect_error) {
                                die("Koneksi gagal: " . $conn->connect_error);//ini kalau koneksi gagal
                             }

                             // Cek apakah username sudah ada
                                $check_query = "SELECT * FROM users WHERE username = ?";//pernyataan select utk mengambil data dari 'users' , parameter ? digunakan sebagai placeholder untuk nilai yang akan digantikan saat prepared statement dieksekusi.
                                $check_statement = $conn->prepare($check_query);//prepare utk mempersiapkan kueri sebelum di eksekusi, objek statementnya disimpan di $
                                $check_statement->bind_param("s", $username);//mengaitkan parameter "?" dalam kueri dgn nilai yg akan digunakan saat prepare statement dieksekusi, "s" utk mengindikasikan bahwa username ada string dan $username adalah penggantinya
                                $check_statement->execute(); //Ini akan mengirimkan kueri ke database untuk dieksekusi dengan nilai yang telah diikat
                                $result = $check_statement->get_result();//mengambil hasil eksekusi kueri dan menyimpannya ke dlm result

                            if ($result->num_rows > 0) {//kalau hasilnya lebih dari satu baris, brrti sdh ada username yg sama sblmnya
                                 echo "Username sudah ada. Pilih username lain.";
                            } else {
                             // Gunakan prepared statement untuk query INSERT, gunanya utk memasukkan data pengguna baru ke dalam database
                            $insert_query = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
                            $insert_statement = $conn->prepare($insert_query);//prepared statement untuk kueri INSERT dibuat, dan objek prepared statement ini disimpan dalam variabel
                            $insert_statement->bind_param("sss", $username, $password, $role);//nilai yg akan dimasukkan ke dalam database

                            if ($insert_statement->execute()) { //prepared statement untuk INSERT dieksekusi dengan memanggil metode execute
                                echo "Pendaftaran berhasil!";
                             } else {
                                echo "Error: ". $insert_statement->error;
                                }
                             }

                            //menutup seluruh objek yang terkait dgn koneksi database
                            $check_statement->close();
                            $insert_statement->close();
                             $conn->close();
                             }
    ?>

                        <form class="mt-4" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
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
                            
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Konfirmasi Password:</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Daftar</button>
                            
                            <p class="mt-3">Sudah punya akun? <a href="login.php">Login disini</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;

            if (password != confirm_password) {
                alert("Konfirmasi password tidak sesuai!");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>

