<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $text = $_POST['text'];
    $username = $_SESSION['username'];
    $flag1 = true;

    if (empty($text)) {
        $_SESSION['text_err'] = '<b style="color:red">*Enter Text First...</b>';
        $flag1 = false;
    } else {
        $_SESSION['text_err'] = "";
    }

    if ($flag1 === true) {
        $servername = "localhost";
        $uname = "root";
        $pass = "";
        $dbname = "project";
        $con = mysqli_connect($servername, $uname, $pass, $dbname);

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            $sql = "INSERT INTO chat (text, username,user_buyer) VALUES (?, ?,?)";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $text, $_SESSION['username'],$_SESSION['user_buyer']);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($result) {
                header("location:customer_communication.php");
            } else {
                echo mysqli_error($con); 
                header("location:customer_communication.php");
            }
        }
    } else {
        header("location:customer_communication.php");
    }
}
?>
