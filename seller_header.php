<?php
session_start();
if(!isset($_SESSION["seller"]))
{
   echo "<script type='text/javascript'> document.location = 'seller_rules.php'; </script>"; 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Seller Page's Header</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  .dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
  </style>
</head>

<body>
<div class="container-fluid" style="background-color:#660033;">
<nav class="navbar navbar-inverse" style="background-color:#660033; border:none" >
  <div class="container-fluid">
    <div class="navbar-header">
      <div><img src="Images/logo3.PNG" style="width:140px; height:50px; margin-left:25px; position:relative; top:0px; bottom:20px; right:4px"/></div>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="seller_profile.php">Your Profile</a></li>
      <li><a href="seller_uploaditem.php">Upload item</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle"  href="#">Sells</a>
        <div class="dropdown-content">
		<ul class="nav nav-pills nav-stacked">
          <li><a href="seller_show_uploaded.php">Uploaded Item</a></li>
          <li><a href="seller_sells.php">Sold Items</a></li>
		  </ul>
          
        </div>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="seller_signout.php">Sign Out</a></li>
    </ul>
  </div>
</nav>
</div>
</body>
</html>
