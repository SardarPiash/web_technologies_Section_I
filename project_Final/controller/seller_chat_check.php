<?php
session_start();
if(!isset($_SESSION['login'])||!$_SESSION['login']===false){
    header("location: ../view/login.php");
}
if(isset($_SESSION['user_buyer'])){
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $text = sanitize($_POST['text']);
    $username = $_SESSION['username'];
    $flag1 = true;

    if (empty($text)) {
        $_SESSION['text_err'] = '<b style="color:red">*Enter Text First...</b>';
        $flag1 = false;
    } else {
        $_SESSION['text_err'] = "";
        $_SESSION['text'] = $text;
    }

    if ($flag1 === true) {
        include '../model/seller_chat_db.php';

            if (isset($_SESSION['result'])) {
                header("location: ../view/customer_communication.php");
            } else { 
                header("location: ../view/customer_communication.php");
            }
        }
    } else {
        header("location: ../view/customer_communication.php");
    }
}
else{
    $_SESSION['buyer_msg_1st']='<b style="color:red">*Buyer should Start chat frist...</b>';
    header("location: ../view/customer_communication.php");
}
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
