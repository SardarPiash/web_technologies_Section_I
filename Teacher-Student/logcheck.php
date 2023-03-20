<?php
session_start();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $flag = true;
        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);


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
            //db


            $servername = "localhost";
            $uname = "root";
            $pass = "";
            $dbname = "Schoolsystem";
            $con = mysqli_connect($servername, $uname, $pass, $dbname);
            $sql = "SELECT username, password,status FROM registration WHERE username='$username'";

            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                $_SESSION['username']=$row["username"];
                $_SESSION['status']=$row["status"];
                $_SESSION['password']=$row["password"];
                if($_SESSION['username']===$username && $_SESSION['password']===$password){
                    $_SESSION['login']=true;
                    if($_SESSION['status']==="teacher")
                    {
                        header('location:teacherdashboard.php');
                    }else{
                        header('location:studentdashboard.php');
                    }
                    
                }else{
                    $_SESSION['log_err']='<b style="color:red">*Invalid User</b>';
                    header('location:login.php');
                }
                
                }
            } else {
                header('location:login.php');
            }

            mysqli_close($con);
        }else{
            header('location:login.php');
        }
        
        
    }

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

