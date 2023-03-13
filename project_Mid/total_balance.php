<style>
    .upp{
        text-align: center;
        color:0F0D35;
    }
</style>
<?php
            $_SESSION['total_balance']=0;
            $status="Approved";
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "project";
            $con = mysqli_connect($servername, $username, $password, $dbname);
            
            $sql = "SELECT * FROM ordermanage WHERE status='$status' && username='{$_SESSION['username']}'";
            $result= mysqli_query($con, $sql);
            
            while($row = mysqli_fetch_assoc($result)) {
                 $_SESSION['total_balance']=$_SESSION['total_balance']+$row['price'];
            }
            if (isset($_SESSION['withdraw_ammount_final'])) {
                $_SESSION['total_balance'] -= $_SESSION['withdraw_ammount_final'];
                echo "<h3 class='upp'>Total Balance: ".$_SESSION['total_balance']."</h3>";
            }else{
                echo "<h3 class='upp'>Total Balance: ".$_SESSION['total_balance']."</h3>";
            }
            
            
            
    
?>
