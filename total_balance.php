<style>
    .upp{
        text-align: center;
        color:0F0D35;
    }
</style>
<?php
            $total_balance=0;
            $total_balance1=0;
            $status="Approved";
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "project";
            $con = mysqli_connect($servername, $username, $password, $dbname);
            
            $sql = "SELECT * FROM ordermanage WHERE status='$status' && username='{$_SESSION['username']}'";
            $result= mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                $total_balance=$total_balance + $row['price'];
           }
           $sql2 = "UPDATE balance_sheet SET total_sale = $total_balance WHERE username = '{$_SESSION['username']}'";
           $result2= mysqli_query($con, $sql2);
           
           $sql3 = "SELECT * FROM balance_sheet WHERE username='{$_SESSION['username']}'";
           $result3= mysqli_query($con, $sql3);
           while($row1 = mysqli_fetch_assoc($result3)) {
            $total_balance1=$row1['total_sale']-$row1['withdraw'];
       }
           $_SESSION['total_balance']=$total_balance1;
           echo "<h3 class='upp'>Total Balance: ".$total_balance1."</h3>";
?>
