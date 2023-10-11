<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Payment Successfull</title>
    <meta http-equiv="refresh"
        content="10; url = home.php" />
</head>

<body>
<?php
$date=date_create(date("d-m-Y"));
date_add($date,date_interval_create_from_date_string("5 days"));

?>
    
<?php
    include 'connection.php';
    session_start();
    
    $product_table=$_POST["pro_table"];
    
    $cid=$_SESSION["c_id"];
    
    if($_SESSION["ship_add"]=="old")
    {
        $table="user";
    }
    else
    {
        $table="shipping";
    }
    
    $sql="SELECT * FROM ".$table." WHERE id='$cid'";
    
    $result=mysqli_query($con,$sql);
							
    $row=mysqli_fetch_array($result);
    
    $add=$row["add_line1"].",".$row["add_line2"]."<br>".$row["city"]."-".$row["pincode"]."<br>".$row["state"];
    
?>
<div class="panel panel-default" style="width:900px; height:700px; margin-left:250px; margin-top:50px;" >
<div class="panel-body">
<h1 align="center" style="color:#00CC66"><b> Thank You for Shopping with Us</b> <span class="glyphicon glyphicon-ok-sign"></span></h1>
<br />
<h5 align="center">Order Date: <?php echo date("d-m-Y");?></h5>
<h5 align="center">Delivery Date: <?php echo date_format($date,"d-m-Y");?></h5>
<div class="panel panel-default" style="float:left; margin-left:10px">
<div class="panel-heading">Shipping Address</div>
<div class="panel-body"><?php echo $add;?></div>
</div>
<div class="panel panel-default" style="float:left; margin-left:10px;">
<div class="panel-heading">Payment Method</div>
<div class="panel-body"><?php echo $_POST["meth"];?></div>
</div>
<br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<h2 align="center">You will be redirected to Home Page in 10 seconds</h2>
</div>
</div>
    
<?php
    
    //code for inserting product details
    
    $sql1="INSERT INTO sells(cid,pid,ptable,quantity,size) SELECT cust_id,pro_id,pro_category,quantity,size FROM ".$product_table." WHERE cust_id=".$_SESSION["c_id"];
        
    $res1=mysqli_query($con,$sql1);
    
    //-----------------------------------------  
    
    //code for inserting company name
    
    $sql2="SELECT * FROM sells WHERE cid='".$_SESSION["c_id"]."' AND packed=0";
    
    $res2=mysqli_query($con,$sql2);
    //$row=mysqli_fetch_array($res2);
    
    if($res2->num_rows > 0)
    {
        while($row2 = $res2->fetch_assoc())
        {
            $sql="SELECT company_name FROM ".$row2['ptable']." WHERE id=".$row2['pid'];
            
            //echo $sql."<br>";
            
            $res=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($res);
            //echo $row['company_name'];
            
            $sql="UPDATE sells SET cname='".$row['company_name']."' WHERE pid='".$row2['pid']."' AND ptable='".$row2['ptable']."' AND cid='".$_SESSION['c_id']."' AND packed='0'";
            
            $res=mysqli_query($con,$sql);
        }
        
    }
    
    //-----------------------------------------
    
    //code for inserting user email id
    
    $sql3="UPDATE sells SET email=(SELECT email from user where id=".$_SESSION['c_id'].") WHERE cid='".$_SESSION['c_id']."' AND packed='0'" ;
    
    $res3=mysqli_query($con,$sql3);
    
    //----------------------------------------
    
    //code for inserting shipping details
    
    if($_SESSION["ship_add"]=="old")
    {
        $table="user";
    }
    else
    {
        $table="shipping";
    }
    
    $sql4="SELECT * FROM ".$table." WHERE id='$cid'";
    
    $res4=mysqli_query($con,$sql4);
							
    $row4=mysqli_fetch_array($res4);
    $add4=$row4["add_line1"].",".$row4["add_line2"];
    
    $sql5="UPDATE sells SET name='".$row4['name']."' , phone='".$row4['phone']."',  address='".$add4."', city='".$row4['city']."', pincode='".$row4['pincode']."', state='".$row4['state']."' WHERE cid='".$_SESSION['c_id']."' AND packed='0'";
    
    $res5=mysqli_query($con,$sql5);
    
?>
<?php
    
    //updating quantity of items
    
    $sql="SELECT * FROM ".$_POST['pro_table']." WHERE cust_id='".$_SESSION['c_id']."'";
    
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_all($res,MYSQLI_BOTH);
    $size1=sizeof($row);
    $i=0;
    
    while($i<$size1)
    {
        $tab=$row[$i]["pro_category"];
        $pid=$row[$i]["pro_id"];
        $s=$row[$i]["size"];
        $quant=$row[$i]["quantity"];
        
        if($tab=="clothing")
        {
            if($s=="S")
            {
                $col="small_stock";
            }
            else if($s=="M")
            {
                $col="medium_stock";
            }
            else if($s=="L")
            {
                $col="large_stock";
            }
            else if($s=="XL")
            {
                $col="xlarge_stock";
            }
            else
            {
                
            }
        }
        else
        {
            $col="stock";
        }
        
        $sql1="SELECT ".$col." FROM ".$tab." WHERE id=".$pid;
        
        $res1=mysqli_query($con,$sql1);
        $row1=mysqli_fetch_array($res1);
        
        $old_q=$row1[$col];
        $new_q=$old_q-$quant;
        
        $sql1="UPDATE ".$tab." SET ".$col."='".$new_q."' WHERE id=".$pid;
        
        $res1=mysqli_query($con,$sql1);
        
        $i++;
    }
?>
    
<?php
    
    $sql="DELETE FROM ".$_POST['pro_table']." WHERE cust_id='".$_SESSION['c_id']."'";
    
    $res=mysqli_query($con,$sql);
    
    unset($_SESSION['ship_add']);
    unset($_SESSION['after_address']);
    
?>

</body>
</html>
