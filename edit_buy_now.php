<?php
    include 'home_header.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cart</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
.image {
  
  width: 100%;
  height: auto;
  position:relative;
  left:7px;
  width:100px; height:150px; padding:0px;
  float:left;
  
}
.card {
position:relative;
top:00px;
box-shadow: 5px 5px 5px #CCCCCC, 5px 5px 5px #CCCCCC;
float:left;
margin:10px;
padding:10px;
width:300px;
height:400px;
}

#buy{
width:200px;
background:#660033; color:#FFFFFF;}
</style>
<script>
    function init1()
    {
        var x=document.getElementByClassName("price");
    }

    function sum1()

    {
        var x = document.getElementsByClassName("price");

        var i;

        var list = document.getElementsByClassName("tot2");

        var q = document.getElementsByClassName("qnt");

        var ti;
		var delc;

        var t=0;
		

        for (i = 0; i < x.length; i++)
        {
            document.cookie=i+"="+q[i].value;
            ti=x[i].value*q[i].value;
  
            list[i].getElementsByClassName("tot")[0].innerHTML =ti;
 
            t=t+ti;
        }
        document.getElementById("fin").innerHTML=t;
		if(t>=500)
		{
		delc=0.00;
		}
		else
		{
		delc=t*0.1;
		}
		document.getElementById("dc").innerHTML=delc;
		document.getElementById("tax").innerHTML=t*0.18;
		document.getElementById("ft").innerHTML=t+t*0.18+delc;
		

    }

    function rem()
    {
				
        var y=document.getElementsByClassName("price");
				
        var q=document.getElementsByClassName("qnt");
				
        var t=document.getElementById("toth").value;
        
        t=t-y[0].value*q[0].value;
        document.getElementById("totl").innerHTML=t;
				
        document.getElementById("toth").value=t; 
    } 

</script>
</head>

<body onload="sum1()">

<div class="row">


<div  class="col-lg-9" style="float:left; top:20px; margin-top:10px;">
<div class="container-fluid" style=" margin-top:30px; margin-left:20px">
<div class="panel panel-default" style="background-color:#666666; width:1050px; margin-left:20px">

  <div class="panel-body">
  <div class="row">
  <div class="col-lg-4" align="right" style="color:#FFFFFF">Product</div>
  <div class="col-lg-2" align="right" style="margin-right:5px; color:#FFFFFF">Price</div>
  <div class="col-lg-1" align="center" style="position:relative; left:45px;color:#FFFFFF">Quantity</div>
  <div class="col-lg-2" align="center" style="color:#FFFFFF;position:relative; left:20px;">Total</div>
  
  </div>
  

  </div>
</div>



<div class="container-fluid">

<?php
    
    include 'connection.php';
    
    $cid=$_SESSION["c_id"];
    
    $sql="SELECT * FROM buynow where cust_id='$cid'";
							
    $result=mysqli_query($con,$sql);
							
    $row=mysqli_fetch_array($result);
    
    
    $pid=$row["pro_id"];
    $cat=$row["pro_category"];
    $size=$row["size"];
    $quantity=$row["quantity"];
    
    
    if($size=="NULL" && $cat=="clothing")
    {
        $m="Please Select Size";
    
        //echo "<script type='text/javascript'>alert ('$m'); document.location = 'home.php'; </script>";
    }
    else
    {
        $sql1="SELECT * FROM ".$cat." WHERE id=".$pid;
        $result=mysqli_query($con,$sql1);
        $row=mysqli_fetch_array($result);
        
        if($cat=="clothing")
        {
            if($size=="S")
            {
                $stock=$row["small_stock"];
            }
            else if($size=="M")
            {
                $stock=$row["medium_stock"];
            }
            else if($size=="L")
            {
                $stock=$row["large_stock"];
            }
            else if($size=="XL")
            {
                $stock=$row["xlarge_stock"];
            }
            else
            {
               $stock=1; 
            }
        }
        else
        {
            $stock=$row["stock"];
        }
        
        if($size=="NULL" || $size==NULL)
        {
            $csize="";
        }
        else
        {
            $csize=$size;
        }
        
        $m0='<div class="card" style="width:1000px;height:170px; position:relative; top:15px; margin-left:23px; margin-right:23px;"><div class="row">';
        
        $m1='<div class="col-lg-2"><img src="data:image/jpeg;base64,'.base64_encode($row['image']). ' " class="image" /></div>';
        
        $m2='<div class="col-lg-4" style="position:relative; top:60px"><b>'.$row['name'].'</b><br />'.$csize.'</div><div class="col-lg-1"><div class="form-group">
        
        <input class="price" class="form-control" type="number" style="float:left;width:50px; border:none; background-color:#FFFFFF; position:relative; top:60px; right:40px"value="'.$row['price'].'" onchange="sum1()" disabled="disabled"></div></div>';
        
        $m3='<div class="col-lg-1"><div class="form-group">
        
        <input class="qnt form-control" class="form-control" type="number" style="float:left;  width:60px; position:relative; top:55px; right:15px; background:white;" min="1" max="'.$stock.'" value="'.$quantity.'" onchange="sum1()" name="q[]"></div></div>';
        
        $m4='<div class="col-lg-2 tot2" style="position:relative; top:60px" class=""><b>Total:</b> <span class="tot"></span></div></div></div>';
        
        
        echo $m0;
        echo $m1;
        echo $m2;
        echo $m3;
        echo $m4;
    }
        
        
    
    ?>
</div>
    
<div style="  height:40px; width:900px; margin-left:630px ">
<input type="hidden" id="toth" />
 <!--<h3><b>Total:<span id="totl"></span></b></h3></div>-->
 
 
 </div>
 </div>
 </div>
 <div class="col-lg-3">


<div style="float:right; right:40px; margin-left:200px; margin-top:150px; margin-right:40px">

<div class="panel panel-default">
<div class="panel-body">
<table>
<tr>
<td><h4> Total:</h4></td><td><h4><span id="fin"></span></h4></td></tr>
<tr><td><h4>Delivery charges:</h4></td><td><h4><span id="dc"></span></h4></td></tr>
<tr><td><h4>GST:</h4></td><td><h4><span id="tax"></span></h4></td></tr>
<tr><td><hr/></td><td><hr /></td></tr>
<tr><td><h4> Final Total:</h4></td><td><h4><span id="ft"></span></h4></td></tr>
</table>
<br />


<form action="store_qnt.php" method="post" id="form1">
<br />
<input type="hidden" name="product" value="single" />
<button type="submit" class="btn" id="buy" name="vibhu" form="form1" >Buy Now</button>
</form>
    

</div>
</div>
</div>
</div>
</div>
 
<?php
    if(isset($_POST['vibhu']))
    {
        echo $_COOKIE["1"];

        echo "<script> var q = document.getElementsByClassName('qnt');var i=0;</script>";

        $res=array();

        $i=0;

        for($i=0;$i<3;$i++)
        {
            $res[$i]=  "<script>document.write(x[i].value;i++</script>";
        }
        echo $res[0];
    }
?>


</body>
</html>
