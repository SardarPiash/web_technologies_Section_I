<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if(isset($_POST['id'])) {
            $status="Approved";
            $id = sanitize($_POST['id']);
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "Schoolsystem";
            $con = mysqli_connect($servername, $username, $password, $dbname);
            
            $sql = "UPDATE application SET approval='$status' WHERE id='$id'";
            mysqli_query($con, $sql);
            mysqli_close($con);
            $_SESSION['verify']=true;
            header('location:teacherdashboard.php');
        }
    }else{
        header('location:teacherdashboard.php');
    }
    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
