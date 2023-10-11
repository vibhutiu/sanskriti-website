<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Quantity</title>
</head>

<body>
<?php
    session_start();

    //$seller=$_SESSION["seller_id"];
    $customer=$_SESSION["c_id"];
    
    if(isset($_POST["product"]))
    {
        $table="buynow";
    }
    else
    {
        $table="cart";
    }


    include 'connection.php';

    $i=0;

    $query = $con->query("SELECT pro_id FROM ".$table." WHERE cust_id=".$customer);


    while($row = $query->fetch_assoc())
    {
        $result[] = $row;
    }

    // Array of all column names

    $columnArr = array_column($result, 'pro_id');

    //echo $columnArr[0];
    //echo $_POST["q"][1];
    //echo $_COOKIE[$i];

    $n=count($columnArr);

    for($i=0;$i<$n;$i++)
    {
        $sql='UPDATE '.$table.' SET quantity='.$_COOKIE[$i].' WHERE cust_id='.$customer.' and pro_id='.$columnArr[$i];
        
        //echo $sql."<br>";

        $res=mysqli_query($con,$sql);
        
    }

    if($res && $table=="cart")
    {
        $_SESSION["after_address"]="cart_final.php";
        
        echo "<script type='text/javascript'> document.location = 'address.php'; </script>";
    }
    else if($res && $table=="buynow")
    {
        echo "<script type='text/javascript'> document.location = 'buy_single_product.php'; </script>";
    }
?>
</body>
</html>
