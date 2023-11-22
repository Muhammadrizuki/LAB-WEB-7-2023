<?php 

//panggil koneksi database
require_once('../Config/Helper.php');
require_once('../Config/Connection.php');

//update data
if (isset($_POST['submithapus'])) {
    $delete = mysqli_query($conn, "DELETE FROM tb_admin WHERE ID = '$_POST[ID]' ");

    if($delete){
        echo "<script>
        alert('Data berhasil dihapus!');
        window.location = '" . BASE_URL . "Admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal dihapus!');
        window.location = '" . BASE_URL . "Admin.php';
        </script>";
    }

}


?>