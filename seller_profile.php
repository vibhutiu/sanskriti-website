<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Seller Profile</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/seller_profile.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'seller_header.php';?>
<?php 

    $id=$_SESSION["seller_id"];
     include 'connection.php';

    				
    $sql="SELECT * FROM seller where id='$id'";
							
    $result=mysqli_query($con,$sql);
							
    $row=mysqli_fetch_array($result);

    $name=$row["name"];
    $phone=$row["phone"];					
    $email=$row["email"];
    $cname=$row["company"];
    $bank=$row["bank"];
    $accno=$row["account_number"];
    
?>


<div class="container">

<div class="row">
<div class="col-lg-3">
</div>
<div class="col-lg-9">
<div class="card1" >

<h1 style="color:	#660033;" align="center"> PROFILE</h1>
<hr />
<br />
<p style="font-size:24px;"> Seller Name : <?php echo $name;?></p> 
<br />
<p style="font-size:24px;"> Company Name : <?php echo $cname;?></p> 
<br />
<p style="font-size:24px;">Contact no.: <?php echo $phone;?></p>
<br />
<p style="font-size:24px;">Email: <?php echo $email;?></p>
<br />
<p style="font-size:24px;">Bank Name: <?php echo $bank;?></p>
<br />
<p style="font-size:24px;">Account Number: <?php echo $accno;?></p>
<br />
<form action="seller_edit.php" method="get">
<button type="submit" class="btn btn-default" style="width:100px; position:relative; left:175px;" onclick="<script type='text/javascript'> document.location = 'seller_edit.php'; </script>" >Edit</button></form>
</div>
    </div>
    </div>
    </div>

</body>
</html>
