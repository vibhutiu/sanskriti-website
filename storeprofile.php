<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Adding data to Database</title>
</head>

<body>
<?php
include 'connection.php';
$name=$_POST["fullname"];
$email=$_POST["email"];
$phone=$_POST["phone_number"];
$password=$_POST["password"];

$sql="INSERT INTO user (name,email,phone,password) VALUES('$name','$email','$phone','$password')";
$res=mysqli_query($con,$sql);
if($res)
{
echo "<script type='text/javascript'> document.location = 'signin2.php'; </script>";
}
?>
</body>
</html>
