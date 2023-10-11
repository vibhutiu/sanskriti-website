<?php
session_start();

$_SESSION["place"]=" IS NOT NULL";
$_SESSION["cate"]=" IS NOT NULL";

echo "<script type='text/javascript'>document.location = 'pantry.php'; </script>";
?>