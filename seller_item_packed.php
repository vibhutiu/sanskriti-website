<?php
include 'connection.php';

$id=$_POST["id"];

$sql="UPDATE sells SET packed='1' WHERE id='$id'";

$res=mysqli_query($con,$sql);

if($res)
{
    echo "<script type='text/javascript'> document.location = 'seller_sells.php'; </script>";
}
else
{
    $m="Oops! Some error again. Please try again.";
    
    echo "<script type='text/javascript'>alert ('$m'); document.location = 'seller_sells.php'; </script>";
}
?>