<?php 

//panggil koneksi database
require_once('../config/helper.php');
require_once('../config/connection.php');

//update data
if (isset($_POST['submithapus'])) {
    $delete = mysqli_query($connection, "DELETE FROM tb_admin WHERE ID = '$_POST[ID]' ");

    if($delete){
        echo "<script>
        alert('Data berhasil dihapus!');
        window.location = '" . BASE_URL . "admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal dihapus!');
        window.location = '" . BASE_URL . "admin.php';
        </script>";
    }

}


?>