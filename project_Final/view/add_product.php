<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == false)
{
    header("location:login.php");
    exit;
}
include 'header.php';

?>
<style>
.tablt {
  width: 500px;
  height: 350px;
  border-collapse: collapse;
  border: 2.5px solid green;
  text-align:center;
  font-weight: bold;
  
}
.tabl {
  border-collapse: collapse;
  border: 2.5px solid green;
  width: 1500px;
  height: 600px;
}
a{
    color:black;
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="sellercss.css" rel="stylesheet" type="text/css">
    <title>Seller Dashboard</title>
</head>

<body align="center">
  <h1>Seller Dashboard</h1>
  <?php echo "Welcome,Mr. ".$_SESSION['username']; ?>
  <hr color="red" size="5">
  
<table class="tabl" border=1>
    <tr>
        <th class="side_panel"><a href="sellerdashboard.php">User Profile</a></th>
            <td rowspan='8'>
                <table align="center">
                    <tr>
                        <td>
                    <form action="../controller/add_product_validation.php" method="post" enctype="multipart/form-data" novalidate>
                        <fieldset class="tablt">
                            <legend>Add Product</legend>
                            <table>
                            <tr>
                                <th align="left">
                                    <?php
                                        if(isset($_SESSION['productname_err']))
                                        {
                                            echo $_SESSION['productname_err'];
                                            unset($_SESSION['productname_err']);
                                        }
                                     ?><br>
                                    <label for="productname">Product Name:</label>
                                    <input type="text" name="productname" id="productname" value="" placeholder="Enter Product Name..">
                                </th>
                            </tr>
                            <tr>
                                <th align="left">
                                <?php
                                    if(isset($_SESSION['image_err']))
                                    {
                                        echo $_SESSION['image_err'];
                                        unset($_SESSION['image_err']);
                                    }
                                    ?><br>
                                <label for="my_image">Product Image:</label>
                                <input type="file" name="my_image" id="my_image" value="">
                                </th>
                            </tr>
                            <tr>
                                <th align="left">
                                <?php
                                    if(isset($_SESSION['productprice_err']))
                                    {
                                        echo $_SESSION['productprice_err'];
                                        unset($_SESSION['productprice_err']);
                                    }
                                    ?><br>
                                <label for="productprice">Product price:</label>
                                <input type="number" name="productprice" id="productprice" value="" placeholder="Enter Product price..">
                                
                                </th>
                            </tr>
                            <tr>
                                <th align="left">
                                <?php
                                    if(isset($_SESSION['productdetails_err']))
                                    {
                                        echo $_SESSION['productdetails_err'];
                                        unset($_SESSION['productdetails_err']);
                                    }
                                    ?><br>
                                <label for="productdetails">Product Details:</label>
                                <textarea name="productdetails" id="productdetails" cols="20" rows="3"></textarea>
                                </th>
                            </tr>
                            <tr>
                                <td align="right">
                                    <input type="submit" value="Add Product" style="color: green">
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </td>
        </tr>
    </table>
</td>
        </tr>
        <tr>
            <th><a href="shop.php">Shop</a></th>
        </tr>
        <tr>
            <th><a href="add_product.php">Add Product</a></th>
        </tr>
        <tr>
            <th><a href="order_management.php">Order Management</a></th>
        </tr>
        <tr>
            <th><a href="customer_communication.php">Customer Communication</a></th>
        </tr>
        <tr>
            <th><a href="payment_processing.php">Payment Processing</a></th>
        </tr>
        <tr>
            <th><a href="blog.php">Blog</a></th>
        </tr>
        <tr><th><a href="logout.php">Logout</a></th></tr>
    </table>
    <?php include 'footer.php'; ?>
</body>
</html>