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
                $_SESSION['withdraw_ammount_final']=$_SESSION['withdraw_ammount'];
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