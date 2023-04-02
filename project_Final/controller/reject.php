<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if(isset($_POST['id'])) {
            $id = sanitize($_POST['id']);
            $_SESSION['reject_id']=$id;
            include '../model/reject_db.php';
            
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
