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

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    $_SESSION['name']=$row["name"];
    $_SESSION['username']=$row["username"];
    $_SESSION['password']=$row["password"];
    }
}else {
    header("location: ../view/login.php");
}

$stmt->close();
$con->close();
?>
