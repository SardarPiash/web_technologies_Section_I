<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if(isset($_POST['id'])) {
            $status="Approved";
            $decision="Operation_done";
            $id = sanitize($_POST['id']);
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "project";
            $con = mysqli_connect($servername, $username, $password, $dbname);
            
            $sql = "UPDATE ordermanage SET status='$status', order_decision='$decision' WHERE id='$id'";
            mysqli_query($con, $sql);
            mysqli_close($con);
            header('location:order_management.php');
            
        }else{
            header('location:order_management.php');
        }
    }else{
        header('location:order_management.php');
    }
    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
