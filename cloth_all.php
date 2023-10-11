<?php
session_start();

$_SESSION["place"]=" IS NOT NULL";
$_SESSION["sex"]=" IS NOT NULL";

echo "<script type='text/javascript'>document.location = 'clothingin.php'; </script>";
?>