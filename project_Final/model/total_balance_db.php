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
            $uname = "root";
            $pass = "";
            $dbname = "project";
            $con = mysqli_connect($servername, $uname, $pass, $dbname);
            
            $stmt =$con->prepare ("SELECT * FROM ordermanage WHERE status=? && username=?");
            $user=$_SESSION['username'];
            $stmt->bind_param("ss",$status,$user);
            $stmt->execute();
            $result= $stmt->get_result();
            if($result->num_rows>0){
            while($row=$result->fetch_assoc()) {
                $total_balance=$total_balance + $row['price'];
           }}
           $stmt =$con->prepare("UPDATE balance_sheet SET total_sale = $total_balance WHERE username =? ");
           $stmt->bind_param("s",$user);
           $stmt->execute();
           $stmt =$con->prepare("SELECT * FROM balance_sheet WHERE username=? ");
           $stmt->bind_param("s",$user);
           $stmt->execute();
           $result= $stmt->get_result();
           if($result->num_rows>0){
           while($row = $result->fetch_assoc()) {
            $total_balance1=$row['total_sale']-$row['withdraw'];
       }}
           $_SESSION['total_balance']=$total_balance1;
          ?>
