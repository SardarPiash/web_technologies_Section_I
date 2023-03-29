<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == false)
{
    header('location:login.php');
    exit;
}
include 'header.php';

?>
<style>
    .up{
        text-align:center;
}

    .tablt {
  width: 700px;
  height: 500px;
  border-collapse: collapse;
  border: 2.5px solid green;
  text-align:center;
  
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
    <title>Seller Dashboard</title>
</head>
<?php include 'sellercss.php' ;?>
<body align="center">
  <h1>Seller Dashboard</h1>
  <?php echo "Welcome,Mr. ".$_SESSION['username']; ?>
  <hr color="red" size="5">

    <table class="tabl" border=1>
        <tr>
            <th class="side_panel"><a href="sellerdashboard.php">User Profile</a></th>
            <td rowspan='8'>
                <?php 
                    if(isset($_SESSION['update_done']))
                    {
                        echo '<h3 style="text-align:center">' . $_SESSION['update_done'] . '<h3>';
                        unset($_SESSION['update_done']);
                    }
                    include 'view_seller_info.php';
            
                ?>
                <hr color="green" size="2">
                <form action="update_page.php" method="post" novalidate>
                <p class="up"><input type="submit" value="Update profile" style="color: green"></p>
                </form>
                <form action="change_password.php" method="post" novalidate>
                <p class="up"><input type="submit" value="Change Password" style="color: green"></p>
                </form>
                
                
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