<?php
session_start();

$_SESSION["place"]=" IS NOT NULL";
$_SESSION["sex"]=" = 'Men'";

echo "<script type='text/javascript'>document.location = 'clothingin.php'; </script>";
?>