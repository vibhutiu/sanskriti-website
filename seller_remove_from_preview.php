<?php
    session_start();
    include 'connection.php';

    $name=$_SESSION["seller"];
    $id=$_SESSION["spreview_id"];
    
    
    $sql3="DELETE FROM preview WHERE id='$id'";
        
    $res3=mysqli_query($con,$sql3);
    unset($_SESSION["spreview_id"]);

    if($res3)
    {
        echo "<script type='text/javascript'>document.location = 'seller_uploaditem.php'; </script>";
    }
    else
    {
        $m="Some Error occured.Please again!!";
        
        echo "<script type='text/javascript'> alert($m);</script>";
    }
?>