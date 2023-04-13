
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
  <?php echo "Welcome,Mr. ".$_SESSION['username']; ?>
  <hr color="red" size="5">

    <table border=1 class="tabl">
        <tr>
            <th class="side_panel"><a href="sellerdashboard.php">User Profile</a></th>
            <td rowspan='8'>
                <?php
                if(isset($_SESSION['payment_success'])){
                    echo $_SESSION['payment_success'];
                    unset($_SESSION['payment_success']);
                }


?>
            <?php 
                require '../model/total_balance_db.php'; 
                echo "<h3 class='upp'>Total Balance: ".$_SESSION['total_balance']."</h3>";
                ?><br>  
            <?php require '../model/ordered_list_for_payment_db.php'; ?><br><br><br>
            <hr color="green" size="2">
            <?php
                    
                    if(isset($_SESSION['withdraw_ammount_err'])){
                        echo "<h3 align='center'>" . $_SESSION['withdraw_ammount_err'] . "</h3>";
                        unset($_SESSION['withdraw_ammount_err']);
                    }
                    ?>
                    <br>
            <?php require '../view/withdraw_money.php'; ?>
                    
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