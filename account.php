<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Account</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<?php
    include 'home_header.php';
    include 'remove_from_buynow.php';
    ?>
<?php 

$name= $_SESSION["name"];

?> 


<div class="container">
<a href="profile.php">
<div class="card">
<h4>Profile</h4>
<p> Manage your profile details.</p>
</div>
</a>
<a href="cart.php">
<div class="card">
<h4>Cart</h4>
<p> Manage your orders.</p>
</div>
</a>
<a href="seller_rules.php">
<div class="card">
<h4>Seller Account</h4>
<p> Sign In to your Seller Account to sell your products.</p>
</div>
</a>
<a href="user_previous_orders.php">
<div class="card">
<h4>Previous Orders</h4>
<p> Check your previous orders.</p>
</div>
</a>
</div>

</body>
</html>
