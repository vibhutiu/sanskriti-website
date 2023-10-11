<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sign Out</title>
</head>

<body>
<?php 
session_start();
unset($_SESSION["seller"]);
unset($_SESSION["seller_id"]);
unset($_SESSION["spreview_id"]);
echo "<script type='text/javascript'> document.location = 'seller_rules.php'; </script>";
?>
</body>
</html>
