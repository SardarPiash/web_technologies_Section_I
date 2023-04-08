<?php
session_start();
if(!isset($_SESSION['login'])||!$_SESSION['login']===false){
    header("location: ../view/login.php");
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $flag = true;
    $error = false;
    $current_password = sanitize($_POST['current_password']);
    $new_password = sanitize($_POST['new_password']);
    $confirm_password = sanitize($_POST['confirm_password']);

    if (empty($current_password)) {
        $_SESSION['current_password_err'] = '<b style="color:red">*Enter current password first...</b>';
        $flag = false;
    } else {
        $_SESSION['current_password_err'] = "";
        $_SESSION['current_password'] = $current_password;
        $error = true;
    }

    if (empty($new_password)) {
        $_SESSION['new_password_err'] = '<b style="color:red">*Enter new password first...</b>';
        $flag = false;
    } else {
        $_SESSION['new_password_err'] = "";
        $_SESSION['new_password'] = $new_password;
        $error = true;
    }

    if (empty($confirm_password)) {
        $_SESSION['confirm_password_err'] = '<b style="color:red">*Confirm password first...</b>';
        $flag = false;
    } else {
        $_SESSION['confirm_password_err'] = "";
        $_SESSION['confirm_password'] = $confirm_password;
        $error = true;
    }

    
        if ($current_password === $new_password || $current_password === $confirm_password) {
            $_SESSION['error_password_err'] = '<b style="color:red">*Current, New and Confirm passwords cannot be the same.</b>';
            $flag = false;
        }else {
            $_SESSION['error_password_err'] = "";
        }
        if ($confirm_password !== $new_password) {
            $_SESSION['error1_password_err'] = '<b style="color:red">*New and confirm passwords must be the same.</b>';
            $flag = false;
        }else {
            $_SESSION['error1_password_err'] = "";
        }
    

    if ($flag === true) {
        include_once '../model/change_password_validation_db.php';
        header("location: ../view/change_password.php");
    } else {
        header("location: ../view/change_password.php");
    }
}else {
    header("location: ../view/change_password.php");
}
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
