<!doctype html>
<html lang="en">
  <head>
  <link href="../asset/img/background/login-logo.png" width="200" height="121" rel="icon">
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
          <h1 class="text-center"><a href="../admin_page.php#services" id="services" style="text-decoration: none;">VEHICLES MANAGEMENT</a></h1>
          <hr style="height: 1 px;color: black;background-color: black;">
          </div>
  <div class="table-responsive">  
  <table id="main" class="table table-bordered table-hover "  width="100%">
 
                <thead style="background-color: dodgerblue;">
                <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Usage</th>
                <th>Date Added</th>
                <th>Action</th>
              </tr>
                  </thead>
                
                  <tbody>
              <?php
 
                require '../class/db_config.php';
                $model = new Mode();
                $rows = $model->fetch();
                $i = 1;
                if(!empty($rows)){
                  foreach($rows as $row){ 
              ?>
              <?php

              
              ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td><?php echo $row['usage']; ?></td>
                <td><?php echo $row['date_added']; ?></td>
                <td>
                  <a href="team_edit.php?id=<?php echo $row['id']; ?>" title="Click to edit"  class="btn btn-primary">Edit</a>&nbsp;
                  <a href="team_delete.php?id=<?php echo $row['id']; ?>" title="Click to delete" class="btn btn-danger">Delete</a>
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



