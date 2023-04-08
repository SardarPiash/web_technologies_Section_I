<?php
session_start();
if(!isset($_SESSION['login'])||!$_SESSION['login']===false){
    header("location: ../view/login.php");
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $amount=sanitize($_POST['ammount']);
    $flag=true;
    if(empty($amount)){
     $_SESSION['withdraw_ammount_err']='<b style="color:red">*Enter amount Please.</b>';
     $flag=false;
    }
    elseif($amount>$_SESSION['total_balance'])
    {
        $_SESSION['withdraw_ammount_err']='<b style="color:red">*Amount must be smaller than total balance.</b>';
        $flag=false;
    }elseif($amount<50)
    {
        $_SESSION['withdraw_ammount_err']='<b style="color:red">*Minimun withdraw limit 50tk.</b>';
        $flag=false;
    }
    else{
     $_SESSION['withdraw_ammount_err']="";
     $_SESSION['withdraw_ammount']=$amount;
    }
    if($flag){
        header("location: ../view/payment_method.php");
    }else{
        header("location: ../view/payment_processing.php");
        echo "Not success";
    }
}
function sanitize($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}
?>
