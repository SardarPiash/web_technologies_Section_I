<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (!isset($_POST['status'])) {
        $_POST['status'] = "";
        
    }
    if($_SERVER['REQUEST_METHOD'] === "POST")
    {
    $flag=true;
    $username=sanitize($_POST['username']);
    $password=sanitize($_POST['password']);
    $status=sanitize($_POST['status']);

    if(empty($username))
    {
        $_SESSION['username_err']="*Enter your username please.";
        $flag=false;    
    }else{
        $_SESSION['username_err']="";
        $_SESSION['username']=$username;
    }
    if(empty($password))
    {
        $_SESSION['password_err']="*Enter your password please.<b>";
        $flag=false;
    }else{
        $_SESSION['password_err']="";
        $_SESSION['password']=$password;
    }
    if(empty($status))
    {
        $_SESSION['status_err']="*Enter your status please.<b>";
        $flag=false;
    }else{
        $_SESSION['status_err']="";
        $_SESSION['status']=$status;
    }
    if($flag){
        $servername = "localhost";
        $uname = "root";
        $pass = "";
        $dbname = "Schoolsystem";
        $con = mysqli_connect($servername, $uname, $pass, $dbname);

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
          }else
          {
            $sql = "INSERT INTO registration (username, password,status)
            VALUES ('$username','$password','$status')";
            $result=mysqli_query($con, $sql);
            if (!$result) {
                if (mysqli_errno($con) == 1062) {
                  $_SESSION['user_err']="*Username Already Exists<b>";
                  header('location:registration.php');
                }
              } else {
                header('location:login.php');
              }
         }
    }else{
        header('location:registration.php');
    }
}

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
    
</body>
</html>