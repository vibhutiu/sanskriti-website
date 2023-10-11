<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Seller Account Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="CSS/seller_register.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="JS/seller_register_validate.js"></script>
  
  <script>
  function tool(){
document.getElementById("demo").innerHTML = "Sell your products using this name";
}

  </script>
</head>

<body>
<?php include 'home_header.php';
$name=$_SESSION["name"];
?>
<div class="card" style="box-shadow: 5px 5px 5px #CCCCCC, 5px 5px 5px #CCCCCC; margin-left:475px;" >
<h2 align="center">Create Seller Account</h2>
<br />
<br />
<form action="seller_storeprofile.php" method="post" name="register_form_seller" onsubmit="return seller_register_validate()">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" class="form-control" placeholder="Name" required="" name="name" value="<?php echo $name;?>" disabled="disabled"/>
</div>
<br />
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
<input type="text" class="form-control" placeholder="Enter Your Email" required="" name="email"/>
</div>
<br />
    <div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
<input type="text" class="form-control" placeholder="Enter Your Phone No." required="" name="phone_number"/>
</div>
<br />
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
<input type="text" class="form-control" placeholder="Company Name" required="" name="company_name" onfocus="tool()"/>
</div>
<br />
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
<input type="text" class="form-control" placeholder="Bank Name" required="" name="bank_name"/>
</div>
<br />
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
<input type="text" class="form-control" placeholder="Account No." required="" name="account_number"/>
</div>
<br />
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input type="password" class="form-control" placeholder="Password" required="" name="password"/>
</div>
<br />
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input type="password" class="form-control" placeholder="Re-enter Password" required="" name="confirm_password"/>
</div>
<br />
<input type="submit" value="Create Seller Account" />
</form>	
<br />
<p align="center"><i>Already have account? </i><a href="seller_signin.php">Log In</a></p>

</div>

</body>
</html>
