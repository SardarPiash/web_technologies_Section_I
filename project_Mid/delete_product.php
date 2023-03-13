<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if(isset($_POST['id'])) {
            $id = sanitize($_POST['id']);
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "project";
            $con = mysqli_connect($servername, $username, $password, $dbname);
            $sql = "DELETE FROM newproduct WHERE id='$id'";
            mysqli_query($con, $sql);
            mysqli_close($con);
            $_SESSION['delete_product']='<b style="color:red">*Delete Product Successfully</b>';
            header('location:shop.php');
        }else{
            header('location:shop.php');
        }
    }else{
        header('location:shop.php');
    }
    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
