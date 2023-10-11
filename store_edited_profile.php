<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include 'homein.php';?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Storing Edited Profile</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Storing edited details into database</title>
</head>

<body>
<?php

    include 'connection.php';

    $name=$_SESSION["name"];
    $name1=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $add1=$_POST["ad1"];
    $add2=$_POST["ad2"];
    $city=$_POST["city"];
    $pin=$_POST["pc"];
    $state=$_POST["state"];   $image=addslashes(file_get_contents($_FILES['image']['tmp_name'])); //will store the image to fp
    
    $arr = array("add_line1"=>$add1, "add_line2"=>$add2, "city"=>$city, "pincode"=>$pin, "state"=>$state);
    
    foreach($arr as $key=>$value)
    {
        if($key!="NULL" || $key!="")
        {
            if($image!=NULL)
            {
                $sql="UPDATE user SET name='$name1', phone='$phone', email='$email', ".$key."='$value', image='$image' WHERE name='$name'";
            }
            else
            {
                $sql="UPDATE user SET name='$name1', phone='$phone', email='$email', ".$key."='$value' WHERE name='$name'";
            }
        }
        else
        {
            if($image!=NULL)
            {
                $sql="UPDATE user SET name='$name1', phone='$phone', email='$email', image='$image' WHERE name='$name'";
            }
            else
            {
                $sql="UPDATE user SET name='$name1', phone='$phone', email='$email' WHERE name='$name'";
            }
        }
        $res=mysqli_query($con,$sql);
    }
    


$_SESSION["name"]=$name1;
if($res)
{
    echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
}
else
{
    echo "<script type='text/javascript'> alert 'Some error occured.Please try again'; document.location = 'profile.php'; </script>";
}

?>
</body>
</html>
