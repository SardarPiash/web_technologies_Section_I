<?php
// if(!isset($_SESSION['login']) || $_SESSION['login'] == false)
// {
//     header('location:login.php');
//     exit;
// }
session_start();
if($_SERVER['REQUEST_METHOD'] === "POST") {
   $method=sanitize($_POST['method']);
   $account_number=sanitize($_POST['account_number']);
   $otp=true;
   if(empty($account_number))
    {
        $_SESSION['account_number_err']='<b style="color:red">* Enter your account number.</b>';
        $otp=false;
    }else{
        $_SESSION['account_number_err']="";
        $_SESSION['account_number']=$account_number;
    }

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