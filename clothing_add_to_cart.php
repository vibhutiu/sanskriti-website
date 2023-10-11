<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Adding data to cart</title>
</head>

<body>
<?php
    session_start();
    if(isset($_SESSION["c_id"]))
    {
        include 'connection.php';
    
        $cid=$_SESSION["c_id"];
        $category=$_POST["hide_category"];
        $pid=$_POST["hide_pid"];
        $s=$_POST["GFG"];
        $pcode=$_POST["hide_pcode"];
        
        if($s=="0")
        {
            $size="S";
        }
        else if($s==1)
        {
            $size="M";
        }
        else if($s==2)
        {
            $size="L";
        }
        else if($s==3)
        {
            $size="XL";
        }
        else
        {
            $size="NULL";
            
            
        }
        
        if($size=="NULL")
        {
            $m="Please Select Size";
    
            echo "<script type='text/javascript'>alert ('$m'); document.location = 'clothingin.php'; </script>";
        }
        else
        {
            $sql="SELECT * FROM cart WHERE cust_id='$cid' AND pro_id='$pid' AND pro_category='$category'";
    
        
            $res=mysqli_query($con,$sql);
    
        
            if(mysqli_num_rows($res)==0)
            {
            
                $sql1="INSERT INTO cart (cust_id,pro_id,pro_category,size,pro_code) VALUES('$cid', '$pid', '$category','$size','$pcode')";

            
                $res1=mysqli_query($con,$sql1);
      
            
                $m = "Item Added to cart";
            
                echo "<script type='text/javascript'>alert ('$m');document.location = 'clothingin.php'; </script>";
        
            }
            else
            {
                $m="Item Already Exists in the Cart!!!";
    
                echo "<script type='text/javascript'>alert ('$m'); document.location = 'clothingin.php'; </script>";
            }
        }
    }
    else
    {
        $m="Sign In to start shopping";
    
        echo "<script type='text/javascript'>alert ('$m'); document.location = 'clothingin.php'; </script>";
    }
   
?>
</body>
</html>