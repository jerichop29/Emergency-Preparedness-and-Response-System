<?php
require "../class/db_connection.php";
 
$userid = $_POST['userid'];
$sql = "select * from tbl_admin where id=".$userid;
$result = mysqli_query($connection,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<div class="card-body">
<table border='0' width='100%'>
<tr>
    <h5>Firstname : <?php echo $row['name']; ?></h5>
    <h5>Lastname : <?php echo $row['lastname']; ?></h5>
    <h5>Age : <?php echo $row['age']; ?></h5>
    <h5>Birthday : <?php echo $row['bday']; ?></h5>
    <h5>Email : <?php echo $row['email']; ?></h5>
    <h5>Mobile No. : <?php echo $row['mobile']; ?></h5>
    <h5>Address : <?php echo $row['address']; ?></h5>
   
    </td>
</tr>
</table>
 
<?php } ?>
