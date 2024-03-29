
<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == false)
{
    header('location:login.php');
    exit;
}
// if (!isset($_COOKIE['otp']) || $_COOKIE['otp'] !== 'send') {
//     $_SESSION['OTP_EXPIRED']='<b style="color:red;align:center">Your OTP is: '.$_SESSION['send_otp'].'</b>';
//     header('location:payment_method.php');
//   } 
include 'header.php';

if($_SERVER['REQUEST_METHOD'] === "POST") {
    
    if(empty($method))
    {
        $_SESSION['method_err']='<b style="color:red">* Select any mobile banking option.</b>';
        $otp=false;
    }else{
        $_SESSION['method_err']="";
        $_SESSION['method']=$method;
    }
    if($method=="Select One")
    {
        $_SESSION['method_err']='<b style="color:red">* Select any mobile banking option.</b>';
        $otp=false;
    }else{
        $_SESSION['method_err']="";
        $_SESSION['method']=$method;
    }
    if($otp){
        setcookie("otp","send",time()+300,"/");
        //Email operation to send otp here......
        $_SESSION['send_otp']="4400";
        header('location:otp_send_mobile.php');
    }else{
        header('location:payment_method.php');
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
.tablee {
  border-collapse: collapse;
  border: 2px solid red;
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
    <title>Seller Dashboard</title>
</head>
<?php include 'sellercss.php' ;?>
<body align="center">
  <h1>Seller Dashboard</h1>
  <?php echo "Welcome,Mr. ".$_SESSION['name']; ?>
  <hr color="red" size="5">

    <table border=1 class="tabl">
        <tr>
            <th class="side_panel"><a href="sellerdashboard.php">User Profile</a></th>
            <td rowspan='8'>
                <table align='center' class="tablee">
                    <tr>
                        <th>
                            <br><br>

                            <?php
                            if(isset($_SESSION['send_otp'])){
                                echo '<b style="color:red;align:center">Your OTP is: '.$_SESSION['send_otp'].'</b>';
                            }
                            echo "<br>";
                            if(isset($_SESSION['otp_match_err']))
                            {
                                echo $_SESSION['otp_match_err'];
                                unset($_SESSION['otp_match_err']);

                            }

                            ?>
                        <form action="otp_match.php" method="post" novalidate>
                         <label for="otp_match">Enter your otp here: </label>
                         <input type="number" id="otp_match" name="otp_match"><br><br>
                         <input type="submit" value="Submit OTP" style="color:green;align:right">
                    </form>
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