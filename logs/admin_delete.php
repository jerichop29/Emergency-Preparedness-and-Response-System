<?php 

    include '../head/header.php';
    require '../class/db_logs.php';
    $model = new Mod();
    $id = $_REQUEST['id'];
    $delete = $model->delete($id);

    if ($delete) {
        echo "<script>Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Deleted Successfully',
            showConfirmButton: false,
            timer: 1000
          }).then(function() {
            window.location.href = 'admin_logs.php';
          })</script>"; 
    }
 ?>
</html>