<?php
$username = $_SESSION['username_'];
$servername = "localhost";
$uname = "root";
$pass = "";
$dbname = "project";
$con = new mysqli($servername, $uname, $pass, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$stmt = $con->prepare("SELECT username, password FROM registration WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($username_result, $password_result);

if ($stmt->fetch()) {
    $_SESSION['username_']=$username_result;
    $_SESSION['password_']=$password_result;
    $_SESSION['not_show']=true;
} else {
    $_SESSION['username_not_found']='<b style="color:red">*User Not found.</b>';
}

$stmt->close();
$con->close();
?>



