<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to Our Website</title>
<link rel="stylesheet" type="text/css" href="main.css">
<script type="text/javascript" src="JS/main.js"></script>
    
</head>
<body>
    <div>
    <div>
        <div id="img1"><img src="main_imgs/1.png" class="r1">
        </div>
        <div><img src="main_imgs/2.png" class="r1" id="img2" title="Hand Weaved Sarees and dresses" onmouseover="change(this)" onmouseout="changeover(this)">
        </div>
        <div id="img3"><img src="main_imgs/3.png" class="r1">
        </div>
        <div id="img4"><img src="main_imgs/4.png" class="r1">
        </div>
        <div id="img5"><img src="main_imgs/5.png" class="r1">
        </div>
    </div>
    <div>
        <div><img src="main_imgs/6.png" class="r2">
        </div>
        <div><img id="img7" src="main_imgs/7.png" class="r2" onmouseover="change(this)" onmouseout="changeover(this)">
        </div>
        <div><img src="main_imgs/8.png" class="r2">
        </div>
        <div><img id="img9" src="main_imgs/9.png" class="r2" onmouseover="change9()" onmouseout="changeover(this)">
        </div>
        <div><img src="main_imgs/10.png" class="r2">
        </div>
    </div>
    <div>
        <div><img src="main_imgs/11.png" class="r3">
        </div>
        <div><img src="main_imgs/12.png" class="r3">
        </div>
        <div><img src="main_imgs/13.png" class="r3">
        </div>
        <div><img src="main_imgs/14.png" class="r3">
        </div>
        <div><img src="main_imgs/15.png" class="r3">
        </div>
    </div>
        </div>
    <div id="footer">
        <div><a href="register.html"><img src="main_imgs/sign_up.png" id="signup" class="foot" style="float: left" title="Register" ></a>
        </div>
        <div><a href="home.php"><img src="main_imgs/home.png" id="home" class="foot" style="float: left" title="Home"></a>
        </div>
        <div><a href="signin2.php"><img src="main_imgs/log_in.jpg" id="login" class="foot" style="float: left" title="Sign In"></a>
        </div>
    </div>
    
</body>
</html>