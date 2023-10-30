<?php 

//panggil koneksi database
require_once('../config/helper.php');
require_once('../config/connection.php');

//simpan data
if (isset($_POST['submitsimpan'])) {
    $create = mysqli_query($connection, "INSERT INTO tb_admin (nim, namalengkap, jeniskelamin, alamat, jurusan)
                                        VALUES ('$_POST[tnim]',
                                                '$_POST[tnama]',
                                                '$_POST[tkelamin]',
                                                '$_POST[talamat]',
                                                '$_POST[tjurusan]')");

    if($create){
        echo "<script>
        alert('Data berhasil disimpan!');
        window.location = '" . BASE_URL . "admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal disimpan!');
        window.location = '" . BASE_URL . "admin.php';
        </script>";
    }

}


?>