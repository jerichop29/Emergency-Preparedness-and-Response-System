<?php
require "../class/db_connection.php";
 
$userid = $_POST['userid'];
$sql = "select * from tbl_teams where id=".$userid;
$result = mysqli_query($connection,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<div class="card-body">
<table border='0' width='100%'>
<tr>
    <h5>Fullname: <?php echo $row['name']; ?></h5>
    <h5>Team Role : <?php echo $row['roles']; ?></h5>
    <h5>Team Name : <?php echo $row['teamname']; ?></h5>
    <h5>Date Created: <?php echo $row['date_created']; ?></h5>
   
    </td>
</tr>
</table>
 
<?php } ?>
