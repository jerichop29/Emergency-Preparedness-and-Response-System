<?php
// Load the database configuration file
include_once '../class/db_config.php';

// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
  <link href="../asset/img/background/login-logo.png" width="200" height="121" rel="icon">
    <!--CSS-->
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" >
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!--SCRIPTS-->
    

  <title>Residents Record</title>
  </head>
  <body>

    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center"><a href="../admin_page.php#resume" style="text-decoration: none;">BARANGAY BAÑADERO RESIDENCE LIST</a> </h1>
          <hr style="height: 1 px;color: black;background-color: black;">
          </div>
          <!-- Display status message -->
<?php
 if(!empty($statusMsg)){ ?>
<div class="col-xs-12">
    <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
</div>
<?php }
 ?>

  <table id="main" class="table table-bordered table-hover table-stripped" width="100%">
 
                <thead style="background-color: yellowgreen;">
                <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Age</th>
                <th>Birthday</th>
                <th>Email</th>
                <th>Mobile No.</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
                  </thead>
                
                  <tbody>
              <?php
 
                require '../class/db_admin.php';
                $model = new Model();
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
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['bday']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td>
                  <a href="admin_edit.php?id=<?php echo $row['id']; ?>" title="Click to edit"  class="btn btn-primary">Edit</a>&nbsp;
                  <a href="admin_delete.php?id=<?php echo $row['id']; ?>" title="Click to delete" class="btn btn-danger">Delete</a>
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

    <div class="row">
    <!-- Import link -->
    <div class="col-md-12 head">
        <div class="float-right">
            <a href="javascript:void(0);" class="btn btn-primary" onclick="formToggle('importFrm');" style="width: 15%;"><i class="plus"></i> IMPORT FILE</a>
        </div><br>
    </div>
   <!-- CSV file upload form -->
          <div class="col-md-12" id="importFrm" style="display: none;">
        <form action="importData.php" method="post" enctype="multipart/form-data" >
            <input type="file" name="file" /> <br><br>
            <input type="submit" class="btn btn-success" name="importSubmit" value="IMPORT" style="width: 15%;">
        </form>
    </div>



<script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"> </script>

<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>

<script> 

$(document).ready(function () {
    $('#main').DataTable();
});

</script>

</body> 



</html>



