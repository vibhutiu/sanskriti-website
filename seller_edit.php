<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edit Your Profile Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .card1
{

    position:relative;
    top:0px;
    left:270px;
    box-shadow: 5px 5px 5px #CCCCCC, 5px 5px 5px #CCCCCC;
    float:left;
    margin:5px;
    padding:20px;
    width:1000px;
    height:100px;
}
    </style>
  
</head>

<body>
<?php include 'seller_header.php';?>
<?php
    
    $name=$_SESSION["seller"];
    $id=$_SESSION["seller_id"];
    include 'connection.php';
    
    $sql="SELECT * FROM seller where id='$id'";
							
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
    
    $phone=$row["phone"];					
    $email=$row["email"];
    $cname=$row["company"];
    $bank=$row["bank"];
    $accno=$row["account_number"];
    
 ?>
<div class="container">
<div class="card1" style="width:650px; height:550px;">
<div class="row">


<form method="post" action="seller_store_edited_profile.php"> 

<h1 style="color:	#660033;" align="center"> SELLER PROFILE</h1>

<hr style="width:645px;" />
<br />
<h3>
<div class="col-sm-4">Seller Name :</div><div class="col-sm-8"><input type="text" class="form-control" name="name" value="<?php echo $name;?>" required=""></div>
<br />
<br />
<div class="col-sm-4">Company Name :</div><div class="col-sm-8"><input type="text" class="form-control" name="cname" value="<?php echo $cname;?>" required=""></div>
<br />
<br />

<div class="col-sm-4">Contact :</div> <div class="col-sm-8"><input type="number" name="phone" class="form-control" value="<?php echo $phone;?>"/></div>
<br />
<br />

<div class="col-sm-4"> Email ID :</div><div class="col-sm-8">
 <input type="email" name="email" class="form-control" value="<?php echo $email;?>"/></div>
<br />
<br />
    
<div class="col-sm-4">Bank :</div><div class="col-sm-8"><input type="text" class="form-control" name="bank" value="<?php echo $bank;?>" required=""></div>
<br />
<br />
    
<div class="col-sm-4">Account :</div><div class="col-sm-8"><input type="text" class="form-control" name="accno" value="<?php echo $accno;?>" required=""></div>
<br />
<br />
 <button type="submit" class="btn btn-default" style="width:120px; position:relative; left:200px; background-color:#660033; color:#FFFFFF;" >Save Changes</button>
 <button type="reset" class="btn btn-default" style="width:100px; position:relative; left:200px;" onclick="<script type='text/javascript'> document.location = 'seller_edit.php'; </script>" >Reset</button>
    </h3>
    </form>
    </div>

    </div>

    </div>

</body>
</html>
