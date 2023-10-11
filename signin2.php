<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Sign In</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  input[type=submit]{
  width:355px;
   height:35px; 
  border-radius:5px;
   background-color:	#660033;
   border:none; 
  color:#FFFFFF;
  }
  input[type=submit]:hover 
		{
		background-color:	#CC0099;
		}
  div.card:hover{
box-shadow: 5px 5px 5px #CCCCCC, 5px 5px 5px #CCCCCC;


}

  </style>
  <script> 
  
  function click()
  {
  
  }
  </script>
</head>

<body>
<?php
session_start();
?>


<div class="card" style="margin-left:550px; padding:20px; width:400px;">
<h1 align="center"> Customer Sign In</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<div class="form-group">
  <label for="usr">Email:</label>
  <input type="text" class="form-control" name="email" required="">
  <br />

  <label for="pwd">Password:</label>
  <input type="password" class="form-control" name="password" required="">
</div>
<p> <i><a href="#">Forgot password?</a></i></p>
<br />
<input type="submit" value="Sign In" name="submit" />
</form>
<br />
<p><i>New Customer? </i><a href="register.html">Create Account</a></p>
</div>
<?php

if(isset($_POST["submit"]))
{
    include 'connection.php';
    //if($con->connect_error)
    //{					
    //die("Error has occured");
	//}					
    $s=$_POST["email"];				
    $pass=$_POST["password"];
							
    $sql="SELECT password,name,id FROM user where email='$s'";

    //$result=$con->query($sql);
							
    $result=mysqli_query($con,$sql);			
    $row=mysqli_fetch_array($result);
							
    $name=$row["name"];
    $id=$row["id"];
							
    if($row["password"]==$pass)				
    {				
        $_SESSION["name"]=$name;	
        $_SESSION["sign"]="in";
        $_SESSION["c_id"]=$id;
							
        echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
							
        //header('Location : reg1.html');		
        //$m="correct Email or Password";					
    }					
    else					
    {
									
        $m="Incorrect Email or Password. Try Again";					
        echo "<script type='text/javascript'> alert('$m'); document.location = 'signin2.php' </script>";						
    }								
}						
?>


</body>
</html>
