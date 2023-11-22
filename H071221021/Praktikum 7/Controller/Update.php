<?php 

//panggil koneksi database
require_once('../Config/Helper.php');
require_once('../Config/Connection.php');

//delete data
if (isset($_POST['submitubah'])) {
    $update = mysqli_query($conn, "UPDATE tb_admin SET 
                                                            NIM = '$_POST[tnim]',
                                                            Nama_Lengkap = '$_POST[tnama]',
                                                            Jenis_Kelamin = '$_POST[tkelamin]',
                                                            Alamat = '$_POST[talamat]',
                                                            Prodi = '$_POST[tProdi]'
                                                        WHERE ID = '$_POST[ID]'
                                                            ");

    if($update){
        echo "<script>
        alert('Data berhasil diubah!');
        window.location = '" . BASE_URL . "Admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal diubah!');
        window.location = '" . BASE_URL . "Admin.php';
        </script>";
    }

}


?>