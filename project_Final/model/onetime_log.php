<?php
// session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$token = $_SESSION['token'];
$stmt = $con->prepare("UPDATE registration SET one_time_pass=? WHERE username=?");
$stmt->bind_param("ss", $token, $username);

$username = $_SESSION['username'];

$stmt->execute();

$stmt->close();
$con->close();
$_SESSION['ok']="DONE";
?>
