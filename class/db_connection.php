<?php
$connection = new mysqli("localhost","root","","user_db");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}

