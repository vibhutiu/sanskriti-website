<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include 'seller_header.php';?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Storing Seller's Edited Profile</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Storing edited details into database</title>
</head>

<body>
<?php
    
$id=$_SESSION["seller_id"];
include 'connection.php';
    
$name=$_SESSION["seller"];
$name1=$_POST["name"];
$cname=$_POST["cname"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$bank=$_POST["bank"];
$accno=$_POST["accno"];


$sql="UPDATE seller SET name='$name1', phone='$phone', email='$email', company='$cname', bank='$bank', account_number='$accno' WHERE id='$id'";
    
$res=mysqli_query($con,$sql);
if($res)
{
    //print_r($_SESSION);
    echo "<script type='text/javascript'> document.location = 'seller_profile.php'; </script>";
    $_SESSION["seller"]=$name1;
}
else
{
    echo "<script type='text/javascript'> alert 'Some error occured.Please try again'; document.location = 'seller_profile.php'; </script>";
}

?>
</body>
</html>
