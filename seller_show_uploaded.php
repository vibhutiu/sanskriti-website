<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Uploaded Items</title>
<style>
    .image
    {
        width: 100%;
        height: auto;
        position:relative;
        left:7px;
        width:100px;
        height:150px;
        padding:0px;
        float:left;
    }
    .card
    {
        position:relative;
        top:00px;
        box-shadow: 5px 5px 5px #CCCCCC, 5px 5px 5px #CCCCCC;
        float:left;
        margin:10px;
        padding:10px;
        width:300px;
        height:400px;
    }
</style>
</head>

<body>
<?php 
    include 'seller_header.php';
?>

<h2 align="center" style="color:#660033"> UPLOADED ITEMS</h2>
<div class="panel panel-default" style="background-color:#666666; width:1050px; position:relative; left:240px; top:20px">

  <div class="panel-body">
  <div class="row">
  <div class="col-lg-3" align="center" style="color:#FFFFFF">Product</div>
  <div class="col-lg-2" style="color:#FFFFFF;">Company</div>
  <div class="col-lg-1" align="left" style="margin-right:5px; color:#FFFFFF">Price</div>
  <div class="col-lg-1" align="left" style="position:relative; left:45px;color:#FFFFFF">Quantity</div>
  
  
  </div>
  

  </div>
</div>

<?php
    $seller=$_SESSION["seller_id"];
    
    include 'connection.php';
    			
    $sql="SELECT * FROM seller where id='$seller'";
    
    //$result=$con->query($sql);
							
    $result=mysqli_query($con,$sql);			
    $row=mysqli_fetch_array($result);
							
    $company=$row["company"];
	$cat=array("clothing","pantry");
	//clothing
	//echo $company;
	foreach($cat as $x)
    {
        $sqlc="SELECT * FROM ".$x." where company_name='$company'";
    
        //$result=$con->query($sql);
        //$result=mysqli_query($con,$sql);
        //$row=mysqli_fetch_array($result);
	
        $resultc = $con->query($sqlc);
        
        if ($resultc->num_rows > 0)
        {
            // output data of each row
            while($row = $resultc->fetch_assoc()) {
                if($x=="clothing")
                {
                    echo "<div class='card' style='width:1000px;height:170px; position:relative; top:20px; margin-left:23px; margin-right:23px; left:240px'><div class='row'>
<div class='col-lg-1'><img src='data:image/jpeg;base64,".base64_encode($row['image'])."' class='image' /></div>";
                    
                    echo "<div class='col-lg-2' style='position:relative; top:60px; left:30px' align='left'><b>".$row["name"]."</b></div>
<div class='col-lg-2'><div class='form-group' style='position:relative;top:60px;'>".$row["company_name"]."</div></div>";
                    
                    echo "<div class='col-lg-1' style='position:relative; top:60px;'>".$row["price"]."</div>
                    <div class='col-lg-3'><ul class='list-group' style='width:200px'>";
                    if($row["small_stock"]!=NULL){
                        echo  "<li class='list-group-item' style='height:35px'>small <span class='badge'>".$row["small_stock"]."</span></li>";
                    } if($row["medium_stock"]!=NULL)
                    {
                        echo "<li class='list-group-item' style='height:35px'>Medium <span class='badge'>".$row["medium_stock"]."</span></li>";
                    } if($row["large_stock"]!=NULL){
                        echo "<li class='list-group-item' style='height:35px'>Large <span class='badge'>".$row["large_stock"]."</span></li>";
                    } if($row["xlarge_stock"]!=NULL)
                    {
                        echo "<li class='list-group-item' style='height:35px'>Extra Large<span class='badge'>".$row["xlarge_stock"]."</span></li>";
                    }
                    echo "</ul></div>
                    <div class='col-lg-3'>
                    <form method='post' action='remove_from_uploaded.php'><input type='hidden' value='".$row['id']."' name='hide_id'><input type='hidden' value='".$x."' name='hide_table'>
                    <button type='submit' class='btn'  style='position:relative;float:left; top:60px;'>Remove</button><button type='submit' class='btn'  style='position:relative;float:left; top:60px; margin-left:30px' formaction='edit_seller_item.php'>Edit</button></form></div></div></div></div>";
                }
                else
                {
                    echo "<div class='card' style='width:1000px;height:170px; position:relative; top:20px; margin-left:23px; margin-right:23px; left:240px;'><div class='row'><div class='col-lg-1'><img src='data:image/jpeg;base64,".base64_encode($row['image'])."' class='image' /></div>";
                    
                    echo "<div class='col-lg-2' style='position:relative; top:60px; left:30px' align='left'><b>".$row["name"]."</b></div><div class='col-lg-2'><div class='form-group' style='position:relative; top:60px;'>".$row["company_name"]."</div></div>";
                    
                    echo "<div class='col-lg-1' style='position:relative; top:60px;'>".$row["price"]."</div>
                    <div class='col-lg-3'>
                    <ul class='list-group' style='width:200px; position:relative; top:60px'>";
                    
                    echo "<li class='list-group-item'style='height:35px'>Stock<span class='badge'>".$row["stock"]."</span></li></ul></div>";
                    
                    echo "<div class='col-lg-3'>
                    <form method='post' action='remove_from_uploaded.php'><input type='hidden' value='".$row['id']."' name='hide_id'><input type='hidden' value='".$x."' name='hide_table'><button type='submit' class='btn'  style='position:relative;float:left; top:60px;' formaction='remove_from_uploaded.php'>Remove</button><button type='submit' class='btn'  style='position:relative;float:left; top:60px; margin-left:30px' formaction='edit_seller_item.php'>Edit</button></form></div></div></div></div>";
                }
            }
        }
    }
?>
</body>
</html>
