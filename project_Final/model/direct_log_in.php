
<?php
$servername = "localhost";
$uname = "root";
$pass = "";
$dbname = "project";
$con = mysqli_connect($servername, $uname, $pass, $dbname);
$stmt = $con->prepare("SELECT username,name, password FROM registration WHERE one_time_pass=?");
$stmt->bind_param("s", $_SESSION['token']);

$stmt->execute();
$result = $stmt->get_result();

if (mysqli_num_rows($result) == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['name']=$row["name"];
    $_SESSION['username']=$row["username"];
    $_SESSION['password']=$row["password"];
}

$stmt->close();
$con->close();
?>