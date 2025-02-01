<!Doctype html>
<html lang="en">
  <head>
  <link href="../asset/img/background/login-logo.png" width="200" height="121" rel="icon">
    <!--CSS-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--SCRIPTS-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <title>EDIT-ADMIN</title>
 </head>
 <body>
  <br>
  &nbsp;
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center">EDIT DATA</h1>
          <hr style="height: 1px;color: black;background-color: black;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 mx-auto">
          <?php
              include '../class/db_teams.php';
              include '../head/header.php';
              $model = new Mode();
              $id = $_REQUEST['id'];
              $row = $model->edit($id);
 
              if (isset($_POST['update'])) {
                if (isset($_POST['name']) && isset($_POST['roles']) && isset($_POST['teamname'])) {
                  if (!empty($_POST['name']) && !empty($_POST['roles']) && !empty($_POST['teamname'])) {
                     
                    $data['id'] = $id;
                    $data['name'] = $_POST['name'];
                    $data['roles'] = $_POST['roles'];
                    $data['teamname'] = $_POST['teamname'];
                    
                    
 
                    $update = $model->update($data);
 
                    if($update){
                      echo "<script>
                                 Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Saved Successfully',
                                showConfirmButton: true,
                                timer: 50000
                              }).then(function() {
                                window.location.href = 'team_index.php';
                              })
                              </script>";          
                          
                      
                    }else{
                      echo "<script>
                                 Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Unsuccessfull',
                                showConfirmButton: true,
                                timer: 50000
                              }).then(function() {
                                window.location.href = 'team_index.php';
                              })
                              </script>";     
                    }
 
                  }else{
                    echo "<script>
                                 Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Fill up the box',
                                showConfirmButton: true,
                                timer: 50000
                              })
                              </script>";     
                              header("Location: team_edit.php?id=$id");
                  }
                }
              }
          ?>
          <form action="" method="post">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Role</label>
              <select name="roles" class="form-group" style="width: 100%; padding: 8px; border-radius: 10px;" required>
              <option value="0">Select Role</option>
              <option value="Barangay Captain">Barangay Captain</option>
              <option value="Committee Chairman on BDDRMC">Committee Chairman on BDDRMC</option>
              <option value="Team Leader">Team Leader</option>
              <option value="Team Co-Leader">Team Co-Leader</option>
              <option value="Team Member">Team Member</option>
          </select>
            </div>
            <div class="form-group">
              <label for="">Team Name</label>
              <select name="teamname" class="form-group" style="width: 100%; padding: 8px; border-radius: 10px;" required>
              <option value="0">Select Team</option>
              <option value="BQRT Bañadero">BQRT Bañadero</option>.
              <option value="BPSO Bañadero">BPSO Bañadero</option>
          </select>
            </div>
            <div class="form-group"> 
              <button type="submit" name="update" class="btn btn-primary">Submit</button>
              <a href="../admin_page.php" class="btn btn-danger">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>
</html>