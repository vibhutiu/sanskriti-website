<?php

include 'connection.php';

$pid=$_POST["hide_pid"];
$table=$_POST["hide_category"];
$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));

$des=$_POST["description"];

if($table=="clothing")
{
    $sql="UPDATE ".$table." SET name='".$_POST['name']."', price='".$_POST['price']."', small_stock='".$_POST["s_stock"]."', medium_stock='".$_POST["m_stock"]."', large_stock='".$_POST["l_stock"]."', xlarge_stock='".$_POST["xl_stock"]."' WHERE id=".$pid;
}
else
{
    $sql="UPDATE ".$table." SET name='".$_POST['name']."', price='".$_POST['price']."', stock='".$_POST["stock"]."' WHERE id=".$pid;
}

$res=mysqli_query($con,$sql);


if($image!=NULL)
{
    $sql1="UPDATE ".$table." SET image='".$image."' WHERE id=".$pid;
    $res1=mysqli_query($con,$sql1);
}



if($des!=NULL)
{
    $sql2="UPDATE ".$table." SET description='".$des."' WHERE id=".$pid;
    $res2=mysqli_query($con,$sql2);
}

if($image!=NULL)
{
    $fc="$res && $res1 && $res2";
}
else
{
    $fc="$res && $res2";
}

if($fc)
{
    echo "<script type='text/javascript'> document.location = 'seller_show_uploaded.php'; </script>";
}
else
{
    $m="Some Error Occured. Please try again.";
    
    echo "<script type='text/javascript'>alert ('$m'); document.location = 'seller_show_uploaded.php'; </script>";
}


?>