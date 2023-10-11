<?php
session_start();

$places1=array("All1", "Vadodara", "Surat", "Anand", "Ahmedabad", "Jamnagar", "Khambhat");
	
	$g=" IS NOT NULL";
	$c=" IS NOT NULL";
    
    foreach($places1 as $x1)
    {
        if(isset($_POST["All1"]))
        {
            $c=" IS NOT NULL";
			$_SESSION["place"]=$c;
            break;
        }
        else if(isset($_POST[$x1]))
        {
            $c="='$_POST[$x1]'";
			$_SESSION["place"]=$c;
            break;
        }
        else
        {
            if($_SESSION["place"]!="IS NOT NULL")
            {
                $c="='".$_SESSION["place"]."'";
            }
             
        }
    }
    
$gender=array("All", "Food", "Spices");

    foreach($gender as $x)
    {
        if(isset($_POST["All"]))
        {
            $g=" IS NOT NULL";
            $_SESSION["cate"]=$g;
            break;
        }
        else if(isset($_POST[$x]))
        {
            $g=" ='$_POST[$x]'";
			$_SESSION["cate"]=$g;
            break;
        }
        else
        {
            if($_SESSION["cate"]!="IS NOT NULL")
            {
                $g="='".$_SESSION["cate"]."'";
            }
            
        }
    }
	if($c==NULL)
	{
	$c=" IS NOT NULL";
	}
	if($g==NULL)
	{
	$g=" IS NOT NULL";
	}
    
    
			

echo "<script type='text/javascript'>document.location = 'pantry.php'; </script>";
?>