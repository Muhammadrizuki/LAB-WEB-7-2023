<?php

//panggil koneksi database
require_once('config/helper.php');
require_once('config/connection.php');

session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Arahkan pengguna kembali ke halaman login jika mereka belum masuk atau jika peran bukan "admin".
    exit;
}



?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <button type="button" class="btn btn-danger mt-4 btn-logout">
      Log Out
    </button>
    <h3 class="text-center mt-4 mb-4">Data Mahasiswa</h3>

    <div class="card">
      <div class="card-header bg-primary text-white">
        Data Mahasiswa
      </div>
      <div class="card-body">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#modalTambah">
          Tambah
        </button>
        <table class="table table-bordered table-striped table-hover">
          <tr>
            <th>No.</th>
            <th>NIM</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Jurusan</th>
            <th>Aksi</th>
          </tr>

          <?php

          //persiapan menampilkan data
          $no = 1;
          $tampil = mysqli_query($connection, "SELECT * FROM tb_admin ORDER  BY nim");
          while ($data = mysqli_fetch_array($tampil)):


            ?>

            <tr>
              <td>
                <?= $no++ ?>
              </td>
              <td>
                <?= $data['nim'] ?>
              </td>
              <td>
                <?= $data['namalengkap'] ?>
              </td>
              <td>
                <?= $data['jeniskelamin'] ?>
              </td>
              <td>
                <?= $data['alamat'] ?>
              </td>
              <td>
                <?= $data['jurusan'] ?>
              </td>
              <td>
                <a href="" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                  data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                  data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
              </td>
            </tr>

            <!-- Ubah data -->
            <div class="modal fade modal-lg" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false"
              tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <form method="POST" action="controller/update.php">
                    <input type="hidden" name="ID" value="<?= $data['ID'] ?>">
                    <div class="modal-body">

                      <div class="mb-3">
                        <label class="form-label">NIM :</label>
                        <input type="text" class="form-control" name="tnim" value="<?= $data['nim'] ?>"
                          placeholder="Masukkan NIM anda!">
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Nama Lengkap :</label>
                        <input type="text" class="form-control" name="tnama" value="<?= $data['namalengkap'] ?>"
                          placeholder="Masukkan Nama lengkap anda!">
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Jenis Kelamin :</label>
                        <select class="form-select" name="tkelamin">
                          <option value="<?= $data['jeniskelamin'] ?>">
                            <?= $data['jeniskelamin'] ?>
                          </option>
                          <option value="pria">Pria</option>
                          <option value="wanita">Wanita</option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Alamat :</label>
                        <input type="text" class="form-control" name="talamat" value="<?= $data['alamat'] ?>"
                          placeholder="Masukkan alamat anda!">
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Jurusan :</label>
                        <select class="form-select" name="tjurusan">
                          <option value="<?= $data['jurusan'] ?>">
                            <?= $data['jurusan'] ?>
                          </option>
                          <option value="Matematika">Matematika</option>
                          <option value="Fisika">Fisika</option>
                          <option value="Kimia">Kimia</option>
                          <option value="Biologi">Biologi</option>
                          <option value="Statistika">Statistika</option>
                          <option value="Geofisika">Geofisika</option>
                          <option value="Sistem Informasi">Sistem Informasi</option>
                          <option value="Aktuaria">Aktuaria</option>
                        </select>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-primary" name="submitubah" value="Ubah"></input>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Ubah Data -->

            <!-- Hapus data -->
            <div class="modal fade modal-lg" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false"
              tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <form method="POST" action="controller/delete.php">
                    <input type="hidden" name="ID" value="<?= $data['ID'] ?>">
                    <div class="modal-body">

                      <h5 class="text-center">Apakaha anda yakin akan menghapus data ini? <br>
                        <span class="text-danger">
                          <?= $data['nim'] ?> -
                          <?= $data['namalengkap'] ?>
                        </span>
                      </h5>


                    </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-primary" name="submithapus" value="Ya, Hapus!"></input>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Hapus Data -->

          <?php endwhile; ?>
        </table>



        <!-- Tambah data -->
        <div class="modal fade modal-lg" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false"
          tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form method="POST" action="controller/create.php">
                <div class="modal-body">

                  <div class="mb-3">
                    <label class="form-label">NIM :</label>
                    <input type="text" class="form-control" name="tnim" placeholder="Masukkan NIM anda!">
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Nama Lengkap :</label>
                    <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama lengkap anda!">
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Jenis Kelamin :</label>
                    <select class="form-select" name="tkelamin">
                      <option></option>
                      <option value="pria">Pria</option>
                      <option value="wanita">Wanita</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Alamat :</label>
                    <input type="text" class="form-control" name="talamat" placeholder="Masukkan alamat anda!">
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Jurusan :</label>
                    <select class="form-select" name="tjurusan">
                      <option></option>
                      <option value="Matematika">Matematika</option>
                      <option value="Fisika">Fisika</option>
                      <option value="Kimia">Kimia</option>
                      <option value="Biologi">Biologi</option>
                      <option value="Statistika">Statistika</option>
                      <option value="Geofisika">Geofisika</option>
                      <option value="Sistem Informasi">Sistem Informasi</option>
                      <option value="Aktuaria">Aktuaria</option>
                    </select>
                  </div>

                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" name="submitsimpan" value="Simpan"></input>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Tambah Data -->


      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <script>
    document.querySelector(".btn-logout").addEventListener("click", function () {
      // Mengarahkan pengguna kembali ke halaman login
      window.location.href = "login.php"; // Ganti "login.php" sesuai dengan alamat halaman login Anda
    });
  </script>>

</body>

</html>