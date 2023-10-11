<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sold Items</title>
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
    <script type="text/javascript">
        function getLost()
        {
            document.location('seller_item_packed.php');
        }
    </script>
</head>

<body>
<?php 
    include 'seller_header.php';
?>

<h2 align="center" style="color:#660033"> SOLD ITEMS</h2>

<?php
    $seller=$_SESSION["seller_id"];
    
    
    include 'connection.php';
    			
    $sql="SELECT * FROM seller where id='$seller'";
    
    //$result=$con->query($sql);
							
    $result=mysqli_query($con,$sql);			
    $row=mysqli_fetch_array($result);
							
    $company=$row["company"];
	//$cat=array("clothing","pantry");
	//clothing
	//echo $company;
    
    $sql1="SELECT * FROM sells WHERE cname='".$company."' AND delivered='0'";
    
    $res1=mysqli_query($con,$sql1);
    $row1=mysqli_fetch_all($res1,MYSQLI_BOTH);
    $size1=sizeof($row1);
    //print_r($row1);
    //echo $size1;
    if($size1==0)
    {
        echo "<h1 align='center'>No Item Present</h1>";
    }
    
    $i=0;
    
    while($i<$size1)
    {
        $pid=$row1[$i]["pid"];
        $cat=$row1[$i]["ptable"];
        $s=$row1[$i]["size"];
        $quantity=$row1[$i]["quantity"];
        
        $sql2="SELECT * FROM ".$cat." WHERE id=".$pid;
        
        $res2=mysqli_query($con,$sql2);
        $row2=mysqli_fetch_array($res2);
        
        //for displaying proper size
        
        if($s=="S")
        {
            $size="Small";
        }
        else if($s=="M")
        {
            $size="Medium";
        }
        else if($s=="L")
        {
            $size="Large";
        }
        else if($s=="XL")
        {
            $size="X-Large";
        }
        else
        {
            $size=" ";
        }
        
        //for displaying proper buttons
        //pack button
        if($row1[$i]["packed"]=="0")
        {
            $pack='<button type="submit" class="btn"  style=" position:relative;float:left" formaction="seller_item_packed.php">Packed</button>';
        }
        else
        {
            $pack='<button type="submit" class="btn"  style=" position:relative;float:left" disabled="disabled">Packed</button>';
        }
        //shipped button
        if($row1[$i]["shipped"]=="0")
        {
            $ship='<button type="submit" class="btn"  style=" position:relative;float:left" formaction="seller_item_shipped.php">Shipped</button>';
        }
        else
        {
            $ship='<button type="submit" class="btn"  style=" position:relative;float:left" disabled="disabled">Shipped</button>';
        }
        //delivered button
        if($row1[$i]["delivered"]=="0")
        {
            $deli='<button type="submit" class="btn"  style=" position:relative;float:left" formaction="seller_item_delivered.php">Delivered</button>';
        }
        else
        {
            $deli='<button type="submit" class="btn"  style=" position:relative;float:left" disabled="disabled">Delivered</button>';
        }
        
        //displaying card
        
        
        $m0='<div class="card" style="width:1200px;height:170px; position:relative; top:15px; margin-left:23px; margin-right:23px;"><div class="row">';
        
        $m1='<div class="col-lg-2"><img src="data:image/jpeg;base64,'.base64_encode($row2['image']). ' " class="image" /></div>';
        
        $m2='<div class="col-lg-3" style="position:relative; top:60px"><b>'.$row2['name'].'</b><br />'.$size.'</div><div class="col-lg-1"><div class="form-group">
        
        <input class="price" class="form-control" type="number" style="float:left;width:50px; border:none; background-color:#FFFFFF; position:relative; top:60px; right:40px"value="'.$row2['price'].'" onchange="sum1()" disabled="disabled"></div></div>';
        
        $m3='<div class="col-lg-1"><div class="form-group">
        
        <input class="qnt form-control" class="form-control" type="number" style="float:left;  width:60px; position:relative; top:55px; right:15px;" value="'.$row1[$i]['quantity'].'" onchange="sum1()" name="q[]" disabled></div></div>';
        
        $m4='<div class="col-lg-3 tot2" style="position:relative; top:10px" class=""><b>Name:</b>'.$row1[$i]["name"].'<br><b>Phone:</b>'.$row1[$i]["phone"].'<br><b>Email:</b>'.$row1[$i]["email"].'<br><b>Address:</b>'.$row1[$i]["address"].','.$row1[$i]["city"].'-'.$row1[$i]["pincode"].'<br>'.$row1[$i]["state"].'</div>';
        
        $m5='<form action="#" method="post"><input type="hidden" name="id" value="'.$row1[$i]["id"].'"<div class="col-lg-2" style="position:relative;">'.$pack.'
        <br><br>'.$ship.'<br><br>'.$deli.'</div></form></div></div>';
        
        
        echo $m0;
        echo $m1;
        echo $m2;
        echo $m3;
        echo $m4;
        echo $m5;
        
        $i++;
        
    }
?>
</body>
</html>
