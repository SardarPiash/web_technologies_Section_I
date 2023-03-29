<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $flag = true;
    $error = false;
    $current_password = sanitize($_POST['current_password']);
    $new_password = sanitize($_POST['new_password']);
    $confirm_password = sanitize($_POST['confirm_password']);

    if (empty($current_password)) {
        $_SESSION['current_password_err'] = '<b style="color:red">*Enter current password first...</b>';
        $flag = false;
    } else {
        $_SESSION['current_password_err'] = "";
        $_SESSION['current_password'] = $current_password;
        $error = true;
    }

    if (empty($new_password)) {
        $_SESSION['new_password_err'] = '<b style="color:red">*Enter new password first...</b>';
        $flag = false;
    } else {
        $_SESSION['new_password_err'] = "";
        $_SESSION['new_password'] = $new_password;
        $error = true;
    }

    if (empty($confirm_password)) {
        $_SESSION['confirm_password_err'] = '<b style="color:red">*Confirm password first...</b>';
        $flag = false;
    } else {
        $_SESSION['confirm_password_err'] = "";
        $_SESSION['confirm_password'] = $confirm_password;
        $error = true;
    }

    
        if ($current_password === $new_password || $current_password === $confirm_password) {
            $_SESSION['error_password_err'] = '<b style="color:red">*Current, New and Confirm passwords cannot be the same.</b>';
            $flag = false;
        }else {
            $_SESSION['error_password_err'] = "";
        }
        if ($confirm_password !== $new_password) {
            $_SESSION['error1_password_err'] = '<b style="color:red">*New and confirm passwords must be the same.</b>';
            $flag = false;
        }else {
            $_SESSION['error1_password_err'] = "";
        }
    

    if ($flag === true) {
        // connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";
        $con = mysqli_connect($servername, $username, $password, $dbname);

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $username = $_SESSION['username'];
        $sql = "SELECT password FROM registration WHERE username='$username'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                //$_SESSION['password'] = $row["password"];

                if ($row["password"] === $current_password) {
                    $sql1 = "UPDATE registration SET password='$confirm_password' WHERE username='$username'";
                    $result1 = mysqli_query($con, $sql1);

                    if ($result1) {
                        $_SESSION['password_change_success'] = '<b style="color:green">*Password changed successfully.</b>';
                        unset($_SESSION['current_password']);
                        unset($_SESSION['new_password_err']);
                        unset($_SESSION['new_password']);
                        header('location: change_password.php');
                    } else {
                        header('location: change_password.php');
                    }
                } else {
                    $_SESSION['error2_password_err'] = '<b style="color:red">*Current password did not matched with your old password.</b>';
                    header('location: change_password.php');
                }
            }
        } else {
            header('location: change_password.php');
        }
    } else {
        header('location: change_password.php');
    }
}else {
    header('location: change_password.php');
}
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
