<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pantry</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>

      // Add active class to the current button (highlight it)

      var header = document.getElementById("myDIV");

      var btns = header.getElementsByClassName("btn");

      for (var i = 0; i < btns.length; i++)
      {
  
          btns[i].addEventListener("click", function(){
  
        
              var current = document.getElementsByClassName("active");
  
              current[0].className = current[0].className.replace(" active", "");
  
              this.className += " active";
          });

      }
</script>
  <style>
      .image
      {
          width: 100%;
          height: auto;
          position:relative;
          left:7px;
          width:270px;
          height:350px;
          padding:0px;
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
	  .active, .btn:hover
      {
          background-color: #666;
          color: white;
      }
  </style>
    
</head>

<body>
<?php
    include 'home_header.php';
    include 'remove_from_buynow.php';
    ?>

<div class="row" >
<div class="col-lg-2">
<div class="panel panel-default" style="position:fixed;">
<div class="panel-heading" style="border:none">Search By
</div>
<div class="panel-body">
<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#demo" style="background:#660033; width:200px; color:#FFFFFF">Places</button>

  <div id="demo" class="collapse">
  <form method="post" action="pantry_select_cat.php">
    <div class="btn-group-vertical" style="width:200px;" id="myDIV">
    <?php
        
        $dis="";
        
        $places=array("All", "Vadodara", "Surat", "Anand", "Ahmedabad", "Jamnagar", "Khambhat");
        
        foreach($places as $x)
        {
            if($x=="All")
            {
                $dis.='<button type="submit" class="btn btn-default active" style="border:none; height:35px" name="All1" value="'.$x.'">'.$x.'</button>';
            }
            else
            {
            $dis.='<button type="submit" class="btn btn-default" style="border:none; height:35px" name="'.$x.'" value="'.$x.'">'.$x.'</button>';
            }
        }
        
        echo $dis;
        
        ?>
</div>
</form>
  </div>
  <br />
  <br />
  <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#demo1" style="background:#660033; width:200px; color:#FFFFFF">Category</button>

  <div id="demo1" class="collapse">
  <form method="post" action="pantry_select_cat.php">
    <div class="btn-group-vertical" style="width:200px;">
    <?php
        
        $dis="";
        $gender=array("All", "Food", "Spices");
        foreach($gender as $x)
        {
            $dis.='<button type="submit" class="btn btn-default" style="border:none; height:35px" name="'.$x.'" value="'.$x.'">'.$x.'</button>';
        }
        
        echo $dis;
        
        ?>
</div>
</form>
  </div>
</div>
</div>
</div>
<div class="col-lg-10">

<?php
    include 'connection.php';
    //unset($_SESSION["query"]);
					
    $sql="SELECT * FROM pantry WHERE place".$_SESSION['place']." and category".$_SESSION['cate'];
    
    
    //echo $sql."<br>";
    //echo $_SESSION['place']."<br>";
    //echo $_SESSION['sex']."<br>";
    
    $result=mysqli_query($con,$sql);
	if($result!=NULL)
    {			
    
        $row=mysqli_fetch_array($result);
        $result = $con->query($sql);
    
    
        if ($result->num_rows > 0)
        {
            
            // output data of each row
	
            while($row = $result->fetch_assoc())
            {
                echo "<div class='card' style='width:300px;height:420px; position:relative; top:15px; margin-left:23px; margin-right:23px;'><form action='pantry_preview.php' method='post'><input type='hidden' value='".$row['id']."' name='hide_id'/><input type='hidden' value='pantry' name='hide_cat'/><img src='data:image/jpeg;base64,".base64_encode($row['image'])."' class='image' /><p align='center' style='padding:0px;' ><button type='submit' class='btn btn-link'><b>" .$row["name"]. "</b></button> <br /><b>".$row["price"]."</b></p></form></div>";
            }
        }
        else
        {
            echo "<h1 align='center'>No Result Found</h1>";
        }
	}
	else
	{
        echo "<h1>No result found</h1>";
	}
	
	?>

</div>
</div>

</body>
</html>
