<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Removing data from uploaded</title>
</head>

<body>
<?php
    $id=$_POST["hide_id"];
    $table=$_POST["hide_table"];
    include 'connection.php';

    $sql="DELETE from ".$table." WHERE id=".$id;
    $res=mysqli_query($con,$sql);

    if($res)
    {
        echo "<script type='text/javascript'>document.location = 'seller_show_uploaded.php'; </script>";
    }
    else
    {
        $m="Error occured while removing item from cart.Please try again!!";
    
        echo "<script type='text/javascript'>alert ('$m'); document.location = 'seller_show_uploaded.php'; </script>";
    }
?>
</body>
</html>
