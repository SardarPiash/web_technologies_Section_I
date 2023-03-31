<?php
$servername = "localhost";
$uname = "root";
$pass = "";
$dbname = "project";
$con = mysqli_connect($servername, $uname, $pass, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


$stmt=$con->prepare("SELECT password FROM registration WHERE username=?");
$username=$_SESSION['username'];
$stmt->bind_param("s",$username);

$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($current_password_);
    $stmt->fetch();
    $stmt->close();
    if($current_password_==$_SESSION['current_password']) {
            $stmt=$con->prepare("UPDATE registration SET password=? WHERE username=?");
            $confirm_password_=$_SESSION['confirm_password'];
            $stmt->bind_param("ss",$confirm_password_,$username);
            $stmt->execute();
                if ($stmt->affected_rows>0) {
                    $_SESSION['password_change_success'] = '<b style="color:green">*Password changed successfully.</b>';
                    unset($_SESSION['current_password']);
                    unset($_SESSION['new_password_err']);
                    unset($_SESSION['new_password']);
                    unset($_SESSION['confirm_password']);
                    header('location: change_password.php');
                } else {
                    header('location: change_password.php');
                }
        }else{
            $_SESSION['error2_password_err'] = '<b style="color:red">*Current password did not matched with your old password.</b>';
            header('location: change_password.php');
        }
    }
else{
    header('location: change_password.php');
}

?>