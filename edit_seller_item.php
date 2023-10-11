<?php
include 'seller_header.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edit Item</title>
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
            else
                {
                    document.getElementById("mess").style.display="block";
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
    $table=$_POST["hide_table"];
    
    include 'connection.php';
			
    $sql="SELECT * FROM ".$table." where id='$id'";
							
    $result=mysqli_query($con,$sql);
							
    $row=mysqli_fetch_array($result);
    
    $m="";
    $name=$row["name"];
			
    $pid=$row["id"];
    $price=$row["price"];
							
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
<form method="post" enctype="multipart/form-data">
<div class="text" style="font:Arial, Helvetica, sans-serif;">
<h1 align="center" style="color:red;">Only Fill Details which need to be changed</h1>
<br />
<p><u>Image :</u></p>
<input type="file" name="image" />
<br />
<br />
    

<p>Name :</p>
<p> <h2><input type="text" name="name" value="<?php echo $name;?>" /></h2>
<br />
<b> Price : <input type="number" name="price" value="<?php echo $price;?>" style="width:100px;" /></b>
<br />
<br />

<div class="form-group" id="sucker" >
  <b>Stock :</b>
    <br />
    <b>Small : </b><input type="number" min="0" name="s_stock" value="<?php echo $stock[0];?>" style="width:50px;" />
    <br />
     <br />
    <b>Medium : </b><input type="number" min="0" name="m_stock" value="<?php echo $stock[1];?>" style="width:50px;" />
    <br />
     <br />
    <b>Large : </b><input type="number" min="0" name="l_stock" value="<?php echo $stock[2];?>" style="width:50px;" />
    <br />
     <br />
    <b>X-Large : </b><input type="number" min="0" name="xl_stock" value="<?php echo $stock[3];?>" style="width:50px;" />
     <br />
  
</div>

<div class="form-group" id="mess";>
    <b>Stock : </b><input type="number" min="0" name="stock" value="<?php echo $stock;?>" style="width:50px;" />
     <br />
    </div>

<br />
<br />
<b>Description</b>
<textarea class="form-control" cols="5" rows="5" id="comment" name="description" style="width:400px; margin-left:540px;" ><?php echo $description;?></textarea><br />
    </div>
<br />


    <input type="hidden" value="<?php echo $table?>" name="hide_category" />
    <input type="hidden" value="<?php echo $pid?>" name="hide_pid" />
    
<button type="submit" class="btn btn-default" id="addtocart" formaction="seller_store_edited_item.php" style="margin-left:700px; background-color:#660033; color:#FFFFFF">Save Changes</button>
    </form>
    
    </div>
    </div>

</body>
</html>
