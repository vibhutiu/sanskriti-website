<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
  
      function nb()
      {
          var x=document.getElementById("netb");
          var y=document.getElementById("det");
          var z=document.getElementById("cod1");
          y.style.display="none";
          z.style.display="none";
          x.style.display="block";
      }
  
      function cod()
      {
          var x=document.getElementById("netb");
          var y=document.getElementById("det");
          var z=document.getElementById("cod1");
          y.style.display="none";
          x.style.display="none";
          z.style.display="block";
      }
  
  </script>
<title>Payment Gateway</title>
<style>
.btn{
width:230px;
background:#660033;
height:40px;
color:#FFFFFF;}

</style>
</head>

<body>
 <?php

    $date=date_create(date("d-m-Y"));
    date_add($date,date_interval_create_from_date_string("5 days"));

?>
<div class="panel panel-default" style="margin-left:400px; margin-top:50px;width:870px;
height:600px">
<div class="panel-body">
<div class="row">
<div class="col-lg-3">
<div class="panel panel-default" style="width:240px;">
<div class="panel-heading" >
<h3 align="center">Payment Options</h3></div></div>

<button type="button" class="btn btn-default" onclick="nb()">Net Banking</button>
<br />
<br />
<button type="button" class="btn btn-default" onclick="cod()">Cash On Delivery</button>



</div>
<div class="col-lg-1">
<div style="width:0.5px; height:570px; background:#CCCCCC; position:relative; top:0px; left:35px">
</div></div>
<div class="col-lg-8">
<div style="width:550px; display:none" id="netb" >
<h2 align="center">NET BANKING</h2>
<hr />

<div style="margin-left:40px">
<div class="form-group">
  <label for="usr"> Card Name</label>
  <input type="text" class="form-control" id="usr" style="width:450px"></div>
  <br />
  <div class="form-group">
  <label for="usr">Card Number</label>
  <input type="text" class="form-control" id="usr" style="width:450px">
</div>
<br />
<div class="form-group">
<table cellspacing="10x" cellpadding="10px">
<tr>
<td style="margin-right:10px">
  
  <label for="usr">Expire Date</label>
  <input type="text" class="form-control" id="usr" style="width:50px; margin-right:10px" placeholder="mm"></td>
  
  <td><input type="text" class="form-control" id="usr" style="width:50px; margin-right:130px; margin-top:23px" placeholder="yy"> </td>
  <td>
  
  <label for="usr">CVV</label>
  <input type="text" class="form-control" id="usr"></td>
  </tr>
  </table>
</div>
<br />
<br />
<form action="success.php" method="post">
<input type="hidden" value="Credit Card" name="meth" />
<input type="hidden" value="<?php echo $_POST['tab'];?>" name="pro_table" />
<button type="submit" class="btn btn-default" style="width:300px; margin-left:75px">Make Payment</button></form>
  </div>
</div>
</div>
<div id="cod1" style="display:none">
<form action="success.php" method="post">
<h2 align="center"> CASH ON DELIVERY</h2>
<hr />
<p>Help Us by paying exact amount on the delivery.</p>
<br />
<br />
<br />
<input type="hidden" value="Cash On Delivery" name="meth" />
<input type="hidden" value="<?php echo $_POST['tab'];?>" name="pro_table" />
<button type="submit" class="btn btn-default" style="width:300px; margin-left:120px">Place Order</button></form>
</div>
<?php
    include 'connection.php';
    session_start();
    
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
<div id="det">
<h2 align="center">DELIVERY DETAILS</h2>
<hr />
<br />
<p> <b>Total Amount:</b><?php echo $_POST["total"];?>
<br />
<br />
<b>Delivery Address:</b><div style="text-align:left;"><?php echo $add;?></div>
<br />
<br />
<b>Date of Delivery:</b><?php echo date_format($date,"d-m-Y");?></p>
</div>







</div>
</div>



</div>


</body>
</html>
