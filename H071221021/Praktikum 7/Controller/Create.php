<?php 

//panggil koneksi database
require_once('../Config/Helper.php');
require_once('../Config/Connection.php');

//simpan data
if (isset($_POST['submitsimpan'])) {
    $create = mysqli_query($conn, "INSERT INTO tb_admin (NIM, Nama_Lengkap, Jenis_Kelamin, Alamat, Prodi)
                                        VALUES ('$_POST[tnim]',
                                                '$_POST[tnama]',
                                                '$_POST[tkelamin]',
                                                '$_POST[talamat]',
                                                '$_POST[tProdi]')");

    if($create){
        echo "<script>
        alert('Data berhasil disimpan!');
        window.location = '" . BASE_URL . "Admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal disimpan!');
        window.location = '" . BASE_URL . "Admin.php';
        </script>";
    }

}


?>