<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Store Shipping Address</title>
</head>

<body>
<?php

include 'connection.php';
session_start();
$cust=$_SESSION["c_id"];
$name=$_POST["name"];
$add1=$_POST["ad1"];
$add2=$_POST["ad2"];
$city=$_POST["city"];
$pin=$_POST["pc"];
$state=$_POST["state"];
$phone=$_POST["phone"];
$_SESSION["ship_add"]="new";
echo $name;

$sql2="INSERT INTO shipping (id,name,add_line1,add_line2,city,pincode,state,phone) VALUES ('$cust','$name','$add1','$add2','$city','$pin','$state','$phone')";

if ($con->query($sql2) === TRUE)
{
echo "yes";
echo "<script type='text/javascript'> document.location = '".$_SESSION["after_address"]."'; </script>";
}
else
{
    echo "no";
}
//secho "<script type='text/javascript'> document.location = '".$_POST["corp"]."';

?>
</body>
</html>
