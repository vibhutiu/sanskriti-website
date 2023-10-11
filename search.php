<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
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
<body>
<?php
    include 'home_header.php';
    include 'connection.php';
    
    if(!isset($_SESSION["query"])||(isset($_GET["query"])))
    {
        $_SESSION["query"]=$_GET["query"];
    }
    
        $query = $_SESSION['query']; 
    // gets value sent over search form
    
    
     
    $min_length = 1;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length)
    {
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
        
        $sql="SELECT * FROM pantry
            WHERE (`name` LIKE '%".$query."%') OR (`category`='$query')";
         
        $raw_results = mysqli_query($con,$sql);
             
         
        if(mysqli_num_rows($raw_results) > 0)
        {
            
            echo '<img src="pantry1.png" style="width:960px; margin-left:250px;"  alt="Pantry" />
            <div class="container-fluid">';
             
            while($row = mysqli_fetch_array($raw_results))
            {
                //echo "<p><h3>".$row['name']."</h3>".$row['category']."</p>";
                
                $m="";
        
                $image=$row["image"];
                $price=$row["price"];
                $name=$row["name"];
                $id=$row["id"];
        
        
                $m.='<img class="image" src="data:image/jpeg;base64,'.base64_encode($row['image']). ' " />';
        
        
                $out = "<div class='card' style='width:300px;height:420px; position:relative; top:15px; margin-left:23px; margin-right:23px;'><form action='preview.php' method='post'><input type='hidden' value='$id' name='hide_id'/><input type='hidden' value='pantry' name='hide_cat'/><input type='hidden' value='search.php' name='page'/>".$m."<p align='center' style='padding:0px;' ><button type='submit' class='btn btn-link'><b>".$name. "</b></button><br /><b>".$price."</b></p></form></div>";
        
                echo $out;
            }
            
            echo '</div>';
             
        }
        else
        { // if there is no matching rows do following
            //echo "No results";
        }
        
        
        
        
        $sql="SELECT * FROM clothing
            WHERE (`name` LIKE '%".$query."%') OR (`category`='$query')";
         
        $raw_results = mysqli_query($con,$sql);
             
         
        if(mysqli_num_rows($raw_results) > 0)
        {
            
            echo '<img src="clothing2.png" style="width:960px; margin-left:250px; margin-top:0px;"  alt="Clothing" />
            <div class="container-fluid">';
             
            while($row = mysqli_fetch_array($raw_results))
            {
                //echo "<p><h3>".$row['name']."</h3>".$row['category']."</p>";
                
                $m="";
        
                $image=$row["image"];
                $price=$row["price"];
                $name=$row["name"];
                $id=$row["id"];
        
        
                $m.='<img class="image" src="data:image/jpeg;base64,'.base64_encode($row['image']). ' " />';
        
        
                $out = "<div class='card' style='width:300px;height:420px; position:relative; top:15px; margin-left:23px; margin-right:23px;'><form action='preview.php' method='post'><input type='hidden' value='$id' name='hide_id'/><input type='hidden' value='clothing' name='hide_cat'/><input type='hidden' value='search.php' name='page'/>".$m."
<p align='center' style='padding:0px;' ><button type='submit' class='btn btn-link'><b>".$name. "</b></button><br /><b>".$price."</b></p></form></div>";
        
                echo $out;
            }
            
            echo '</div>';
             
        }
        else
        { // if there is no matching rows do following
            //echo "No results";
        }
        
         
    }
    else
    { // if query length is less than minimum
        $m="Enter word of valid length!!!";
    
        echo "<script type='text/javascript'>alert ('$m'); document.location = 'home.php'; </script>";
    }
?>
</body>
</html>