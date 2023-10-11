<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Seller Sign-in</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="CSS/seller_signin.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script> 
  
  function click()
  {
  
  }
  </script>
</head>

<body>
<?php

session_start();
$name=$_SESSION["name"];

?>


<div class="card" style="box-shadow: 5px 5px 5px #CCCCCC , 5px 5px 5px #CCCCCC;
">
<h1 align="center"> Seller Sign In</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<div class="form-group">
  <label for="usr">Email:</label>
  <input type="text" class="form-control" name="email" value="">
  <br />

  <label for="pwd">Password:</label>
  <input type="password" class="form-control" name="password" required="">
</div>
<p> <i><a href="#">Forgot password?</a></i></p>
<br />
<input type="submit" value="Sign In" name="submit" />
</form>
<br />
<p><i>New Seller? </i><a href="seller_register.php">Create Account</a></p>
</div>
<?php
if(isset($_POST["submit"]))
{

    include 'connection.php';
    
    $mail=$_POST["email"];					
    $pass=$_POST["password"];
							
    $sql="SELECT password,email,name,id FROM seller where email='$mail'";

    //$result=$con->query($sql);
							
    $result=mysqli_query($con,$sql);			
    $row=mysqli_fetch_array($result);
							
    $name=$row["name"];
							
    if($row["password"]==$pass)
    {
							
        $_SESSION["seller"]=$name;
        $_SESSION["seller_id"]=$row["id"];
							
        echo "<script type='text/javascript'> document.location = 'seller_profile.php'; </script>";
    }					
    else					
    {						
        $m="Incorrect Email or Password. Try Again";
								
        echo "<script type='text/javascript'> alert('$m'); </script>";				
    }							
}
?>


</body>
</html>
