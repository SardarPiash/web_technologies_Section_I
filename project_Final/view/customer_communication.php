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
    .up{
        text-align:center;
    }
    .tablt {
  width: 250px;
  height: 120px;
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
                <?php
                         if(isset($_SESSION['user_buyer'])){
                            echo "<br>";
                            echo "Seller:";
                            echo "<br>";
                            echo "<hr size='1' color='red'>";
                            include '../model/chat.php';
                            echo "<hr size='2' color='green'>"; 
                            echo "<br>";
                            echo "Buyer:";
                            echo "<hr size='1' color='red'>";
                            include '../model/chat2.php';
                            echo "<br>";
                             
                            }
                ?> 
            <hr size="2" color="green">
            <table align="center" class="tablt">
                <tr>
                <td>
                <?php
                    if(isset($_SESSION['buyer_msg_1st'])){
                        echo $_SESSION['buyer_msg_1st'];
                        unset($_SESSION['buyer_msg_1st']);
                    }
                ?><br>
                <form action="../controller/seller_chat_check.php" method="post" novalidate>
                <fieldset >
                <legend>Chat as Seller</legend>
                <?php
                if(isset($_SESSION['text_err'])){
                    echo $_SESSION['text_err'];
                    unset($_SESSION['text_err']);
                }
                ?><br>
                <label for="text">Text: </label>
                <input type="text" name="text" id="text" placeholder="text"><br>
                </td></tr>
                    <tr align="right">
                        <td>
                            <input type="submit" value="Chat">
                        </td>
            </tr>
            </fieldset>
                </form>
                </td>
            </tr>
        </table>
                <hr size="2" color="green">
                <p align="center"><a href="../view/buyer_chat.php">Buyer Chat</a></p>
                
                
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
            <th><a href="blog">Blog</a></th>
        </tr>
        <tr><th><a href="logout.php">Logout</a></th></tr>
    </table>
    <?php include 'footer.php'; ?>
</body>
</html>