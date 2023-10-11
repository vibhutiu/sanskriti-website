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
    include 'seller_header.php';
    
    include 'connection.php';
    
    $id=$_SESSION["spreview_id"];
			
    $sql="SELECT * FROM preview where id='$id'";
							
    $result=mysqli_query($con,$sql);
							
    $row=mysqli_fetch_array($result);
    
    $m="";
    $name=$row["name"];
			
    $pid=$row["id"];
    $price=$row["price"];
    $table=$row["pro_table"];
							
    $description=$row["description"];
    
    $image=$row["image"];
    
    if($table=="clothing")
    {
        $stock = array($row["small_stock"], $row["medium_stock"], $row["large_stock"], $row["xlarge_stock"]);
    }
    else
    {
        $stock=$row["stock"];
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


<div class="form-group" id="sucker" >
<b>Sizes Available:</b>
  
  <select class="form-control" id="sel1" style="width:100px;">
  <option value="default">select</option>
    <?php
    
      $size = array("S", "M", "L", "XL");
        $i=0;
      $m="";
      foreach($stock as $x)
      {
          if($x!==NULL)
          {
		  if($x==0)
		  {
		  $m.="<option value=".$i." disabled='disabled'>".$size[$i]."</option>";
		  }
		  else{
              $m.='<option value='.$i.'>'.$size[$i].'</option>';}
          }
          $i++;
      }
      echo $m;
      ?>
  </select>
</div>
    
    
<div id="mess">
    No Stock available.
      </div>
    
<br />
<br />
<b>Description</b>
<?php echo $description;?><br />
    </div>

    <br>
<form method="post" action="seller_upload_from_preview.php">
<button type="submit" class="btn btn-default" formaction="seller_remove_from_preview.php">Edit Detail</button>
<button type="submit" class="btn btn-default">Upload</button>
    </form>
</div>
</div>
</body>
</html>
