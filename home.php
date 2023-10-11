<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      .image
      {
          width: 270px;
          height: 350px;
          position:relative;
          left:7px;
      }
      .card
      {
          position:relative;
          top:10px;
          box-shadow: 5px 5px 5px #CCCCCC, 5px 5px 5px #CCCCCC;
          float:left;
          margin:10px;
          padding:10px;
          width:300px;
          height:450px;
      }
      .seemore
      {
          margin-right: 20px;
          font: 20px;
          align-content: flex-end;
      }
  </style>
</head>

<body >
<?php 
    include 'home_header.php';
    include 'remove_from_buynow.php';
    unset($_SESSION["query"]);
    
    
    //echo $_SESSION['place']."<br>";
    //echo $_SESSION['sex']."<br>";
//$user="User";
?> 


<?php //include 'slider.php';?>


  <img src="Images/pantry1.png" style="width:960px; margin-left:250px;"  alt="Pantry" />
<div class="container-fluid">
<?php
    
    include 'connection.php';
    
    $sql1="SELECT COUNT(id) FROM pantry";
    $res=mysqli_query($con,$sql1);
    $count=mysqli_fetch_array($res);
    $i=0;
    $sql="SELECT * FROM pantry";
    
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_all($result,MYSQLI_BOTH);
    $size=sizeof($row);
    $min=min($count[0],4);
    //echo $size."<br>";
    while($i<$min)
    {
        $m="";

        $image=$row[$i]["image"];
        $price=$row[$i]["price"];
        $name=$row[$i]["name"];
        $id=$row[$i]["id"];
        
        $m.='<img class="image" src="data:image/jpeg;base64,'.base64_encode($row[$i]['image']). ' " alt="This is image of '.$name.'" />';
        
        $out = "<div class='card' style='width:300px;height:420px; position:relative; top:15px; margin-left:23px; margin-right:23px;'><form action='preview.php' method='post'><input type='hidden' value='$id' name='hide_id'/><input type='hidden' value='pantry' name='hide_cat'/><input type='hidden' value='home.php' name='page'/>".$m."<p align='center' style='padding:0px;' ><button type='submit' class='btn btn-link'><b>" .$name. "</b></button><br /><b>".$price."</b></p></form></div>";
        $i++;
        echo $out;
    }
?>

</div>
    


<br />
<br />
    <div>
    <a href="pantry_all.php" class="btn btn-info" role="button" style="margin-left:1425px; margin-bottom:10px;">See More</a>
        
    </div>

<img src="Images/clothing2.png" style="width:960px; margin-left:250px; margin-top:0px;"  alt="Clothing" />
<div class="container-fluid">
<?php
    
    $sql1="SELECT COUNT(id) FROM clothing";
    $res=mysqli_query($con,$sql1);
    $count=mysqli_fetch_array($res);
    $i=0;
    $sql="SELECT * FROM clothing";
    
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_all($result,MYSQLI_BOTH);
    $size=sizeof($row);
    $min=min($count[0],4);
    //echo $size."<br>";
    while($i<$min)
    {
        $m="";
        
        
        $image=$row[$i]["image"];
        $price=$row[$i]["price"];
        $name=$row[$i]["name"];
        $id=$row[$i]["id"];
        
        $m.='<img class="image" src="data:image/jpeg;base64,'.base64_encode($row[$i]['image']). ' " />';
        
        $out = "<div class='card' style='width:300px;height:420px; position:relative; top:15px; margin-left:23px; margin-right:23px;'><form action='preview.php' method='post'><input type='hidden' value='$id' name='hide_id'/><input type='hidden' value='clothing' name='hide_cat'/><input type='hidden' value='home.php' name='page'/>".$m."
<p align='center' style='padding:0px;' ><button type='submit' class='btn btn-link'><b>" .$name. "</b></button><br /><b>".$price."</b></p></form></div>";
        $i++;
        echo $out;
    }
?>
    
    <div>
    <a href="cloth_all.php" class="btn btn-info" role="button" style="margin-left:1410px; margin-bottom:10px;">See More</a>
        <br>
    </div>
</div>
<div>
</div>
</body>
</html>
