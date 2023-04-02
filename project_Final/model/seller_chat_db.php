<?php
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
    mysqli_stmt_bind_param($stmt, "sss", $_SESSION['text'], $_SESSION['username'],$_SESSION['user_buyer']);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $_SESSION['result']=$result;
}


?>