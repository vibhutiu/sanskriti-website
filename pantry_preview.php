<?php
include 'home_header.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Product Preview</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
  
        
        function vibhu()
        {
            var show1 = document.getElementById("hidecat").value;
            
            if(show1=="clothing")
                {
                    document.getElementById("sucker").style.display="block";
                }
           
        }
    </script>

  
    <style>
        .text
        {
            font:Arial, Helvetica, sans-serif;
            margin-top:100px;
        }
        h1
        {
            font:Arial, Helvetica, sans-serif;
        }
        .card
        {
            position:relative;
            top:50px;
            box-shadow: 5px 5px 5px #CCCCCC, 5px 5px 5px #CCCCCC;
            float:left;
            margin:10px;
            padding:10px;
            width:2000px;
        }
        #sucker
        {
            display:none;
        }
		#mess
		{
            display:none;
		}
    </style>
    </head>
    

<body onload="vibhu()">
    <?php
    $id=$_POST["hide_id"];
    $table=$_POST["hide_cat"];
    
    include 'connection.php';
			
    $sql="SELECT * FROM ".$table." where id='$id'";
							
    $result=mysqli_query($con,$sql);
							
    $row=mysqli_fetch_array($result);
    
    $m="";
    $name=$row["name"];
			
    $pid=$row["id"];
    $price=$row["price"];
    $pcode=$row["product_id"];
							
    $description=$row["description"];
    
    $image=$row["image"];
    
    if($table=="clothing")
    {
        $stock = array($row["small_stock"], $row["medium_stock"], $row["large_stock"], $row["xlarge_stock"]);
        //echo "<script>
        //alert('hey');
    }
    else
    {
        $stock=$row["stock"];
        //echo "<script>document.getElementById('select_size').style.display='block';</script>";
        
    }
    
    $m.='<img src="data:image/jpeg;base64,'.base64_encode($row['image']). ' " style="float:left; width:500px; margin:20px" />';
    
?>
<input type="hidden" id="hidecat" value="<?php echo $table;?>" />
<div class="container">
<div class="card" style="width:1000px">
<div class="image" >
<?php echo $m;?>
</div>
<div class="text" style="font:Arial, Helvetica, sans-serif;">
<br />
<br />

<p> <h1> <?php echo $name;?></h1>
<br />
<b> Price : <?php echo $price;?></b>
<br />
<br />


<br />
<br />
<b>Description</b>
<?php echo $description;?><br />
    </div>
<br />

<?php
    echo "<script type='text/javascript'> notinstock();</script>";
?>


<form method="post">
    <input type="hidden" value="<?php echo $table;?>" name="hide_category" />
    <input type="hidden" value="<?php echo $pid;?>" name="hide_pid" />
    <input type="hidden" value="<?php echo $pcode;?>" name="hide_pcode" />
    <input type="hidden" value="pantry.php" name="page" />
    
<button type="submit" class="btn btn-default" id="buynow" formaction="add_to_buynow.php">Buy Now</button>
<button type="submit" class="btn btn-default" id="addtocart" formaction="pantry_add_to_cart.php">Add to Cart</button>
    </form>
    
    </div>
    </div>

</body>
</html>
