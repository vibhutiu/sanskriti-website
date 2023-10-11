<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<?php 
$x=$_GET["hide"];
//echo $x;
?>
<div class="container">
<div class="card">
<div class="image" >
<img src="file:///E|/Photos/116APPLE/AAWI6152.JPG" style="float:left; width:500px; margin:20px" />
</div>
<div class="text" style="font:Arial, Helvetica, sans-serif">
<br />
<br />

<p> <h1> Red TirtleNeck Tshirt</h1>
<br />
<b> Price : $10</b>
<br />
<br />

<b>Sizes Available:</b>
<div class="form-group">
  
  <select class="form-control" id="sel1" style="width:100px;">
  <option>select</option>
    <option>S</option>
    <option>M</option>
    <option>L</option>
    <option>XL</option>
  </select>
</div>
<br />
<br />
<b> Instructions</b>
sdgdfbn<br />
asdfg<br />

</p>

</div>
<form>
<button type="button" class="btn btn-default">Buy Now</button>
<button type="button" class="btn btn-default" name="cart">Add to Cart</button>
</form>
</div>
</div>
<?php
if(isset($_GET["cart"]))
{
include 'connection.php';
$name=$_POST["fullname"];
$email=$_POST["email"];
$phone=$_POST["phonenumber"];
$password=$_POST["password"];

$sql="INSERT INTO cart (name,email,phone,password) VALUES('$name','$email','$phone','$password')";
$res=mysqli_query($con,$sql);
if($res)
{
echo "<script type='text/javascript'> document.location = 'account.php'; </script>";
}
}
?>
</body>
</html>
