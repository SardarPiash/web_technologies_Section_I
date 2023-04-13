<?php

session_start();
if($_SERVER['REQUEST_METHOD'] === "POST")
{
    $flag=true;
    $otp_match=sanitize($_POST['otp_match']);
    if(empty($otp_match))
    {
        $_SESSION['otp_match_err']='<b style="color:red">* Enter your OTP.</b>';
        $flag=false;    
    }else{
        $_SESSION['otp_match_err']="";
        $_SESSION['otp_match']=$otp_match;
    }
    if($flag){
        if($otp_match===$_SESSION['send_otp']){
            $_SESSION['payment_success']='<b style="color:red;align:center">* Withdraw Success!</b>';
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "project";
            $con = mysqli_connect($servername, $username, $password, $dbname);
            $stmt =$con->prepare ("SELECT * FROM balance_sheet WHERE username=?");
            $user=$_SESSION['username'];
            $stmt->bind_param("s",$user);
            $stmt->execute();
            $result=$stmt->get_result();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()) {
                    $withdraw=$row['withdraw'];
                }
            }
            $withdraw += $_SESSION['withdraw_ammount'];
            $stmt =$con->prepare ("UPDATE balance_sheet SET withdraw = ? WHERE username = ?");
            $stmt->bind_param("ss",$withdraw,$user);
            $stmt->execute();
            $stmt->close();
            header("location: ../view/payment_processing.php");
        }else{
            $_SESSION['otp_error']='<b style="color:red;align:center">OTP not matched<b>';
            header("location: ../view/otp_send_mobile.php");
        }
    }else{
        header("location: ../view/otp_send_mobile.php");
    }
}

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
