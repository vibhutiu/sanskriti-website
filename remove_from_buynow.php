<?php

if(isset($_SESSION["c_id"]))
{
    $cid=$_SESSION["c_id"];
    
    include 'connection.php';

    $sql="DELETE FROM buynow WHERE cust_id='$cid'";

    $res=mysqli_query($con,$sql);
}

?>