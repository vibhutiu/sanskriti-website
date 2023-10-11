<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Storing item details to database</title>

</head>

<body>
<?php
    session_start();
    include 'connection.php';

    $name=$_SESSION["seller"];

    $sql="SELECT company from seller where name='$name'";

    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);

    $cname=$row["company"];
    $pname=$_POST["product_name"];
    $price=$_POST["product_price"];
    $pcategory=$_POST["product_category"];
    $pid=$_POST["product_id"];
    $description=$_POST["product_description"];
    $place=$_POST["place"]; $image=addslashes(file_get_contents($_FILES['product_image']['tmp_name']));
    //$stock=$_POST["product_stock"];
    
    if($pcategory=="clothing_men" || 
       $pcategory=="clothing_women")
    {
        $table = "clothing";
        if($pcategory=="clothing_men")
        {
            $category = "men";
        }
        else
        {
            $category = "women";
        }
    }
    else if($pcategory=="pantry_food" || $pcategory=="pantry_spices")
    {
        $table = "pantry";
        if($pcategory=="pantry_food")
        {
            $category = "food";
        }
        else
        {
            $category = "spices";
        }
    }
    else
    {
        $table=$pcategory;
    }
    
    $sql1="INSERT INTO preview (name,price,category,product_id,description,place,image,company_name,pro_table) VALUES('$pname','$price','$category','$pid','$description','$place','$image','$cname','$table')";

    $res1=mysqli_query($con,$sql1);
    
    if($pcategory=="clothing_men" || 
       $pcategory=="clothing_women")
    {
        $sizes=$_POST["size"];
        foreach($sizes as $x)
        {
            $value=$_POST[$x."_stock"];
            
            if($value!=0)
            {
                $sql2="UPDATE preview SET ".$x."_stock='$value' WHERE product_id='$pid'";
                
                $res2=mysqli_query($con,$sql2);
            }
        }
        
        
    }
    
    else
    {
        $stock=$_POST["stock"];
        $sql2="UPDATE preview SET stock='$stock' WHERE product_id='$pid'";
        $res2=mysqli_query($con,$sql2);
        
    }
    
    
    $sql3="SELECT id FROM preview WHERE product_id='$pid'";
        
    $res3=mysqli_query($con,$sql3);
    $row3=mysqli_fetch_array($res3);
    $_SESSION["spreview_id"]=$row3["id"];
    

    if($res1 && $res2 && $res3)
    {
        echo "<script type='text/javascript'> document.location = 'seller_preview.php'; </script>";
    }
?>
</body>
</html>
