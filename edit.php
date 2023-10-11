<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edit Your Profile Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      .card1
      {
          position:relative;
          top:0px;
          left:270px;
          box-shadow: 5px 5px 5px #CCCCCC, 5px 5px 5px #CCCCCC;
          float:left;
          margin:5px;
          padding:20px;
          width:500px;
          height:1000px;
      }
  </style>
    <script>
        function myFunction()
    {
        
        const fi = document.getElementById('usr_image'); 
        // Check if any file is selected. 
        if (fi.files.length > 0)
        { 
            for (const i = 0; i <= fi.files.length - 1; i++)
            { 
  
                const fsize = fi.files.item(i).size; 
                const file = Math.round((fsize / 1024)); 
                // The size of the file. 
                if (file <= 512)
                { 
                    
                        document.getElementById("upload-item-form").submit();
                    
                }
                else
                { 
                    alert ("File size should be less than 500kb");
                } 
            } 
        } 
        
    }
    </script>
</head>

<body>
<?php
    include 'home_header.php';
    include 'connection.php';
    ?>
<?php
 
    $name=$_SESSION["name"];   
    
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
    $add1=$row["add_line1"];
    $add2=$row["add_line2"];
    $city=$row["city"];
    $pin=$row["pincode"];
    $state=$row["state"];
    
 ?>
<div class="container">
<div class="card1" style="height:800px;">
<div class="row">


<form method="post" action="store_edited_profile.php" enctype="multipart/form-data" id="upload-item-form"> 

<h1 style="color:	#660033;" align="center"> PROFILE</h1>

<hr />
<br />
<h3>
<div class="col-sm-4">Name :</div><div class="col-sm-8"><input type="text" class="form-control" name="name" value="<?php echo $name;?>" required=""></div>
<br />
<br />

<div class="col-sm-4">Contact :</div> <div class="col-sm-8"><input type="number" name="phone" class="form-control" value="<?php echo $phone;?>"/></div>
<br />
<br />

<div class="col-sm-4"> Email ID :</div><div class="col-sm-8">
 <input type="email" name="email" class="form-control" value="<?php echo $email;?>"/></div>
<br />
<br />

<div class="col-sm-4">Address Line1 :</div> <div class="col-sm-8"><input type="text" name="ad1" class="form-control" placeholder="Street Name" value="<?php echo $add1;?>" /></div>
<br />
<br />
<br />
<div class="col-sm-4">Address Line2:</div><div class="col-sm-8">
 <input type="text" name="ad2" class="form-control" placeholder=" Area Name/Locality" value="<?php echo $add2;?>" required=""/></div>
<br />
<br />
<br />
<div class="col-sm-4">City :</div><div class="col-sm-8"><input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $city;?>"></div>
<br />
<br />
<br />

<div class="col-sm-4">Pincode :</div><div class="col-sm-8"><input type="text" class="form-control" name="pc" placeholder="PinCode" value="<?php echo $pin;?>"></div>
<br />
<br />
<br />

<div class="col-sm-4">State :</div><div class="col-sm-8"><input type="text" class="form-control" name="state" placeholder="State" value="<?php echo $state;?>"></div>
<br />
<br />
 
<div class="col-sm-4"> Image :</div><div class="col-sm-8">
<input type="file" class="form-control" name="image" id="usr_image" /></div></h3>

</div>
<br />
<br />
 <button type="submit" class="btn btn-default" style="width:120px; position:relative; left:150px; background-color:#660033; color:#FFFFFF;" onclick="myFunction()" >Save Changes</button>
 <button type="reset" class="btn btn-default" style="width:100px; position:relative; left:150px;" onclick="<script type='text/javascript'> document.location = 'edit.php'; </script>" >Reset</button>
 </form>

</div>
</div>

</body>
</html>
