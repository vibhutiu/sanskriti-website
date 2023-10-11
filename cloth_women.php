<?php
session_start();

$_SESSION["place"]=" IS NOT NULL";
$_SESSION["sex"]=" = 'Women'";

echo "<script type='text/javascript'>document.location = 'clothingin.php'; </script>";
?>