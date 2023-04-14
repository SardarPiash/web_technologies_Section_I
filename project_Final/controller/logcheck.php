<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $flag = true;
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);
    $remerber_me=sanitize($_POST['remember_me']);

    if (empty($username)) {
        $_SESSION['username_err']='<b style="color:red">*Enter Username Frist...</b>';
        $flag = false;
    }else{
        $_SESSION['username_err']="";
        $_SESSION['username']=$username;
    }
    if (empty($password)) {
        $_SESSION['password_err']='<b style="color:red">*Enter Password Frist...</b>';
        $flag = false;	
    }else{
        $_SESSION['password_err']="";
        $_SESSION['password']=$password;
    }
    if($flag===true)
    {
        include '../model/log_check_db.php';

            if($_SESSION['username_']===$username && $_SESSION['password_']===$password){
                $_SESSION['login']=true;
                $_SESSION['viewseller']=true;
                $token=bin2hex(random_bytes(8));
                $_SESSION['token']=$token;
                
                    if(isset($_POST['remember_me']) && $_POST['remember_me'] == true) {
                    $cookie_name="password";
                    $cookie_value=$_SESSION['token'];
                    setcookie($cookie_name, $token, time() +300, "/");
                    include '../model/onetime_log.php';
                    }
                    header("location: ../view/sellerdashboard.php");
                }else{
                    $_SESSION['log_err']='<b style="color:red">*Invalid User</b>';
                    header("location: ../view/login.php");
                }
            }else{
                header("location: ../view/login.php");
            }
    }else{
        header("location: ../view/login.php");
    }

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

