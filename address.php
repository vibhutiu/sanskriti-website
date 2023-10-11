<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Shipping Address</title>
<script>

    function newa()
    {
        document.getElementById("existing").style.display="none";
        document.getElementById("newad").style.display="block";
    }

    function olda()
    {
        document.getElementById("newad").style.display="none";
        document.getElementById("existing").style.display="block";
    }
</script>
</head>

<body>
<?php
    include 'home_header.php';
    ?>
<?php
    
    $cid=$_SESSION["c_id"];
    
    include 'connection.php';

?>
<div class="btn-group" style="margin-left:620px; margin-top:60px ">
  <button type="button" class="btn btn-default" style="background:#660033; color:#FFFFFF; width:170px;" onclick="newa()">New Address</button>
  <button type="button" class="btn btn-default" style="background:#660033; color:#FFFFFF; width:170px;" onclick="olda()">Existing Address</button>
  </div>
<div class="panel panel-default" style="width:650px; margin-left:450px; margin-top:20px;">
<div class="panel-heading"><h4 align="center">SHIPPING ADDRESS</h4></div>
<div class="panel-body"> 

<div class="form-group" id="newad" style="display:none">
<br />
<br />
<div class="row">
<form method="post" action="shipping_address.php" >
<div class="col-sm-3"><strong>Name :</strong></div><div class="col-sm-8"><input type="text" class="form-control" name="name" placeholder="Name" required=""></div>
<br />
<br />
<br />
<div class="col-sm-3"><strong>Address Line1 :</strong></div> <div class="col-sm-8"><input type="text" name="ad1" class="form-control" placeholder="Street Name" required=""/></div>
<br />
<br />
<br />
<div class="col-sm-3"><strong>Address Line2:</strong></div><div class="col-sm-8">
 <input type="text" name="ad2" class="form-control" placeholder=" Area Name/Locality" required=""/></div>
<br />
<br />
<br />
<div class="col-sm-3"><strong>City :</strong></div><div class="col-sm-8"><input type="text" class="form-control" name="city" placeholder="City" required=""></div>
<br />
<br />
<br />

<div class="col-sm-3"><strong>Pincode :</strong></div><div class="col-sm-8"><input type="text" class="form-control" name="pc" placeholder="PinCode" required=""></div>
<br />
<br />
<br />

<div class="col-sm-3"><strong>State :</strong></div><div class="col-sm-8"><input type="text" class="form-control" name="state" placeholder="State" required=""></div>
<br />
<br />
<br />
<div class="col-sm-3"><strong>Phone No. :</strong></div><div class="col-sm-8"><input type="text" class="form-control" name="phone" placeholder="Phone No." required=""></div>
<br />
<br />
<br />
<input type="hidden" name="address" value="new" />
<button type="submit" class="btn btn-default" style="width:300px; margin-left:175px; background:#660033; color:#FFFFFF" name="continue">Continue</button>
</form>
</div>
</div>
<?php
    $sql="SELECT * FROM user WHERE id=".$cid;
    
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
    
    if($row["state"]==NULL || $row["state"]==" " || $row["state"]=="")
    {
        echo "Sorry. You haven't stored your address in you profile!!";
    }
    else
    {
        $_SESSION["ship_add"]="old";
        
        echo '<div id="existing">
<div class="row">
<div class="col-sm-3"><strong>Name :</strong></div><div class="col-sm-8">'.$row["name"].'</div>';
        
        echo '<div class="col-sm-3"><strong>Address</strong></div><div class="col-sm-8">'.$row["add_line1"].','.$row["add_line2"].'</div>';
        
        echo '<div class="col-sm-3"><strong>City :</strong></div><div class="col-sm-8">'.$row["city"].'-'.$row["pincode"].'</div>';
        
        echo '<div class="col-sm-3"><strong>State :</strong></div><div class="col-sm-8">'.$row["state"].'</div>
<div class="col-sm-3"><strong>Contact:</strong></div><div class="col-sm-8">'.$row["phone"].'</div></div>';
        
        echo '<br /><br /><br />
        <form method="post" action="'.$_SESSION["after_address"].'">
        <input type="hidden" name="address" value="old" />
        <button type="submit" class="btn btn-zefault" style="width:300px; margin-left:175px;background:#660033;color:#FFFFFF" name="continue">Continue</button></form></div>';
        
    }
    
?>


    
    
</div>

</div>

</body>
</html>
