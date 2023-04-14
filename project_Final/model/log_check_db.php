<?php
$servername = "localhost";
$uname = "root";
$pass = "";
$dbname = "project";

$con = mysqli_connect($servername, $uname, $pass, $dbname);
$stmt = $con->prepare("SELECT username,name, password FROM registration WHERE username=?");
$stmt->bind_param("s", $username);
$username = $_SESSION['username'];


$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    $_SESSION['name']=$row["name"];
    $_SESSION['username_']=$row["username"];
    $_SESSION['password_']=$row["password"];
    }
}else {
    header("location: ../view/login.php");
}

$stmt->close();
$con->close();
?>