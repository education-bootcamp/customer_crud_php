<?php
$con = new mysqli('localhost',
    'root','1234','customer_crud');
if (!$con){
    die(mysqli_error($con));
}
?>