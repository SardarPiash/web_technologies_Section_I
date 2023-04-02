<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $user_buyer = $_POST['username_buyer'];
    $text = $_POST['text'];
    $flag = true;

    if (empty($user_buyer)) {
        $flag = false;    
    } else {
        $_SESSION['user_buyer'] = $user_buyer;
    }

    if (empty($text)) {
        $flag = false;    
    } else {
        $_SESSION['text_buyer'] = $text;    
    }

    if ($flag === true) {
        include '../model/buyer_chat_db.php';
            
            if ($_SESSION['res_buyer']) {
                header("location: ../view/customer_communication.php");
            } else { 
                header("location: ../view/buyer_chat.php");
            }
    } else {
        header("location: ../view/buyer_chat.php");
    }
}
?>
