<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Storing item details to database from preview</title>

</head>

<body>
<?php
    session_start();
    include 'connection.php';

    $name=$_SESSION["seller"];
    $id=$_SESSION["spreview_id"];

    $sql="SELECT * from preview where id='$id'";

    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);

    $pname=$row["name"];
    $category=$row["category"];
    
    if($category=="men" || 
       $category=="women")
    {
        $table = "clothing";
    }
    else if($category=="food" || $category=="spices")
    {
        $table = "pantry";
    }
    else
    {
        $table=$category;
        $category=NULL;
    }
    
    $sql1="INSERT INTO $table (name,price,category,product_id,description,place,company_name,image) SELECT name,price,category,product_id,description,place,company_name,image FROM preview";

    $res1=mysqli_query($con,$sql1);
    
    if($category=="men" || 
       $category=="women")
    {
        $sizes=array("small", "medium", "large", "xlarge");
        foreach($sizes as $x)
        {
            $value=$row[$x."_stock"];
    
            $sql2="UPDATE clothing SET ".$x."_stock='$value' WHERE name='$pname'";
    
            $res2=mysqli_query($con,$sql2);
        }
    }
    
    else
    {
        $stock=$row["stock"];
        $sql2="UPDATE $table SET stock='$stock' WHERE name='$pname'";
        $res2=mysqli_query($con,$sql2);
    }
    
    
    $sql3="DELETE FROM preview WHERE id='$id'";
        
    $res3=mysqli_query($con,$sql3);
    unset($_SESSION["spreview_id"]);

    if($res1 && $res2 && $res3)
    {
        echo "HELLO";
        echo "<script type='text/javascript'> document.location = 'seller_uploaditem.php'; </script>";
    }
    else
    {
        $m="Some Error occured.Please again!!";
        
        echo "<script type='text/javascript'> document.location = 'seller_uploaditem.php'; </script>";
    }
?>
</body>
</html>
