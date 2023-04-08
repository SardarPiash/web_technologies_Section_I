<?php
session_start();
if(!isset($_SESSION['login'])||!$_SESSION['login']===false){
    header("location: ../view/login.php");
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if(isset($_POST['id'])) {
            $id = sanitize($_POST['id']);
            $_SESSION['approve_id']=$id;
            include '../model/approve_db.php';
            header("location: ../view/order_management.php");
            
        }else{
            header("location: ../view/order_management.php");
        }
    }else{
        header("location: ../view/order_management.php");
    }
    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
