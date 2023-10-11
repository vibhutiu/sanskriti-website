<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
  $(window).scroll(function(){
    if($(document).scrollTop()>=$(document).height()/5)
        $("#spopup").show("slow");else $("#spopup").hide("slow");
});
function closeSPopup(){
    $('#spopup').hide('slow');
}
  </script>
    <style>
        .dropdown
        {
            position: relative;
            display: inline-block;
        }
        .dropdown-content
        {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            padding: 12px 16px;
            z-index: 1;
        }
        .dropdown:hover .dropdown-content
        {
            display: block;
        }
		#spopup{
    background:#FFFFFF;
    border-radius:20px;
    
    box-shadow: 0 0 3px #333;
    padding:12px 14px 12px 14px;
    width:40px;
	height:40px;
    position:fixed;
    top:13px;
    right:750px;
    display:none;
    z-index:90;
}
  </style>
</head>

<body>
<?php 
    session_start();
	$cnt="";
    
    //$_SESSION["name"]=NULL;
    if(!isset($_SESSION["name"]))
    {
        $name="User";
        $x="Sign In";
        $cart="";
    }
    else
    {
        $name=$_SESSION["name"];
        $x="Sign Out";
        
        include 'connection.php';
        $sql1="SELECT COUNT(id) FROM cart WHERE cust_id=".$_SESSION["c_id"];
        $res=mysqli_query($con,$sql1);
        $count=mysqli_fetch_array($res);
        $cnt=$count[0];
        $cart='<li> <a href="cart.php">Cart <b style="color:#FFFFFF">'.$cnt.'</b></a></li>';
    }

	//echo $count[0];
    
?> 

<div class="container-fluid" style="background-color:	#660033;" >
<a id="up"></a>
<a style="color:#660033;" href="#up">
	<div id="spopup" style="display: none;">UP
	</div>
	</a>


<nav class="navbar navbar-inverse" style="margin:0px; border:none; background-color:#660033;  ">
  <div class="container-fluid">
  <div class="row">
  <div class="col-lg-2">
    <div class="navbar-header">
      <div><img src="Images/logo3.PNG" style="width:150px; height:60px; margin-left:25px; position:relative; top:0px; bottom:20px"/></div>
    </div>
	</div>
    	
	<div col-lg-10>
    <form class="navbar-form" action="search.php">
      <div class="form-group" align="center">
	  <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" align="middle" style="width:800px; height:40px;" name="query">
		<div class="input-group-btn">
      
      <button type="submit" class="btn btn-default" style=" height:40px; background-color:#CC0066"><span class="glyphicon glyphicon-search"></span></button>
	  </div>
	  </div>
	  </div>
	  <ul class="nav navbar-nav navbar-right">
       <li style="position:relative; font-size:14px; top:14px; color:#FFFFFF;">Namaste,<?php echo $name;?></li>
	  <?php echo $cart;?>
    </ul>
        </form>
</div>
	</div>
  </div>
</nav>

<nav class="navbar navbar-inverse" style=" margin:0px; border:none; background:#660033 " >
  <div class="container-fluid">
  <div class="row">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-7">
  
    
    <ul class="nav navbar-nav">
	  <li class="dropdown">
        <a class="dropdown-toggle" href="pantry_all.php">Pantry</a>
        <div class="dropdown-content">
		<ul class="nav nav-pills nav-stacked">
          <li><a href="pantry_food.php">Food</a></li>
          <li><a href="pantry_spices.php">Spices</a></li>
          
        </ul>
		</div>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle"  href="cloth_all.php">Clothing</a>
        <div class="dropdown-content">
		<ul class="nav nav-pills nav-stacked">
          <li><a href="cloth_men.php">Men</a></li>
          <li><a href="cloth_women.php">Women</a></li>
		  </ul>
          
        </div>
      </li>
      <li><a href="#" class="fonts" >Wooden Craft</a></li>
	  <li><a href="#" class="fonts" >Jewellery</a></li>
	  <li><a href="#" class="fonts" >Accessories</a></li>
	  <li><a href="#" class="fonts" >Wooden Toys</a></li>
	  
	  </ul>
	

	</div>
	<div class="col-lg-3">
	<ul class="nav navbar-nav navbar-right">
      
	  <li><a href="home.php">Home</a></li>
        <?php
        if(!isset($_SESSION["name"]))
        {
            echo '<li><a href="signin2.php">'.$x.'</a></li>';
        }
        else
        {
            echo '<li><a href="account.php">Your Account</a></li>';
            echo '<li><a href="signout.php">'.$x.'</a></li>';
        }
        ?>
      
	</div>
	
	</div>
  </div>
</nav>
</div>
</body>
</html>
