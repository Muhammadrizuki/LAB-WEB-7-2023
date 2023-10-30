<?php 

//panggil koneksi database
require_once('../config/helper.php');
require_once('../config/connection.php');

//delete data
if (isset($_POST['submitubah'])) {
    $update = mysqli_query($connection, "UPDATE tb_admin SET 
                                                            nim = '$_POST[tnim]',
                                                            namalengkap = '$_POST[tnama]',
                                                            jeniskelamin = '$_POST[tkelamin]',
                                                            alamat = '$_POST[talamat]',
                                                            jurusan = '$_POST[tjurusan]'
                                                        WHERE ID = '$_POST[ID]'
                                                            ");

    if($update){
        echo "<script>
        alert('Data berhasil diubah!');
        window.location = '" . BASE_URL . "admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal diubah!');
        window.location = '" . BASE_URL . "admin.php';
        </script>";
    }

}


?>