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
                    include_once '../model/view_seller_info_db.php';
                ?>
                <h3 align="center"><u>User Profile</u></h3>
                <table align='center' class="tablt">
                    <tr>
                        <td>
                        <?php echo "<b>Name: </b>".$_SESSION['name']; ?>
                        </td>
                    </tr>
                    <tr >
                        <td>
                            <?php echo "<b>Username: </b>".$_SESSION['username']; ?>
                        </td>
                    </tr>
                    <tr >
                        <td><?php echo "<b>Email: </b>".$_SESSION['email']; ?></td>
                    </tr>
                    <tr >
                        <td><?php echo "<b>Phone Number: </b>".$_SESSION['phone']; ?></td>
                    </tr>
                    <tr >
                        <td><?php echo "<b> Gender: </b>".$_SESSION['gender']; ?></td>
                    </tr>
                    <tr >
                        <td><?php echo "<b> Blood Group: </b>".$_SESSION['bloodgroup']; ?></td>
                    </tr>
                    <tr >
                        <td><?php echo "<b> Date of Birth: </b>".$_SESSION['dob']; ?></td>
                    </tr>
                    <tr >
                        <td><?php echo "<b> Status: </b>".$_SESSION['status']; ?></td>
                    </tr>
                    <tr >
                        <td><?php echo "<b> Address: </b> ".$_SESSION['address']; ?></td>
                    </tr>
                </table>
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