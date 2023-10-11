<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Adding data to buynow</title>
</head>

<body>
<?php
    session_start();
    include 'connection.php';
    if(isset($_SESSION["c_id"]))
    {
        
    
        $cid=$_SESSION["c_id"];
        $category=$_POST["hide_category"];
        $pid=$_POST["hide_pid"];
        $size="NULL";
        if(isset($_POST["GFG"]))
        {
            $s=$_POST["GFG"];
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
        }
        
        $pcode=$_POST["hide_pcode"];
        
        
        
        if($size=="NULL" && $category=="clothing")
        {
            $m="Please Select Size";
    
            echo "<script type='text/javascript'>alert ('$m'); document.location = '".$_POST['page']."'; </script>";
        }
        else
        {
            $sql="SELECT * FROM buynow WHERE cust_id='$cid' AND pro_id='$pid' AND pro_category='$category'";
            
            $res=mysqli_query($con,$sql);
            
            echo mysqli_num_rows($res);
    
        
            if(mysqli_num_rows($res)==0)
            {
                
                //echo "Here2";
            
                $sql1="INSERT INTO buynow (cust_id,pro_id,pro_category,size,pro_code) VALUES('$cid', '$pid', '$category','$size','$pcode')";
                
                //echo $sql1;

            
                $res1=mysqli_query($con,$sql1);
                
                $_SESSION["after_address"]="buy_single_product.php";
            
                echo "<script type='text/javascript'>document.location = 'address.php'; </script>";
        
            }
            else
            {
                
            }
        }
    }
    else
    {
        $m="Sign In to start shopping";
    
        echo "<script type='text/javascript'>alert ('$m'); document.location = 'home.php'; </script>";
    }
   
?>
    </body>
</html>