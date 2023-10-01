<?php
include 'mysql_connect.php';

if (isset($_GET['customerNic'])){
    $nic=$_GET['customerNic'];
    $query = "DELETE FROM customer WHERE nic=$nic";
    $result=mysqli_query($con,$query);
    if($result){
        header("location:customer-list.php");
    }else{
        die(mysqli_error($con));
    }
}

?>