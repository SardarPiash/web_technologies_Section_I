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
    .mid{
        text-align:center;
    }
.tablt {
  width: 800px;
  height: 250px;
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
            echo "<p class='up'>";
            if(isset($_SESSION['delete_product']))
            {
                echo "<b align='center'>".$_SESSION['delete_product']."</b>";
                unset($_SESSION['delete_product']);
            }
            echo "</p>";
            $user=$_SESSION['username'];
            $servername = "localhost";
            $uname = "root";
            $pass = "";
            $dbname = "project";
            $con = mysqli_connect($servername, $uname, $pass, $dbname);

            // pulling data from newproduct database..........
            $sql = "SELECT * FROM newproduct WHERE username='$user'";
            $result = mysqli_query($con, $sql);
            ?><table border=1 align="center" class="tablt">
            <tr style='color:0F0D35'>
                <th>Product ID</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Details</th>
                <th>Delete</th>
            </tr>
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td class='mid'><b>" . $row['id'] . "</b></td>";
                    echo "<td class='mid'><img src='uploads/" . $row['photo_id'] . "' width='100' height='100'></td>";
                    echo "<td class='mid'><b>" . $row['name'] . "</b></td>";
                    echo "<td class='mid'><b>" . $row['price'] . "</b></td>";
                    echo "<td class='mid'>" . $row['details'] . "</td>";
                    echo "<td class='mid'>"; ?>
                    <form method="post" action="delete_product.php" novalidate> 
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type='submit' value='Delete' style='color:red'>
                    </form>
                    <?php
                        echo "</td>";
                        echo "</tr>";
                    
                }
            ?>
        </table>
        <?php        
            mysqli_close($con);
        ?>
                
                
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