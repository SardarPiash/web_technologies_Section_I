

<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == false)
{
    header('location:login.php');
    exit;
}
include 'header.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $amount=sanitize($_POST['ammount']);
    
    if(empty($amount)){
     $_SESSION['withdraw_ammount_err']='<b style="color:red">*Enter amount Please.</b>';
     header('location:payment_processing.php');
    }elseif($amount>$_SESSION['total_balance'])
    {
        $_SESSION['withdraw_ammount_err']='<b style="color:red">*Amount must be smaller than total balance.</b>';
        header('location:payment_processing.php');
    }
    elseif($amount<50 && $amount == 49)
    {
        $_SESSION['withdraw_ammount_err']='<b style="color:red">*Minimun withdraw limit 50tk.</b>';
        header('location:payment_processing.php');
    }
    else{
     $_SESSION['withdraw_ammount_err']="";
     $_SESSION['withdraw_ammount']=$amount;
    }
}
function sanitize($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}
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
                <?php if(isset($_SESSION['OTP_EXPIRED']))
                {
                    echo $_SESSION['OTP_EXPIRED'];
                    unset($_SESSION['OTP_EXPIRED']);
                }?><br>
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
    <form action="otp_send_mobile_validation.php" method="post" novalidate>
        <tr>
            <th> 
            <?php
                 if(isset($_SESSION['method_err']))
                 {
                    echo $_SESSION['method_err'];
                    unset($_SESSION['method_err']);
                 }
            ?><br>
            <label for="method">Payment Method:</label>
            <select name= "method" id="method">
                <option>Select One</option>
                <option>Bkash</option>
                <option>Rocket</option>
                <option>Nogod</option>
                <option>Upay</option></select>
            </th>
        </tr>
        <tr>
            <th>
            <?php
                 if(isset($_SESSION['account_number_err']))
                 {
                    echo $_SESSION['account_number_err'];
                    unset($_SESSION['account_number_err']);
                 }
            ?><br>
            <label for="account_number">Account number:</label>
            <input type="number" id="account_number" name="account_number" placeholder="Enter account number.." value="<?php echo $_SESSION['account_number']; ?>">
            <?php unset($_SESSION['account_number']); ?>
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
