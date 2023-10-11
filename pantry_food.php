<?php
session_start();

$_SESSION["place"]=" IS NOT NULL";
$_SESSION["cate"]=" = 'Food'";

echo "<script type='text/javascript'>document.location = 'pantry.php'; </script>";
?>