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
                $sql = "SELECT * FROM balance_sheet WHERE username='{$_SESSION['username']}'";
                $result= mysqli_query($con, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $withdraw=$row['withdraw'];
            }
                $withdraw += $_SESSION['withdraw_ammount'];
                $sql2 = "UPDATE balance_sheet SET withdraw = $withdraw WHERE username = '{$_SESSION['username']}'";
                $result2= mysqli_query($con, $sql2);
                ///Otp should be searched in database here.....
                header('location:payment_processing.php');
            }
        }else{
            header('location:otp_send_mobile.php');
        }

    }
    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



?>