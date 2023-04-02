<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if(isset($_POST['id'])) {
            $id = sanitize($_POST['id']);
            $_SESSION['delete_product_id']=$id;
            include '../model/delete_product_db.php';
            $_SESSION['delete_product']='<b style="color:red">*Delete Product Successfully</b>';
            header("location: ../view/shop.php");
        }else{
            header("location: ../view/shop.php");
        }
    }else{
        header("location: ../view/shop.php");
    }
    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
