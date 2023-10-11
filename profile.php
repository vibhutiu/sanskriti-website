<?php include 'home_header.php';?>
<?php 


    $name=$_SESSION["name"]; $con=mysqli_connect("localhost","root","","project");

    //if($con->connect_error)					
    //{
    //die("Error has occured");					
    //}					
    $sql="SELECT * FROM user where name='$name'";

    //$result=$con->query($sql);
							
    $result=mysqli_query($con,$sql);
							
    $row=mysqli_fetch_array($result);
							
    $phone=$row["phone"];
							
    $email=$row["email"];

    /*$arr=array("add_line1", "add_line2", "city", "pincode", "state");

    $add="";

    echo "Value :".$row["add_line2"];

    foreach($arr as $x)
    {
        if($row[$x]!="NULL" || $row[$x]!='')
        {
            $add.=$row[$x].",";
        }
    }*/
							
    $add=$row["add_line1"].",".$row["add_line2"]."<br>".$row["city"]."-".$row["pincode"]."<br>".$row["state"];
    
    $image=$row["image"];
							
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Profile</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <style>
  .card1{
position:relative;
top:100px;
box-shadow: 5px 5px 5px #CCCCCC, 5px 5px 5px #CCCCCC;
float:left;


margin:10px;
padding:10px;
width:500px;
<?php
      if($image!=NULL)
      {
          echo "height:700px;";
      }
      else
      {
          echo "height:525px;";
      }
?>
}

      #dp
      {
          align-self: center;
          margin-left: 150px;
          height: 200px;
          width: 150px;
          
      }
  
  
 
  </style>
</head>

<body>


<div class="container">

<div class="row">
<div class="col-lg-3">
</div>
<div class="col-lg-9">
<div class="card1" >

<h1 style="color:	#660033;" align="center"> PROFILE</h1>
<hr />
    <?php
    $m="";
    if($image!=NULL)
    {
        $m.='<img id="dp" src="data:image/jpeg;base64,'.base64_encode($row['image']). ' " />';
        echo $m;
    }
    
    ?>
<br />
    <p style="font-size:24px;"> <b>Name</b> : <?php echo $name;?></p> 
<br />
    <p style="font-size:24px;"><b>Contact no.</b>: <?php echo $phone;?></p>
<br />
    <p style="font-size:24px;"><b>Email</b>: <?php echo $email;?></p>
<br />
    <p style="font-size:24px;"><b>Shipping Address</b>: <?php echo $add;?></p>
<br />
<form action="edit.php" method="get">
<button type="submit" class="btn btn-default" style="width:100px; position:relative; left:175px;" onclick="<script type='text/javascript'> document.location = 'edit.php'; </script>" >Edit</button></form>
</div>
</div>

</body>
</html>
