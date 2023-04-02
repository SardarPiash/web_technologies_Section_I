<?php
$servername = "localhost";
$uname = "root";
$pass = "";
$dbname = "project";
$con = mysqli_connect($servername, $uname, $pass, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $stmt = $con->prepare("INSERT INTO chat ( text, username) VALUES (?, ?)");
    $stmt->bind_param("ss", $_SESSION['text_buyer'], $_SESSION['user_buyer']);
    $stmt->execute();
    $result = $stmt->execute();

    $_SESSION['res_buyer']=$result;
}
?>