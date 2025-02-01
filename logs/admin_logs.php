<!doctype html>
<html lang="en">
  <head>
  <link href="asset/img/background/login-logo.png" width="200" height="121" rel="icon">
    <!--CSS-->
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" >
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!--SCRIPTS-->
    

  <title>Profile</title>
  </head>
  <body>

    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center"><a href="../admin_page.php" style="text-decoration: none;">HOME</a> </h1>
          <hr style="height: 1 px;color: black;background-color: black;">
          </div>
  <div class="table-responsive">  
  <table id="main" class="table table-bordered table-hover" style="width:100%;">
 
                <thead style="background-color: aqua;">
                <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Email</th>
                <th>Login Date</th>
                <th>Action</th>
              </tr>
                  </thead>
                
                  <tbody>
              <?php
                require '../class/db_logs.php';
                $model = new Mod();
                $rows = $model->fetch();
                $i = 1;
                if(!empty($rows)){
                  foreach($rows as $row){ 
              ?>
              <?php

              
              ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['date_login']; ?></td>
                <td>
                  <center><a href="admin_delete.php?id=<?php echo $row['id']; ?>" title="Click to delete" class="btn btn-danger">Delete</a></center>
                </td>
              </tr> 
 
              <?php
                }
              }else{
                echo "NO DATA";
            }
              ?>
           
            </tbody>
          </table>



<script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"> </script>

<script> 

$(document).ready(function () {
    $('#main').DataTable();
});

</script>

</body> 



</html>



