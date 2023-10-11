<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Storing seller details to database</title>
</head>

<body>
<?php
    session_start();
include 'connection.php';
$name=$_SESSION["name"];
$mail=$_POST["email"];
$phone=$_POST["phone_number"];
$company=$_POST["company_name"];
$bank=$_POST["bank_name"];
$accno=$_POST["account_number"];
$password=$_POST["password"];

$sql="INSERT INTO seller (name,company,phone,bank,account_number,password,email) VALUES('$name','$company','$phone','$bank','$accno','$password','$mail')";
$res=mysqli_query($con,$sql);
if($res)
{
echo "<script type='text/javascript'> document.location = 'seller_signin.php'; </script>";
}
?>
</body>
</html>
