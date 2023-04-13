
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
.tabl {
  border-collapse: collapse;
  border: 2.5px solid green;
  width: 1500px;
  height: 600px;
}
.tableee {
  border-collapse: collapse;
  border: 2.5px solid green;
  width: 400px;
  height: 300px;
}
.up{
        text-align:center;
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
    <link rel="stylesheet" type="text/css" href="button.css">
    <title>Seller Dashboard</title>
</head>

<body align="center">
  <h1>Seller Dashboard</h1>
  <?php echo "Welcome,Mr. ".$_SESSION['name']; ?>
  <hr color="red" size="5">

    <table border=1 class="tabl">
        <tr>
            <th class="side_panel"><a href="sellerdashboard.php">User Profile</a></th>
            <td rowspan='8'>
               <table align="center" class="tableee">
                <form action="../controller/add_blog_validation.php" method="post" novalidate enctype="multipart/form-data">
                <tr>
                    <th>ADD BLOG HERE</th>
                </tr>    
                <tr><th></th></tr>
                <tr>
                        <th>
                        <?php
                                if(isset($_SESSION['blog_title_err']))
                                {
                                    echo $_SESSION['blog_title_err'];
                                    unset($_SESSION['blog_title_err']);
                                }
                                ?><br>
                            <label for="blog_title">Blog Title: </label>
                            <input type="text" name="blog_title" id="blog_title">
                        </th>
                    </tr>
                    <tr>
                        <th>
                        <?php
                                if(isset($_SESSION['product_image_err']))
                                {
                                    echo $_SESSION['product_image_err'];
                                    unset($_SESSION['product_image_err']);
                                }
                                ?><br>
                            <label for="product_image">Add Image: </label>
                            <input type="file" name="product_image" id="product_image">
                        </th>
                    </tr>
                    <tr>
                        <th>
                        <?php
                                if(isset($_SESSION['blog_err']))
                                {
                                    echo $_SESSION['blog_err'];
                                    unset($_SESSION['blog_err']);
                                }
                                ?><br>
                            <label for="blog">Blog: </label>
                            <textarea name="blog" id="blog" cols="30" rows="5"></textarea>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <input type="submit" value="Add Blog" class="button">
                        </th>
                    </tr>
                </form>
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