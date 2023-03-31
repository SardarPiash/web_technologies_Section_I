<?php
$servername = "localhost";
$uname = "root";
$pass = "";
$dbname = "project";
$con = mysqli_connect($servername, $uname, $pass, $dbname);
$stmt = $con->prepare("SELECT username,name, password FROM registration WHERE username='$username'");
$stmt->bind_param("sss", $name, $username, $password);
$name = $_SESSION['name'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];

$stmt->execute();
if (mysqli_num_rows($stmt) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    $_SESSION['name']=$row["name"];
    $_SESSION['username']=$row["username"];
    $_SESSION['password']=$row["password"];
    }
}else {
    header('location:login.php');
}


?>