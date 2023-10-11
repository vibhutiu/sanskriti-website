<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Add Item To Store</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/seller_uploaditem.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<script type="text/javascript">

    function myFunction()
    {
        
        const fi = document.getElementById('usr_image'); 
        // Check if any file is selected. 
        if (fi.files.length > 0)
        { 
            for (const i = 0; i <= fi.files.length - 1; i++)
            { 
  
                const fsize = fi.files.item(i).size; 
                const file = Math.round((fsize / 1024)); 
                // The size of the file. 
                if (file <= 512)
                { 
                    if (confirm("Are You Sure?"))
                    {
                        document.getElementById("upload-item-form").submit();
                    } 
                }
                else
                { 
                    alert ("File size should be less than 500kb");
                } 
            } 
        } 
        
    }
    
    function myFunction1()
    {
        
        const fi = document.getElementById('usr_image'); 
        // Check if any file is selected. 
        if (fi.files.length > 0)
        { 
            for (const i = 0; i <= fi.files.length - 1; i++)
            { 
  
                const fsize = fi.files.item(i).size; 
                const file = Math.round((fsize / 1024)); 
                // The size of the file. 
                if (file <= 512)
                { 
                    if (confirm("Are You Sure?"))
                    {
                        document.location("show_preview.php");
                    } 
                }
                else
                { 
                    alert ("File size should be less than 500kb");
                } 
            } 
        } 
        
    }

    function vibhu()
    {
        var x = document.getElementById("category_dropdown").value;
        alret("hey");
    }
    
    function Geeks()
    {
        var x = document.getElementById("GFG").value; 
        var y=document.getElementById("size1");
        var y1=document.getElementById("stock");
                
        if(x=="clothing_men"||x=="clothing_women")
        {
            y.style.display="block";
            y1.style.display="none";
        }
        else
        {
            y.style.display="none";
            if(x=="default")
                {
                    y1.style.display="none";
                }
            else
                {
                    y1.style.display="block";
                }
        }    
    }
    function stockinput(z)
    {
        var y = document.getElementById(z).checked;
        var temp = z+"_stock";
        if(y)
            {
                document.getElementById(temp).style.display="block";
            }
        else
            {
                document.getElementById(temp).style.display="none";
            }
    }
    
</script>
<body>
<?php
include 'seller_header.php';
//$name=$_SESSION["seller"];
?>
<div class="card" style="box-shadow: 5px 5px 5px #CCCCCC , 5px 5px 5px #CCCCCC;">
<h2 class="head" align="center" > UPLOAD ITEM</h2>
<hr />
<form action="seller_storeitem.php" name="uploaditem_form" id="upload-item-form" method="post" enctype="multipart/form-data">
<div class="form-group">
  <label for="usr">Name Of the Product:</label>
  <input type="text" class="form-control" id="usr" name="product_name">
</div>
<div class="form-group">
  <label for="usr">Price</label>
  <input type="text" class="form-control" id="usr" name="product_price">
</div>
<div class="form-group">
  <label for="sel1">Select Category</label>
  <select class="form-control" id="GFG" name="product_category" onchange="Geeks()">
      <option value="default" selected>Select a Category</option>
      <optgroup label="Clothing">
    <option value="clothing_men">Men</option>
    <option value="clothing_women">Female</option>
      </optgroup>
      <optgroup label="Pantry">
    <option value="pantry_food">Food</option>
    <option value="pantry_spices">Spices</option>
      </optgroup>
      <option value="wood_craft">Wooden Craft</option>
	<option value="accessories">Accessories</option>
	<option value="jewelery">Jewellery</option>
	<option value="wood_toys">Wooden Toys</option>
  </select>
</div>

<div class="form-group" id="size1" style="display:none;">
  <label for="usr">Size </label><br/>
  <input type="checkbox" id="small" name="size[]" value="small" onclick="stockinput('small')">S&nbsp;&nbsp;&nbsp;
    <input type="checkbox" id="medium" name="size[]" value="medium" onclick="stockinput('medium')">M&nbsp;&nbsp;&nbsp;
    <input type="checkbox" id="large" name="size[]" value="large" onclick="stockinput('large')">L&nbsp;&nbsp;&nbsp;
    <input type="checkbox" id="xlarge" name="size[]" value="xlarge" onclick="stockinput('xlarge')">XL&nbsp;&nbsp;&nbsp;
    <div class="form-group" id="small_stock" style="display:none;">
  <label for="usr">Stock for small size</label>
  <input type="number" class="form-control" name="small_stock">
        </div>
    <div class="form-group" id="medium_stock" style="display:none;">
  <label for="usr">Stock for Medium size</label>
  <input type="number" class="form-control" name="medium_stock">
</div>
    <div class="form-group" id="large_stock" style="display:none;">
  <label for="usr">Stock for Large size</label>
  <input type="number" class="form-control" name="large_stock">
</div>
    <div class="form-group" id="xlarge_stock" style="display:none;">
  <label for="usr">Stock for X-Large size</label>
  <input type="number" class="form-control" name="xlarge_stock">
</div>
    </div>
    <div class="form-group" id="stock" style="display:none;">
  <label for="usr">Stock</label>
  <input type="number" class="form-control" name="stock">
        </div>
<div class="form-group">
  <label for="usr">Product ID </label>
  <input type="text" class="form-control" id="usr" name="product_id">
</div>
<div class="form-group">
  <label for="usr">Description </label>
        <textarea class="form-control" id="usr" name="product_description" rows="5" cols="15"></textarea>
</div>
<div class="form-group">
  <label for="usr">Place </label>
  <input type="text" class="form-control" id="usr" name="place">
</div>
<div class="form-group">
  <label for="usr">Image of Product</label>
  <input name="product_image" type="file" class="form-control" id="usr_image">
</div>
<br />
<br />
<input type='submit' value="Preview"  onclick="myFunction1()"/>
<input type="submit" value="Upload" onclick="myFunction()" />
</form>
</div>



</body>
</html>
