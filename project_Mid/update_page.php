<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == false)
{
    header('location:login.php');
    exit;
}
include 'header.php';
$_SESSION['name_update']=$_SESSION['name'];
$_SESSION['username_update']=$_SESSION['username'];
$_SESSION['email_update']=$_SESSION['email'];
$_SESSION['phone_update']=$_SESSION['phone'];
$_SESSION['dob_update']=$_SESSION['dob'];

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
  <?php echo "Welcome,Mr. ".$_SESSION['name']; ?>
  <hr color="red" size="5">

    <table class="tabl" border=1>
        <tr>
            <th class="side_panel"><a href="sellerdashboard.php">User Profile</a></th>
            <td rowspan='8'>
                
<table align="center" >
    <tr>
        <th>
        <form method="post" action="update_validation.php" novalidate>
        <fieldset class="tablt">
            <legend><h3>Update Profile</h3></legend>  
            <table align="center">
            <tr>
        <th align="left">
        <?php
                if(isset($_SESSION['name_update_err']))
                {
                echo $_SESSION['name_update_err'];
                unset($_SESSION['name_update_err']);
                }
            ?> <br>
            <label for="name">Name: </label>
            <input type="text" id="name" name="name" value="<?php echo isset($_SESSION['name_update']) ? $_SESSION['name_update']:"" ?>" placeholder="Enter your name..">
        </th>
    </tr>
    <tr>
        <th align="left">
        <?php
                if(isset($_SESSION['username_update_err']))
                {
                echo $_SESSION['username_update_err'];
                unset($_SESSION['username_update_err']);
                }
            ?> <br>
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" value="<?php echo isset($_SESSION['username_update']) ? $_SESSION['username_update']:"" ?>" placeholder="Enter your Username..">
        </th>
    </tr>
    <tr>
        <th align="left">
        <?php
                if(isset($_SESSION['email_update_err']))
                {
                echo $_SESSION['email_update_err'];
                unset($_SESSION['email_update_err']);
                }
            ?> <br>
            <label for="email">Email: </label>
            <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['email_update']) ? $_SESSION['email_update']:"" ?>" placeholder="Enter email.."> 
        </th>
    </tr>
    <tr>
        <th align="left">
        <?php
                if(isset($_SESSION['phone_update_err']))
                {
                echo $_SESSION['phone_update_err'];
                unset($_SESSION['phone_update_err']);
                }
            ?> <br>
        <label for="phone">Phone Number: </label>
        <input type="number" id="phone" name="phone" value="<?php echo isset($_SESSION['phone_update']) ? $_SESSION['phone_update']:"" ?>" placeholder="Enter phone Number.."> 
       </th>
    </tr>
    <tr>
        <th align="left">
        <?php
                if(isset($_SESSION['gender_update_err']))
                {
                echo $_SESSION['gender_update_err'];
                unset($_SESSION['gender_update_err']);
                }
            ?> <br>
            <label for="gender">Gender: </label>
            <input type="radio" id="gender" name="gender" value="Male">Male
            <input type="radio" id="gender" name="gender" value="Female">Female
            <input type="radio" id="gender" name="gender" value="Others">Others <br>
        </th>
    </tr>
    <tr>
        <th align="left">
        <?php
                if(isset($_SESSION['bloodgroup_update_err']))
                {
                echo $_SESSION['bloodgroup_update_err'];
                unset($_SESSION['bloodgroup_update_err']);
                }
            ?> <br>
            <label for="bloodgroup">Blood Group: </label>
            <select name= "bloodgroup" id="bloodgroup">
                <option>None</option>
                <option>A+</option>
                <option>B+</option>
                <option>A-</option>
                <option>B-</option>
                <option>O+</option></select><br>
        </th>
    </tr>
    <tr>
        <th align="left">
        <?php
                if(isset($_SESSION['dob_update_err']))
                {
                echo $_SESSION['dob_update_err'];
                unset($_SESSION['dob_update_err']);
                }
            ?> <br>
            <label for="dob">Date of birth: </label>
            <input type="date" id="dob" name="dob" value="<?php echo isset($_SESSION['dob_update']) ? $_SESSION['dob_update']:"" ?>">
        </th>
    </tr>
    <tr>
        <th align="left">
        <?php
                if(isset($_SESSION['address_update_err']))
                {
                echo $_SESSION['address_update_err'];
                unset($_SESSION['address_update_err']);
                }
            ?> <br>
            <label for="address">Address: </label>
            <textarea name="address" id="address" cols="30" rows="1" ></textarea>
         </th>
    </tr>
    <tr>
        <th>
        <table align="center">
            <tr>
                <td>
                    <input type="submit" value="Update Profile" style="color: green" >
                </td>
            </tr>
        </table>
        </th>
    </tr>
  </table></form></fieldset></th></tr>
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
            <th><a href="order_management">Order Management</a></th>
        </tr>
        <tr>
            <th><a href="customer_communication">Customer Communication</a></th>
        </tr>
        <tr>
            <th><a href="payment_processing">Payment Processing</a></th>
        </tr>
        <tr>
            <th><a href="blog">Blog</a></th>
        </tr>
        <tr><th><a href="logout.php">Logout</a></th></tr>
    </table>
    <?php include 'footer.php'; ?>
</body>
</html>