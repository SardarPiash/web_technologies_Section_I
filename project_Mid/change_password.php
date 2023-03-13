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
  width: 500px;
  height: 300px;
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
            <table align="center">
	        <tr>
            <td>
            <?php
                if(isset($_SESSION['password_change_success']))
                {
                    echo $_SESSION['password_change_success'];
                    unset($_SESSION['password_change_success']);
                }
            ?> <br>
            <?php
                if(isset($_SESSION['error_password_err']))
                {
                    echo $_SESSION['error_password_err'];
                    unset($_SESSION['error_password_err']);
                }
            ?> <br>
            <?php
                if(isset($_SESSION['error1_password_err']))
                {
                    echo $_SESSION['error1_password_err'];
                    unset($_SESSION['error1_password_err']);
                }
            ?> <br>
            <fieldset class="tablt"><legend><h3>Change Your Password</h3></legend>
            <table>
                <tr>
                    <th>
                        <form method="post" action="change_password_validation.php" novalidate>
                        <?php
                            if(isset($_SESSION['current_password_err']))
                            {
                                echo $_SESSION['current_password_err'];
                                unset($_SESSION['current_password_err']);
                            }
                        ?> <br>
                        <label for="current_password">Current Password:</label>
                        <input type="password" id="current_password" name="current_password" placeholder="Enter current_password..">
                        
                    </th>
                </tr>
                <tr>
                    <th>
                        <?php
                            if(isset($_SESSION['new_password_err']))
                            {
                                echo $_SESSION['new_password_err'];
                                unset($_SESSION['new_password_err']);
                            }
                        ?> <br>
                        <label for="new_password">New Password:</label>
                        <input type="password" id="new_password" name="new_password" placeholder="Enter new_password..">
                        
                    </th>
                </tr>
                <tr>
                    <th>
                        <?php
                            if(isset($_SESSION['confirm_password_err']))
                            {
                                echo $_SESSION['confirm_password_err'];
                                unset($_SESSION['confirm_password_err']);
                            }
                        ?> <br>
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="confirm password..">
                        
                    </th>
                </tr>
                <tr align="right">
                    <td>
                        <input type="submit" value="Reset Password" style="color:green">

                    </td>
                </tr>
            </table>
        </form></fieldset></td></tr></table>
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