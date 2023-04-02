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
.banking{
  border-collapse: collapse;
  border: 2px solid green;
  width: 400px;
  height: 200px;
  display: block; 
  margin: 50 auto ;
  text-align:center;

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

    <table border=1 class="tabl">
        <tr>
            <th class="side_panel"><a href="sellerdashboard.php">User Profile</a></th>
            <td rowspan='8'>
                <p align="center"> <?php echo "Requested withdraw amount is BDT: ".$_SESSION['withdraw_ammount']."tk"; ?></p>
                <table class="banking">
                    <tr>
                        <th>
                            <a href="payment_method.php">Mobile Banking</a>
                            <b>  |  </b>
                            <a href="card_banking1.php">CARD</a>
                        </th>
                    </tr>
                    <tr>
                        <th>
                        <table>
    <form action="../controller/otp_send_card_validation.php" method="post" novalidate>
        <tr>
            <th> 
            <?php
                 if(isset($_SESSION['select_bank_err']))
                 {
                    echo $_SESSION['select_bank_err'];
                    unset($_SESSION['select_bank_err']);
                 }
            ?><br>
            <label for="select_bank">Select Bank:</label>
            <select name= "select_bank" id="select_bank">
                <option>Select One</option>
                <option>DBBL</option>
                <option>IFIC</option>
                <option>Qcash</option>
                <option>UCB</option></select>
            </th>
        </tr>
        <tr>
            <th>
            <?php
                 if(isset($_SESSION['card_number_err']))
                 {
                    echo $_SESSION['card_number_err'];
                    unset($_SESSION['card_number_err']);
                 }
            ?><br>
            <label for="card_number">Card number:</label>
            <input type="number" id="card_number" name="card_number" placeholder="Enter your card number please..">
            </th>
        </tr>
        <tr>
            <th>
            <input type="submit" value="Send OTP" style="color: red; display: block; margin: 0 auto;">
            </th>
        </tr>
        </form>
    </table>
                        </th>
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
